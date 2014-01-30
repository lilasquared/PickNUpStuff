<?php
/**
 * Admin Controller Class
 *
 * @package 
 * @author  Aaron Roberts
 **/
class Base_Controller extends CI_Controller 
{
  public $page;
  /**
   * Construct the Dashboard Controller
   *
   * @return void
   * @author Aaron Roberts
   **/
  function __construct()
  {
    parent::__construct();

    $this->load->library('session');
    $this->load->helper('page');
    $this->load->helper('url');
    if (!$this->session->userdata('name'))
    {
      redirect('Session');
    }

    $this->page = new Page();
  }
} // END class Base_Controller

?>