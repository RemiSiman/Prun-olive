<?php 

define('CFG_DB_DSN', 'mysql://root@localhost/prunolive');

define('LIB_DIR',  dirname(__FILE__).'/../lib/');
define('CFG_DIR',  dirname(__FILE__).'/');
define('WEB_DIR',  dirname(__FILE__).'/../web/');
define('HTML_DIR', dirname(__FILE__).'/../html/');

require_once(LIB_DIR.'vendor/doctrine/Doctrine.php');
spl_autoload_register(array('Doctrine_Core', 'autoload'));

$conn = Doctrine_Manager::connection(CFG_DB_DSN);
