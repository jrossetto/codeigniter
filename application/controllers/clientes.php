<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 /**
	 *    JrERP
	 * 	Author: Juliano Rossetto
	 *	Versão: 1.0 
	 * 	Data: 08/2013 
	 * 	
	 *	E-mail: contato@jrossetto.com.br - www.jrossetto.com.br
	 * 
	 * 	Todos os direitos reservados - Proibida reprodu&ccedil;&atilde;o parcial e total e uso indevido.
	 */

class Clientes extends CI_Controller {

	
	
	public function index(){
		
		$data = array();
		if($query = $this->Padrao_Model->getAllRecords('clientes'))
		{
			$data['records'] = $query;
		}
		$this->load->view('clientes', $data);
		
	}
	
	function cadastrar(){
		$data = array(
			'nome'=>$this->input->post('nome'),
			'tipo'=>$this->input->post('tipo')			
		);
		
		$this->Padrao_Model->addRecord('clientes', $data);
		$this->index();
	}
	
}