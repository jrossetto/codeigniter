<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _funcionario_output($output = null)
	{
		$this->load->view('funcionario.php',$output);
	}

	public function index()
	{
		$this->_funcionario_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	function encrypt_password($post_array, $primary_key = null)
    {
	  
	    $this->load->helper('security');
	    $post_array['senha'] = do_hash($post_array['senha'], 'md5');
	    return $post_array;
	   
    }
    
	public function lista()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('funcionarios');
			//$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			//$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			//$crud->unset_columns('special_features','description','actors');
			$crud->set_field_upload('foto','assets/uploads/files/funcionarios');
			$crud->set_rules('senha','Senha','md5');
			$crud->change_field_type('senha','password');
			//$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');
			
			
			$crud->callback_before_insert(array($this,'encrypt_password'));
			$output = $crud->render();
			$this->_funcionario_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	


}