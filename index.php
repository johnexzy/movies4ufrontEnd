<?php

use Src\Components\Layout;

require "vendor/autoload.php";
$movies = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/videos/limit/10"), true);
$series = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/series/limit/10"), true);
$audios =  json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/music/limit/9"), true);

//trending music
$TrendingMusic = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/music/popular/10"), true);

$firstmovie = "";
$secondMovie = "";

      
foreach ($movies as $i=>$movie) {
  $short_url = $movies[$i]["short_url"];
  $image = $movies[$i]["images"][0];
  $cat = $movies[$i]["category"];
  if ($i <= 1) {
    
    $firstmovie .=<<<HTML
        <div class="col-sm-6 grid-margin">
            <div class="position-relative">
                <a href="/view/movies/$short_url" style="text-decoration:none; color: inherit">
                <div class="rotate-img">
                    <img src="http://127.0.0.1:8090/$image" alt="thumb" style="border-radius:10px" class="img-fluid" />
                </div>
                </a>
                <div class="badge-positioned w-90">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge badge-danger font-weight-bold">$cat</span>
                    <div class="video-icon">
                    <a href="/view/movies/$short_url" style="text-decoration:none; color: inherit"><i class="mdi mdi-play"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    HTML;
  }
  if ($i >= 2 && $i <=3) {
    $secondMovie .=<<<HTML
        <div class="col-sm-6 grid-margin">
            <div class="position-relative">
                <a href="/view/movies/$short_url" style="text-decoration:none; color: inherit">
                <div class="rotate-img">
                    <img src="http://127.0.0.1:8090/$image" alt="thumb" style="border-radius:10px" class="img-fluid" />
                </div>
                </a>
                <div class="badge-positioned w-90">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge badge-danger font-weight-bold">$cat</span>
                    <div class="video-icon">
                    <i class="mdi mdi-play"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
    HTML;
  }
    
}

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
  <!-- endinject -->
</head>

