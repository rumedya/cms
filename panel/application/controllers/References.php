<?php

class References extends CI_CONTROLLER{
    public $viewFolder ="";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "references_v";

        $this->load->model("reference_model");

    }
    public function index(){
        $viewData = new stdClass();


        /**Tablodan Verilerin Getirilmesi*/
        $items = $this->reference_model->get_all(
            array(), "rank ASC"
        );

        /** View'e gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder       = $this->viewFolder;
        $viewData->subViewFolder    = "list";
        $viewData->items = $items;




       $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function new_form(){

        $viewData                   = new stdClass();

        /** View'e gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder       = $this->viewFolder;
        $viewData->subViewFolder    = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
    public function save(){

        $this->load->library("form_validation");

        //Kurallar yazılır...

        if($_FILES["img_url"]["name"] == ""){
            $alert = array(
                "title"     =>  "İşlem Başarısız.",
                "text"      =>  "Lütfen bir görsel seçiniz.",
                "type"      =>  "error"
            );
            //İşlemin sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("references/new_form"));
            die();
        }

        $this->form_validation->set_rules("title","Başlık","required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "{field} alanı doldurulmalıdır."
            )
        );

        //form valitadion çalıştırılır
        $validate = $this->form_validation->run();

        if($validate) {

            //upload süreci

            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "png|jpg";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("img_url");

            if ($upload) {

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->reference_model->add(
                    array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                        "img_url" => $uploaded_file,
                        "rank" => "0",
                        "isActive" => 1,
                        "createdAt" => date("Y-m-d H:i:s")
                    )
                );

                //TODO ALERT SİSTEMİ EKLENECEK
                if ($insert) {
                    $alert = array(
                        "title" => "İşlem Başarılı.",
                        "text" => "Kayıt başarılı bir şekilde eklendi.",
                        "type" => "success"
                    );
                } else {
                    $alert = array(
                        "title" => "İşlem Başarısız.",
                        "text" => "Kayıt ekleme sırasında problem oluştu.",
                        "type" => "error"
                    );
                }

            } else {

                $alert = array(
                    "title" => "İşlem Başarılı.",
                    "text" => "Görsel yüklenirken bir problem oluştu.",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("references/new_form"));

                die();

            }

            //İşlemin sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("references"));

        } else {
            $viewData = new stdClass();

            /** View'e gönderilecek değişkenlerin set edilmesi */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }
    public function update_form($id){

        $viewData                   = new stdClass();

        /**Tablodan Verilerin Getirilmesi*/
        $item = $this->reference_model->get(

            array(
                "id"        => $id,
            )

        );




        /** View'e gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder       = $this->viewFolder;
        $viewData->subViewFolder    = "update";
        $viewData->item             = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
    public function update_($id){

        $this->load->library("form_validation");

        //kurallar yazılır...
        $this->form_validation->set_rules("title","Başlık","required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "{field} alanı doldurulmalıdır."
            )
        );

        //form valitadion çalıştırılır

        //TRUE - FALSE
        $validate = $this->form_validation->run();

        //Monitör Askısı
        //monitor-askisi


        if($validate){

            $update = $this->reference_model->update(
                array(
                    "id"            =>  $id
                ),
                array(
                    "title"         =>  $this->input->post("title"),
                    "description"   =>  $this->input->post("description"),
                    "url"           =>  convertToSEO($this->input->post("title")),
                )
            );
            //TODO ALERT SİSTEMİ EKLENECEK
            if($update){
                $alert = array(
                    "title"     =>  "İşlem Başarılı.",
                    "text"      =>  "Güncelleme işlemi başarılıdır.",
                    "type"      =>  "success"
                );
            }else{
                $alert = array(
                    "title"     =>  "İşlem Başarısız.",
                    "text"      =>  "Güncelleme sırasında problem oluştu.",
                    "type"      =>  "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("product"));

        }else{
            $viewData                   = new stdClass();

            /**Tablodan Verilerin Getirilmesi*/
            $item = $this->reference_model->get(
                array(
                    "id"        => $id,
                )
            );

            /** View'e gönderilecek değişkenlerin set edilmesi */
            $viewData->viewFolder       = $this->viewFolder;
            $viewData->subViewFolder    = "update";
            $viewData->form_error       = true;
            $viewData->item             = $item;




            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);        }
        //başarılı ise kayıt işlemi başlar
        //kayıt işlemi başlar
        //başarısız ise
        //hata ekranda gösterilir...
    }
    public function update($id){

        $this->load->library("form_validation");

        //Kurallar yazılır...

        $references_type = $this->input->post("references_type");

        if($references_type == "video"){
            $this->form_validation->set_rules("video_url","Video URL","required|trim");
        }

        $this->form_validation->set_rules("title","Başlık","required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "{field} alanı doldurulmalıdır."
            )
        );

        //form valitadion çalıştırılır

        //TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){

            if($references_type == "image"){

                //upload süreci
                if($_FILES["img_url"]["name"] !=="") {
                    $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                    $config["allowed_types"] = "png|jpg";
                    $config["upload_path"] = "uploads/$this->viewFolder/";
                    $config["file_name"] = $file_name;

                    $this->load->library("upload", $config);

                    $upload = $this->upload->do_upload("img_url");

                    if ($upload) {

                        $uploaded_file = $this->upload->data("file_name");

                        $data = array(
                            "title" => $this->input->post("title"),
                            "description" => $this->input->post("description"),
                            "url" => convertToSEO($this->input->post("title")),
                            "references_type" => $references_type,
                            "img_url" => $uploaded_file,
                            "video_url" => "#",
                        );

                    } else {

                        $alert = array(
                            "title" => "İşlem Başarılı.",
                            "text" => "Görsel yüklenirken bir problem oluştu.",
                            "type" => "error"
                        );
                        $this->session->set_flashdata("alert", $alert);
                        redirect(base_url("references/update/$id"));

                        die();


                    }
                }else{

                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                    );

                }

            }
            else if($references_type == "video"){

                $data = array(
                    "title"         =>  $this->input->post("title"),
                    "description"   =>  $this->input->post("description"),
                    "url"           =>  convertToSEO($this->input->post("title")),
                    "references_type"     =>  $references_type,
                    "img_url"       =>  "#",
                    "video_url"     =>  $this->input->post("video_url"),
                );
            }

            $update = $this->reference_model->update(array("id" => $id), $data);

            //TODO ALERT SİSTEMİ EKLENECEK
            if($update){
                $alert = array(
                    "title"     =>  "İşlem Başarılı.",
                    "text"      =>  "Kayıt başarılı bir şekilde güncellendi.",
                    "type"      =>  "success"
                );
            }else{
                $alert = array(
                    "title"     =>  "İşlem Başarısız.",
                    "text"      =>  "Kayıt güncelleme sırasında problem oluştu.",
                    "type"      =>  "error"
                );
            }
            //İşlemin sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("references"));

        }else{
            $viewData                   = new stdClass();
            /** View'e gönderilecek değişkenlerin set edilmesi */
            $viewData->viewFolder       = $this->viewFolder;
            $viewData->subViewFolder    = "update";
            $viewData->form_error       = true;
            $viewData->references_type        = $references_type;

            /**Tablodan Verilerin Getirilmesi*/
            $viewData->item = $this->reference_model->get(

                array(
                    "id"        => $id,
                )

            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);        }
    }
    public function delete($id){
        $delete = $this->reference_model->delete(
            array(
                "id"    =>  $id
            )
        );
        //TODO Alert Sistemi Eklenecek...
        if($delete){
            $alert = array(
                "title"     =>  "İşlem Başarılı.",
                "text"      =>  "Kayıt başarılı bir şekilde silindi.",
                "type"      =>  "success"
            );
        }else{
            $alert = array(
                "title"     =>  "İşlem Başarısız.",
                "text"      =>  "Kayıt silme sırasında problem oluştu.",
                "type"      =>  "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("references"));
    }
    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->reference_model->update(
                array(
                    "id"    => $id

                ),
                array(
                    "isActive"  =>  $isActive
                )
            );

        }
    }
    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data,$order);
        $items = $order["ord"];
        print_r($items);

        foreach ($items as $rank => $id){

            $this->reference_model->update(

                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"  => $rank
                )

            );


        }


    }




}