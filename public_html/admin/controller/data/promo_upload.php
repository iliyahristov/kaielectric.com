<?php
include_once(DIR_SYSTEM . 'PHPExcel/Classes/PHPExcel.php');

class ControllerDataPromoUpload extends Controller
{

    private $error = array();

    public function index()
    {
        $this->load->language('data/data_upload');

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
        if (isset($this->error['special_price'])) {
            $data['error_special_price'] = $this->error['special_price'];
        }
        if (isset($this->error['date_start'])) {
            $data['error_date_start'] = $this->error['date_start'];
        }
        if (isset($this->error['date_end'])) {
            $data['error_date_end'] = $this->error['date_end'];
        }
        if (isset($this->error['data_file'])) {
            $data['error_data_file'] = $this->error['data_file'];
        }

        $data['barcode'] = '';
        $data['from_row'] = '';
        $data['to_row'] = '';
        $data['special_price'] = '';
        $data['date_start'] = '';
        $data['date_end'] = '';

        if (!empty($post_data)) {
            //set populate form fields
            if (!empty($post_data['barcode'])) {
                $data['barcode'] = $post_data['barcode'];
            }
            if (!empty($post_data['from_row'])) {
                $data['from_row'] = $post_data['from_row'];
            }
            if (!empty($post_data['to_row'])) {
                $data['to_row'] = $post_data['to_row'];
            }
            if (!empty($post_data['special_price'])) {
                $data['special_price'] = $post_data['special_price'];
            }
            if (!empty($post_data['date_start'])) {
                $data['date_start'] = $post_data['date_start'];
            }
            if (!empty($post_data['date_end'])) {
                $data['date_end'] = $post_data['date_end'];
            }
        }

        $data['success'] = '';

        if (isset($post_data['success'])) {
            $data['success'] = $post_data['success'];

        }

        $data['action'] = $this->url->link('data/promo_upload/add', 'user_token=' . $this->session->data['user_token'], true);
        $data['delete_action'] = $this->url->link('data/promo_upload/delete_old_promo', 'user_token=' . $this->session->data['user_token'], true);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('data/promo_upload_form', $data));

    }

    public function add()
    {

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

            $barcode_col = $_POST['data']['barcode'];
            $tmpfname = $_FILES["data_file"]["tmp_name"];

            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $excelObj = $excelReader->load($tmpfname);
            $worksheet = $excelObj->getSheet(0);

            if (!empty($_POST['data']['from_row'])) {
                $firstRow = $_POST['data']['from_row'];
            } else {
                $firstRow = 3;
            }

            if (!empty($_POST['data']['to_row'])) {
                $lastRow = $_POST['data']['to_row'];
            } else {
                $lastRow = $worksheet->getHighestRow();
            }
            //set cols for data
            if (!empty($_POST['data']['special_price'])) {
                $special_price_col = $_POST['data']['special_price'];
            }
            if (!empty($_POST['data']['date_start'])) {
                $date_start_col = $_POST['data']['date_start'];
            }
            if (!empty($_POST['data']['date_end'])) {
                $date_end_col = $_POST['data']['date_end'];
            }


            $updated = 0;
            $this->load->model('data/promo_upload');

            $this->model_data_promo_upload->delete_old_promo();

            for ($row = $firstRow; $row <= $lastRow; $row++) {

                $data = [];
                if (isset($barcode_col)) {
                    if (!empty($barcode_col)) {

                        $data['barcode'] = strip_tags($worksheet->getCell($barcode_col . $row)->getValue());
                        $data['special_price'] = strip_tags($worksheet->getCell($special_price_col . $row)->getValue());
                        $data['date_start'] = strip_tags($worksheet->getCell($date_start_col . $row)->getValue());
                        $data['date_end'] = strip_tags($worksheet->getCell($date_end_col . $row)->getValue());

                        $result = $this->model_data_promo_upload->update_product_info($data);

                        if ($result) {
                            $updated++;
                        }
                    }
                }
            }

            $res['success'] = 'Обновихте ' . $updated . ' продукта.';//add num updated

            $this->upload_form($res);
        } else {
            $this->upload_form($_POST['data']);//check errors are displayed
        }

    }

    public function delete_old_promo()
    {
        $this->load->model('data/promo_upload');
        $this->model_data_promo_upload->delete_old_promo();

        $res['success'] = 'Успешно изтрихте : <br/>';
        $res['success'] .= '1. Всички промоции на продукти;  <br/>';
        $res['success'] .= '2. Връзката на продукти с категория Промоции;  <br/>';
        $res['success'] .= '3. Всички филтри в категория промоции.';

        $this->upload_form($res);
    }

    protected function validateForm()
    {

        if (!$this->user->hasPermission('modify', 'data/promo_upload')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        //validate barcode exists
        if (empty($_POST['data']['barcode'])) {
            $this->error['barcode'] = 'Въведете колона за баркод!';
        }
        if (empty($_POST['data']['special_price'])) {
            $this->error['special_price'] = 'Въведете колона за промо цена!';
        }
        if (empty($_POST['data']['date_start'])) {
            $this->error['date_start'] = 'Въведете колона за начало на промоцията!';
        }
        if (empty($_POST['data']['date_end'])) {
            $this->error['date_end'] = 'Въведете колона за край на промоцията!';
        }

        //validate file not empty
        if ($_FILES['data_file']['size'] == 0) {
            $this->error['data_file'] = 'Изберете валиден файл!';
        }

        return !$this->error;
    }
}