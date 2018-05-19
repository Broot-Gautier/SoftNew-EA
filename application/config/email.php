<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Add custom values by settings them to the $config array.
// Example: $config['smtp_host'] = 'smtp.gmail.com'; 
// @link https://codeigniter.com/user_guide/libraries/email.html

$config['protocol'] = 'smtp'; // or 'smtp'
//$config['mailtype'] = 'html'; // or 'text'
//$config['smtp_port'] = 587;
$config['smtp_host'] = 'smtp.sendgrid.net';
$config['smtp_user'] = 'bgautier'; 
$config['smtp_pass'] = 'Benjamin0210';
// $config['smtp_crypto'] = 'ssl'; // or 'tls'
