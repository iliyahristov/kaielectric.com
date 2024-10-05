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

    //TO REVISE - FIELDS
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

        $data['barcode'] = '';
        $data['description'] = '';
        $data['from_row'] = '';
        $data['to_row'] = '';
        $data['from_col'] = '';
        $data['to_col'] = '';


        if (!empty($post_data)) {
            //set populate form fields
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
            if (!empty($post_data['to_col'])) {
                $data['to_col'] = $post_data['to_col'];
            }
            if (!empty($post_data['from_col'])) {
                $data['from_col'] = $post_data['from_col'];
            }

        }

        $data['success'] = '';

        if (isset($post_data['success'])) {
            $data['success'] = $post_data['success'];

        }

        $data['action'] = $this->url->link('data/filters_upload/add', 'user_token=' . $this->session->data['user_token'], true);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('data/filters_upload_form', $data));

    }

    public function add()
    {

        $filter_cols = [];
        $descr_cols = [];
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {


            $barcode_col = $_POST['data']['barcode'];
            $description_col = $_POST['data']['description'];


            $tmpfname = $_FILES["data_file"]["tmp_name"];

            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $excelObj = $excelReader->load($tmpfname);
            $worksheet = $excelObj->getSheet(0);

            $rowFilters = $worksheet->getRowIterator(1)->current();

            $cellIterator = $rowFilters->getCellIterator();

            $cellIterator->setIterateOnlyExistingCells(false);

            foreach ($cellIterator as $key => $cell) {
                //cols with filter names/groups/
                if ($cell->getValue() === 'ФИЛТЪР') {
                    array_push($filter_cols, $key);
                }
                //cols with descr items
                if ($cell->getValue() === 'ХАРАКТЕРИСТИКИ') {
                    array_push($descr_cols, $key);
                }
            }

            $filter_group = [];
            $descr_items = [];

            //get filter groups for this sheet
            foreach ($filter_cols as $fc) {

                $group = $worksheet->getCell($fc . '2')->getValue();
                $filter_group[$fc] = $group;
            }

            //get descr items for this sheet
            foreach ($descr_cols as $dc) {
                $item = $worksheet->getCell($dc . '2')->getValue();
                $descr_items[$dc] = $item;
            }

            $this->load->model('data/filters_upload');

            $this->model_data_filters_upload->save_filter_groups($filter_group);

            $firstRow = 3;

            if (!empty($_POST['data']['from_row'])) {
                if ($_POST['data']['from_row'] > 2) {
                    $firstRow = $_POST['data']['from_row'];
                }
            }

            if (!empty($_POST['data']['to_row'])) {
                $lastRow = $_POST['data']['to_row'];
            } else {
                $lastRow = $worksheet->getHighestRow();
            }


            $updated = 0;


            for ($row = $firstRow; $row <= $lastRow; $row++) {

                $data = [];

                if (isset($barcode_col)) {

                    if (!empty($description_col)) {
                        $data['description'] = $worksheet->getCell($description_col . $row)->getValue();
                    }
                    
                    if (!empty($barcode_col)) {
                        $data['barcode'] = strip_tags($worksheet->getCell($barcode_col . $row)->getValue());
                    }

                    //construct product filters
                    $data['product_filters'] = [];

                    foreach ($filter_cols as $fc) {
                        //get filter groups
                        if ($worksheet->getCell($fc . $row)->getValue()) {
                            $data['product_filters'][$fc] = $worksheet->getCell($fc . $row)->getValue();
                        }
                    }

                    $data['product_descr'] = [];
                    //construct product description arr

                    foreach ($descr_cols as $dc) {
                        //get filter groups
                        if ($worksheet->getCell($dc . $row)->getValue()) {
                            //description item - set as index
                            $ind = $descr_items[$dc];
                            $data['product_descr'][$ind] = $worksheet->getCell($dc . $row)->getValue();
                        }
                    }
                    //save product filters
                    $result = $this->model_data_filters_upload->update_product_info($data, $filter_group);
                    //save product description
                    $result_descr = $this->model_data_filters_upload->update_product_descr($data);

                    if ($result_descr) {
                        $updated++;
                    }


                }


            }
            $res['success'] = 'Обновихте ' . $updated . ' продукта.';//add num updated

            $this->upload_form($res);
        } else {
            $this->upload_form($_POST['data']);//check errors are displayed
        }


    }

    protected function validateForm()
    {

        if (!$this->user->hasPermission('modify', 'data/filters_upload')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        //validate barcode exists
        if (empty($_POST['data']['barcode'])) {
            $this->error['barcode'] = 'Въведете колона за баркод!';
        }
        //validate description exists
        if (empty($_POST['data']['description'])) {
            $this->error['description'] = 'Въведете колона за описание!';
        }

        //validate file not empty
        if ($_FILES['data_file']['size'] == 0) {
            $this->error['data_file'] = 'Изберете валиден файл!';
        }

        return !$this->error;
    }


}