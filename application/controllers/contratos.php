<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contratos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _contrato_output($output = null)
	{
		$this->load->view('contrato.php',$output);
	}

	
	public function index()
	{
		$this->_contrato_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	
	public function lista()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('contratos');
			$crud->display_as('clientes_id','Cliente')
				 ->display_as('id','C&oacute;digo');
            $crud->columns('id','data_inicio','data_termino','manutencao_preventiva', 'data_mensalidades','valor_anual','valor_mensal','qtd_equipamentos','clientes_id');    
    		$crud->set_subject('Contratos');
     		$crud->set_relation('clientes_id','clientes','nome');
			
			$output = $crud->render();
			$this->_contrato_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	
	
	
	

}