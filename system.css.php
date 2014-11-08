<?php
ob_start('ob_gzhandler');
header("Content-type: text/css");
switch($_REQUEST['x']){

    ///------------------------------------- System Authentication ------------------------------------
    case 'admin':
        require('system/sys-references/css/admin.style.css');
    break;
    case 'mainHome':
        require('system/sys-references/css/home.style.css');
    break;
    
    case 'navigationStyle1':
        require('system/sys-references/css/navigation-style-1.css');
    break;
    case 'navigationStyle2':
        require('system/sys-references/css/navigation-style-2.css');
    break;
    case 'navigationStyle3':
        require('system/sys-references/css/navigation-style-3.css');
    break;
    case 'navigationStyle4':
        require('system/sys-references/css/navigation-style-4.css');
    break;
    case 'prettyPhoto':
        require('system/sys-references/css/prettyPhoto.css');
    break;
    case 'style':
        require('system/sys-references/css/style.css');
    break;
    case 'bxslider':
        require('system/sys-references/css/jquery.bxslider.css');
    break;
}

ob_end_flush();?>