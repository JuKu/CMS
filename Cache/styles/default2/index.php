<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN\" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title><?php echo $page->getTitle(); ?></title>
<?php $page->getHeader(); ?>
<style type="text/css">
body {
    /*background-color:#9AD7FF;*/
    color:#002EFF;

    background:url("styles/default2/background.jpg") repeat-x;
}

#banner {
    color:#000080;
    border:5px solid #000080;
    
    background:url("styles/default2/banner.gif") repeat-x;
}

#menu {
    float:left;
    position:absolute;
    top:120px;
    left:4px;
    /*background:url("styles/default2/menu.gif") repeat-y;*/
    min-width:150px;
    height:80%;
    min-height:200px;
    border:2px solid #000080;
}

#menu a {
    padding:5px;
    color:/*#000053*/blue;
}

#menu a:hover {
    color:#FFFF5C;
    text-decoration:underline;
}

#seitenleiste {
    float:right;
    position:absolute;
    top:120px;
    right:4px;
    height:80%;
    width:10%;
    
    border:2px solid #000080;
}

#content {
    position:absolute;
    top:120px;
    left:168px;
    width:72%;
    border:2px solid /*#81BECF*/#000080;
    height:80%;
    
    overflow:auto;
    
    /*overflow : auto;
    scrollbar-base-color : #FFCCCC;
    scrollbar-3dlight-color : #FFCCCC;
    scrollbar-highlight-color : #FF9933;
    scrollbar-face-color : #FF9933;
    scrollbar-arrow-color : #FF6600;
    scrollbar-shadow-color : #FCDDCC;
    scrollbar-darkshadow-color : #FF9966;
    scrollbar-track-color : #FCDDCC;*/  
}

#text {
    padding:10px;
}
</style>
</head>
<body>
<!-- Datei: default2/index.php -->

<div id="banner">
<center><h1>Ihre Seite</h1></center>
</div>

<div id="menu">
<center><b>Menu</b></center>
<br /><br />
<?php echo $page->getMenu(); ?>
</div>

<div id="content">
Sie sind hier: <?php echo $page->getBreadcrump(); ?>
<div id="text">
<?php $page->getContent() ?>
</div>
</div>

<div id="seitenleiste">
Seitenleiste
</div>

<br />
<!--  -->

<!--  -->



</html>