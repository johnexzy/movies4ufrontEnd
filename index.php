<?php
$movies = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/videos/limit/10"), true);
$series = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/series/limit/10"), true);
$audios =  json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/music/limit/10"), true);
$albums = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/album/limit/10"), true);


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <div class="flash-news-banner">
        <div class="container">
          <div class="d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a href="/">
                  <img src="/assets/images/LECCEL3.png" alt="">
                </a>
              
              <p class="mb-0">
                Get the Latest Movies, Music, Albums Series and more
              </p>
            </div>
            <div class="d-flex mt-3">

              <ul class="social-media mb-3">
                
                <li>
                  <a href="/pages/contactus.html" class=" text-decoration-none">
                    Advertise With Us
                  </a>
                </li>
                <li>
                  <a href="https://www.instagram.com/leccel_net" target="_blank">
                    <i class="mdi mdi-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/Leccel_net" target="_blank">
                    <i class="mdi mdi-twitter"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="content-wrapper" style="background-color: #000;">
        <div class="container">
          <!-- <div class="row" data-aos="fade-up">
            <div class="col-xl-8 stretch-card grid-margin">
              <div class="position-relative">
                <img src="assets/images/dashboard/banner.jpg" alt="banner" class="img-fluid" />
                <div class="banner-content">
                  <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                    global news
                  </div>
                  <h1 class="mb-0">GLOBAL PANDEMIC</h1>
                  <h1 class="mb-2">
                    Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams Postponed, 168 Trains
                  </h1>
                  <div class="fs-12">
                    <span class="mr-2">Photo </span>10 Minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 stretch-card grid-margin">
              <div class="card bg-dark text-white">
                <div class="card-body">
                  <h2>Latest news</h2>

                  <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                    <div class="pr-3">
                      <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                      <div class="fs-12">
                        <span class="mr-2">Photo </span>10 Minutes ago
                      </div>
                    </div>
                    <div class="rotate-img">
                      <img src="assets/images/dashboard/home_1.jpg" alt="thumb" class="img-fluid img-lg" />
                    </div>
                  </div>

                  <div class="d-flex border-bottom-blue pb-4 pt-4 align-items-center justify-content-between">
                    <div class="pr-3">
                      <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                      <div class="fs-12">
                        <span class="mr-2">Photo </span>10 Minutes ago
                      </div>
                    </div>
                    <div class="rotate-img">
                      <img src="assets/images/dashboard/home_2.jpg" alt="thumb" class="img-fluid img-lg" />
                    </div>
                  </div>

                  <div class="d-flex pt-4 align-items-center justify-content-between">
                    <div class="pr-3">
                      <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                      <div class="fs-12">
                        <span class="mr-2">Photo </span>10 Minutes ago
                      </div>
                    </div>
                    <div class="rotate-img">
                      <img src="assets/images/dashboard/home_3.jpg" alt="thumb" class="img-fluid img-lg" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search Tv Series" aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-info" type="button">Search</button>
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up">
            <div class="col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2>Category</h2>
                  <ul class="vertical-menu">
                    <li><a href="pages/movies.html">MOVIES</a></li>
                    <li><a href="pages/series.html">SERIES</a></li>
                    <li><a href="pages/music.html">MUSIC</a></li>
                    <li><a href="pages/albums.html">ALBUMS</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9 stretch-card grid-margin">
              <div class="card stretch-card">
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
          <div class="form-group" data-aos="fade-up">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search Movie ">
              <div class="input-group-append">
                <button class="btn btn-sm btn-info" type="button">Search</button>
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up">
          
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
                        <?php
                            for ($i=0; $i < 2; $i++) { 
                                $short_url = $movies[$i]["short_url"];
                                $image = $movies[$i]["images"][0];
                                $cat = $movies[$i]["category"];
                                echo<<<HTML
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
                        ?>
                      </div>
                      <div class="row">
                      <?php
                            for ($i=2; $i < 4; $i++) {
                                $short_url = $movies[$i]["short_url"];
                                $image = $movies[$i]["images"][0];
                                $cat = $movies[$i]["category"]; 
                                echo<<<HTML
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
                        ?>
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
                                        class="d-flex justify-content-between align-items-center border-bottom pb-2  movieLink" 
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
          <div class="row" data-aos="fade-up">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title">
                          Latest Album
                        </div>
                        <a class="mb-2 btn btn-outline-light btn-primary btn-info" href="pages/albums.html">
                          See All Album
                        </a>
                      </div>
                      
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-sm-6">
                          <?php
                            foreach ($albums as $album) {
                                $albumDetail = (strlen($album["album_details"]) > 100) ?
                                substr($album["album_details"], 0, 100)."..." : $album["album_details"];
                                echo<<<HTML
                                    <div class="border-bottom pb-3 mb-3">
                                        <a href="/view/albums/$album[short_url]" style="text-decoration:none; color:inherit">
                                        <h3 class="font-weight-600 mb-0">
                                            $album[album_name]
                                        </h3>
                                        </a>
                                        <p class="L5 mb-0">
                                            <i class="mdi mdi-artist"></i>
                                            <span class="fs-16 mr-2 text-muted">$album[artist]</span>
                                        </p>
                                        <p class="mb-0">
                                            $albumDetail
                                        </p>
                                    </div>
                                HTML;
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="card-title">
                          Latest Music
                        </div>
                        <a class="mb-2 btn btn-outline-light btn-primary btn-info" href="pages/music.html">See All Music</a>
                      </div>
                      
                      <div class="row">
                        <div class="col-xl-6 col-lg-12 col-sm-6">
                          
                        <?php
                            foreach ($audios as $music) {
                                $musicDetail = (strlen($music["music_details"]) > 100) ?
                                substr($music["music_details"], 0, 100)."..." : $music["music_details"];
                                echo<<<HTML
                                    <div class="border-bottom pb-3 mb-3">
                                        <a href="/view/music/$music[short_url]" style="text-decoration:none; color: inherit">
                                        <h3 class="font-weight-600 mb-0">
                                            $music[music_name]
                                        </h3>
                                        </a>
                                        <p class="L5 mb-0">
                                            <i class="mdi mdi-artist"></i
                                            <span class="fs-16 mr-2 text-muted">$music[artist]</span>
                                        </p>
                                        <p class="mb-0">
                                            $musicDetail
                                        </p>
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
            </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
      <!-- container-scroller ends -->
      
          
      <div class="d-flex align-items-center justify-content-center pad2x">
        <p class="mt-2"> 
          <a href="/pages/aboutus.html">About Us </a> | <a href="/pages/contactus.html">Contact Us</a>
        </p>
      </div>
      <!-- partial:partials/_footer.html -->
      <footer>
        <div class="footer-bottom">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <img src="/assets/images/LECCEL1.png" alt="">
                <div class="d-sm-flex justify-content-between align-items-center">
                  <div class="fs-14 font-weight-600">
                    © 2020 @ <a href="https://www.leccel.net" target="_blank" class="text-white"> Leccel.net</a>. All
                    rights reserved.
                  </div>
                  <div class="fs-14 font-weight-600">
                    Developed by <a href="https://github.com/johnexzy" target="_blank" class="text-white">Johnexzy</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- partial -->
    </div>
  </div>
  <!-- inject:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="/assets/js/demo.js"></script>
  <script src="/assets/js/jquery.easeScroll.js"></script>
  <script src="/assets/js/ajax.js" ></script>
  <script src="/assets/utils.js" ></script>
  <!-- End custom js for this page-->
</body>

</html>