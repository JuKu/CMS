<?php

if (isset($_REQUEST['option']) && $_REQUEST['option'] == "edit") {

    $error = 0;
    
    echo "<br /><br />";
    
    if (isset($_POST['style']) && !empty($_POST['style'])) {
        $style = $db->escape($_POST['style']);
    } else {
        echo "<b style=\"color:red; \">" . $lang['ERROR_NO_STYLE'] . "</b><br />";
        $error = 1;
    }
    
    if (isset($_POST['language']) && !empty($_POST['language'])) {
        $language_ = $db->escape($_POST['language']);
    } else {
        echo "<b style=\"color:red; \">" . $lang['ERROR_NO_LANGUAGE'] . "</b><br />";
        $error = 1;
    }
    
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $title = $db->escape($_POST['title']);
    } else {
        $title = "";
    }
    
    if (isset($_POST['comments']) && !empty($_POST['comments'])) {
        $comments = $db->escape($_POST['comments']);
    } else {
        echo "<b style=\"color:red; \">" . $lang['ERROR_NO_COMMENT'] . "</b><br />";
        $error = 1;
    }
    
    if (isset($_POST['guest_userid']) && !empty($_POST['guest_userid'])) {
        $guest_userid = $db->escape($_POST['guest_userid']);
    } else {
        echo "<b style=\"color:red; \">" . $lang['ERROR_NO_GUEST_USERID'] . "</b><br />";
        $error = 1;
    }
    
    if (isset($_POST['who_can_commit']) && !empty($_POST['who_can_commit'])) {
        $who_can_commit = $db->escape($_POST['who_can_commit']);
    } else {
        echo "<b style=\"color:red; \">" . $lang['ERROR_NO_WHO_CAN_COMMIT'] . "</b><br />";
        $error = 1;
    }
    
    if (isset($_POST['page_settings_commit']) && !empty($_POST['page_settings_commit'])) {
        $page_settings_commit = $db->escape($_POST['page_settings_commit']);
    } else {
        echo "<b style=\"color:red; \">" . $lang['ERROR_NO_PAGE_SETTINGS_COMMIT'] . "</b><br />";
        $error = 1;
    }
    
    if (isset($_POST['breadcrump']) && !empty($_POST['breadcrump'])) {
        $breadcrump = $db->escape($_POST['breadcrump']);
    } else {
        echo "<b style=\"color:red; \">" . $lang['ERROR_NO_BREADCRUMP'] . "</b><br />";
        $error = 1;
    }
    
    if (isset($_POST['breadcrump_text']) && !empty($_POST['breadcrump_text'])) {
        $breadcrump_text = $db->escape($_POST['breadcrump_text']);
    } else {
        $breadcrump_text = "";
    }
    
    if ($error == 0) {
        
        $setting['selectedskin'] = $style;
        $setting['language_token'] = null;
        
        $sql = "SELECT * FROM `" . TABLE_LANGUAGE . "` WHERE `name` = '" . $language_ . "'; ";
        $db_erg = $db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
        
        while ($zeile = $db->fetch_array($db_erg)) {
            $setting['language_token'] = $zeile['token'];
        }
        
        if ($setting['language_token'] == null) {
            echo "" . $lang['ERROR_LANGUAGE_WASNT_FOUND'];
            $error = 1;
        }
        
        $setting['title'] = $title;
        
        if ($comments == $lang['OPTION_ON']) {
            $setting['comments'] = 1;
        } else if ($comments == $lang['OPTION_WAIT']) {
            $setting['comments'] = 2;
        } else {
            $setting['comments'] = 0;
        }
        
        $setting['guest_userid'] = $guest_userid;
        
        if ($who_can_commit == $lang['OPTION_EVERYBODY']) {
            $setting['who_can_comment'] = 1;
        } else if ($who_can_commit == $lang['OPTION_LOGIN_USER']) {
            $setting['who_can_comment'] = 2;
        } else if ($who_can_commit == $lang['OPTION_ADMIN']) {
            $setting['who_can_comment'] = 3;
        } else {
            $setting['who_can_comment'] = 4;
        }
        
        if ($page_settings_commit == $lang['OPTION_YES']) {
            $setting['page_settings_comment'] = 1;
        } else {
            $setting['page_settings_comment'] = 0;
        }
        
        if ($breadcrump == $lang['OPTION_YES']) {
            $setting['breadcrump'] = 1;
        } else {
            $setting['breadcrump'] = 0;
        }
        
        $setting['breadcrump_text'] = $breadcrump_text;
        
        if ($error == 0) {
            
            foreach ($setting as $property=>$value) {
                Settings::setSetting($property, $value);
            }
            
            echo "<b style=\"color:green; \">" . $lang['SAVE_SETTINGS_OK'] . "</b>";
            
        } 
        
    }
    
}

