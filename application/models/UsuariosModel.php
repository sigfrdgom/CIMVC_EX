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

    // Metodo para eliminar los registros
    public function delete($id)
    {
        $this->db->query("DELETE FROM usuarios WHERE id= $id ");
    }

    // Metodo para obtener un unico registro
    public function getById($id)
    {
        return $this->db->query("SELECT * FROM usuarios WHERE id= $id ")->row();
    }

    // Metodo para actualizar la base de datos
    public function update($data)
    {
        $sql="UPDATE usuarios SET nombre=?, apellido=? WHERE id=?";
        $this->db->query($sql,$data);
    }
}

?>