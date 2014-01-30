<?php

class Session extends CI_Controller
{
  public $page;
  /**
   * Construct the Session Controller.  
   * This controller contains the default static pages for guest users.
   *
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function __construct() 
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('page');
    $this->load->helper('url');
    $this->load->model('user_model');
  }

// PUBLIC FUNCTIONS

  /**
   * Display the index page.
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function index()
  {
    $this->load->view("session/login");
  }

  /**
   * Authenticate against the Deluxe Active Directory Server
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function login()
  {
    $form_data = $this->input->post(null, TRUE);
    $user = new stdClass;
    $user->name = $form_data['name'];
    $password = $form_data['password'];
    $userDataFromDatabase = $this->user_model->getByName($user->name);
    if ($userDataFromDatabase && $password == $userDataFromDatabase->pass)
    {
      $user->rank = $userDataFromDatabase->rank;
      $this->_init_session($user);
      redirect('Portal');
    }
    else
    {
      $message = 'Invalid Username or Password';
      $this->session->set_userdata('error', $message);
      redirect('');
    }
  }

  private function _init_session($user)
  {
    $this->session->unset_userdata('error');
    $this->session->set_userdata('name', $user->name);
    $this->session->set_userdata('rank', $user->rank);
  } 

  public function logout()
  {
    $this->session->unset_userdata('name');
    $this->session->unset_userdata('rank');
    redirect('');
  }

}