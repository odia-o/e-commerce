<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'php_class'.DS.'e-commerce');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."functions.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."database_object.php");
require_once(LIB_PATH.DS."pagination.php");
require_once(LIB_PATH.DS."Validator.php");

require_once(LIB_PATH.DS."users.php");
require_once(LIB_PATH.DS."admin.php");
require_once(LIB_PATH.DS."products.php");
require_once(LIB_PATH.DS."user_product.php");
require_once(LIB_PATH.DS."transactions.php");




?>