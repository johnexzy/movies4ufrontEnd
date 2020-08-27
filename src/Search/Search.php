<?php 
namespace Src\Search;

use Src\Components\Layout;

class Search{
    private $queryString;
    public function __construct(String $queryString = null) {
        $this->queryString = $queryString;
    }
    /**
     * checks if a url exist with status 200 and return true or false
     */
    public static function is_url_exist(String $url)
    {
      $header = get_headers($url);
      if (strpos($header[0], '404')) {
          return false;
      }
      return true;
    }
    public static function makeRequest($query)
    {
        if (self::is_url_exist("http://127.0.0.1:8090/api/v1/search/$query")) {
          return \file_get_contents("http://127.0.0.1:8090/api/v1/search/$query");
      }
      
      else {
        return \json_encode(
          array(
            "error" => 1
          )
        );
      }
    } 
    public function bodyParser()
    {
        $data = \json_decode(self::makeRequest($this->queryString), true);
        if (isset($data["error"])) {
          $notFound = \file_get_contents(__DIR__."/../../pages/404new.html", true);
          return<<<HTML
            $notFound
        HTML;
        }
        $musicHtml = "";
        $seriesHtml = "";
        $moviesHtml = "";
        foreach ($data["data"] as $key => $group) {
          //Music
          if ($group["group"] == "music") {
            $musicCount = 0;
            foreach ($group["data"] as $key => $music) {
              $musicCount = $key + 1;
              $image = $music["images"][0];
              $musicHtml .=<<<HTML
                <div class="row">
                  <div class="col-sm-4 grid-margin">
                      <a href="/view/music/$music[short_url]" style="text-decoration:none; color: inherit">
                          <div class="rotate-img">
                              <img
                              src="http://127.0.0.1:8090/$image"
                              alt="banner"
                              class="img-fluid"
                              />
                          </div>
                      </a>
                  </div>
                  <div class="col-sm-8 grid-margin">
                      <h2 class="font-weight-600 mb-2">
                          <a href="/view/music/$music[short_url]" style="text-decoration:none; color: inherit">
                              $music[music_name]
                          </a>
                      </h2>
                    
                      <p class="L5 mb-0">
                          <i class="mdi mdi-artist"></i> <span class="fs-16 mr-2 text-muted">$music[artist]</span>
                      </p>
                  </div>
                </div>
                <hr>
              HTML;
            }
          }
          //Series
          if ($group["group"] == "series") {
            $seriesCount = 0;
            foreach ($group["data"] as $key => $series) {
              $seriesCount = $key +1;
              $image = $series["images"][0];
              $seriesHtml .=<<<HTML
                <div class="row">
                  <div class="col-sm-4 grid-margin">
                      <a href="/view/series/$series[short_url]" style="text-decoration:none; color: inherit">
                          <div class="rotate-img">
                              <img
                              src="http://127.0.0.1:8090/$image"
                              alt="banner"
                              class="img-fluid"
                              />
                          </div>
                      </a>
                  </div>
                  <div class="col-sm-8 grid-margin">
                      <h2 class="font-weight-600 mb-2">
                          <a href="/view/series/$series[short_url]" style="text-decoration:none; color: inherit">
                              $series[series_name]
                          </a>
                      </h2>
                  </div>
                </div>
                <hr>
              HTML;
            }
          }
          //Movies
          if ($group["group"] == "movies") {
            $movieCount = 0;
            foreach ($group["data"] as $key => $movie) {
              $movieCount = $key + 1;
              $image = $movie["images"][0];
              $moviesHtml .=<<<HTML
                <div class="row">
                  <div class="col-sm-4 grid-margin">
                      <a href="/view/movies/$movie[short_url]" style="text-decoration:none; color: inherit">
                          <div class="rotate-img">
                              <img
                              src="http://127.0.0.1:8090/$image"
                              alt="banner"
                              class="img-fluid"
                              />
                          </div>
                      </a>
                  </div>
                  <div class="col-sm-8 grid-margin">
                      <h2 class="font-weight-600 mb-2">
                          <a href="/view/movies/$movie[short_url]" style="text-decoration:none; color: inherit">
                              $movie[video_name]
                          </a>
                      </h2>
                    
                      <p class="L5 mb-0">
                          <i class="mdi mdi-artist"></i> <span class="fs-16 mr-2 text-muted">$movie[category]</span>
                      </p>
                  </div>
                </div>
                <hr>
              HTML;
            }
          }
        }
        $nav = Layout::navBar();
        return <<<HTML
          <!DOCTYPE html>
          <html lang="zxx">
            <head>
              <!-- Required meta tags -->
              <meta charset="UTF-8" />
              <meta name="viewport" content="width=device-width, initial-scale=1.0" />
              <meta http-equiv="X-UA-Compatible" content="ie=edge" />
              <title>Leccel::$this->queryString</title>
              <!-- plugin css for this page -->
              <link rel="stylesheet" href="/./assets/vendors/mdi/css/materialdesignicons.min.css" />
              <link rel="stylesheet" href="/assets/vendors/aos/dist/aos.css/aos.css" />
              <!-- End plugin css for this page -->
              <link rel="shortcut icon" href="/assets/images/favicon.png" />
              <!-- inject:css -->
              <link rel="stylesheet" href="/assets/css/style.css">
              <!-- endinject -->
            </head>
            <body>
              <div class="container-scroller">
                <div class="main-panel">
                  <!-- NavBar -->
                  $nav
                  <!-- NavBar Ends -->
                  <div class="content-wrapper">
                    <div class="container">
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <a href="/" class="mb-1 font-weight-bold pad2x text-decoration-none">Home</a> &RightArrow; 
                          <a href="#" class="mb-1 font-weight-bold pad2x text-decoration-none">Search Result for ($this->queryString) </a>
                        </div>
                        <div class="row">
                          <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body dashboard-tabs p-0">
                                <ul class="nav nav-tabs px-1" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#music" role="tab" aria-controls="music" aria-selected="true">Music ($musicCount)</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="sales-tab" data-toggle="tab" href="#movies" role="tab" aria-controls="movies" aria-selected="false">Movies ($movieCount)</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#series" role="tab" aria-controls="series" aria-selected="false">TV Series ($seriesCount)</a>
                                  </li>
                                </ul>
                                <div class="tab-content py-3 px-5">
                                  <div class="tab-pane fade show active" id="music" role="tabpanel" aria-labelledby="music-tab">
                                    $musicHtml
                                  </div>
                                  <div class="tab-pane fade" id="movies" role="tabpanel" aria-labelledby="movies-tab">
                                    $moviesHtml
                                  </div>
                                  <div class="tab-pane fade" id="series" role="tabpanel" aria-labelledby="series-tab">
                                    $seriesHtml
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
                  <!-- partial:../partials/_footer.html -->
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
              <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
              <!-- endinject -->
              <!-- plugin js for this page -->
              <script src="/assets/vendors/aos/dist/aos.js/aos.js"></script>
              <!-- End plugin js for this page -->
              <!-- Custom js for this page-->
              <script src="/assets/js/demo.js"></script>
              <script src="/assets/js/jquery.easeScroll.js"></script>
              <script src="/assets/js/ajax/music_getter.js"></script>
              <!-- End custom js for this page-->
            </body>
          </html>               
        HTML;


    }
}