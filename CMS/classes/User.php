<?php

class User {

private $eingeloggt = false;
private $admin = false;

private $loginformular = "loginformular.php";
private $zurueck_page = "index.php";

    public function User ($loginformular, $lang) {
        $templateengine = new TemplateEngine($lang);
        $this->loginformular = $templateengine->getFile("../", "includes", $loginformular);
    }
    
    public function islogin () {
        if (isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'] == TRUE && !empty($_SESSION['UserID'])) {
            return true;
            $this->eingeloggt = true;
        } else {
            return false;
            $this->eingeloggt = false;
        }
    }
    
    public function login () {
    
    global $db;
    global $lang;
    
        if (isset($_REQUEST['option']) && $_REQUEST['option'] == "login" && !$this->islogin()) {
            $error = 0;
            
            $user = "";
            $password = "";
            
            if (!empty($_REQUEST['user'])) {
                $user = $db->escape($_REQUEST['user']);
            } else {
                echo "<b style=\"color:red; \">" . $lang['ERROR_NO_USERNAME'] . "</b>";
                $error = 1;
            }
            
            if (!empty($_REQUEST['passwort'])) {
                $password = md5($db->escape($_REQUEST['passwort']));
            } else {
                echo "<b style=\"color:red; \">" . $lang['ERROR_NO_PASSWORD'] . "</b>";
                $error = 1;
            }
            
            if ($error == 0) {
                
                $sql = "SELECT * FROM " . TABLE_USERS . " WHERE `name` = '" . $user . "'; ";
                $db_erg = $db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
                
                $i = 0;
                
                while ($zeile = $db->fetch_array($db_erg, MYSQL_ASSOC)) {
                    
                    if ($zeile['password'] == $password) {
                        
                        if ($zeile['activated'] == "1") {
                        
                                //Einloggen
                                $_SESSION['eingeloggt'] = TRUE;
                                $_SESSION['UserID'] = $zeile['id'];
                                $_SESSION['admin'] = $zeile['admin'];
                                $_SESSION['user'] = $zeile['name'];
                                
                                if ($zeile['admin'] == "0") {
                                    $this->admin = false;
                                } else {
                                    $this->admin = true;
                                }
                                
                                echo "<b style=\"color:green; \">" . $lang['LOGIN_OK'] . "</b> <a href=\"" . $this->zurueck_page . "\">" . $lang['BACK'] . "</a>";
                                
                                /*$sql = "UPDATE `user` SET `ip` = '" . $_SERVER['REMOTE_ADDR'] .  "'; ";
                                $db_erg_ = $db->query($sql) or die("Anfrage fehlgeschlagen.");*/
                            
                        } else {
                            echo "<b style=\"color:red; \">" . $lang['ACCOUNT_DEACTIVATED'] . "</b>";
                            require($this->loginformular);
                        }
                        
                    } else {
                        echo "<b style=\"color:red; \">" . $lang['PASSWORD_WRONG'] . "</b>";
                        require($this->loginformular);
                    }
                    
                    $i = $i + 1;
                }
                
                if ($i == 0) {
                    echo "<b style=\"color:red; \">" . $lang['USERNAME_NOT_ISSET'] . "</b>";
                    require($this->loginformular);
                }
                
            } else {
                require($this->loginformular);
            }
            
        } else {
        
            if (isset($_SESSION['eingeloggt']) && $_SESSION['eingeloggt'] == TRUE && !empty($_REQUEST['UserID'])) {
                $this->loadUser();
            } else {
                require($this->loginformular);
            }
            
        }
        
    }
    
    public function logout () {
        global $lang;
        
        session_destroy();
        echo "<b style=\"color:green; \">" . $lang['LOGOUT_OK'] . "</b> <a href=\"" . $this->zurueck_page . "\">" . $lang['BACK'] . "</a>";
    }
    
    public function AdminPage () {
    $this->admin = $_SESSION['admin'];
    
        if ($this->admin == FALSE) {
            echo "<b style=\"color:red; \">Sie haben nicht die Berechtigung f&uuml;r diese Seite!</b></body></html>";
            exit;
        }
    }
    
    public function getName () {
        if ($this->islogin()) {
            return $_SESSION['user'];
        } else {
            return false;
        }
    }
    
    public function getUserId () {
        if ($this->islogin()) {
            return $_SESSION['UserID'];
        } else {
            return false;
        }
    }
    
    private function loadUser () {
        //
    }
    
}

?>