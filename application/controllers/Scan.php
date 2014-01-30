<?php
/**
 * Controls operations of the scans
 *
 * @package SPSU Forager
 * @author Aaron Roberts
 **/
class Scan extends Base_Controller
{
  private $username;
  /**
   * Construct the Scan Controller
   *
   * @return void
   * @author Aaron Roberts
   **/
  function __construct()
  {
    parent::__construct();
    $this->load->model('scan_model');
    $username = $this->session->userdata('name');
  }

  /**
   * Start a scan
   *
   * @return void
   * @author Aaron Roberts & Adam Liebert
   **/
  public function start()
  {
    $alert = new stdClass;
    if ($this->session->userdata('rank') == 1)
    {
      if ($this->scan_model->inProgress())
      {
        $alert->message = 'A scan is currently in progress, please cancel it or wait for it to complete.';
        $alert->type = 'info';
        $this->session->set_userdata('alert', $alert);
        redirect('Portal');
      }
      else
      {
        $this->scan_model->start();
        $alert->message = 'The scan started successfully!  You will be notified when it is complete.';
        $alert->type = 'success';
        $this->session->set_userdata('alert', $alert);
        redirect('Portal');
      }
    }
    else
    {
      $alert->message = 'You do not have permission to perform this action';
      $alert->type = 'danger';
      $this->session->set_userdata('alert', $alert);
      redirect('Portal');
    }
  }
  /**
   * Cancel a scan
   *
   * @return void
   * @author Aaron Roberts & Adam Liebert
   **/
  public function cancel()
  {
    if ($this->session->userdata('rank') == 1)
    {
      $this->scan_model->cancel();
      $alert = new stdClass;
      $alert->message = 'The scan was successfully canceled.  You may view the partial report at this time.';
      $alert->type = 'success';
      $this->session->set_userdata('alert', $alert);
      redirect('Portal');
    }
    else
    {
      $message = 'You do not have permission to perform this action';
      $alert->type = 'danger';
      $this->session->set_userdata('alert', $alert);
      redirect('Portal');
    }
  }

} // END class Scan extends CI_Controller