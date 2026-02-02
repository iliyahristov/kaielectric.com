<?php

include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataPictureUpload extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('data/data_upload');

        $this->document->setTitle($this->language->get('heading_title_picture'));

        $this->upload_form([]);
    }

    public function upload_form($post_data)
    {
        $data = [];

        if (!empty($this->error)) {
            $data['error_warning'] = 'Прегледайте внимателно формата за грешки!';
        }

        if (isset($this->error['barcode'])) {
            $data['error_barcode'] = $this->error['barcode'];
        }

        if (isset($this->error['data_file'])) {
            $data['error_data_file'] = $this->error['data_file'];
        }

        if (isset($this->error['picture'])) {
            $data['error_picture'] = $this->error['picture'];
        }

        if (isset($this->error['picture_name'])) {
            $data['error_picture_name'] = $this->error['picture_name'];
        }

        $data['barcode'] = '';
        $data['from_row'] = '';
        $data['to_row'] = '';
        $data['picture'] = '';
        $data['picture_to'] = '';
        $data['picture_name'] = '';
        $data['delete_existing'] = false;

        if (!empty($post_data)) {
            if (!empty($post_data['barcode'])) {
                $data['barcode'] = $post_data['barcode'];
            }
            if (!empty($post_data['from_row'])) {
                $data['from_row'] = $post_data['from_row'];
            }
            if (!empty($post_data['to_row'])) {
                $data['to_row'] = $post_data['to_row'];
            }
            if (!empty($post_data['picture'])) {
                $data['picture'] = $post_data['picture'];
            }
            if (!empty($post_data['picture_to'])) {
                $data['picture_to'] = $post_data['picture_to'];
            }
            if (!empty($post_data['picture_name'])) {
                $data['picture_name'] = $post_data['picture_name'];
            }
            if (isset($post_data['delete_existing'])) {
                $data['delete_existing'] = $post_data['delete_existing'];
            }
        }

        $data['success'] = '';
        if (isset($post_data['success'])) {
            $data['success'] = $post_data['success'];
        }

        $data['action']          = $this->url->link('data/picture_upload/add', 'user_token=' . $this->session->data['user_token'], true);
        $data['convert_csv_url'] = $this->url->link('data/picture_upload/convertCsv', 'user_token=' . $this->session->data['user_token'], true);
        $data['process_csv_url'] = $this->url->link('data/picture_upload/processCsv', 'user_token=' . $this->session->data['user_token'], true);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('data/data_upload_pictures_form', $data));
    }

    /**
     * Първа стъпка: качване на файла
     */
    public function add()
    {
        ob_start();
        @ini_set('display_errors', 0);
        error_reporting(0);

        $json = [];

        if ($this->request->server['REQUEST_METHOD'] != 'POST' || !$this->validateForm()) {
            $json['error'] = $this->error;
            ob_end_clean();
            return $this->outputJson($json);
        }

        if (!isset($_FILES['data_file']) || empty($_FILES['data_file']['tmp_name'])) {
            $json['error'] = ['data_file' => 'Файлът не беше качен успешно.'];
            ob_end_clean();
            return $this->outputJson($json);
        }

        $tmpfname = $_FILES["data_file"]["tmp_name"];

        // Преместваме файла в DIR_UPLOAD
        $upload_code = token(32);
        $upload_name = 'pictures_' . time() . '_' . $upload_code . '.' . pathinfo($_FILES['data_file']['name'], PATHINFO_EXTENSION);
        $target = DIR_UPLOAD . $upload_name;

        if (!move_uploaded_file($tmpfname, $target)) {
            $json['error'] = ['data_file' => 'Грешка при качването на файла!'];
            ob_end_clean();
            return $this->outputJson($json);
        }

        $barcode_col = strtoupper(trim($this->request->post['data']['barcode']));
        $picture_col = strtoupper(trim($this->request->post['data']['picture']));
        $picture_to_col = !empty($this->request->post['data']['picture_to'])
            ? strtoupper(trim($this->request->post['data']['picture_to']))
            : $picture_col;
        $picture_name_col = !empty($this->request->post['data']['picture_name'])
            ? strtoupper(trim($this->request->post['data']['picture_name']))
            : '';
        $delete_existing = isset($this->request->post['data']['delete_existing']) ? true : false;

        $from_row = !empty($this->request->post['data']['from_row']) ? (int)$this->request->post['data']['from_row'] : 3;
        $to_row = !empty($this->request->post['data']['to_row']) ? (int)$this->request->post['data']['to_row'] : 0;

        $this->session->data['picture_upload_job'] = [
            'file'            => $upload_name,
            'barcode_col'     => $barcode_col,
            'picture_col'     => $picture_col,
            'picture_to_col'  => $picture_to_col,
            'picture_name_col'=> $picture_name_col,
            'delete_existing' => $delete_existing,

            'from_row'        => $from_row,
            'to_row'          => $to_row,

            'first_row'       => 0,
            'last_row'        => 0,
            'current_row'     => 0,
            'total_rows'      => 0,

            'updated_pictures' => 0,
            'updated_products' => 0,
            'matched'          => 0,
            'initialized'      => false,
            'csv_ready'        => false,
            'csv_file'         => '',
        ];

        $json['success'] = 'Файлът е качен успешно.';
        $json['status'] = 'file_uploaded';

        ob_end_clean();
        return $this->outputJson($json);
    }

    /**
     * Конвертиране на файла към CSV
     */
    public function convertCsv()
    {
        ob_start();
        @ini_set('display_errors', 0);
        error_reporting(0);
        @ini_set('max_execution_time', 300);
        @ini_set('memory_limit', '512M');

        $json = [];

        if (!$this->user->hasPermission('modify', 'data/picture_upload')) {
            $json['error'] = 'Нямате права за тази операция.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        if (empty($this->session->data['picture_upload_job'])) {
            $json['error'] = 'Няма активна задача за обработка.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $job = &$this->session->data['picture_upload_job'];

        if (!empty($job['csv_ready']) && !empty($job['csv_file'])) {
            $json['status'] = 'done';
            $json['message'] = 'Файлът е готов за обработка.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $filePath = DIR_UPLOAD . $job['file'];
        if (!file_exists($filePath)) {
            $json['error'] = 'Файлът за обработка липсва.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        if ($ext === 'csv') {
            $job['csv_file'] = $job['file'];
            $job['csv_ready'] = true;

            $json['status'] = 'done';
            $json['message'] = 'CSV файлът е готов.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        // Конвертиране от Excel към CSV
        try {
            $excelReader = PHPExcel_IOFactory::createReaderForFile($filePath);
            $excelReader->setReadDataOnly(true);
            $excelObj = $excelReader->load($filePath);
            $worksheet = $excelObj->getSheet(0);

            $csvFileName = 'pictures_' . time() . '_converted.csv';
            $csvPath = DIR_UPLOAD . $csvFileName;

            $fp = fopen($csvPath, 'w');

            foreach ($worksheet->getRowIterator() as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getCalculatedValue();
                }

                fputcsv($fp, $rowData, ';');
            }

            fclose($fp);

            $job['csv_file'] = $csvFileName;
            $job['csv_ready'] = true;

            $json['status'] = 'done';
            $json['message'] = 'Файлът е конвертиран успешно.';

        } catch (Exception $e) {
            $json['error'] = 'Грешка при конвертиране: ' . $e->getMessage();
        }

        ob_end_clean();
        return $this->outputJson($json);
    }

    /**
     * Обработка на CSV файла на части
     */
    public function processCsv()
    {
        ob_start();
        @ini_set('display_errors', 0);
        error_reporting(0);
        @ini_set('max_execution_time', 0);
        @ini_set('memory_limit', '512M');

        $json = [];

        if (!$this->user->hasPermission('modify', 'data/picture_upload')) {
            $json['error'] = 'Нямате права за тази операция.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        if (empty($this->session->data['picture_upload_job'])) {
            $json['error'] = 'Няма активна задача за обработка.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $job = &$this->session->data['picture_upload_job'];

        if (empty($job['csv_ready']) || empty($job['csv_file'])) {
            $json['error'] = 'CSV файлът не е готов.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $batchSize = isset($this->request->post['batch_size']) ? (int)$this->request->post['batch_size'] : 20;
        if ($batchSize <= 0) $batchSize = 20;

        $csvPath = DIR_UPLOAD . $job['csv_file'];
        if (!file_exists($csvPath)) {
            $json['error'] = 'CSV файлът липсва.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        // Инициализация при първо извикване
        if (!$job['initialized']) {
            $this->initializeFromCsv($job, $csvPath);
        }

        $currentRow = (int)$job['current_row'];
        $lastRow = (int)$job['last_row'];

        if ($currentRow > $lastRow) {
            $json = $this->finishProcessing($job);
            ob_end_clean();
            return $this->outputJson($json);
        }

        $this->load->model('data/picture_upload');

        $barcode_col = $job['barcode_col'];
        $picture_col = $job['picture_col'];
        $picture_to_col = $job['picture_to_col'];
        $picture_name_col = $job['picture_name_col'];
        $delete_existing = $job['delete_existing'];

        // Отваряме CSV и прескачаме до текущия ред
        $handle = fopen($csvPath, 'r');
        $lineNum = 0;

        while ($lineNum < $currentRow - 1 && !feof($handle)) {
            fgetcsv($handle, 0, ';');
            $lineNum++;
        }

        $processedNow = 0;

        while ($processedNow < $batchSize && !feof($handle) && $currentRow <= $lastRow) {
            $rowData = fgetcsv($handle, 0, ';');

            if ($rowData === false) {
                $currentRow++;
                continue;
            }

            $barcodeIdx = $this->colToIndex($barcode_col);
            $barcode = isset($rowData[$barcodeIdx]) ? strip_tags(trim($rowData[$barcodeIdx])) : '';

            if (empty($barcode)) {
                $processedNow++;
                $currentRow++;
                $job['current_row'] = $currentRow;
                continue;
            }

            // Премахване на водещи нули
            $barcode_trimmed = ltrim($barcode, '0');

            $data = [
                'barcode' => $barcode,
                'barcode_trimmed' => $barcode_trimmed,
            ];

            // Изтриване на стари снимки (само веднъж за продукт)
            if ($delete_existing) {
                $this->model_data_picture_upload->delete_picture($data);
            }

            // Вземане на име на снимка
            $picture_name = '';
            if (!empty($picture_name_col)) {
                $nameIdx = $this->colToIndex($picture_name_col);
                $picture_name = isset($rowData[$nameIdx]) ? strip_tags(trim($rowData[$nameIdx])) : '';
            }
            $data['picture_name'] = $picture_name;

            // Обработка на колоните със снимки
            $startColumn = $this->colToIndex($picture_col) + 1;
            $endColumn = $this->colToIndex($picture_to_col) + 1;

            $position = 1;
            $productUpdated = false;

            for ($columnIndex = $startColumn; $columnIndex <= $endColumn; $columnIndex++) {
                $idx = $columnIndex - 1;
                $pictureUrl = isset($rowData[$idx]) ? strip_tags(trim($rowData[$idx])) : '';

                if (!empty($pictureUrl)) {
                    $data['picture'] = $pictureUrl;

                    if ($position == 1 && $delete_existing) {
                        $result = $this->model_data_picture_upload->update_product_picture($data);
                    } else if ($position > 1) {
                        $result = $this->model_data_picture_upload->add_picture($data, $position);
                    } else {
                        $result = $this->model_data_picture_upload->add_picture($data, $position);
                    }

                    if ($result) {
                        $job['updated_pictures']++;
                        if (!$productUpdated) {
                            $job['updated_products']++;
                            $job['matched']++;
                            $productUpdated = true;
                        }
                    }

                    $position++;
                }
            }

            $processedNow++;
            $currentRow++;
            $job['current_row'] = $currentRow;
        }

        fclose($handle);

        // Резултат
        $totalRows = (int)$job['total_rows'];
        $doneRows = max(0, min($job['current_row'] - $job['first_row'], $totalRows));

        $json['status'] = ($job['current_row'] > $job['last_row']) ? 'done' : 'processing';
        $json['processed'] = $doneRows;
        $json['total'] = $totalRows;
        $json['updated_pictures'] = (int)$job['updated_pictures'];
        $json['updated_products'] = (int)$job['updated_products'];
        $json['matched'] = (int)$job['matched'];
        $json['current_row'] = (int)$job['current_row'];
        $json['percentage'] = $totalRows > 0 ? round(($doneRows / $totalRows) * 100, 2) : 0;

        if ($json['status'] === 'done') {
            $json = $this->finishProcessing($job);
        }

        ob_end_clean();
        return $this->outputJson($json);
    }

    /**
     * Инициализация от CSV файл
     */
    private function initializeFromCsv(&$job, $csvPath)
    {
        $handle = fopen($csvPath, 'r');

        // Броене на редовете
        $totalLines = 0;
        while (!feof($handle)) {
            fgetcsv($handle, 0, ';');
            $totalLines++;
        }
        fclose($handle);

        $firstRow = $job['from_row'] > 0 ? $job['from_row'] : 3;

        if (!empty($job['to_row']) && $job['to_row'] > 0) {
            $lastRow = min((int)$job['to_row'], $totalLines);
        } else {
            $lastRow = $totalLines;
        }

        $totalRows = max(0, $lastRow - $firstRow + 1);

        $job['first_row'] = $firstRow;
        $job['last_row'] = $lastRow;
        $job['current_row'] = $firstRow;
        $job['total_rows'] = $totalRows;

        $job['initialized'] = true;
    }

    /**
     * Завършване на обработката
     */
    private function finishProcessing(&$job)
    {
        $json = [
            'status' => 'done',
            'processed' => (int)$job['total_rows'],
            'total' => (int)$job['total_rows'],
            'updated_pictures' => (int)$job['updated_pictures'],
            'updated_products' => (int)$job['updated_products'],
            'matched' => (int)$job['matched'],
            'percentage' => 100,
            'message' => 'Готово! Обновени/добавени ' . (int)$job['updated_pictures'] . ' снимки на ' . (int)$job['updated_products'] . ' продукта.'
        ];

        return $json;
    }

    /**
     * Конвертиране на буква на колона към индекс (A=0, B=1, ...)
     */
    private function colToIndex($col)
    {
        $col = strtoupper($col);
        $result = 0;
        $len = strlen($col);

        for ($i = 0; $i < $len; $i++) {
            $result = $result * 26 + (ord($col[$i]) - ord('A') + 1);
        }

        return $result - 1;
    }

    protected function validateForm()
    {
        if (!$this->user->hasPermission('modify', 'data/picture_upload')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (empty($this->request->post['data']['barcode'])) {
            $this->error['barcode'] = 'Въведете колона за баркод!';
        }

        if (empty($this->request->post['data']['picture'])) {
            $this->error['picture'] = 'Въведете колона за снимка!';
        }

        if (!isset($_FILES['data_file']) || empty($_FILES['data_file']['size'])) {
            $this->error['data_file'] = 'Изберете валиден файл!';
        }

        return !$this->error;
    }

    protected function outputJson($json)
    {
        $this->response->addHeader('Content-Type: application/json; charset=utf-8');
        $this->response->setOutput(json_encode($json));
        return;
    }
}
