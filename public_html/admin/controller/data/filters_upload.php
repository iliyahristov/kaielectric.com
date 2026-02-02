<?php
include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataFiltersUpload extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('data/filters_upload');
        $this->document->setTitle($this->language->get('heading_title'));
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
        if (isset($this->error['description'])) {
            $data['error_description'] = $this->error['description'];
        }
        if (isset($this->error['data_file'])) {
            $data['error_data_file'] = $this->error['data_file'];
        }

        $data['barcode']     = '';
        $data['description'] = '';
        $data['from_row']    = '';
        $data['to_row']      = '';

        if (!empty($post_data)) {
            if (!empty($post_data['barcode'])) {
                $data['barcode'] = $post_data['barcode'];
            }
            if (!empty($post_data['description'])) {
                $data['description'] = $post_data['description'];
            }
            if (!empty($post_data['from_row'])) {
                $data['from_row'] = $post_data['from_row'];
            }
            if (!empty($post_data['to_row'])) {
                $data['to_row'] = $post_data['to_row'];
            }
        }

        $data['success'] = '';
        if (isset($post_data['success'])) {
            $data['success'] = $post_data['success'];
        }

        $data['action']          = $this->url->link('data/filters_upload/add', 'user_token=' . $this->session->data['user_token'], true);
        $data['process_url']     = $this->url->link('data/filters_upload/process', 'user_token=' . $this->session->data['user_token'], true);
        $data['convert_csv_url'] = $this->url->link('data/filters_upload/convertCsv', 'user_token=' . $this->session->data['user_token'], true);
        $data['process_csv_url'] = $this->url->link('data/filters_upload/processCsv', 'user_token=' . $this->session->data['user_token'], true);

        $data['header']      = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer']      = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('data/filters_upload_form', $data));
    }

    /**
     * Първа стъпка: качване на файла + запис на базовите параметри в сесията.
     */
    public function add()
    {
        ob_start();
        @ini_set('display_errors', 0);
        error_reporting(0);

        $this->load->language('data/filters_upload');

        $json = [];

        if ($this->request->server['REQUEST_METHOD'] != 'POST' || !$this->validateForm()) {
            $json['error'] = $this->error;
            ob_end_clean();
            return $this->outputJson($json);
        }

        $barcode_col     = $this->request->post['data']['barcode'];
        $description_col = $this->request->post['data']['description'];

        if (!isset($_FILES['data_file']) || empty($_FILES['data_file']['tmp_name'])) {
            $json['error'] = ['data_file' => 'Файлът не беше качен успешно.'];
            ob_end_clean();
            return $this->outputJson($json);
        }

        $tmpfname = $_FILES["data_file"]["tmp_name"];

        // Преместваме файла в DIR_UPLOAD
        $upload_code = token(32);
        $upload_name = 'filters_' . time() . '_' . $upload_code . '.' . pathinfo($_FILES['data_file']['name'], PATHINFO_EXTENSION);
        $target      = DIR_UPLOAD . $upload_name;

        if (!move_uploaded_file($tmpfname, $target)) {
            $json['error'] = ['data_file' => 'Грешка при качването на файла!'];
            ob_end_clean();
            return $this->outputJson($json);
        }

        $from_row = !empty($this->request->post['data']['from_row']) ? (int)$this->request->post['data']['from_row'] : 0;
        $to_row   = !empty($this->request->post['data']['to_row']) ? (int)$this->request->post['data']['to_row'] : 0;

        $this->session->data['filters_upload_job'] = [
            'file'            => $upload_name,
            'barcode_col'     => $barcode_col,
            'description_col' => $description_col,

            'filter_cols'     => [],
            'descr_cols'      => [],
            'filter_group'    => [],
            'descr_items'     => [],

            'from_row'        => $from_row,
            'to_row'          => $to_row,

            'first_row'       => 0,
            'last_row'        => 0,
            'current_row'     => 0,
            'total_rows'      => 0,

            'updated'              => 0,
            'updated_filters'      => 0,
            'updated_descr'        => 0,
            'matched'              => 0,
            'affected_categories'  => [],
            'initialized'          => false,
            'filter_groups_saved'  => false,
            'csv_ready'            => false,
            'csv_file'             => '',
        ];

        $json['success'] = 'Файлът е качен успешно.';
        $json['status']  = 'file_uploaded';

        ob_end_clean();
        return $this->outputJson($json);
    }

    /**
     * Конвертиране на файла (ако е Excel) към CSV за по-бърза обработка
     */
    public function convertCsv()
    {
        ob_start();
        @ini_set('display_errors', 0);
        error_reporting(0);
        @ini_set('max_execution_time', 300);
        @ini_set('memory_limit', '512M');

        $json = [];

        if (!$this->user->hasPermission('modify', 'data/filters_upload')) {
            $json['error'] = 'Нямате права за тази операция.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        if (empty($this->session->data['filters_upload_job'])) {
            $json['error'] = 'Няма активна задача за обработка.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $job = &$this->session->data['filters_upload_job'];

        // Ако вече е готово CSV-то
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

        // Ако е CSV - директно използваме
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

            $csvFileName = 'filters_' . time() . '_converted.csv';
            $csvPath = DIR_UPLOAD . $csvFileName;

            $fp = fopen($csvPath, 'w');

            foreach ($worksheet->getRowIterator() as $row) {
                $rowData = [];
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                foreach ($cellIterator as $cell) {
                    $rowData[] = $cell->getValue();
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

        if (!$this->user->hasPermission('modify', 'data/filters_upload')) {
            $json['error'] = 'Нямате права за тази операция.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        if (empty($this->session->data['filters_upload_job'])) {
            $json['error'] = 'Няма активна задача за обработка.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $job = &$this->session->data['filters_upload_job'];

        if (empty($job['csv_ready']) || empty($job['csv_file'])) {
            $json['error'] = 'CSV файлът не е готов.';
            ob_end_clean();
            return $this->outputJson($json);
        }

        $batchSize = isset($this->request->post['batch_size']) ? (int)$this->request->post['batch_size'] : 100;
        if ($batchSize <= 0) $batchSize = 100;

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
        $lastRow    = (int)$job['last_row'];

        // Проверка дали сме готови
        if ($currentRow > $lastRow) {
            $json = $this->finishProcessing($job);
            ob_end_clean();
            return $this->outputJson($json);
        }

        $this->load->model('data/filters_upload');

        $barcode_col     = $job['barcode_col'];
        $description_col = $job['description_col'];
        $filter_cols     = $job['filter_cols'];
        $descr_cols      = $job['descr_cols'];
        $filter_group    = $job['filter_group'];
        $descr_items     = $job['descr_items'];

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

            $data = [];

            // Вземаме стойностите по индекс на колоната
            $barcodeIdx = $this->colToIndex($barcode_col);
            $descrIdx = $this->colToIndex($description_col);

            $data['barcode'] = isset($rowData[$barcodeIdx]) ? strip_tags(trim($rowData[$barcodeIdx])) : '';
            $data['description'] = isset($rowData[$descrIdx]) ? $rowData[$descrIdx] : '';

            if (empty($data['barcode'])) {
                $processedNow++;
                $currentRow++;
                $job['current_row'] = $currentRow;
                continue;
            }

            // Събиране на категориите за този продукт
            $productCategories = $this->model_data_filters_upload->getProductCategoriesByBarcode($data['barcode']);
            if (!empty($productCategories)) {
                $job['matched']++;
                $job['affected_categories'] = array_merge($job['affected_categories'], $productCategories);
            }

            // Филтри
            $data['product_filters'] = [];
            foreach ($filter_cols as $fc) {
                $idx = $this->colToIndex($fc);
                if (isset($rowData[$idx]) && $rowData[$idx] !== null && $rowData[$idx] !== '') {
                    $data['product_filters'][$fc] = $rowData[$idx];
                }
            }

            // Описания
            $data['product_descr'] = [];
            foreach ($descr_cols as $dc) {
                $idx = $this->colToIndex($dc);
                if (isset($rowData[$idx]) && $rowData[$idx] !== null && $rowData[$idx] !== '') {
                    $ind = isset($descr_items[$dc]) ? $descr_items[$dc] : $dc;
                    $data['product_descr'][$ind] = $rowData[$idx];
                }
            }

            // Обновяване
            $result_filters = $this->model_data_filters_upload->update_product_info($data, $filter_group);
            $result_descr = $this->model_data_filters_upload->update_product_descr($data);

            if ($result_filters) {
                $job['updated_filters']++;
            }
            if ($result_descr) {
                $job['updated_descr']++;
                $job['updated']++;
            }

            $processedNow++;
            $currentRow++;
            $job['current_row'] = $currentRow;
        }

        fclose($handle);

        // Резултат
        $totalRows = (int)$job['total_rows'];
        $doneRows  = max(0, min($job['current_row'] - $job['first_row'], $totalRows));

        $json['status']          = ($job['current_row'] > $job['last_row']) ? 'done' : 'processing';
        $json['processed']       = $doneRows;
        $json['total']           = $totalRows;
        $json['updated']         = (int)$job['updated'];
        $json['updated_filters'] = (int)$job['updated_filters'];
        $json['updated_descr']   = (int)$job['updated_descr'];
        $json['matched']         = (int)$job['matched'];
        $json['current_row']     = (int)$job['current_row'];
        $json['percentage']      = $totalRows > 0 ? round(($doneRows / $totalRows) * 100, 2) : 0;

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

        // Ред 1 - маркери (ФИЛТЪР, ХАРАКТЕРИСТИКИ)
        $row1 = fgetcsv($handle, 0, ';');

        // Ред 2 - имена на групи
        $row2 = fgetcsv($handle, 0, ';');

        $filter_cols = [];
        $descr_cols = [];
        $filter_group = [];
        $descr_items = [];

        if ($row1) {
            foreach ($row1 as $idx => $val) {
                $colLetter = $this->indexToCol($idx);
                if (trim($val) === 'ФИЛТЪР') {
                    $filter_cols[] = $colLetter;
                    if (isset($row2[$idx])) {
                        $filter_group[$colLetter] = $row2[$idx];
                    }
                }
                if (trim($val) === 'ХАРАКТЕРИСТИКИ') {
                    $descr_cols[] = $colLetter;
                    if (isset($row2[$idx])) {
                        $descr_items[$colLetter] = $row2[$idx];
                    }
                }
            }
        }

        // Броене на редовете
        $totalLines = 0;
        while (!feof($handle)) {
            fgetcsv($handle, 0, ';');
            $totalLines++;
        }
        fclose($handle);

        $firstRow = 3;
        if (!empty($job['from_row']) && $job['from_row'] > 2) {
            $firstRow = (int)$job['from_row'];
        }

        // +2 защото първите два реда са хедъри
        $maxRow = $totalLines + 2;

        if (!empty($job['to_row']) && $job['to_row'] > 0) {
            $lastRow = min((int)$job['to_row'], $maxRow);
        } else {
            $lastRow = $maxRow;
        }

        $totalRows = max(0, $lastRow - $firstRow + 1);

        $job['filter_cols']  = $filter_cols;
        $job['descr_cols']   = $descr_cols;
        $job['filter_group'] = $filter_group;
        $job['descr_items']  = $descr_items;

        $job['first_row']   = $firstRow;
        $job['last_row']    = $lastRow;
        $job['current_row'] = $firstRow;
        $job['total_rows']  = $totalRows;

        $job['initialized'] = true;

        // Записваме групите
        $this->load->model('data/filters_upload');
        $this->model_data_filters_upload->save_filter_groups($filter_group);
        $job['filter_groups_saved'] = true;
    }

    /**
     * Завършване на обработката - синхронизация на категорийни филтри
     */
    private function finishProcessing(&$job)
    {
        $this->load->model('data/filters_upload');

        // Синхронизация на филтрите в категориите
        $affected_categories = array_values(array_unique($job['affected_categories']));
        $syncedCategories = 0;

        if (!empty($affected_categories)) {
            $this->model_data_filters_upload->syncCategoryFiltersWithParents($affected_categories);
            $syncedCategories = count($affected_categories);
        }

        $json = [
            'status'          => 'done',
            'processed'       => (int)$job['total_rows'],
            'total'           => (int)$job['total_rows'],
            'updated'         => (int)$job['updated'],
            'updated_filters' => (int)$job['updated_filters'],
            'updated_descr'   => (int)$job['updated_descr'],
            'matched'         => (int)$job['matched'],
            'percentage'      => 100,
            'message'         => 'Готово! Обновени: ' . (int)$job['updated'] . ' продукта. Синхронизирани филтри в ' . $syncedCategories . ' категории.',
            'synced_categories' => $syncedCategories
        ];

        // Почистване
        // @unlink(DIR_UPLOAD . $job['file']);
        // @unlink(DIR_UPLOAD . $job['csv_file']);
        // unset($this->session->data['filters_upload_job']);

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

    /**
     * Конвертиране на индекс към буква на колона (0=A, 1=B, ...)
     */
    private function indexToCol($index)
    {
        $col = '';
        $index++;

        while ($index > 0) {
            $index--;
            $col = chr(65 + ($index % 26)) . $col;
            $index = (int)($index / 26);
        }

        return $col;
    }

    protected function validateForm()
    {
        if (!$this->user->hasPermission('modify', 'data/filters_upload')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (empty($this->request->post['data']['barcode'])) {
            $this->error['barcode'] = 'Въведете колона за баркод!';
        }

        if (empty($this->request->post['data']['description'])) {
            $this->error['description'] = 'Въведете колона за описание!';
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
