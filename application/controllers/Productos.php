<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mimodelo');
        $this->load->helper('url');
    }
    function listaCategorias()
    {
        $categorias = $this->Mimodelo->getCategorias();
        $data = array(
            'categorias' => $categorias
        );
        $this->load->view('productos/categorias_view', $data);
    }
    function getFormCategorias()
    {

        $valores = array(
            'nombre' => $this->input->post('nombre'),
            'fecha' => date("Y-m-d H:i:s"),
            'activo' => $this->input->post('status')
        );


        $this->Mimodelo->addCategorias($valores);
    }
    function insertCategorias()
    {
        $this->load->view('productos/insertcategoria_view');
    }
    function eliminarCategorias()
    {
        $id = $this->uri->segment(2);
        $this->Mimodelo->borrarCategoria($id);
        redirect(base_url('index.php/Productos/listaCategorias'));
    }
    function actualizarCategoria()
    {
        $id = $this->uri->segment(2);
        $categorias = $this->Mimodelo->getCategorias($id);
        $categoria = ($categorias != false) ? $categorias->row(0) : false;
        $data = array(
            'categoria' => $categoria
        );
        $this->load->view('Productos/updatecategoria_view', $data);
    }
}
