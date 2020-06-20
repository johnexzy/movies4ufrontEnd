<?php
require '../vendor/autoload.php';

use Src\Album\getAlbum;
use Src\Movie\getMovie;
$uri           = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri           = explode('/', $uri);
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($uri[2] == 'movies') {
    if (isset($uri[3])) {
        $short_url = (String)$uri[3];
        $movieView = new getMovie($short_url);
        echo($movieView->bodyParser());
    } else {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
    
}
elseif ($uri[2] == 'albums') {
    if (isset($uri[3])) {
        $short_url = (String)$uri[3];
        $movieView = new getAlbum($short_url);
        echo($movieView->bodyParser());
    } else {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
    

    // pass the request method and user ID to the CarouselController and process the HTTP request:
    // $news = new ViewController($dbConnection, $short_url, $id, "../../", $uri[2]);
    // echo($news->showView());
} else {
    header("HTTP/1.1 404 Not Found");
    exit();
}
