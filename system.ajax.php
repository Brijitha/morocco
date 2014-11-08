<?php
ob_start();
header('content-type: application/json');
if(!isset($_REQUEST['x'])){exit();}
switch($_REQUEST['x'])
{

    ///---------------------------------------- Webpage home ---------------------------------------
    case 'adminLogin':
        require('system/sys-core/ajax/admin.ajax.php');
    break;
    
    case 'editorLogin':
        require('system/sys-core/ajax/editor.ajax.php');
    break;
    case 'magazinePublisher':
        require('system/sys-core/ajax/magazine.publisher.ajax.php');
    break;

    case 'magazineSection':
        require('system/sys-core/ajax/magazine.sections.ajax.php');
    break;
     
    case 'magazineTopics':
        require('system/sys-core/ajax/magazine.topics.ajax.php');
    break;
    case 'getImagesFromDIR':
        require('system/sys-core/ajax/getImage.ajax.php');
    break;
    case 'editorTopics':
        require('system/sys-core/ajax/editor.topics.ajax.php');
    break;
    case 'uploadIMG':
        require('system/sys-core/ajax/uploadImages.ajax.php');
    break;
 }
ob_flush(); ?>