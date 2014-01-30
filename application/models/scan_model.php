<?php
/**
 * Interact with the scan table in the databse
 *
 * @package SPSU Forager
 * @author Aaron Roberts
 **/
class Scan_model extends CI_Model
{
  function __construct() 
  {
    parent::__construct();
    $this->load->database();
  }

  /**
   * Add a new entry to the scan table in the 'Pending' State
   *
   * @return scanID
   * @author Aaron Roberts
   **/
  public function start()
  {
    $scanData = array('State' => 'Pending');
    
    $this->db->insert('scan', $scanData);

    return $this->db->insert_id();
  }

  /**
   * Cancels all scans in the 'Started' State (should only be 1 ever)
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function cancel()
  {
    $timestamp = date('Y-m-d H:i:s', time());
    $scanData = array(
                      'state' => 'Canceled',
                      'finish' => $timestamp);

    $this->db->where('state', 'Pending')
             ->or_where('state', 'Running')
             ->update('scan', $scanData);
  }

  /**
   * Determines if there is a scan in the 'Pending' or 'Running' state
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function inProgress()
  {
    $inProgress = $this->db->select('*')
                           ->from('scan')
                           ->where('state', 'Pending')
                           ->or_where('state', 'Running')
                           ->get()
                           ->result();
    //return isset($inProgress[0]) ? $inProgress[0]->scanId : NULL
    return $inProgress;
  }

  /**
   * Get all scans from the database
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function getScans()
  {
    return $this->db->get('scan')->result();
  }

  /**
   * Get top level results from a scan
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function getResults($scanID)
  {
    $filter = array('ID' => $scanID);
  }
} // END class Scan_model