?>

<div>

<table border="1" style="border-color:#808080; border:1px #808080; ">

<tr>
    <td style="min-width:600px; " class="spalte1"><!-- Eig. Seite -->
    
    <h2>Einstellungen</h2><br />
    
    <form action="index.php?include=Settings.php&amp;option=edit" method="post">
    
    <table border="1" frame="box" style="margin:20px; background-color:#DB842C; /*#8C541C*//*color:#247BD3; *//*#8C541C*/" class="table1">
    
    <style type="text/css">
    
    input, option, select  {
        background-color:/*#8C541C*/#FFFF45;
        min-width:150px;
        
        border:1px thin #8C541C;
        /*border-color:#8C541C;*/
    }
    
    option, select {
        min-width:134px;
    }
    
    tr, td {
        margin-bottom:40px;
        margin:50px;
    }
    
    table, td, tr {
        border-bottom:2px thin #8C541C;
    }
    
    thead {
        background-color:#8C541C;
        color:white;
    }
    
    .table1 {
        border:1px thin #800000;
    }
    
    .spalte1 {
        background-color: #FFCA53/*#E98E33*//*#B66E26*//*#8C541C*//*#FFFF45*/;
    }
    
    .spalte2 {
        background-color: #FFCA53;
        text-align:left;
    }
    
    </style>
    
    <thead>
        <tr>
            <td width="400">Einstellung</td>
            <td width="200">Wert</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><br /></td>
            <td><br /></td>
        </tr>
        <tr>
            <td><b>Ausgew&auml;hlter Style:</b><br />
            Hier k&ouml;nnen Sie einen Style ausw&auml;hlen, der angezeigt werden soll.<br />Dieser Style muss zuvor installiert sein.</td>
            <td>
            
            <select name="style" size="1">
                <?php
                
                $sql = "SELECT * FROM `" . TABLE_STYLES . "`; ";
                $db_erg = $db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
                
                while ($zeile = $db->fetch_array($db_erg)) {
                    echo "<option>" . $zeile['name'] . "</option>";
                }
                
                ?>
            </select>
            
            </td>
        </tr>
        <tr>
            <td><b>Sprache:</b><br />
            Hier k&ouml;nnen Sie die Sprache ausw&auml;hlen, die genutzt werden soll.</td>
            <td>
            
            <select name="language" size="1">
                <?php
                
                $lang_ = Settings::getSetting("language_token");
                
                $sql = "SELECT * FROM `" . TABLE_LANGUAGE . "` WHERE `activated` = '1'; ";
                $db_erg = $db->query($sql) or die($lang['ERROR_DATABASE_QUERY'] . mysql_error());
                
                while ($zeile = $db->fetch_array($db_erg)) {
                    
                    if ($zeile['token'] == $lang_) {
                        echo "<option selected=\"selected\">" . $zeile['name'] . "</option>";
                    } else {
                        echo "<option>" . $zeile['name'] . "</option>";
                    }
                    
                }
                
                ?>
            </select>
            
            </td>
        </tr>
        <tr>
            <td><b>Titel: </b><br />
            Geben Sie hier den Webseiten-Titel an, wie er oben auf allen Seitem angezeigt werden soll.</td>
            <td><input type="text" name="title" value="<?php echo Settings::getSetting("title"); ?>" /></td>
        </tr>
        <tr>
            <td><b>Kommentar-Funktion: </b><br />
            Geben Sie hier an, ob Sie die Kommentar-Funktion ein oder ausschalten wollen.<br /><br /><b>Achtung!: </b><br />Wenn Sie diese Funktion ausschalten, werden weitere Einstellungen zu dieser Option evtl. ausgeblendet.</td>
            <td>
                <select name="comments" size="1">
                
                <?php
                
                $comments = Settings::getSetting("comments");
                
                ?>
                
                    <option<?php if ($comments == '1') { echo " selected=\"selected\""; } ?>>Eingeschaltet</option>
                    <option<?php if ($comments == '0') { echo " selected=\"selected\""; } ?>>Ausgeschaltet</option>
                    <option<?php if ($comments == '2') { echo " selected=\"selected\""; } ?>>Mit Warteschlange</option>
                </select>
            </td>
        </tr>
        <tr>    
            <td><b>Gast-Account UserId: </b><br />
            Der Gast-Zugang ist haupts&auml;chlich f&uuml;r die Kommentar-Funktion vorhanden, damit auch User, die nicht eingeloggt sind, Kommentare schreiben k&ouml;nnen.</td>
            <td><input type="text" name="guest_userid" value="<?php echo Settings::getSetting("guest_userid"); ?>" /></td>
        </tr>
        <tr>
            <td><b>Wer darf Kommentare schreiben?: </b><br />
            Gib hier an, wer Kommentare schreiben darf.</td>
            <td>
                <select name="who_can_commit" size="1">
                
                <?php
                
                $who_can_commit = Settings::getSetting("who_can_comment");
                
                ?>
                
                    <option<?php if ($who_can_commit == '1') { echo " selected=\"selected\""; } ?>>Jeder</option>
                    <option<?php if ($who_can_commit == '2') { echo " selected=\"selected\""; } ?>>Angemeldete Benutzer</option>
                    <option<?php if ($who_can_commit == '3') { echo " selected=\"selected\""; } ?>>Administratoren</option>
                    <option<?php if ($who_can_commit == '4') { echo " selected=\"selected\""; } ?>>Seitengr&uuml;nder</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><b>Kommentar-Einstellungen bei &quot;Seite bearbeiten&quot; anzeigen: </b><br />
            Geben Sie hier an, ob die Kommentar-Einstellungen angezeigt werden sollen, wenn jemand die Seite bearbeitet.</td>
            <td>
                <select name="page_settings_commit" size="1">
                <?php
                
                $page_settings_commit = Settings::getSetting("page_settings_comment");
                
                ?>                
                    <option<?php if ($page_settings_commit == '1') { echo " selected=\"selected\""; } ?>>Ja</option>
                    <option<?php if ($page_settings_commit == '0') { echo " selected=\"selected\""; } ?>>Nein</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><b>Breadcrump-Navigation: </b><br />
            Die Breadcrump-Navigation ist die Navigation ganz oben auf einer Seite, die die Seiten und ihre Unterseiten anzeigt.</td>
            <td>
                <select name="breadcrump" size="1">
                <?php
                
                $breadcrump = Settings::getSetting("breadcrump");
                
                ?>
                    <option<?php if ($breadcrump == '1') { echo " selected=\"selected\""; } ?>>Ja</option>
                    <option<?php if ($breadcrump == '0') { echo " selected=\"selected\""; } ?>>Nein</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><b>Breadcrump-Text: : </b><br />
            Hier k&ouml;nne Sie einen Text eingeben, der vor der Breadcrump-Navigation erscheinen soll.</td>
            <td><input type="text" name="breadcrump_text" value="<?php echo Settings::getSetting("breadcrump_text"); ?>" /></td>
        </tr>
        <tr>
            <td><b>Speichern: </b></td>
            <td><input type="submit" name="Absenden" value="Einstellungen speichern" /></td>
        </tr>
        
    </tbody>
    
    </table>
    
    </form>
    
    </td>
    <td width="150" class="spalte2" valign="top"><!-- Rand-Leiste --><br /><br />
    <br /><div style="margin:10px; "><img src="../<?php echo $iconsets->getIconPath(); ?>/information.png" alt="Icon-Information" />&nbsp;&nbsp; In dieser Seite kannst du grundlegende Einstellungen &auml;ndern.<br />
    Wenn du Einstellungen &auml;nderst, kann es nat&uuml;rlich auch sein, das dann weitere Einstellungen zu einer bestimmten Funktion bei anderen Seiten nicht angezeigt werden, z.B. wenn man die Kommentar-Funktion ausschaltet, werden weitere Einstellungen zu dieser Funktion auch bei anderen Seiten nicht angezeigt, da die Funktion ja eh ausgeschalten ist.</div></td>
</tr>

</table>

</div>