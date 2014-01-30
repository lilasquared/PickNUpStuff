<?php 
  // Load the header
  $this->load->view('includes/header', $header);

  foreach ($main_content as $view => $data) {
    $this->load->view($view, $data);
  }
  
  //Load the footer
  $this->load->view('includes/footer');
?>