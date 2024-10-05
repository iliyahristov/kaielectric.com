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

        $data['barcode'] = '';
        $data['from_row'] = '';
        $data['to_row'] = '';
        $data['picture'] = '';
        $data['picture_to'] = '';

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
            if (!empty($post_data['picture'])) {
                $data['picture'] = $post_data['picture'];
            }
            if (!empty($post_data['picture_to'])) {
                $data['picture_to'] = $post_data['picture_to'];
            }
        }

        $data['success'] = '';
        if (isset($post_data['success'])) {
            $data['success'] = $post_data['success'];

        }
        $data['action'] = $this->url->link('data/picture_upload/add', 'user_token=' . $this->session->data['user_token'], true);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('data/data_upload_pictures_form', $data));

    }

    public function add()
    {

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {

            $barcode_col = $_POST['data']['barcode'];
            $picture_col = $_POST['data']['picture'];

            if (!empty($_POST['data']['picture_to'])) {
                $picture_to_col = $_POST['data']['picture_to'];
            } else {
                $picture_to_col = $picture_col;
            }

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

            $updated = 0;
            $products = 0;
            $this->load->model('data/picture_upload');
            // $cellAdded='';
            for ($row = $firstRow; $row <= $lastRow; $row++) {
                $data = [];
                if (isset($barcode_col)) {
                    if (!empty($barcode_col)) {

                        $data['barcode'] = strip_tags($worksheet->getCell($barcode_col . $row)->getCalculatedValue());

                        // Delete pictures for that item
                        $this->model_data_picture_upload->delete_picture($data);

                        //at least one is expected
                        if (!empty($picture_col)) {
                            $data['picture'] = strip_tags($worksheet->getCell($picture_col . $row)->getCalculatedValue());
                            // $cellAdded .= '<br/>main picture column : ' . $picture_col . ' row : ' . $row;
                        }

                        $result = $this->model_data_picture_upload->update_product_picture($data);

                        if ($result) {
                            $updated++;
                            $products++;
                        }
                        
                        $position = 1;
                        if (!empty($picture_col) ){ //&& $picture_col != $picture_to_col
                            $tmp = $picture_col;
                            $tmp++;
                            for ($column = $tmp; $column != $picture_to_col; $column++) {
                                
                                $data['picture'] = strip_tags($worksheet->getCell($column . $row)->getCalculatedValue());
                                
                                //  $cellAdded .= '<br/> column : ' . $column . ' row : ' . $row;
                                
                                if (!empty($data['picture'])){
                                    $result = $this->model_data_picture_upload->add_picture($data, $position);
                                    $position++;
                                    if ($result) {
                                        $updated++;
                                    }
                                } else {
                                    break;
                                }
                            }
                        }
                    }
                }
            }

            $res['success'] = 'Обновихте/добавихте ' . $updated . ' снимки на '.$products.' продукта.';
            // $res['success'] .= '<br/> ' . $cellAdded;
            $this->upload_form($res);
        } else {
            $this->upload_form($_POST['data']);
        }
    }

    protected function validateForm()
    {

        if (!$this->user->hasPermission('modify', 'data/picture_upload')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        //validate barcode exists
        if (empty($_POST['data']['barcode'])) {
            $this->error['barcode'] = 'Въведете колона за баркод!';
        }

        //validate picture exists
        if (empty($_POST['data']['picture'])) {
            $this->error['picture'] = 'Въведете колона за снимка!';
        }

        //validate file not empty
        if ($_FILES['data_file']['size'] == 0) {
            $this->error['data_file'] = 'Изберете валиден файл!';
        }

        return !$this->error;
    }


}