<?php
$data = array('page' => $page);
$footer = $this->load->view("default/footer", $data, true);
$header = $this->load->view("default/header", $data, true);
$sidebar = $this->load->view("default/sidebar", $data, true);
$navbar = $this->load->view("default/navbar", $data, true);
$script = $this->load->view("default/script", $data, true);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?= $header ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <?= $sidebar ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?= $navbar ?>
    <div class="container-fluid py-4">
      <?php $this->load->view("default/alerts/error_manager") ?>
      <?= $page['content'] ?>
      <?= $footer ?>
    </div>
    </div>
    <?= $script ?>
</body>

</html>
