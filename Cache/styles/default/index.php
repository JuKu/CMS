<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN\" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title><?php echo $page->getTitle(); ?></title>
<?php $page->getHeader(); ?>
<style type="text/css">
@import "Cache/styles/default/style.css";
/*@import url("erweitert.css");
@import url("druck.css") print, embossed;
@import url("pocketcomputer.css") handheld;
@import url("normal.css") screen;*/
</style>
</head>
<body>
<div style="background-color:#4C1E1E; color:#B3E1E1; min-height:40px; ">
<?php echo $page->getWebsiteTitle(); ?>
</div>
<!-- Datei: default2/index.php -->
<div id="content">
<div id="breadcrump">
<?php echo $page->getBreadcrump(); ?>
</div><br />
<div id="text">
<div style="margin:10px; ">
<?php $page->getContent() ?>
</div>
</div>
</div>
<div id="menu">
<div style="margin:10px; ">
<?php echo $page->getMenu(); ?>
</div>
</div>
</body>
</html>