<HTML>
<head>
  <script type="text/javascript" src="javascript/emerge.js"></script>
  <script type="text/javascript" src="javascript/vendor/jquery-2.0.3.min.js"></script>
</head>
<body>

<div id="dumper"></div>
<script type="text/javascript">
  var json = emerge.ajax_get('ajax/twitter.gethashtag.php');
  json = eval('('+json+')');
  console.log(json);

</script>
</body>
</html>
