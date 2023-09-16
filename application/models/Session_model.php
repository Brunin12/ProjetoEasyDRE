<?php

/**
 * Class Session_model
 *
 * Esta classe gerencia as sessões no CodeIgniter.
 */
class Session_model extends CI_Model
{
  /**
   * Define uma flashdata na sessão.
   *
   * @param string $titulo O título associado à flashdata.
   * @param mixed  $data   Os dados a serem armazenados.
   *
   * @return bool Retorna true se a flashdata foi definida com sucesso.
   */
  public function set_flashdata($titulo, $data)
  {
    $this->session->set_flashdata(sha1($titulo), $data);
    return true;
  }

  /**
   * Retorna uma flashdata da sessão.
   *
   * @param string $titulo O título associado à flashdata.
   *
   * @return mixed Retorna os dados da flashdata ou null se não existir.
   */
  public function flashdata($titulo)
  {
    return $this->session->flashdata(sha1($titulo));
  }

  /**
   * Define um userdata na sessão.
   *
   * @param string $titulo O título associado ao userdata.
   * @param mixed  $data   Os dados a serem armazenados.
   *
   * @return bool Retorna true se o userdata foi definido com sucesso.
   */
  public function set_userdata($titulo, $data)
  {
    $this->session->set_userdata(sha1($titulo), $data);
    return true;
  }

  /**
   * Retorna um userdata da sessão.
   *
   * @param string $titulo O título associado ao userdata.
   *
   * @return mixed Retorna os dados do userdata ou null se não existir.
   */
  public function userdata($titulo)
  {
    return $this->session->userdata(sha1($titulo));
  }

  /**
   * Obtém o ID do usuário a partir da sessão.
   *
   * @return int|null Retorna o ID do usuário ou null se não houver sessão ativa.
   */
  public function get_id()
  {
    $session = $this->session_m->userdata('user');
    if (!is_null($session)) {
      return $session['id'];
    }
    return null;
  }
}
