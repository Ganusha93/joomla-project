<?php
/*------------------------------------------------------------------------
# mod_jbe_local_map - Google Map module for Joomla by joombest.com
# ------------------------------------------------------------------------
# author    joombest http://www.joombest.com
# Copyright (C) 2010 - 2012 joombest.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joombest.com
-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die('Restricted access');
// Path assignments
$mosConfig_absolute_path = JPATH_SITE;
$mosConfig_live_site = JURI :: base();
if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }
//Parameters
$uniqid 				= $module->id;
$lat					= $params->get ('lat',42.811522);
$lng					= $params->get ('lng',-76.566467);
$width					= $params->get ('width',700);
$height					= $params->get ('height',300);
$left					= $params->get ('left',0);
$map_type				= $params->get ('map_type','ROADMAP');
$maker_title			= $params->get ('maker_title',"Here");
$maker_des				= $params->get ('maker_des',"Description");
$zoom					= $params->get ('zoom',8);

$doc = JFactory::getDocument();
$doc->addScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');//Add map api script
$doc->addStyledeclaration("#joombest_simple_map_canvas {margin:0;padding:0;height:" . $height . "px;width:" . $width . "px;left:" . $left . "px;}");//Add inline stlesheet
require(JModuleHelper::getLayoutPath('mod_jbe_local_map'));//Load layout