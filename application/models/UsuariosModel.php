<?php
class UsuariosModel extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('usuarios')->result();
    }

    // Post para agregar
    public function ingresar($datos)
    {
        $sql="INSERT INTO usuarios (nombre, apellido) VALUES (?,?)";
        $this->db->query($sql,$datos);
    }
}

?>