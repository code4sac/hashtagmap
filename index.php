<?
include('lib/html/head.php');
?>
<body>
<div id="test"></div>
<div id="map-canvas"></div>
<script type="text/javascript">
var map;
var fLayers     = {};   // Fusion Table Layer
var table_id    = "1PPlalKs5TkDSfx_v4CEePIICbtwrTqD-2z74e00";
var sacramento  = new google.maps.LatLng(38.579016, -121.482753);
var tweet_count = emerge.ajax_get('ajax/show.twitter.php', 'test');
tweet_count = eval("("+tweet_count+")");

/* Prepare color buckets
 * ===================== */
var high_count = $(tweet_count).first()[0].count;
var low_count  = $(tweet_count).last()[0].count;
var total_cnt  = $(tweet_count).length;
console.log(total_cnt);
console.log(high_count+" -> "+low_count);

$(function() {
  /* Initialize Map
   * ============== */
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: sacramento,
    zoom: 11,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }); //====End Map

  /* Initialize Fusion Table Layers
   * ============================== */
  $.each(tweet_count, function(idx, val) {
    var tag   = val.tag;
    //var layer = create_layer(tag);
    //console.log("Query: "+tag+" ("+val.count+")");
    //console.log(layer);
    //layer.setMap(map);
    var tcolor = get_color(high_count, low_count, total_cnt, val.count);
    var bar = fake_layer(tag);
    bar.setMap(map);
  });

  /* Load Layers to map
   * ================== */
   //console.log(fLayers[1]);
   //fLayers[1].setMap(map);

}); //====End $(function());

var get_color = function(high, low, total, current) {
  var buckets = Math.round((total / 3) / 3);
  console.log(buckets);
  for(var i = 0; i < total; i++) {
  }
}

var fake_layer = function(tag) {
  var coords = emerge.ajax_get('ajax/ftable.query.php?q='+tag);
  coords = eval("("+coords+")");
  var tc = [];
  $.each(coords, function(idx, val) {
    tc[idx] = new google.maps.LatLng(val[1], val[0]);
  });
  var randColor = get_random_color();
  var pgon = new google.maps.Polygon({
    paths: tc,
    strokeColor: '#000000',
    strokeOpacity: 0.8,
    strokeWeight: .3,
    fillColor: randColor,
    fillOpacity: 0.7
  });
  return pgon;
}

var get_random_color = function() {
  var letters = '0123456789ABCDEF'.split('');
  var color = '#';
  for (var i = 0; i < 6; i++ ) {
    color += letters[Math.round(Math.random() * 15)];
  }
  return color;
}

var create_layer = function(tag) {
  var layer = new google.maps.FusionTablesLayer({
    query: {
      //select: 'Geocodable address',
      select: 'geometry',
      from: table_id,
      where: "hashtag CONTAINS IGNORING CASE '"+tag+"'"
    },
  }); //====End Layers Init
  return layer;
}
</script>

</body>
</html>
