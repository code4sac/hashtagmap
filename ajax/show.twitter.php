<?
include('../inc.php');

$sql = new mysql();

$ftable = new ftables('array');

$table_id = '1PPlalKs5TkDSfx_v4CEePIICbtwrTqD-2z74e00';

$ft_query = "
  SELECT hashtag
  FROM 1PPlalKs5TkDSfx_v4CEePIICbtwrTqD-2z74e00
  WHERE hashtag NOT EQUAL TO ''
";

$ft_rows = $ftable->getRows($ft_query);
$in_str = '(';
foreach($ft_rows as $ft_row) {
  $in_str .= "'".$ft_row['hashtag']."',";

}
$in_str = preg_replace('/,$/', ')', $in_str);

$query = "
  SELECT  count(tweet_id) AS count
        , tag
  FROM tweet_tags
  WHERE tag IN $in_str
  GROUP BY tag
  ORDER BY count DESC
";

$rows = $sql->getRows($query);
//$rows['high']  = reset($rows)->count;

print json_encode($rows, false);
?>
