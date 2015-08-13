<?php 
queue_css_file('geolocation-items-map');

$title = __('Browse Items on the Map') . ' ' . __('(%s total)', $totalItems);
echo head(array('title' => $title, 'bodyclass' => 'map browse'));
?>

<script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />

<h1><?php echo $title; ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>


<?php
echo item_search_filters();
echo pagination_links();
?>

<div id="geolocation-browse">
    <?php echo $this->googleMap('map_browse', array('list' => 'map-links', 'params' => $params)); ?>
    <div id="map-links"><h2><?php echo __('Find An Item on the Map'); ?></h2></div>
</div>

<?php echo foot(); ?>
