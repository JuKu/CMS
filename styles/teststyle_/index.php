<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN\" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
<title>{TITLE}</title>
{HEADER}
<style type="text/css">
@import "{STYLEPATH}/style.css";
/*@import url("erweitert.css");
@import url("druck.css") print, embossed;
@import url("pocketcomputer.css") handheld;
@import url("normal.css") screen;*/
</style>
</head>
<body>
<div class="website">

<div class="head">
<img src="styles/teststyle/header.png" alt="CMS-Logo" /><img src="styles/teststyle/slogan.png" alt="Slogan" />
</div>
<!-- <div style="background-color:#4C1E1E; color:#B3E1E1; min-height:40px; ">
{WEBSITETITLE}
</div> -->
<div class="title">
{WEBSITETITLE}
</div>
<!-- Datei: default2/index.php -->
<div id="content">
<div id="breadcrump">
<b>{BREADCRUMP_TEXT}</b> {BREADCRUMP}
</div>
<div style="width:100%; height:8px; background-color:#FFCB04; ">
&nbsp;
</div>
<br />
<div id="menu" style="margin:10px; ">
{MENU}
</div>
<div id="text">
<div style="margin:10px; ">
{CONTENT}

<br /><br />

<div class="comments">
{COMMENTS}
</div>
</div>
</div>
</div>

<!-- <div id="menu">
</div> -->

<div id="footer">
<center><b>{COPYRIGHT}</b></center>
</div>

</div>
</body>
</html>