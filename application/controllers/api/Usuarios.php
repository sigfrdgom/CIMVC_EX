<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Usuarios extends REST_Controller {

    public function __construct() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->database();
     }

    // METHOD GET
    public function index_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->db->get_where("usuarios", ['id' => $id])->row_array();
            if (count($data) == 0) {
                $this->response(["El usuario con id $id no existe"], REST_Controller::HTTP_OK);
                return;
            }
        }else{
            $data = $this->db->get("usuarios")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // METHOD POST 
    public function index_post()
     {
         $input = $this->input->post();
         $this->db->insert('usuarios',$input);
      
         $this->response(['El usuario ha sido creado!'], REST_Controller::HTTP_OK);
     } 

    // METHOD PUT
     public function index_put($id)
     {
         $input = $this->put();
         $this->db->update('usuarios', $input, array('id'=>$id));
      
         $this->response(['El usuario ha actualizado!'], REST_Controller::HTTP_OK);
     }

     // METHOD DELETE
     public function index_delete($id)
     {
         $this->db->delete('usuarios', array('id'=>$id));
        
         $this->response(["Usuario  con id $id eliminado!"], REST_Controller::HTTP_OK);
     }

}
?>