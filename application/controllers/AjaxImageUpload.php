<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of ajaxupload
 *
 * @author https://roytuts.com
 */
class Ajaximageupload extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('profile', NULL);
    }

    function upload_file() {
        $this->load->helper(array('form', 'url'));
        //upload file
        //$nameuser = $this->input->post('nameUser');
        $iduser = $this->input->post('idUser');
        
        $config['upload_path'] = 'uploads/'.$iduser.'/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = FALSE;
        $config['max_size'] = '1024'; //1 MB
        $config['file_name'] = 'perfil.png';
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);

        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/'.$iduser.'/'. $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }

}