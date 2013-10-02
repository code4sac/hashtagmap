<?
/*
 * jQuery versions here are the versions available on the google hosted jquery.
*/
$site_config = array (
  'mysql' =>
    array (
      'host'      => '192.168.1.150',
      'port'      => '3306',
      'user'      => 'root',
      'pass'      => '0cool',
      'db'        => 'sactags',
			'resType'   => 'object',
			'result'    => false,
			'errors'    => true,
			'debug'	    => true
    ),
  'mail' =>
    array (
      'smtp_host'   => 'smtp.gmail.com',
      'smtp_port'   => '465',
      'mail_from'   => 'kaleb@codeforsacramento.org'
    ),
  'site' =>
    array (
      'title'       => 'Sacramento Hash Tag Map',
      'desc'        => 'Mapping Sacramento hash tags',
			'wwwroot'	    => '',
			'root'		    => '/var/www/hashtagmap',
			'lang'		    => 'en',
			'charset'	    => 'utf-8'
		),
  'inc' => 
    array (
			'jquery'	    => true,
      'jq-ver'      => '2.0.0',
      'jquery-ui'   => true,
      'jq-ui-ver'   => '1.10.3',
			'jquery_theme' => 'smoothness',
      'google-maps' => true,
      //'api_key'   => 'AIzaSyAJsXs9HHywzBcR_JSfcgQeWmrEyaPu28c',
      'api_key'     => 'AIzaSyAdabEmujAwf9QUr-aHiUqpuJggFThhsHY'
    )

);
?>