<body >
  <div class="container-scroller">
    <div class="main-panel">
      <!-- partial:partials/_navbar.html -->
      

      <!-- partial -->
      <!-- NavBar -->
      <?=Layout::navBar(); ?>
      <!-- NavBar Ends -->

      <div class="content-wrapper">
        <div class="container">

        </div>
        <div class="container">
          <div class="d-flex justify-content-center text-light text-center m-3" data-aos="fade-down">
            <h3 class="text-uppercase font-weight-600 shadow">
              Get the Latest Movies, Music and Series for Free on Leccel.net
            </h3>
          </div>
          <div class="row" data-aos="fade-up">
            <div class="col-lg-4 grid-margin stretch-card">
              <div class="row" >
                <div class="col-sm-12 grid-margin" data-aos="fade-left">
                  <div class="card">
                    <div class="card-header font-weight-bold">
                      <i class="mdi mdi-menu mr-4"></i> Category
                    </div>
                    <div class="card-body">
                      
                      <ul class="vertical-menu text-dark">
                        <li class="shadow"><a href="pages/music.html"><i class="mdi mdi mdi-music mr-2"></i> MUSIC</a></li>
                        <li class="shadow"><a href="pages/movies.html"><i class="mdi mdi mdi-video mr-2"></i> MOVIES</a></li>
                        <li class="shadow"><a href="pages/series.html"><i class="mdi mdi mdi-movie mr-2"></i> SERIES</a></li>
                        <li class="shadow"><a href="pages/albums.html"><i class="mdi mdi mdi-album mr-2"></i> ALBUMS</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 grid-margin stretch-card"  data-aos="fade-down">
                  <div class="card shadow-lg">
                    <div class="card-header font-weight-bold">
                    <i class="mdi mdi-trending-up" ></i> Trending Music 
                    </div>
                    <div class="card-body">
                      <?php
                        foreach ($TrendingMusic as $key => $music) {
                          $short_url = $music["short_url"];
                          echo<<<HTML
                              <div
                                  class="d-flex justify-content-start border-bottom mb-4 mt-4" 
                                  style="cursor:pointer"
                                  >
                                  <input type="hidden" value="/view/music/$short_url">
                                  <a 
                                    class="h3 font-weight-200 mb-0" 
                                    href="/view/music/$short_url"
                                    style="text-decoration:none; color: inherit"
                                    ><i class="mdi mdi-star-circle text-danger"></i>
                                      <h4 class=" d-inline font-weight-200 mb-0">
                                          $music[music_name]
                                      </h4>
                                      <p class="L5 mb-0">
                                        <i class="mdi mdi-artist"></i>
                                        <span class="fs-16 mr-2 text-muted ml-1">$music[artist]</span>
                                      </p>
                                  </a>
                              </div>
                          HTML;
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              
            
            <div class="col-lg-8  grid-margin" data-aos="fade-up">
            <div class="card ">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                  
                    <div class="card-title">
                      <i class="mdi mdi-chart-line"></i> Latest Music
                    </div>
                    <a 
                      class="mb-2 btn btn-outline-light btn-primary btn-info"
                      style="font-size: 16px;" 
                      href="pages/music.html">
                      Go to Music <b class="mdi">&RightArrow;</b>
                    </a>
                  </div>
                  
                </div>
                <div class="card-body">
                  <div class="row">
                    
                    <div class="col-xl-12">
                      <div class="row">
                        <?php
                            foreach ($audios as $music) {
                              $image = $music["images"][0];
                              $short_url = $music["short_url"];
                              $commentCount = count($music["comments"]);
                                echo<<<HTML
                                    <div class="col-md-4 grid-margin stretch-card">
                                      <div class="card card-rounded shadow music">
                                        <a href="/view/music/$short_url"
                                           class="text-decoration-none">
                                            <div class="card-img-holder">
                                              <img src="http://127.0.0.1:8090/$image" alt="" class="card-img">
                                            </div>
                                        </a>
                                        
                                        <div class="card-body p-2" style="background:#eee;">
                                        <a 
                                          class="h3 mb-0" 
                                          href="/view/music/$short_url"
                                          style="text-decoration:none; color: inherit"
                                          >
                                            <h3 class="font-weight-200 mb-2" style="color:#561529">
                                              (Download MP3) - $music[music_name]
                                            </h3>
                                            </a>
                                            <div class="d-flex justify-content-between">
                                              <p class="d-inline L5 mb-0">
                                                <i class="mdi mdi-artist"></i>
                                                <a 
                                                  href="/view/search/$music[artist]"
                                                  target="_blank" 
                                                  class="fs-15 text-muted text-decoration-none">
                                                  $music[artist]
                                                  </a>
                                              </p>
                                              <p class="d-inline mb-0">
                                                <i class="mdi mdi-comment"></i>($commentCount)
                                              </p>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                HTML;
                            }
                          ?>
                      </div>
                      <div class="d-flex justify-content-center align-content-center mt-5 mb-0">
                        <a href="/pages/music.html" class="btn btn-info shadow">ALL MUSIC</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          
          <div class="row" data-aos="fade-right">
          
            <div class="col-sm-12 grid-margin">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <p style="font-size: 17px; font-weight: bold;">
                      Movies
                    </p>
                      
                    <a class="mb-2 btn btn-outline-light btn-primary btn-info" style="font-size: 16px;" href="pages/movies.html">
                      Go to Movies <b class="mdi">&RightArrow;</b>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8">
                      
                      <div class="row">
                        <?=$firstmovie?>
                      </div>
                      <div class="row">
                        <?=$secondMovie?>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title">
                          More Videos
                        </div>
                        <a class="mb-2 btn btn-outline-light btn-primary btn-info" href="pages/movies.html">
                          See All Movies
                        </a>
                      </div>
                      <?php
                            for ($i=4; $i < count($movies); $i++) { 
                                $short_url = $movies[$i]["short_url"];
                                $image = $movies[$i]["images"][0];
                                $name = $movies[$i]["video_name"];
                                echo<<<HTML
                                    <div
                                        class="d-flex justify-content-start align-items-center border-bottom pb-2  movieLink" 
                                        style="cursor:pointer"
                                        >
                                        <input type="hidden" value="/view/movies/$short_url">
                                        <div class="div-w-80 mr-3" id="">
                                            <div class="rotate-img">
                                            <img
                                                src="http://127.0.0.1:8090/$image"
                                                alt="thumb"
                                                class="img-fluid"
                                            />
                                            </div>
                                        </div>
                                        <h3 class="font-weight-600 mb-0">
                                            $name
                                        </h3>
                                    </div>
                                HTML;
                            }
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Tv Series -->
          <div class="row" data-aos="fade-right">
            <div class="col-sm-12 grid-margin">
            <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <p style="font-size: 17px; font-weight: bold;">
                      Series
                    </p>
                      
                    <a class="mb-2 btn btn-outline-light btn-primary btn-info" style="font-size: 16px;" href="pages/series.html">
                      Go to Series <b class="mdi">&RightArrow;</b>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  
                  <?php
                    foreach ($series as $key=>$serie) {
                      $image = $serie["images"][0];
                      $border = $key !==9 ? "border-bottom mb-3": "";
                      $serieDetail = (strlen($serie["series_details"]) > 100) ?
                                substr($serie["series_details"], 0, 100)."..." : $serie["series_details"];
                      $totalSeason = count($serie["series"]);
                      echo<<<HTML
                        <a href="/view/series/$serie[short_url]" style="text-decoration:none; color:inherit">
                          <div class="row  $border">
                            <div class="col-sm-4 grid-margin">
                              <div class="position-relative">
                                <div class="rotate-img">
                                  <img src="http://127.0.0.1:8090/$image" alt="thumb" class="img-fluid" />
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-8  grid-margin">
                              <h2 class="mb-2 font-weight-600">
                                $serie[series_name]
                              </h2>
                              
                              
                              <p class="mb-0">
                                $serieDetail
                              </p>
                              <div class="fs-13 mb-2">
                                <span class="mr-2">Total Season: </span><b>$totalSeason</b>
                              </div>
                            </div>
                          </div>
                          </a>
                        HTML;
                    }

                  ?>
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-between align-items-center">
                    
                    <a class="mb-2 btn btn-outline-light btn-primary btn-info" style="font-size: 16px;" href="pages/series.html">
                      View More Series <b class="mdi">&RightArrow;</b>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
      <!-- container-scroller ends -->
      
      <!-- begin footer -->
      <?=Layout::footer() ?>
      <!-- end footer -->
  <!-- End custom js for this page-->
</body>

</html>