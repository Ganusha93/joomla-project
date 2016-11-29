<?php
/*------------------------------------------------------------------------
# mod_jbe_local_map - Google Map module for Joomla by joombest.com
# ------------------------------------------------------------------------
# author    joombest http://www.joombest.com
# Copyright (C) 2010 - 2011 joombest.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joombest.com
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<style>
	#joombest_simple_map_main a{
		background:transparent;
	}
	#joombest_simple_map_main a:hover{
		background:transparent;
		color:red;
	}
</style>
<script src="<?php echo $mosConfig_live_site; ?>/modules/mod_jbe_local_map/tmpl/js/jquerynoconflict.js" type="text/javascript"></script>
<script>
  var myLatlng  = new google.maps.LatLng(<?php echo $lat ?>,<?php echo $lng ?>);
  function initialize() {
	var mapOptions = {
	  zoom: <?php echo $zoom ?>,
	  center: myLatlng,
	  mapTypeId: google.maps.MapTypeId.<?php echo $map_type ?>
	};
	var map = new google.maps.Map(document.getElementById('joombest_simple_map_canvas'), mapOptions);
	var marker = new google.maps.Marker({position:myLatlng, map:map,title:"<?php echo $maker_title;?>"});	
	var infowindow;
	infowindow = new google.maps.InfoWindow();
	google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent("<?php echo $maker_des;?>");
    infowindow.open(map, this);
  });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="joombest_simple_map_main" value="1">
<?php
if ($lat && $lng) { ?>
	<div id="joombest_simple_map<?php echo $uniqid ?>">
		<div id="joombest_simple_map_canvas"></div>
	</div>
<?php } else { ?>
	<p>Please provide the Latitudes and Longitudes value.</p>
<?php } ?>
</div>
