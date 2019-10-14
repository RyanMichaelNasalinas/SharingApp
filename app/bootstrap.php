<?php
//Load Config File
    require_once 'config/config.php';
//Load Help File    
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

//Auto Load files and classes in Libraries folder
spl_autoload_register(function($className){
    require_once 'libraries/'. $className .'.php';
});