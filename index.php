<?
/* Hashtag map
 *  By: Code4Sac
 * ============= */
include('lib/html/head.php');
?>
<body>
<div id="test"></div>
<div id="map-canvas"></div>
<script type="text/javascript">
/* Setup some vars
 * =============== */
var map;
var fLayers     = {};   // Fusion Table Layer
var table_id    = "1PPlalKs5TkDSfx_v4CEePIICbtwrTqD-2z74e00";
var sacramento  = new google.maps.LatLng(38.579016, -121.482753);

/* Get tweet counts & tags from database
 * ===================================== */
var tweet_count = emerge.ajax_get('ajax/show.twitter.php', 'test');
tweet_count = eval("("+tweet_count+")");

$(function() {
  /* Initialize Map
   * ============== */
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: sacramento,
    zoom: 11,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }); //====End init Map

  /* Generate Colors
   * =============== */
  // Need fix for colors. Horrible amount of code I put together for this...
  var need = tweet_count.length;
  var upper = nearestPow2(need);
  var allColors = '#FF0000'.hexsplit('#0000FF', upper);
  var colors = spaceColors(allColors, tweet_count[0].count, need);
  //====End Colors 

  /* Initialize Fusion Table Layers
   * ============================== */
  $.each(tweet_count, function(idx, val) {
    var color = colors[idx];
    var tag   = val.tag;
    var count = val.count;
    var pgon = create_layer(tag, count, color);
    pgon.setMap(map);
  }); //====End Fusion Table Layers


}); //====End $(function());

/* ==== Functions ==== */

/* Create each layer
 * ================= */
var create_layer = function(tag,count, color) {

  /* Query fusion table via php script.
   *   This can probably be done through pure JS
   * =========================================== */
  var coords = emerge.ajax_get('ajax/ftable.query.php?q='+tag);
  coords = eval("("+coords+")");
  //====End Query

  /* Generate coordinate array from query
   * ==================================== */
  var tc = [];
  $.each(coords, function(idx, val) {
    tc[idx] = new google.maps.LatLng(val[1], val[0]);
  }); //====End coordinate array

  /* Create polygon with coordinate array
   * ==================================== */
  var pgon = new google.maps.Polygon({
    paths: tc,
    strokeColor: '#000000',
    strokeOpacity: 0.8,
    strokeWeight: .3,
    fillColor: color,
    fillOpacity: 1
  });

  /* Jam infoWindow click event in
   * ============================= */
  google.maps.event.addListener(pgon, 'click', function(event) {
    var iw = new google.maps.InfoWindow();
    iw.setContent("<strong>HashTag:</strong> "+tag+"<br/><strong>Tweets:</strong> "+count);
    iw.setPosition(tc[0]);
    iw.open(map);
  });
  return pgon;
} //====End create_layer()

</script>

</body>
</html>
