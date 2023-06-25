<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mimodelo extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    function getCategorias($id=false)
    {
        if ($id != false) {
            $this->db->where('id', $id);
        }
        $categorias = $this->db->get('categorias');
        if ($categorias->num_rows() > 0) {
            return $categorias;
        }
        return false;
    }
    function addCategorias($valores)
    {
        $this->db->insert('categorias', $valores);
    }
    function borrarCategoria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('categorias');
    }
    function actualizarCategoria($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('categorias', $data);
    }
}
