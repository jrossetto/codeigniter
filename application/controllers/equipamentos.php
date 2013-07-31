<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipamentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _equipamento_output($output = null)
	{
		$this->load->view('equipamento.php',$output);
	}

	
	public function index()
	{
		$this->_equipamento_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	
	public function lista()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('equipamentos');
			$crud->display_as('cliente_id','Cliente')
				 ->display_as('id','C&oacute;digo');
            $crud->set_subject('Equipamentos');
     		$crud->set_relation('cliente_id','clientes','{id} - {nome}');
			
			$output = $crud->render();
			$this->_equipamento_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	
	
	
	

}