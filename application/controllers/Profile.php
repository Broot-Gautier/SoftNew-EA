<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2017, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

/**
 * Backend Controller
 *
 * @package Controllers
 */
class Profile extends CI_Controller {
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        // Set user's selected language.
        if ($this->session->userdata('language'))
        {
            $this->config->set_item('language', $this->session->userdata('language'));
            $this->lang->load('translations', $this->session->userdata('language'));
        }
        else
        {
            $this->lang->load('translations', $this->config->item('language')); // default
        }
    }

    public function index($appointment_hash = ''){
        $this->load->model('appointments_model');
        $this->load->model('providers_model');
        $this->load->model('services_model');
        $this->load->model('customers_model');
        $this->load->model('settings_model');
        $this->load->model('roles_model');
        $this->load->model('user_model');
       // $this->load->model('secretaries_model');

        $view['base_url'] = $this->config->item('base_url');
        $view['user_display_name'] = $this->user_model->get_user_display_name($this->session->userdata('user_id'));
        $view['active_menu'] = PRIV_USERS;
        $view['book_advance_timeout'] = $this->settings_model->get_setting('book_advance_timeout');
        $view['date_format'] = $this->settings_model->get_setting('date_format');
        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $view['available_providers'] = $this->providers_model->get_available_providers();
        $view['available_services'] = $this->services_model->get_available_services();
        $view['customers'] = $this->customers_model->get_batch();
        $user = $this->user_model->get_settings($this->session->userdata('user_id'));
        $view['calendar_view'] = $user['settings']['calendar_view'];

        //var_dump($view);
        //exit();
        //$this->set_user_data($view);

        $this->load->view('backend/header', $view);
        $this->load->view('general/profile', $view);
        $this->load->view('backend/footer', $view);
    }

    public function do_upload(){
        $config['upload_path']="./uploads";
        $config['allowed_types']='gif|jpg|png';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
        'menu_id' => $this->input->post('selectmenuid'),
        'submenu_id' => $this->input->post('selectsubmenu'),
        'imagetitle' => $this->input->post('imagetitle'),
        'imgpath' => $data['upload_data']['file_name']
        );  
        $result= $this->Admin_model->save_imagepath($data1);
        if ($result == TRUE) {
            echo "true";
        }
        }

     }
}
