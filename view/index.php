<?php
require '../vendor/autoload.php';

use Src\Album\getAlbum;
use Src\Movie\getMovie;
use Src\Music\getMusic;

$uri           = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri           = explode('/', $uri);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$notFound = \file_get_contents(__DIR__."\..\pages/404new.html", true);
if ($uri[2] == 'movies') {
    if (isset($uri[3]) && strlen($uri[3]) > 3) {
        $short_url = (String)$uri[3];
        $movieView = new getMovie($short_url);
        echo($movieView->bodyParser());
    } else {
        echo <<<HTML
          $notFound
      HTML;
  }
    
}
elseif ($uri[2] == 'albums') {
    if (isset($uri[3]) && strlen($uri[3]) > 3) {
        $short_url = (String)$uri[3];
        $movieView = new getAlbum($short_url);
        echo($movieView->bodyParser());
    } else {
        echo <<<HTML
          $notFound
      HTML;
  }

}
elseif ($uri[2] == 'music') {
    if (isset($uri[3])  && strlen($uri[3]) > 3) {
        $short_url = (String)$uri[3];
        $movieView = new getMusic($short_url);
        echo($movieView->bodyParser());
    } else {
          echo <<<HTML
            $notFound
        HTML;
    }

}
 else {
          echo <<<HTML
            $notFound
        HTML;
}
