<?php
require APPPATH . 'libraries/REST_Controller.php';

class Categorias extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function index_get($id = 0)
    {
        if (!empty($id)) {
            $data = $this->db->get_where('categorias', ['id' => $id])->row_array();
        } else { //recuperar todas la categorias
            $data = $this->db->get('Categorias')->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('categorias', $input);
        $this->response(['categoria agregada'], REST_Controller::HTTP_OK);
    }
    //Actualizar
    function index_put($id)
    {
        $input = $this->put();
        $this->db->update('categorias', $input, array('id' => $id));
        $this->response(['categoria Actualizada'], REST_Controller::HTTP_OK);
    }
    function index_delete($id)
    {
        $this->db->delete('categorias', array('id' => $id));
        $this->response(['categoria Eliminada'], REST_Controller::HTTP_OK);
    }
}
