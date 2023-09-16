<?php

$error = $this->session_m->flashdata('error');
$success = $this->session_m->flashdata('msg');

if (isset($success)) {
  $this->load->view("default/alerts/success", ['msg' => $success]);
}
if (isset($error)) {
  $this->load->view("default/alerts/danger", ['msg' => $error]);
}

?>
