<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orcamentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _orcamento_output($output = null)
	{
		$this->load->view('orcamento.php',$output);
	}

	
	public function index()
	{
		$this->_orcamento_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	
	public function lista()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('orcamentos');
			$crud->display_as('cliente_id','Cliente')
				 ->display_as('id','C&oacute;digo');
            $crud->columns('id','data_inicio','data_termino','manutencao_preventiva', 'data_mensalidades','valor_anual','valor_mensal','qtd_equipamentos','clientes_id');    
    		$crud->set_subject('Orcamentos');
    		$crud->set_relation('equipamentos_id','equipamentos','{id} - {equipamento}');
     		$crud->set_relation('equipamentos_cliente_id','clientes','{id} - {nome}');
     		
			
			$output = $crud->render();
			$this->_orcamento_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	
	
	
	

}