<?php
class DRE
{
  public $saldo;
  public $lucroLiquido;
  public $receitas;
  public $despesas;
  public $receitaOperacional;
  public $custosVendas;
  public $margemBruta;
  public $despesasOperacionais;
  public $lucroOperacional;

  // Métodos para configurar os valores
  public function setSaldo($saldo)
  {
    $this->saldo = $saldo;
  }

  public function setLucroLiquido($lucroLiquido)
  {
    $this->lucroLiquido = $lucroLiquido;
  }

  public function setReceitas($receitas)
  {
    $this->receitas = $receitas;
  }

  public function setDespesas($despesas)
  {
    $this->despesas = $despesas;
  }

  public function setReceitaOperacional($receitaOperacional)
  {
    $this->receitaOperacional = $receitaOperacional;
  }

  public function setCustosVendas($custosVendas)
  {
    $this->custosVendas = $custosVendas;
  }

  public function setMargemBruta($margemBruta)
  {
    $this->margemBruta = $margemBruta;
  }

  public function setDespesasOperacionais($despesasOperacionais)
  {
    $this->despesasOperacionais = $despesasOperacionais;
  }

  public function setLucroOperacional($lucroOperacional)
  {
    $this->lucroOperacional = $lucroOperacional;
  }

  // Métodos para obter os valores
  public function getSaldo()
  {
    return $this->saldo;
  }

  public function getLucroLiquido()
  {
    return $this->lucroLiquido;
  }

  public function getReceitas()
  {
    return $this->receitas;
  }

  public function getDespesas()
  {
    return $this->despesas;
  }

  public function getReceitaOperacional()
  {
    return $this->receitaOperacional;
  }

  public function getCustosVendas()
  {
    return $this->custosVendas;
  }

  public function getMargemBruta()
  {
    return $this->margemBruta;
  }

  public function getDespesasOperacionais()
  {
    return $this->despesasOperacionais;
  }

  public function getLucroOperacional()
  {
    return $this->lucroOperacional;
  }
}
