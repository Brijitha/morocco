<?php
ob_start('ob_gzhandler');
header("Content-type: text/javascript");
switch($_REQUEST['x']){

    ///------------------------------------- System Authentication -----------------------------------///
    case 'adminLogin':
        require('system/sys-core/javascript/admin.javascript.js');
    break;
    case 'editorLogin':
        require('system/sys-core/javascript/editor.javascript.js');
    break;
    case 'adminMain':
        require('system/sys-core/javascript/admin.main.javascript.js');
    break;
    case 'editorMain':
        require('system/sys-core/javascript/editor.main.javascript.js');
    break;
    case 'adminLangArb':
        require('system/sys-core/lang/arb.admin.lang.js');
    break;
    case 'mainHome':
        require('system/sys-core/javascript/home.main.javascript.js');
    break;
    case 'sticky':
        require('system/sys-core/javascript/jquery.sticky.js');
    break;
    case 'localscroll':
        require('system/sys-core/javascript/jquery.localscroll-1.2.7-min.js');
    break;
    case 'scrollTo':
        require('system/sys-core/javscript/jquery.scrollTo-1.4.2-min.js');
    break;
    case 'touchSwipe':
        require('system/sys-core/javascript/jquery.touchSwipe.min.js');
    break;
    
    case 'parallax':
        require('system/sys-core/javascript/jquery.parallax-1.1.3.js');
    break;
    
    case 'appear':
        require('system/sys-core/javascript/appear.js');
    break;
    
    case 'prettyPhoto':
        require('system/sys-core/javascript/jquery.prettyPhoto.js');
    break;
    
    case 'isotope':
        require('system/sys-core/javascript/isotope.js');
    break;
    
    case 'bxslider':
        require('system/sys-core/javascript/jquery.bxslider.min.js');
    break;
    
    case 'cycleAll':
        require('system/sys-core/javascript/jquery.cycle.all.js');
    break;
    
    case 'maximage':
        require('system/sys-core/javascript/jquery.maximage.js');
    break;
    case 'sscr':
        require('system/sys-core/javascript/sscr.js');
    break;
    
    case 'skrollr':
        require('system/sys-core/javascript/skrollr.js');
    break;
    
    case 'jigowatt':
        require('system/sys-core/javascript/jquery.jigowatt.js');
    break;
    
    case 'scripts':
        require('system/sys-core/javascript/scripts.js');
    break;
    ///------------------------------------- System Authentication ------------------------------------///

}

ob_end_flush();?>