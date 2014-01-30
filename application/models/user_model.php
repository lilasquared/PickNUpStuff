<?php 
class User_model extends CI_Model {

  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
    $this->load->database();
  }

  /**
   * Get the user data for a particular user
   *
   * @return User Object
   * @author Aaron & Corey
   **/
  public function getByName($username)
  {
    $user = 
      $this->db->select('*')
               ->from('account')
               ->where('name', $username)
               ->get()->result();

    return isset($user[0]) ? $user[0] : null;
  }
}