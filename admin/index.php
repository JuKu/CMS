<?php
session_start();
?>

<?php

require("../CMS/classes/User.php");

require("../CMS/classes/Database.php");
require("../CMS/classes/Lang.php");
require("../CMS/classes/Settings.php");
require("../CMS/classes/DBManager.php");
require("../CMS/classes/Config.php");
require("../CMS/classes/SkinController.php");

$config_ = new Config("../config.ini");
$DBManager = new DBManager($config_->getConfig());

if (!$DBManager->isInit() || !$DBManager->getDBDriver()) {
    echo "Ein Fehler ist aufgetreten.";
    exit;
}

$db = $DBManager->getDBDriver();
$db->connect($config_->getConfig());

$user = new User("loginformular.php");

if (isset($_REQUEST['option']) && $_REQUEST['option'] == "logout") {
    $user->logout();
}

if ($user->islogin()) {
    
    //
    echo "<h1>Herzlich Willkommen " . $user->getName() . "</h1>";
    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN\" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title>Admin-Bereich</title>
</head>
<body>
<?php

if (!$user->islogin()) {
    $user->login();
}

if ($user->islogin()) {
    $user->AdminPage();
} else {
    echo "</body></html>";
    exit;
}

?>
</body>
</html>