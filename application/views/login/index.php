<div class="row">
  <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
    <div class="card bg-gradient-dark rounded shadown-sm ps-2 card-plain">
      <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-info text-gradient">Bem-vindo de volta!</h3>
        <p class="mb-0 text-light">Digite seu email e sua senha para proseguir</p>
      </div>
      <div class="card-body">
        <form role="form" action="<?= base_url("conta/entrar") ?>" method="POST">
          <label class="text-light">Email</label>
          <div class="mb-3 text-light">
            <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email"
              aria-describedby="email-addon">
          </div>
          <label class="text-light">Senha</label>
          <div class="mb-3 text-light">
            <input type="password" class="form-control" placeholder="Senha" aria-label="Password" name="senha"
              aria-describedby="password-addon">
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
            <label class="form-check-label text-light" for="rememberMe">Lembre de mim</label>
          </div>
          <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Entrar</button>
          </div>
        </form>
      </div>
      <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto">
          Não tem uma conta?
          <a href="<?= base_url('conta/criar') ?>" class="text-info text-gradient font-weight-bold">Criar uma conta</a>
        </p>
      </div>
    </div>
  </div>
</div>
