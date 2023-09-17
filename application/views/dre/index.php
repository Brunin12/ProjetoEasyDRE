<?php $empresa = $this->empresa->get() ?>
<div class="row">
  <div class="col-xl-12 col-lg-8 col-md-10 mx-auto">
    <div class="card z-index-0 border-2 shadow-md">
      <div class="card-header text-center pt-4">
        <h5>Gerar DRE (<?= $empresa->nome ?>)</h5>
        <p>para gerar sua DRE você deve pre-encher os campos para atualizar os dados da sua empresa e depois gerar a sua DRE</p>
      </div>
      <div class="card-body">
        <form role="form text-left" action="<?= base_url('criar/dre') ?>" method="post">

        <label class="text-dark">Nome da empresa (Opcional)</label>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nome
            (Opicional)" aria-label="Nome" name="nome"
            value="<?= isset($empresa->nome) ? $empresa->nome : '' ?>"
              aria-describedby="nome-addon">
          </div>
          <label class="text-dark"><span class="text-danger">*</span> Saldo</label>
          <div class="mb-3">
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Saldo"
            required
            aria-label="Saldo" name="saldo"
            value="<?= isset($empresa->saldo) ? $empresa->saldo : '' ?>"

              aria-describedby="saldo-addon">
          </div>
          <label class="text-dark"><span class="text-danger">*</span> Despesa Total</label>
          <div class="mb-3">
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Despesa total" aria-label="despesa"
            required
            name="despesa"
            value="<?= isset($empresa->despesa) ? $empresa->despesa : '' ?>"

              aria-describedby="despesas-addon">
          </div>
          <label class="text-dark"><span class="text-danger">*</span> Receita Total</label>
          <div class="mb-3">
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Receita Total" aria-label="receita"
            required
            name="receita"
            value="<?= isset($empresa->receita) ? $empresa->receita : '' ?>"

              aria-describedby="saldo-addon">
          </div>
          <label class="text-dark"><span class="text-danger">*</span> Investimento Total</label>
          <div class="mb-3">
            <input type="number" step="0.01" min="0" class="form-control" placeholder="Investimento Total" aria-label="investimento"
            required
            name="investimento"
            value="<?= isset($empresa->investimento) ? $empresa->investimento : '' ?>"

              aria-describedby="investimento-addon">
          </div>
          <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Gerar tabela DRE</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
