<?php error_reporting(0);
date_default_timezone_set('Asia/Manila');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs; Modified by : Nico Cabral">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/pcic.gif">

    <title>PCIC - IMS</title>

    <!-- Bootstrap CSS -->    
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="Assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="Assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="Assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="Assets/css/style.css" rel="stylesheet">
    <link href="Assets/css/style-responsive.css" rel="stylesheet" />

    
</head>
<script language="JavaScript">
var message="You are not authorized to use this!!!";

function cLick_All() {if (document.all) {alert(message);return false;}}
function clickDis(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {alert(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickDis;}
else{document.onmouseup=clickDis;document.oncontextmenu=cLick_All;}

document.oncontextmenu=new Function("return false")
// --> 
</script>
  