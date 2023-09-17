<div class="row justify-content-center">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h4 class="text-center"><?= $this->empresa->get()->nome ?> (DRE)</h4>

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Valor (R$)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Saldo</td>
                <td>
                  R$ <?= number_format($dre['saldo'], 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Lucro Líquido</td>
                <td>
                  R$ <?= number_format($dre['lucro_liquido'], 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Receitas</td>
                <td>
                  R$ <?= number_format($dre['receita'], 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Despesas</td>
                <td>
                  R$ <?= number_format($dre['despesa'], 2, ',', '.') ?>
                </td>
              </tr>
              <tr>
                <td>Margem de Lucro</td>
                <td>
                  <?= number_format($dre['margem_lucro'], 2, ',', '.') ?> (%)
                </td>
              </tr>
              <tr>
                <td>ROI</td>
                <td>
                  <?= number_format($dre['roi'], 2, ',', '.') ?> (%)
                </td>
              </tr>
              <tr>
                <td>Investimento</td>
                <td>
                  R$ <?= number_format($dre['investimento'], 2, ',', '.') ?>
                </td>
              </tr>
            </tbody>

          </table>
          <hr>
          <div class="d-flex justify-content-center"> <!-- Adicionado o container flex -->
                <a href="<?= base_url('criar/dre_pdf') ?>" class="btn btn-info w-75">Download .PDF</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
