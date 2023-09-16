<div class="row justify-content-center">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h4 class="text-center">Sua DRE</h4>

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Categoria</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Valor (R$)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Saldo</td>
                <td>
                  <?= number_format($dre->getSaldo(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Lucro Líquido</td>
                <td>
                  <?= number_format($dre->getLucroLiquido(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Receitas</td>
                <td>
                  <?= number_format($dre->getReceitas(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Despesas</td>
                <td>
                  <?= number_format($dre->getDespesas(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Receita Operacional</td>
                <td>
                  <?= number_format($dre->getReceitaOperacional(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Custos de Vendas</td>
                <td>
                  <?= number_format($dre->getCustosVendas(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Margem Bruta</td>
                <td>
                  <?= number_format($dre->getMargemBruta(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Despesas Operacionais</td>
                <td>
                  <?= number_format($dre->getDespesasOperacionais(), 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Lucro Operacional</td>
                <td>
                  <?= number_format($dre->getLucroOperacional(), 2, ',', '.') ?>
                </td>
              </tr>
            </tbody>

          </table>
          <hr>
          <div class="d-flex justify-content-center"> <!-- Adicionado o container flex -->
                <a href="<?= base_url('criar/dados_dre') ?>" class="btn btn-info w-75">Download .PDF</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
