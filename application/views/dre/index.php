<div class="row">
  <div class="col-xl-12 col-lg-8 col-md-10 mx-auto">
    <div class="card z-index-0 border-2 shadow-md">
      <div class="card-header text-center pt-4">
        <h5>Gerar DRE</h5>
        <p>para gerar sua DRE você deve pre-encher os campos para atualizar os dados da sua empresa e depois gerar a sua DRE</p>
      </div>
      <div class="card-body">
        <form role="form text-left" action="<?= base_url('criar/dre') ?>" method="post">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Saldo" aria-label="Saldo" name="saldo"
              aria-describedby="saldo-addon">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Lucro Liquido" aria-label="lucro" name="lucro_liquido"
              aria-describedby="lucro-addon">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Despesa total" aria-label="Despesas" name="despesa"
              aria-describedby="despesas-addon">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Receita Total" aria-label="receita" name="receita"
              aria-describedby="saldo-addon">
          </div>
          <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Gerar tabela DRE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
