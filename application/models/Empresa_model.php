<?php

class Empresa_model extends CI_Model
{

  public function get_empresa($data)
  {
    return $this->db->get_where('empresa', $data)->row();
  }

  public function get_empresa_id($id)
  {
    return $this->db->get_where('empresa', array('id_empresa' => $id))->row();
  }

  public function get()
  {
    $empresa = $this->session_m->userdata('empresa');
    if (isset($empresa)) {
      $id = $empresa['id_empresa'];
      return $this->db->get_where('empresa', array('id_empresa' => $id))->row();
    }
    return null;

  }


  public function inserir($data)
  {
    $this->db->insert('empresa', $data);
    return $this->db->insert_id();
  }

  public function atualiza($data, $onde)
  {
    $this->db->update('empresa', $data, $onde);
  }

  public function is_logado()
  {
    $data = $this->session_m->userdata('empresa');
    if (isset($data)) {
      return true;
    }
    return false;
  }

  public function gerar_dre($empresa)
  {

    // Definindo os campos base
    $saldo = ($empresa->saldo);
    $lucro_liquido = ($empresa->lucro_liquido);
    $receita = ($empresa->receita);
    $despesa = ($empresa->despesa);
    $investimento = ($empresa->investimento);

    // Calculando campos derivados
    $margem_lucro = (($receita / $lucro_liquido) * 100);
    $roi = (($lucro_liquido / $investimento) * 100);

    // Definindo os campos derivados
    $dre = array(
      'saldo' => $saldo,
      'lucro_liquido' => $lucro_liquido,
      'receita' => $receita,
      'despesa' => $despesa,
      'investimento' => $investimento,
      'margem_lucro' => $margem_lucro,
      'roi' => $roi
    );

    return $dre;
  }



  public function gerar_dre_pdf($empresa)
  {
    $this->load->library('tcpdf');
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFillColor(240, 240, 240); // Defina a cor de fundo para preto
    //$pdf->SetTextColor(255, 255, 255);
    $pdf->SetX((210 - 160) / 2); // Centralize a tabela horizontalmente

    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetFontSize(16);
    $pdf->Cell(0, 10, 'Demonstração do Resultado do Exercício', 0, 1, 'C');
    $pdf->SetFontSize(12);

    // Definindo os campos base
    $saldo = ($empresa->saldo);
    $lucro_liquido = ($empresa->lucro_liquido);
    $receita = ($empresa->receita);
    $despesa = ($empresa->despesa);
    $investimento = ($empresa->investimento);
    $nome = $empresa->nome;
    $data = date('H:i:s Y-m-d');

    // Calculando campos derivados
    $margem_lucro = number_format((($receita / $lucro_liquido) * 100), 2, ',', '.');
    $roi = number_format((($investimento / $lucro_liquido) * 100), 2, ',', '.');


    // Adicione as informações da DRE como uma tabela
    $pdf->SetFillColor(220, 220, 220);
    $pdf->Cell(80, 10, 'Categoria', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'Valor (R$)', 1, 1, 'C', 1);

    $pdf->Cell(80, 10, 'Saldo', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($saldo, 2, ',', '.'), 1, 1, 'C');

    $pdf->Cell(80, 10, 'Receitas', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($receita, 2, ',', '.'), 1, 1, 'C');

    $pdf->Cell(80, 10, 'Despesas', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($despesa, 2, ',', '.'), 1, 1, 'C');

    $pdf->Cell(80, 10, 'Margem de lucro', 1, 0, 'L');
    $pdf->Cell(80, 10, $margem_lucro . ' (%)', 1, 1, 'C');

    $pdf->Cell(80, 10, 'R.O.I', 1, 0, 'L');
    $pdf->Cell(80, 10, $roi . ' (%)', 1, 1, 'C');

    // Salve ou envie o PDF
    $pdf->Output('DRE-'.$nome.'-'.$data.'.pdf', 'D');
  }






}
