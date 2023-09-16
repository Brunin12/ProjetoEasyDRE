<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Contas
 *
 * Este controlador gerencia as operações relacionadas às contas de usuários, como cadastro e login.
 */
class Conta extends CI_Controller
{

  var $data = array();
  var $page = array();

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set("America/Bahia");
  }

  /**
   * Método para criar uma nova conta de usuário.
   *
   * Este método verifica os dados submetidos, valida-os e, se tudo estiver correto, cria a nova conta.
   *
   * @return void
   */
  public function criar()
  {

    $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
    $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
    $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      if ($_REQUEST == "POST") {
        $this->session_m->set_flashdata('error', 'Erro: ' . validation_errors());
        redirect(base_url('conta/criar'));
      }
      $this->page['titulo'] = "Cadastro";
      $this->page['css'] = $this->load->view("cadastro/css", $this->data, true);
      $this->page['js'] = $this->load->view("cadastro/js", $this->data, true);
      $this->page['content'] = $this->load->view("cadastro/index", $this->data, true);
      $this->load->view('default/template', array('page' => $this->page));
    } else {
      $email = $this->get_input('email');
      $senha = sha1($this->get_input('senha'));
      $nome = $this->get_input('nome');
      $data = array(
        'email' => $email,
        'senha' => $senha,
        'nome' => $nome,
        'flag' => "ATIVO"
      );

      $id = $this->usuario->inserir($data);
      $user = array(
        'nome' => $data['nome'],
        'id' => $id
      );
      $this->session_m->set_userdata('user', $user);
      redirect(base_url());
    }
  }


  /**
   * Método para realizar o login de um usuário.
   *
   * Este método verifica os dados submetidos, valida-os e, se tudo estiver correto, efetua o login do usuário.
   *
   * @return void
   */
  public function entrar()
  {

    $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
    $this->form_validation->set_rules('senha', 'Senha', 'trim|required');


    if ($this->form_validation->run() == TRUE) {
      $email = $this->get_input('email');
      $senha = sha1($this->get_input('senha'));

      $form = ['email' => $email, 'senha' => $senha];
      $data = $this->usuario->login($form);
      $usuario = $this->usuario->get_usuario($form);
      $user = array(
        'nome' => $usuario->nome,
        'id' => $usuario->id
      );
      $this->session_m->set_userdata('user', $user);
      $empresa_id = $usuario->id_empresa;
      $empresa = array(
        'nome' => $data['nome'],
        'cpf-cnpj' => $data['cpf-cnpj'],
        'id_empresa' => $empresa_id
      );
      $this->session_m->set_userdata('empresa', $empresa);
      $this->session_m->set_userdata('user', $user);
      redirect(base_url());
    } else {

      $this->page['titulo'] = "Entrar";
      $this->page['css'] = $this->load->view("login/css", $this->data, true);
      $this->page['js'] = $this->load->view("login/js", $this->data, true);
      $this->page['content'] = $this->load->view("login/index", $this->data, true);
      $this->load->view('default/template', array('page' => $this->page));
    }
  }

  public function sair()
  {

    $this->usuario->sair();
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
