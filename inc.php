<? // Include all files.
// Error Reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);
// Include main site config.
defined('ROOT_PATH') or define('ROOT_PATH', realpath(dirname(__FILE__)));
include(ROOT_PATH.'/conf/site-config.php');

// Include all files below this line ----------------------------------------
include(ROOT_PATH.'/lib/util.php');
include(ROOT_PATH.'/lib/mysqli.php');
include(ROOT_PATH.'/lib/fusion_tables.php');

/* Email setup
 * =========== */
if($site_config['mail']['smtp_host']) {
  ini_set('sendmail_from', $site_config['mail']['mail_from']);
  ini_set('SMTP', $site_config['mail']['smtp_host']);
  ini_set('smtp_port', $site_config['mail']['smtp_port']);
}
