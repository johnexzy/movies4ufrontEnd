<?php
require '../vendor/autoload.php';

// use Src\Controller\ViewController\ViewController;
use Src\Movie\getMovie;
$uri           = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri           = explode('/', $uri);
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($uri[2] == 'movies') {
    if (isset($uri[3])) {
        $short_url = (String)$uri[3];
    } else {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
    $movieView = new getMovie($short_url);
    echo($movieView->bodyParser());
} elseif ($uri[2] == 'news') {
    $id        = null;
    $short_url = null;
    if (isset($uri[3])) {
        if ($requestMethod == "GET") {
            // $short_url = (intval($uri[3]) == 0) ? (String) $uri[3] : null;
            // $id = ($short_url == null) ? (int) $uri[3] : null;
            $short_url = (String)$uri[3];
        }
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
