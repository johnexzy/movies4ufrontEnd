<?php
require "vendor/autoload.php";
use Src\Components\Layout;

$movies = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/videos/"), true);
$series = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/series/"), true);
$audios =  json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/music/"), true);
$albums = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/album/"), true);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="Leccel.net">
  <meta name="description" content="Get the latest movies, music and series for free. Best Movie Plug">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Leccel</title>
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

  <!-- End plugin css for this page -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />

  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
      /* ul li{
          
          list-style-type: none;
          
          background-color: #4d7cff;
          border-radius: 4px;
          box-shadow: 2px 1px 2px 1px;
          
      }
      ul li a {padding: 12px 5px;
          margin: 5px 0;
          color:#fff;
          text-decoration: none;
          font-weight: 500;
      } */
  </style>
  <!-- endinject -->
</head>

<body >
  <div class="container-scroller">
    <div class="main-panel">
      <!-- partial:partials/_navbar.html -->
      <!-- partial -->
      <!-- NavBar -->
      <?=Layout::navBar(); ?>
      <div class="content-wrapper">
        <div class="container">
          <div class="d-flex justify-content-center text-light text-center m-3" data-aos="fade-down">
            <h3 class="text-uppercase font-weight-600 shadow">
              SiteMap GUI for Leccel.net
            </h3>
          </div>
          <div class="row">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            SiteMap for Music
                        </h3>
                    </div>
                    <div class="card-body">
                        <ul class="vertical-menu">
                            <?php
                            foreach ($audios as $key => $music) {
                                echo<<<HTML
                                    <li>
                                        <a href="/view/music/$music[short_url]">$music[music_name]</a>
                                    </li>
                                HTML;
                            }
                            ?>
                        </ul>
                        
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            SiteMap for Movies
                        </h3>
                    </div>
                    <div class="card-body">
                        <ul class="vertical-menu">
                            <?php
                            foreach ($movies as $key => $movie) {
                                echo<<<HTML
                                    <li>
                                        <a href="/view/movies/$movie[short_url]">$movie[video_name]</a>
                                    </li>
                                HTML;
                            }
                            ?>
                        </ul>
                        
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            SiteMap for Series
                        </h3>
                    </div>
                    <div class="card-body">
                        <ul class="vertical-menu">
                            <?php
                            foreach ($series as $key => $serie) {
                                echo<<<HTML
                                    <li>
                                        <a href="/view/series/$serie[short_url]">$serie[series_name]</a>
                                    </li>
                                HTML;
                            }
                            ?>
                        </ul>
                        
                    </div>
                </div>
              </div>
          </div>
        </div>
        
      </div>
    </div>
      <!-- container-scroller ends -->
  </div>
      <!-- begin footer -->
      <?=Layout::footer() ?>
      <!-- end footer -->
  <!-- End custom js for this page-->
</body>

</html>