<?php
/**
* @version   $Id: theme.php 24732 2014-12-16 12:48:18Z arifin $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

class GantrySplitmenuTheme extends AbstractRokMenuTheme {

    protected $defaults = array(
        'roknavmenu_splitmenu_enable_current_id' => 0,
        'class_sfx' => '',
        'responsive-menu' => 'panel'
    );

    public function getFormatter($args){
        require_once(dirname(__FILE__) . '/formatter.php');
        return new GantrySplitmenuFormatter($args);
    }

    public function getLayout($args){
        require_once(dirname(__FILE__) . '/layout.php');
        return new GantrySplitmenuLayout($args);
    }
}
