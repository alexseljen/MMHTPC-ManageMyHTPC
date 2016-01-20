<?php
/*
* DO NOT CHANGE THIS FILE!
* The settings are all in config.ini.php
*/
include_once('classes/check.class.php');
try {
    $config = parse_ini_file('config.ini.php', true);
} catch(Exception $e) {
    die('<b>Unable to read config.ini.php. Did you rename it from config.ini.php-example?</b><br><br>Error message: ' .$e->getMessage());
}


function menuItems($config) {
    if (empty($standardmenu)) $standardmenu = '';
    if (empty($dropdownmenu)) $dropdownmenu = '';
    if (empty($ddhiddenmenu)) $ddhiddenmenu = '';
    if (empty($hiddenmenu)) $hiddenmenu = '';
    if (empty($enabledropdown)) $enabledropdown = '';
    foreach ($config as $keyname => $section) {
        if(($keyname == "general")) {
            if(isset($section["enabledropdown"]) && ($section["enabledropdown"]=="true")) { $enabledropdown = "true"; } else { $enabledropdown = "false"; }
        }

        if(!empty($section["enabled"]) && !($section["enabled"]=="false") && ($section["enabled"]=="true") && !($section["hidden"]=="true") && (!isset($section["dd"]) || $section["dd"]=="false")) {
            if(!empty($section["default"]) && !($section["default"]=="false") && ($section["default"]=="true")) {
                $standardmenu .= "<li><a data-content=\"" . $keyname . "\" class=\"selected\"><span class=\"". $section["icon"] ." fa-lg\"></span> ". $section["name"] ."</a></li>\n";
            } else {
                    $standardmenu .= "<li><a data-content=\"" . $keyname . "\"><span class=\"". $section["icon"] ." fa-lg\"></span> ". $section["name"] ."</a></li>\n";
            }
        }
        if(!empty($section["enabled"]) && !($section["enabled"]=="false") && ($section["enabled"]=="true") && ($section["hidden"]=="true") && (!isset($section["dd"]) || $section["dd"]=="false")) {
            if(in_array($section["security"], $_SESSION['jigowatt']['user_level'])) {
                $hiddenmenu .= "<li><a data-content=\"" . $keyname . "\"><span class=\"". $section["icon"] ." fa-lg\"></span> ". $section["name"] . "</a></li>\n";
            }
        }




        if(isset($section["dd"]) && ($section["dd"]=="true") && !empty($section["enabled"]) && !($section["enabled"]=="false") && !($section["hidden"]=="true") && ($section["enabled"]=="true"))
        {
            $dropdownmenu .= "<li><a data-content=\"". $keyname ."\"><span class=\"". $section["icon"] ."\"></span> ". $section["name"] ."</a></li>\n";
        } else {
            $dropdownmenu .= "";
        }
        if(isset($section["dd"]) && ($section["dd"]=="true") && !empty($section["enabled"]) && !($section["enabled"]=="false") && ($section["hidden"]=="true") && ($section["enabled"]=="true"))
        {
            if(in_array($section["security"], $_SESSION['jigowatt']['user_level'])) {
                $ddhiddenmenu .= "<li><a data-content=\"". $keyname ."\"><span class=\"". $section["icon"] ."\"></span> ". $section["name"] ."</a></li>\n";
            }
        }





        if(!empty($section["login"]) && !($section["login"]=="false") && ($section["login"]=="true")) {
            if(isset($_SESSION['jigowatt']['username'])) {
                $loggedin = "<li><a data-content=\"profile\"><span class=\"fa fa-user\"></span> ". ucfirst($_SESSION['jigowatt']['username']) ."'s Profile</a></li><li><a data-content=\"admin\"><span class=\"fa fa-rocket\"></span> Admin Area</a></li><li><a data-content=\"logout\"><span class=\"fa fa-close\"></span> Logout</a></li>";
            }else{
                $loggedin = "<li><a data-content=\"login\"><span class=\"fa fa-key\"></span> Login</a></li>";
            }
        }
    }

    if($enabledropdown=="true") {
        $item = "<ul class=\"main-nav\"><li class=\"dd\">
        <a><span class=\"fa fa-bars fa-lg\"></span></a>
        <ul class=\"drop-nav\">\n" . $dropdownmenu . $ddhiddenmenu . $loggedin . "</ul></li></ul>\n\n\n<ul class=\"cd-tabs-navigation\"><nav>" .
        $standardmenu . $hiddenmenu .
        "<li><a id=\"reload\" title=\"Double click your app in the menu, or press this button to refresh the current app.\"><span class=\"fa fa-refresh fa-lg\"></span></a></li></ul></nav>";
    } else {
        $item = "<ul class=\"main-nav\"><li class=\"dd\">
        <a><span class=\"fa fa-bars fa-lg\"></span></a>
        <ul class=\"drop-nav\">\n" . $dropdownmenu . $ddhiddenmenu . $loggedin . "</ul></li></ul><ul class=\"cd-tabs-navigation\"><nav>" .
        $standardmenu . $hiddenmenu .
        "<li><a id=\"reload\" title=\"Double click your app in the menu, or press this button to refresh the current app.\"><span class=\"fa fa-refresh fa-lg\"></span></a></li></ul></nav>";
    }
    return $item;
}

function getTitle($config){
    if (empty($item)) $item = 'Manage My HTPC';
    foreach ($config as $keyname => $section) {
        if(($keyname == "general")) {
            $item = $section["title"];
            break;
        }
    }
    return $item;
}


function frameContent($config) {
    if (empty($item)) $item = '';
    foreach ($config as $keyname => $section) {
        if(!empty($section["landingpage"]) && !($section["landingpage"]=="false") && ($section["landingpage"]=="true")) {
            $section["url"] = "?landing=" . $keyname;
        }

        if(!empty($section["enabled"]) && !($section["enabled"]=="false") && ($section["enabled"]=="true")) {
            if(!empty($section["default"]) && !($section["default"]=="false") && ($section["default"]=="true")) {
                $item .= "\n<li data-content=\"". $keyname . "\" class=\"selected\">\n<iframe allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"auto\" src=\"". $section["url"] . "\"></iframe>\n</li>\n";
            } else {
                $item .= "\n<li data-content=\"". $keyname . "\">\n<iframe allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"auto\" data-src=\"". $section["url"] . "\"></iframe>\n</li>\n";
            }

        }
        if(!empty($section["login"]) && !($section["login"]=="false") && ($section["login"]=="true")) {
            $item .= "\n<li data-content=\"". $keyname . "\">\n<iframe allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"auto\" data-src=\"". $section["url"] . "\"></iframe>\n</li>\n";
        }
    }
    return $item;
}


function landingPage($config, $keyname) {
    $item = "
    <html lang=\"en\">
    <head>
    <title>". $config[$keyname]["name"] ."</title>
    <link rel=\"stylesheet\" href=\"css/landing.css\">
    </head>
    <body>
    <div class=\"login\">
        <div class=\"heading\">
            <h2><span class=\"". $config[$keyname]["icon"] ." fa-3x\"></span></h2>
            <section>
                <a href=\"". $config[$keyname]["url"] ."\" target=\"_self\" title=\"Launch ". $config[$keyname]["name"] ."!\"><button class=\"float\">Launch ". $config[$keyname]["name"] ."</button></a>
            </section>
        </div>
     </div>
     </body></html>";
    if (empty($item)) $item = '';
    return $item;
}

if(isset($_GET['landing'])) {
    $keyname = $_GET['landing'];
    echo landingPage($config, $keyname);
    die();
}
?>
