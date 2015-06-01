<?php
error_reporting(E_ALL & ~E_WARNING);
define('BASEPATH',str_replace('\\','/',pathinfo(__FILE__,PATHINFO_DIRNAME).'/'));
define('CDX' , BASEPATH . 'includes/engine/'.date("Ymd").'.php');
$pageActive = (isset($_GET['page']) && $_GET['page'] != '' && file_exists(BASEPATH . 'includes/pages/page_'.$_GET['page'].'.php')) ? $_GET['page'] : 'dashboard';

define('PAGE_ACTIVE',$pageActive);

require BASEPATH . 'includes/engine/autoload.php';
require BASEPATH . 'includes/templates/template_master.php';

