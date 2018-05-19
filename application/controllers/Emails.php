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

use \EA\Engine\Types\Text;
use \EA\Engine\Types\Email;
use \EA\Engine\Types\Url;

/**
 * Emails Controller
 *
 * @package Controllers
 */
class Emails extends CI_Controller {
	public function index(){

		$this->load->library('email');

		$this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'bgautier',
		  'smtp_pass' => 'Benjamin0210',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));

		$this->load->helper("url");
  // you can change the location of your file wherever you want
  		$emails = file_get_contents(base_url()."uploads/listMails.txt");
  		
  		//var_dump(explode(',',$emails));
  		$emails2 = explode(',',$emails);
		foreach ($emails2 as $email ) {
			$token = $this->createTokenAccess($email);
			$this->email->from('softnew@gmail.com', 'Benjamin Administrador');
			$this->email->to($email);
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			$this->email->subject('Invitaciòn crear usuario');
			$this->email->message('Your Token: '.$token);
			$this->email->send();
			
		}

		echo $this->email->print_debugger();	
	}

	public function createTokenAccess($email)
	{
		$password = md5(uniqid(rand(), true));
		$toSave['mail'] = $email;
		$toSave['token'] = $password;
		$toSave['registrado'] = 0;
		$this->registerInvitation($toSave);
		return $password;
	}

	public function registerInvitation($datos)
	{
		$this->load->helper('general');
		if ( ! $this->db->insert('ea_invited', $datos))
        {
            throw new Exception('Could not insert service record.');
        }
        return (int)$this->db->insert_id();
    }
}