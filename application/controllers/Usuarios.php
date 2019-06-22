<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('UsuariosModel');
	}

	public function index()
	{
		$dato["titulo"]="Usuarios";
		$this->load->view('Usuarios/index',$dato);
	}

	// load data from database?
	public function recargar()
	{
		$data=['usuarios'=>$this->UsuariosModel->getAll()];
		$this->load->view('usuarios/tabla',$data);
	}

	// Metodo para registrar
	public function ingresar()
	{
		$data=[$_POST['nombre'],$_POST['apellido']];
		$this->usuariosModel->ingresar($data);
	}

	// Metodo para eliminar
	public function delete($id)
	{
		// Llamar el metodo eliminar del modelo
		$this->usuariosModel->delete($id);
	}

	// Metodo para obtner un solo registro
	public function getById($id)
	{
		// Para obtener los datos del registro que deseamos de la base de datos
		$dato=['usuario'=>$this->usuariosModel->getById($id)];
		$this->load->view('usuarios/form',$dato);
	}


	// Metodo para editar
	public function editar()
	{
		$data=[$_POST['nombre'],$_POST['apellido'],$_POST['id']];
		$this->usuariosModel->update($data);
	}

	
	// Un pequeño endpoint de rest
	public function json(){
		echo json_encode($this->UsuariosModel->getAll());
	}

}
