<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Visualizar
 *
 * Controlador responsável pelas páginas iniciais do site.
 */
class Visualizar extends CI_Controller
{

  var $data = array();
  var $page = array();

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set("America/Bahia");
  }

  /**
   * Página inicial da Empresa.
   *
   * @return void
   */
  public function index()
  {
    $this->page['titulo'] = "Empresa";
    $this->page['css'] = $this->load->view("empresa/css", $this->data, true);
    $this->page['js'] = $this->load->view("empresa/js", $this->data, true);
    $this->page['content'] = $this->load->view("empresa/index", $this->data, true);
    $this->load->view('default/template', array('page' => $this->page));
  }

  /**
   * Página inicial da Empresa.
   *
   * @return void
   */
  public function perfil()
  {
    $this->page['titulo'] = "Perfil";
    $this->page['css'] = $this->load->view("perfil/css", $this->data, true);
    $this->page['js'] = $this->load->view("perfil/js", $this->data, true);
    $this->page['content'] = $this->load->view("perfil/index", $this->data, true);
    $this->load->view('default/template', array('page' => $this->page));
  }

  /**
   * Obtém o valor de um campo de entrada.
   *
   * @param string $name O nome do campo de entrada.
   *
   * @return mixed Retorna o valor do campo de entrada ou uma string vazia se não houver valor definido.
   */
  private function get_input($name)
  {
    $input = $this->input->post($name);
    $input = isset($input) ? $input : '';
    return addslashes($input);
  }
}
