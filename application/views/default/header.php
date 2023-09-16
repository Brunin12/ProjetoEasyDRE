<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/site/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/ico" href="<?= base_url('assets/site/favicon.ico') ?>">
  <?php if (isset($page['titulo'])): ?>
    <title>
      Easy DRE | <?= $page['titulo'] ?>
    </title>
  <?php else: ?>
    <title>Easy DRE | Gerenciamento</title>
  <?php endif; ?>
  <?= isset($page['css']) ? $page['css'] : '' ?>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/admin/assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/admin/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/admin/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/admin/assets/css/soft-ui-dashboard.css?v=1.0.7') ?>"
    rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="<?= base_url() ?>" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


</head>
