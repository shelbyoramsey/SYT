<?php
error_reporting(-1);
ini_set("display_errors", true);

spl_autoload_register(function($className){
    // First attempt to find the file inside the library
    $filename = str_replace("//","/","library/$className.php");
    // Test if the file exists, if so, go ahead and include it
    if(is_file($filename)) require_once($filename);
    
    // If you didnt find the file in the library, then try looking in the project's objects
    $filename = str_replace("//","/","objects/$className.php");
    // Test if the file exists, if so, go ahead and include it
    if(is_file($filename)) require_once($filename);
});

// Home Page
Route::match("/", function(){
    Render::page("page_home.php", []);
});

// Default Route (404)
Render::page("error_404.php", [
    "error" => "Error 404: page not found :("
]);

print(render_template(__DIR__."/templates/page_skeleton.php", ["content" => $template]));