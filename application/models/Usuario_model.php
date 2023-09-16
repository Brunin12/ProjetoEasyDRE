<?php

/**
 * Class Usuario_model
 *
 * Esta classe gerencia operações relacionadas aos usuários.
 */
class Usuario_model extends CI_Model
{

  /**
   * Obtém um usuário com base em um conjunto de dados fornecido.
   *
   * @param array $data O conjunto de dados usado para buscar o usuário.
   *
   * @return mixed Retorna o usuário encontrado ou null se não existir.
   */
  public function get_usuario($data)
  {
    return $this->db->get_where('usuario', $data)->row();
  }

  /**
   * Obtém um usuário com base em seu ID.
   *
   * @param int $id O ID do usuário a ser buscado.
   *
   * @return mixed Retorna o usuário encontrado ou null se não existir.
   */
  public function get_usuario_id($id)
  {
    return $this->db->get_where('usuario', array('id' => $id))->row();
  }

  /**
   * Insere um novo usuário no banco de dados.
   *
   * @param array $data Os dados do usuário a serem inseridos.
   *
   * @return int Retorna o ID do usuário inserido.
   */
  public function inserir($data)
  {
    $this->db->insert('usuario', $data);
    return $this->db->insert_id();
  }

  public function atualiza($data)
  {
    $this->db->update('usuario', $data);
  }

  /**
   * Realiza a operação de login.
   *
   * @param array $form Os dados de formulário do login.
   *
   * @return void
   */
  public function login($form)
  {
    $data = $this->db->get_where('usuario', $form)->row();
    $linhas_afetadas = $this->db->affected_rows();
    if ($linhas_afetadas > 0 && $data->flag == 'ATIVO') {
      $this->session_m->set_flashdata("msg", "Entrou com Sucesso");
    } else {
      $this->session_m->set_flashdata("error", "Nenhum usuário ativo foi encontrado.");
    }
  }

  public function is_logado() {
    $data = $this->session_m->userdata('user');
    if (isset($data)) {
      return true;
    }
    return false;
  }

  /**
   * Realiza a operação de logout.
   *
   * @return void
   */
  public function sair()
  {

    $this->session->unset_userdata(sha1('user'));
    unset($_SESSION[sha1('user')]);
    $this->session->sess_destroy();

    if (isset($_SESSION[sha1('user')])) {
      $this->session_m->set_flashdata('error', 'Um erro aconteceu, usuário não fez o logoff. Tente novamente mais tarde.');
      redirect(base_url());
    }

    $this->auth->se_autenticado();
  }
}
