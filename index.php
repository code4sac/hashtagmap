<HTML>
<head>
  <script type="text/javascript" src="javascript/emerge.js"></script>
  <script type="text/javascript" src="javascript/vendor/jquery-2.0.3.min.js"></script>
</head>
<body>

<div id="dumper"></div>
<script type="text/javascript">
  var hash_tag = "cfabrigade";
  var json = emerge.ajax_get('ajax/twitter.gethashtag.php?ht='+hash_tag);

  // required to do this eval statement after quering json this way...
  json = eval('('+json+')');
  console.log(json);

</script>
</body>
</html>
