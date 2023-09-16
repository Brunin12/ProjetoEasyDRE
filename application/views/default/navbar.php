<!-- Navbar -->
<nav class="navbar navbar-dark bg-gradient-dark navbar-main navbar-expand-lg px-0 mx-4 shadow-sm m-1 border-radius-xl"
  id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="nav-item d-flex align-items-center">
          <a href="<?= base_url('visualizar/perfil') ?>" class="nav-link text-body font-weight-bold px-0 ">
            <img src="<?= base_url('assets/site/favicon-32x32.png') ?>" class="navbar-brand-img h-100 mx-auto my-auto" alt="main_logo">
            <?php
            if ($this->usuario->is_logado()):
              $nome = $this->session_m->userdata('user')['nome']; ?>
  
                <span class="d-sm-inline d-none mx-3 h5 text-light">
                <?= $nome ?>
              </span>
            <?php endif; ?>
          </a>
        </li>
      </ol>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="input-group">
          <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
          <input type="text" class="form-control" placeholder="Pesquisar">
        </div>
      </div>
      <ul class="navbar-nav justify-content-end">
        <?php if (!$this->usuario->is_logado()): ?>
          <li class="nav-item d-flex align-items-center">
            <button type="button" class="btn btn-outline-primary btn-sm mb-0 me-3" data-bs-toggle="modal"
              data-bs-target="#modal-form">Entrar</button>
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <div class="card card-plain">
                      <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient">Entrar</h3>
                        <p class="mb-0">Digite seu E-mail e sua senha para entrar na sua conta</p>
                      </div>
                      <div class="card-body">
                        <form role="form text-left" action="<?= base_url('conta/entrar') ?>" method="POST">
                          <label>Email</label>
                          <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email"
                              aria-describedby="email-addon">
                          </div>
                          <label>Senha</label>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Senha" name="senha"
                              aria-label="Password" aria-describedby="password-addon">
                          </div>
                          <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                            <label class="form-check-label" for="rememberMe">Lembrar de mim</label>
                          </div>
                          <div class="text-center">
                            <button type="submit"
                              class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Entrar</button>
                          </div>
                        </form>
                      </div>
                      <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                          Não tem uma conta?
                          <a href="<?= base_url('conta/criar') ?>" class="text-info text-gradient font-weight-bold">Criar
                            uma Conta</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        <?php endif ?>
        <li class="nav-item d-flex align-items-center">
          <a href="<?= base_url('sobre') ?>" class="nav-link text-body font-weight-bold px-0 ">

            <span class="d-sm-inline d-none text-light">Sobre</span>
          </a>
        </li>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        <li class="nav-item px-3 d-flex align-items-center">
          <a href="<?= base_url('') ?>" class="nav-link text-body p-0">
            <i class="fa fa-moon fixed-plugin-button-nav cursor-pointer"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
