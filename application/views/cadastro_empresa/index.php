<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
<section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= base_url('assets/admin/assets/img/curved-images/curved14.jpg')?>');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Cadastre sua empresa</h1>
              <p class="text-lead text-white">Pre-encha este pequeno formulario para ter acesso a suas ferramentas!.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0 border-2 shadow-md">
              <div class="card-body">
                <form role="form text-left" action="<?= base_url('conta/criar_empresa') ?>" method="post">
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nome da Empresa" aria-label="Nome" name="nome" aria-describedby="name-addon">
                  </div>
                  <div class="mb-3">
                    <input type="text" class="form-control cnpj" placeholder="CPF/CNPJ da Empresa" id="cnpj" aria-label="CPF/CNPJ" name="cpf-cnpj" aria-describedby="cpf-cnpj-addon">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Cadastrar Empresa</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<script>
  $(document).ready(function() {
    $('#cnpj').inputmask('99.999.999/9999-99', { placeholder: '0' });
});

</script>

