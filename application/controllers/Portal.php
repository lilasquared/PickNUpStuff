<?php
/**
 * Portal Controller
 *
 * @package 
 * @author Aaron Roberts
 **/
class Portal extends Base_Controller
{
  private $username;
  /**
   * Construct the Portal Controller
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function __construct() 
  {
    parent::__construct();
    $title = 'SPSU Forager';
    $descr = 'A web application for scouring the SPSU domain to search for errors.';
    $this->page->init_header($title, $descr);
  }

  /**
   * Display the Home page.
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function index()
  {
    $this->load->model('scan_model');
    $content['alert'] = $this->session->userdata('alert');
    $content['scanInProgress'] = $this->scan_model->inProgress();
    $this->page->add_content('portal/index', $content);
    $this->load->view('templates/logged_in', $this->page);
    $this->session->unset_userdata('alert');
  }

} // END class Portal