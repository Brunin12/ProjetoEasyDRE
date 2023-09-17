<?php

class Auth_model extends CI_Model
{
  /**
   * Verifica se o usuário está autenticado na sessão.
   *
   * @return int Retorna 0 se o usuário estiver autenticado, caso contrário, redireciona para a página de acessos.
   */
  public function se_autenticado()
  {

    // Obtém os dados do usuário da
    $user = null;
    $logado = $this->usuario->is_logado();
    if ($logado) {
      $user = $this->session_m->userdata('user');
    }

    // Se o usuário não estiver autenticado, redireciona para a página de acessos
    if (!isset($user) && !$logado) {
      $this->session_m->set_flashdata('msg', 'Você saiu da sua conta!');
      redirect(base_url('conta/entrar'));
    } else {
      // Obtém os dados do usuário do banco de dados
      $user_db = $this->db->get_where('user', ['email' => $user['email']])->row();

      // Verifica se o usuário está ativo
      if ($user_db->flag != 'ATIVO') {
        // Remove os dados da sessão e a destrói
        $this->session->unset_userdata(sha1('user'));
        $this->session->sess_destroy();
        unset($_SESSION[sha1('user')]);
      }
    }

    return 0;
  }

  /**
   * Verifica se o usuário tem acesso ao perfil com o ID especificado.
   *
   * @param int $id O ID do perfil a ser verificado.
   * @return bool Retorna true se o usuário tiver acesso, caso contrário, retorna false.
   */
  public function acesso_id($id)
  {
    // Obtém o ID do usuário autenticado na sessão
    $uid = $this->session_m->get_id();

    // Compara o ID do usuário autenticado com o ID especificado
    if ($uid == $id) {
      return true;
    } else {
      return false;
    }
  }

  public function existe_empresa()
  {
    $id_empresa = $this->session_m->userdata('empresa');
    if (isset($id_empresa)) {
      $empresa = $this->empresa->get_empresa_id($id_empresa['id_empresa']);
      if (isset($empresa)) {
        return true;
      }
    }
    return false;

  }

  public function existe_dre()
  {
    $id_empresa = $this->session_m->userdata('empresa');
    if (isset($id_empresa)) {
      $empresa = $this->empresa->get_empresa_id($id_empresa['id_empresa']);
      if (isset($empresa)) {
        $saldo = $empresa->saldo;
        $lucro = $empresa->lucro_liquido;
        $despesa = $empresa->despesa;
        $receita = $empresa->receita;
        if (isset($id_empresa, $empresa, $saldo, $lucro, $despesa, $receita))
          // Todas as variáveis estão definidas
          return true;
      }
    }
    return false;
  }

}
