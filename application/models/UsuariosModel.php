<?php
class UsuariosModel extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('usuarios')->result();
    }
}

?>