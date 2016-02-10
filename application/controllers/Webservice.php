<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class Webservice extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

    }

    public function index(){
    }

    public function getUser_get($id)
    {
        $this->response($this->user_model->getUserById($id));
    }

    public function registerUser_post(){
        $user = array();
        $user['name'] = $this->post('name');
        $user['username'] = $this->post('username');
        $user['email'] = $this->post('email');
        $user['gender'] = $this->post('gender');
        $user['password'] = $this->post('password');

        if(!$user['name'] || !$user['username'] || !$user['email'] || !$user['gender'] || !$user['password']){
            $ret['Status'] = '0';
            $ret['Msg'] = "Insufficent Arguments";
        }else{
            $user_id = $this->User_model->insert($user);
            $ret['Status'] = '1';
            $ret['user_id'] = $user_id;
            $ret['token'] = $this->generateToken($user_id);
        }
        $this->response($ret);
    }

    public function generateToken($user_id){
        return md5($user_id . time());
    }

    public function login_post(){
        $user = $this->post('username');
        $pass = $this->post('password');

        $user_id = $this->User_model->verify($user, $pass);

        if($user_id != -1){
            $ret['Status'] = '1';
            $ret['user_id'] = $user_id;
            $ret['token'] = $this->generateToken($user_id);
        }else{
            $ret['Status'] = '0';
            $ret['Msg'] = "Incorrect Arguments";
        }

        $this->response($ret);
    }
}
