<?php
/**
 * Created by PhpStorm.
 * User: Steve
 * Date: 2018-12-21
 * Time: 10:16 AM
 */

class themodel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert() {
        $data = array(
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('telp'),
            'instagram' => $this->input->post('insta'),
            'tanggal_lahir' => $this->input->post('tlahir'),
            'pekerjaan' => $this->input->post('job'),
            'organization' => $this->input->post('organ')
        );

        return $this->db->insert('customer', $data);
    }

    public function get() {
        return $this->db->get('customer')->result_array();
    }

    public function get_where($id) {
        $a = $this->db->get_where('customer', array('Id', $id))->row_array();
        var_dump($a);
        return $a;
    }

    public function delete($id) {
        return $this->db->delete('customer', array('Id' => $id));
    }
}