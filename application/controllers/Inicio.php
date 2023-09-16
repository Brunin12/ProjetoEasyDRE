<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Controlador responsável pelas páginas iniciais do site.
 */
class Inicio extends CI_Controller
{

  var $data = array();
  var $page = array();

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set("America/Bahia");
  }

  /**
   * Página inicial do site.
   *
   * @return void
   */
  public function index()
  {
    $this->page['titulo'] = "Início";
    $this->page['css'] = $this->load->view("home/css", $this->data, true);
    $this->page['js'] = $this->load->view("home/js", $this->data, true);
    $this->page['content'] = $this->load->view("home/index", $this->data, true);
    $this->load->view('default/template', array('page' => $this->page));
  }

  /**
   * Página "Sobre".
   *
   * @return void
   */
  public function sobre()
  {
    $this->page['titulo'] = "Sobre";
    $this->page['css'] = $this->load->view("sobre/css", $this->data, true);
    $this->page['js'] = $this->load->view("sobre/js", $this->data, true);
    $this->page['content'] = $this->load->view("sobre/index", $this->data, true);
    $this->load->view('default/template', array('page' => $this->page));
  }

  /**
   * Página do dashboard.
   *
   * @return void
   */
  public function dashboard()
  {
    $this->page['titulo'] = "Dashboard";
    $this->page['css'] = $this->load->view("dashboard/css", $this->data, true);
    $this->page['js'] = $this->load->view("dashboard/js", $this->data, true);
    $this->page['content'] = $this->load->view("dashboard/index", $this->data, true);
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
