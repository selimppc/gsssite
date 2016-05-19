<?php
/**
* @version   $Id: ie7splash.php 24732 2014-12-16 12:48:18Z arifin $
* @author    RocketTheme http://www.rockettheme.com
* @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*
* Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
*
*/

defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');
/**
 * @package     gantry
 * @subpackage  features
 */
class GantryFeatureIE7Splash extends GantryFeature {
    var $_feature_name = 'ie7splash';

    function isEnabled(){
    	if ($this->get('enabled')) {
        	return true;
        }
    }
    
    function isInPosition($position) {
        return false;
    }
    function isOrderable(){
        return true;
    }
    
    function init() {
        global $gantry;
        
        if (JFactory::getApplication()->input->getString('tmpl')!=='unsupported' && $gantry->browser->name == 'ie' && $gantry->browser->shortversion == '7') {
            header("Location: ".$gantry->baseUrl."?tmpl=unsupported");
        }
    }
}
