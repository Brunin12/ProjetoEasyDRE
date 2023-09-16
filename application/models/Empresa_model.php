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
    $dre = new DRE();

    // Definindo os campos base
    $dre->setSaldo($empresa->saldo);
    $dre->setLucroLiquido($empresa->lucro_liquido);
    $dre->setReceitas($empresa->receita);
    $dre->setDespesas($empresa->despesa);

    // Calculando campos derivados
    $receita_operacional = $empresa->receita;
    $custos_vendas = $empresa->despesa;
    $margem_bruta = $receita_operacional - $custos_vendas;
    $despesas_operacionais = $empresa->despesa;
    $lucro_operacional = $margem_bruta - $despesas_operacionais;

    // Definindo os campos derivados
    $dre->setReceitaOperacional($receita_operacional);
    $dre->setCustosVendas($custos_vendas);
    $dre->setMargemBruta($margem_bruta);
    $dre->setDespesasOperacionais($despesas_operacionais);
    $dre->setLucroOperacional($lucro_operacional);

    return $dre;
  }



  public function gerar_dre_pdf($empresa)
  {
    // Carregue a biblioteca TCPDF
    $this->load->library('tcpdf');

    // Crie uma instância do TCPDF
    $pdf = new TCPDF();
    $pdf->AddPage();

    // Defina a fonte para helvetica
    $pdf->SetFont('helvetica', '', 12);

    // Adicione o título
    $pdf->SetFontSize(16);
    $pdf->Cell(0, 10, 'Demonstração do Resultado do Exercício', 0, 1, 'C');
    $pdf->SetFontSize(12);

    // Calcula as métricas
    $receita_operacional = $empresa->receita;
    $custos_vendas = $empresa->despesa; // Vamos usar o campo despesa como custos de vendas
    $margem_bruta = $receita_operacional - $custos_vendas;
    $despesas_operacionais = $empresa->despesa; // Vamos usar o campo despesa novamente
    $lucro_operacional = $margem_bruta - $despesas_operacionais;


    // Adicione as informações da DRE como uma tabela
    $pdf->SetFillColor(220, 220, 220);
    $pdf->Cell(80, 10, 'Categoria', 1, 0, 'C', 1);
    $pdf->Cell(80, 10, 'Valor (R$)', 1, 1, 'C', 1);

    $pdf->Cell(80, 10, 'Receita Operacional', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($receita_operacional, 2, ',', '.'), 1, 1, 'C');

    $pdf->Cell(80, 10, 'Custos das Vendas ou Serviços', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($custos_vendas, 2, ',', '.'), 1, 1, 'C');

    $pdf->Cell(80, 10, 'Margem Bruta', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($margem_bruta, 2, ',', '.'), 1, 1, 'C');

    $pdf->Cell(80, 10, 'Despesas Operacionais', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($despesas_operacionais, 2, ',', '.'), 1, 1, 'C');

    $pdf->Cell(80, 10, 'Lucro Operacional', 1, 0, 'L');
    $pdf->Cell(80, 10, number_format($lucro_operacional, 2, ',', '.'), 1, 1, 'C');

    // Salve ou envie o PDF
    $pdf->Output('DRE.pdf', 'D');
  }






}
