<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _cliente_output($output = null)
	{
		$this->load->view('cliente.php',$output);
	}

	public function index()
	{
		$this->_cliente_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	
	public function lista()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('clientes');
			//$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			//$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			//$crud->unset_columns('special_features','description','actors');

			//$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_cliente_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	


}