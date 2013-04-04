<?php if (!defined('APPLICATION')) exit();

// Development mode
// ----------------------------------------
/*  The following is an example of an
 *  asset manager written for Austere. It's
 *  well commented and it should be easy
 *  figuring out how to write one yourself
 */
require 'assets.php';

/**
 * Description of your theme
 *
 * @version    0.9.1
 * @author     [Your name] <[Your email]>
 * @copyright  Copyright 2013 © [Your name]
 * @license    http://opensource.org/licenses/[License] [License]
 */
class AustereThemeHooks implements Gdn_IPlugin
{	
   /**
    * No setup required
    *
    * @since  0.9.0
    * @access public
    */
	public function Setup()
   {
		return TRUE;
	}

   /**
    * No cleanup required
    *
    * @since  0.9.0
    * @access public
    */
	public function OnDisable()
   {
		return TRUE;
	}
}