<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getUserById($id)
    {
        return $this->db->where('userId', $id)->get('users')->result();

    }

    public function insert($user){
        $this->db->insert('users', $user);
        return $this->db->insert_id();
    }

    public function verify($user, $pass){
        $res = $this->db->get_where('users', array(
            'username' => $user,
            'password' => $pass
            )
        );

        if($res->num_rows() > 0){
            return $res->result()[0]->userId;
        }else{
            return -1;
        }

    }
}