<?php
require '../vendor/autoload.php';

use Src\Search\Search;
use Src\Album\getAlbum;
use Src\Movie\getMovie;
use Src\Music\getMusic;
use Src\Season\getSeason;
use Src\Series\getSeries;
use Src\Episode\getEpisode;

$uri           = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri           = explode('/', $uri);
$requestMethod = $_SERVER['REQUEST_METHOD'];
$notFound = \file_get_contents(__DIR__."/../pages/404new.html", true);

/**
 ** View Router**
 * Music
 * Album
 * Movie
 * Series
 */
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
elseif ($uri[2] == 'series') {
    if (count($uri) == 4 && strlen($uri[3]) > 4) {
        $short_url = (String)$uri[3];
        $seriesView = new getSeries($short_url);
        echo($seriesView->bodyParser());
    } elseif (count($uri) == 5) {
        $series_name = $uri[3];
        $season_url = $uri[4];
        $seasonView = new getSeason($season_url, $series_name);
        echo($seasonView->bodyParser());
    } elseif (count($uri) == 6) {
        $series_name = $uri[3];
        $ep_url = $uri[5];
        $ep_view = new getEpisode($ep_url, $series_name);
        echo($ep_view->bodyParser());
    } else {
          echo <<<HTML
            $notFound
        HTML;
    }

}
elseif($uri[2] == "search" && count($uri) > 3){
    $query = (String) $uri[3];
    $searchView = new Search(($query));
    echo($searchView->bodyParser());
}
else {
          echo <<<HTML
            $notFound
        HTML;
}
