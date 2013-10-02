<?
include('../inc.php');
$ftables = new ftables('array');

$tag = filter_var($_GET['q'], FILTER_SANITIZE_STRING);

$table_id = '1PPlalKs5TkDSfx_v4CEePIICbtwrTqD-2z74e00';

$query = "
  SELECT  geometry
  FROM $table_id
  WHERE hashtag CONTAINS IGNORING CASE '$tag'
";
$row = $ftables->getRows($query);
$ret = $row[0]['geometry']['geometry']['coordinates'][0];
print json_encode($ret);
