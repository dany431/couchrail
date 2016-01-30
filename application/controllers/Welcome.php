<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class Welcome extends REST_Controller
{
    public function index()
    {
        $this->response(array("name" => "haseeb"));
    }

    public function test_get()
    {
        $this->response(array("name" => "haseeb"));
    }
}
