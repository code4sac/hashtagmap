<?
include('inc.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$site_config['site']['title'];?></title>
    <meta name="description" content="<?=$site_config['site']['desc'];?>">
    <meta name="author" content="">

    <!-- CSS Includes -->
	  <link href="/css/main.css" rel="stylesheet">
    <link href="/css/map.css" rel="stylesheet">
    <!-- END CSS Includes -->

    <!-- Javascript Includes -->
	  <script src="/js/main.js"></script>
	  <script src="/js/emerge.js"></script>
	  <script src="/js/mysql.js"></script>
    <script type="text/javascript" src="js/vendor/underscore-min.js"></script>
    <script type="text/javascript" src="js/vendor/backbone-min.js"></script>

    <? if($site_config['inc']['jquery']) { ?>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <? } // end if jquery ?>

    <? if($site_config['inc']['jquery-ui']) { ?>
	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
      <link href="/css/jquery-ui.css" rel="stylesheet">
    <? } // end if jquery-ui ?>

    <? if($site_config['inc']['google-maps']) { ?>
      <script type="text/javascript"
              src="https://maps.googleapis.com/maps/api/js?key=<?=$site_config['inc']['api_key'];?>&sensor=false">
       </script>
    <? } // end if google-maps ?>
    <!-- END Javascript Includes -->

	  <link rel="icon" type="image/ico" href="/images/favicon.ico"/>
  </head>
