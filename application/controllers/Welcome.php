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
class Welcome extends CI_Controller {
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

    public function index($appointment_hash = '')
    {

        $this->load->model('settings_model');

        $view['base_url'] = $this->config->item('base_url');
        $view['dest_url'] = $this->session->userdata('dest_url');

        if ( ! $view['dest_url'])
        {
            $view['dest_url'] = site_url('backend');
        }

        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $this->load->view('user/login', $view);
    }
    public function signup()
    {
        
        $this->load->model('settings_model');

        $view['base_url'] = $this->config->item('base_url');
        $view['dest_url'] = $this->session->userdata('dest_url');

        if ( ! $view['dest_url'])
        {
            $view['dest_url'] = site_url('backend');
        }

        $view['company_name'] = $this->settings_model->get_setting('company_name');
        $this->load->view('user/signup', $view);
    }
}
