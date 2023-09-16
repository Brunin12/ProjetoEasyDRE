<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Criar
 *
 * Este controlador gerencia as operações relacionadas às criações de usuários e empresas como DRE's e Empresas.
 */
class Criar extends CI_Controller
{

  var $data = array();
  var $page = array();

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set("America/Bahia");
  }
  public function empresa()
  {
    $this->form_validation->set_rules('nome', 'E-Mail', 'trim|required');
    $this->form_validation->set_rules('cpf-cnpj', 'cpf-CNPJ', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      if ($_REQUEST == "POST") {
        $this->session_m->set_flashdata('error', 'Erro: ' . validation_errors());
        redirect(base_url('criar/empresa'));
      }
      $this->page['titulo'] = "Cadastro Empresa";
      $this->page['css'] = $this->load->view("cadastro_empresa/css", $this->data, true);
      $this->page['js'] = $this->load->view("cadastro_empresa/js", $this->data, true);
      $this->page['content'] = $this->load->view("cadastro_empresa/index", $this->data, true);
      $this->load->view('default/template', array('page' => $this->page));
    } else {
      $nome = $this->get_input('nome');
      $cpfcnpj = $this->get_input('cpf-cnpj');
      $data = array(
        'nome' => $nome,
        'cpf-cnpj' => $cpfcnpj,
        'flag' => "ATIVO"
      );
      $id = $this->empresa->inserir($data);
      $this->usuario->atualiza(['id_empresa' => $id]);
      $empresa = array(
        'nome' => $data['nome'],
        'cpf-cnpj' => $data['cpf-cnpj'],
        'id_empresa' => $id
      );
      $this->session_m->set_userdata('empresa', $empresa);
      $this->session_m->set_flashdata('msg', 'Empresa Cadastrada!');
      redirect(base_url());
    }
  }

  public function dre()
  {
    $this->form_validation->set_rules('saldo', 'Saldo', 'trim|required');
    $this->form_validation->set_rules('lucro_liquido', 'Lucro Liquido', 'trim|required');
    $this->form_validation->set_rules('despesa', 'Despesa', 'trim|required');
    $this->form_validation->set_rules('receita', 'Receita', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->session_m->set_flashdata('error', validation_errors());
      redirect(base_url('conta/empresa'));
    } else {
      $dados = array(
        'saldo' => $this->get_input('saldo'),
        'lucro_liquido' => $this->get_input('lucro_liquido'),
        'despesa' => $this->get_input('despesa'),
        'receita' => $this->get_input('receita')
      );
      $id_empresa = $this->session_m->userdata('empresa')['id_empresa'];
      $this->empresa->atualiza($dados, array('id_empresa' => $id_empresa));
      $empresa = $this->empresa->get_empresa($dados);
      $dre = $this->empresa->gerar_dre($empresa);
      $dre_existe = $this->auth->existe_dre();
      if (!$dre_existe) {
        redirect(base_url('visualizar/dre'));
      }
      $this->data['dre'] = $dre;
      $this->page['titulo'] = "Ver DRE";
      $this->page['content'] = $this->load->view("dre/ver", $this->data, true);
      $this->load->view('default/template', array('page' => $this->page));
    }
  }

  /**
   * Página do Demonstrativo de Resultados (DRE).
   *
   * @return void
   */
  public function dados_dre()
  {
    $id_empresa = $this->session_m->userdata('empresa')['id_empresa'];
    $empresa = $this->empresa->get_empresa_id($id_empresa);
    $this->page['dre'] = $this->empresa->gerar_dre($empresa);
    $this->page['titulo'] = "Criando DRE";
    $this->page['content'] = $this->load->view("dre/index", $this->data, true);
    $this->load->view('default/template', array('page' => $this->page));
  }

  /**
   * Página do Demonstrativo de Resultados (DRE) em pdf.
   *
   * @return void
   */

  public function dre_pdf()
  {
    $dre_existe = $this->auth->existe_dre();
    if (!$dre_existe) {
      redirect(base_url('visualizar/dre'));
    }
    $id_empresa = $this->session_m->userdata('empresa')['id_empresa'];
    $empresa = $this->empresa->get_empresa_id($id_empresa);
    $this->empresa->gerar_dre_pdf($empresa);
    redirect(base_url());
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
