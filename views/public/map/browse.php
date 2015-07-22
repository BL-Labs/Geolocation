<?php 
queue_css_file('geolocation-items-map');

$title = __('Browse Items on the Map') . ' ' . __('(%s total)', $totalItems);
echo head(array('title' => $title, 'bodyclass' => 'map browse'));
?>

<script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>

<h1><?php echo $title; ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />

<?php
echo item_search_filters();
echo pagination_links();
?>

<div id="map" style="height: 400px; overflow: hidden;"></div>

<div id="geolocation-browse">
    <?php echo $this->googleMap('map_browse', array('list' => 'map-links', 'params' => $params)); ?>
    <div id="map-links"><h2><?php echo __('Find An Item on the Map'); ?></h2></div>
</div>

<script>

var map = L.map('map').setView([51.505, -0.09], 13);

// OSM
//L.tileLayer( 'http://{s}.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.png', {
//    attribution: '&copy; <a href="http://osm.org/copyright" title="OpenStreetMap" target="_blank">OpenStreetMap</a> contributors | Tiles Courtesy of <a href="http://www.mapquest.com/" title="MapQuest" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png" width="16" height="16">',
//    subdomains: ['otile1','otile2','otile3','otile4']
//}).addTo( map );

L.tileLayer('http://geo.nls.uk/maps/os/1inch_2nd_ed/{z}/{x}/{y}.png', {

                  tms: true,

                  attribution: 'Base map: Ordnance Survey <i>One-Inch to the mile</i> (1885-1900) courtesy of the <a href="http://maps.nls.uk/">' + 'National Library of Scotland</a>',

                  maxNativeZoom: 15,

                  maxZoom: 20

            }).addTo(map);

L.tileLayer.wms('http://politicalmeetingsmapper.co.uk:8080/geoserver/wms', {
            layers: 'test:TerraColor_SanFrancisco_US_15m',
            format: 'image/png',
            version: '1.1.1',
            transparent: true,
            tiled: true,
            attribution: '&copy; Test...',
        }).addTo(map);

</script>

<?php echo foot(); ?>
