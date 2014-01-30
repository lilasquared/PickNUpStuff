<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Page class, contains data for header, main content and footer
 *
 * @package KnowName
 * @author Aaron Roberts
 **/
class Page 
{

  //Internal Data Members
  public $header, $main_content, $footer;
  /**
   * Construct the Page Object
   *
   * @param $title = Page Title (eg. Home, Settings)
   * @param $descr = Page Description
   * @param $theme = Page Theme (css and images to use)
   * @return void
   * @author Aaron Roberts
   **/
  public function __construct()
  {
    $this->header = new Header();
    $this->main_content = array();
    $this->footer = null;
  }

  /**
   * Initialize the header
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function init_header($title, $descr, $theme = 'default')
  {
    $this->header->title = $title;
    $this->header->description = $descr;
    $this->header->theme = $theme;
  }

  /**
   * Add content to a page.  Use this function to include a view in the page
   * and set the data array for that view.
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function add_content($view, $data)
  {
    $this->main_content[$view] = $data;
  }

  /**
   * Add an action to the action menu (right menu)
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function add_actions($menuItems)
  {
    $this->header->menu_right['actions'] =
      array_merge($menuItems, $this->header->menu_right['actions']);
  }
}

/**
 * Header class, contains data for header (title, description)
 * as well as navigation and action menu.
 *
 * @package KnowName
 * @author Aaron Roberts
 **/
class Header
{
  public  $title,       //Title of the page
          $description, //metadata description of the page
          $stylesheet,  //stylesheet to load for particular theme
          $menu_right,  //Action menu (right hand menu)
          $menu_left;   //Navigation menu (left hand menu)

  /**
   * Construct the header object
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function __construct()
  {
    $this->_init_menu_right();
    $this->_init_menu_left();
  }

  /**
   * Initialize the action menu with the default actions.  These actions will
   * appear on every page.
   *
   * @return void
   * @author Aaron Roberts
   **/
  private function _init_menu_right()
  {
    $this->menu_right['actions'] = array();
    $logout = 
      new MenuItem("Logout", "log-out", array('href'=>'/Session/LogOut'));
    $settings = 
      new MenuItem("Settings", "cog", array('href'=>'/u/Settings'));
    
    array_push($this->menu_right['actions'], $settings);
    array_push($this->menu_right['actions'], $logout);
  }

  /**
   * Initialize the nav menu with the default pages.  These links will
   * appear on every page.
   *
   * @return void
   * @author Aaron Roberts
   **/
  private function _init_menu_left()
  {
    $this->menu_right['actions'] = array();
    $logout = 
      new MenuItem("Logout", "log-out", array('href'=>'/Session/LogOut'));
    $settings = 
      new MenuItem("Settings", "cog", array('href'=>'/u/Settings'));
    
    array_push($this->menu_right['actions'], $settings);
    array_push($this->menu_right['actions'], $logout);
  }

} // END class Header

/**
 * MenuItem class, contains data required for a menu item (right or left)
 *
 * @package KnowName
 * @author Aaron Roberts
 **/
class MenuItem {

  //Internal Data Members
  public  $text,
          $icon,
          $attributes,
          $submenu;

  /**
   * Construct the MenuItem Object
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function __construct($text, $icon, $attrs = array())
  {
    $this->text = $text;
    $this->icon = $icon;
    $this->attributes = $attrs;
    $this->submenu = array();
  }

  /**
   * Add an attribute to the attributes array
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function add_attribute($a, $v)
  {
    $this->attributes[$a] = $v;
  }

  /**
   * Add a submenu Item to the menu Item
   *
   * @return void
   * @author Aaron Roberts
   **/
  public function add_submenuitem($item)
  {
    array_push($this->submenu, $item);
  }
}
