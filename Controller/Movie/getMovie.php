<?php
namespace Controller\Movie;


class getMovie{
    private $short_url;
    public function __construct(String $short_url = null) {
        $this->short_url = $short_url;
    }
    public static function makeRequest($short_url)
    {
        $res = file_get_contents("http://127.0.0.1:8090/api/v1/videos/url/$short_url");
        return $res;
    } 
    public function bodyParser()
    {
        $data = \json_decode(self::makeRequest($this->short_url), true);

        $indicator = "";
        $item = "";
        $details = $data["video_details"];
        $name = $data["video_name"];
        $size = (int) $data["videos"][0]["video_bytes"];
        $size = ceil(($size / 1024) / 1024);
        $download = "";
        foreach ($data['videos'] as $key => $video) {
            $download .= " <button type='button' class='btn btn-lg btn-block'>Download</button> ";
            $download .= "<a href='http://127.0.0.1:8090/$video[video_url]' styl='text-decoration:none' download><button type='button' class='btn btn-dark btn-lg btn-block'>Block buttons</button></a>";
        }

        foreach ($data['images'] as $key => $image) {
            $indicator .= ($key == 0) ?
             "<li data-target='#carouselExampleIndicators' data-slide-to='$key' class='active'></li>":
             "<li data-target='#carouselExampleIndicators' data-slide-to='$key'></li>";
            $item .= ($key == 0) ?
             "<div class='carousel-item active'>
                <img class='d-block w-100' src='http://127.0.0.1:8090/$image' alt='slide $key'>
              </div>":
             "<div class='carousel-item'>
                <img class='d-block w-100' src='http://127.0.0.1:8090/$image' alt='slide $key'>
              </div>";
             
        }
        return <<<EOS
        <!DOCTYPE html>
        <html lang="zxx">
          <head>
            <!-- Required meta tags -->
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>World Time</title>
            <!-- plugin css for this page -->
            <link
              rel="stylesheet"
              href="../../assets/vendors/mdi/css/materialdesignicons.min.css"
            />
            <link rel="stylesheet" href="../../assets/vendors/aos/dist/aos.css/aos.css" />
            <!-- End plugin css for this page -->
            <link rel="shortcut icon" href="../../assets/images/favicon.png" />
            <!-- inject:css -->
            <link rel="stylesheet" href="../../assets/css/style.css">
            <!-- endinject -->
          </head>
        
          <body>
            <div class="container-scroller">
              <!-- partial:../partials/_navbar.html -->
              <header id="header">
                  <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                      <div class="navbar-top">
                        <div class="d-flex justify-content-between align-items-center">
                          <ul class="navbar-top-left-menu">
                            <li class="nav-item">
                              <a href="./index-inner.html" class="nav-link">Advertise</a>
                            </li>
                            <li class="nav-item">
                              <a href="./aboutus.html" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">Events</a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">Write for Us</a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">In the Press</a>
                            </li>
                          </ul>
                          <ul class="navbar-top-right-menu">
                            <li class="nav-item">
                              <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">Sign in</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="navbar-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <a class="navbar-brand" href="#"
                              ><img src="../../assets/images/untitled.png" alt=""
                            /></a>
                          </div>
                          <div>
                            <button
                              class="navbar-toggler"
                              type="button"
                              data-target="#navbarSupportedContent"
                              aria-controls="navbarSupportedContent"
                              aria-expanded="false"
                              aria-label="Toggle navigation"
                            >
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div
                              class="navbar-collapse justify-content-center collapse"
                              id="navbarSupportedContent"
                            >
                              <ul
                                class="navbar-nav d-lg-flex justify-content-between align-items-center"
                              >
                                <li>
                                  <button class="navbar-close">
                                    <i class="mdi mdi-close"></i>
                                  </button>
                                </li>
                                <li class="nav-item active">
                                  <a class="nav-link" href="../index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="./magazine.html">MAGAZINE</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="./business.html">Business</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="./sports.html">Sports</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="./art.html">Art</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="./politics.html">POLITICS</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="./travel.html">Travel</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="./contactus.html">Contact</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <ul class="social-media">
                            <li>
                              <a href="#">
                                <i class="mdi mdi-facebook"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <i class="mdi mdi-youtube"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <i class="mdi mdi-twitter"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>
                  </div>
                </header>
        
              <!-- partial -->
              <div class="flash-news-banner">
                <div class="container">
                  <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <span class="badge badge-dark mr-3">Flash news</span>
                      <p class="mb-0">
                        Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s.
                      </p>
                    </div>
                    <div class="d-flex">
                      <span class="mr-3 text-danger">Wed, March 4, 2020</span>
                      <span class="text-danger">30°C,London</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content-wrapper">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card" data-aos="fade-up">
                      <div class="card-header">
                        $name
                      </div>
                        <div class="card-body">
                        <div class="row">
                        <div class="col-sm-6">
                            
                            <div class="row">
                              <div class="col-lg-12 mb-5 mb-sm-2">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        $indicator
                                    </ol>
                                    <div class="carousel-inner">
                                      $item
                                    </div>
                                    
                                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <p class="">
                                $details
                            </p>
                            <p class="">
                                size: $size mb
                            </p>
                            $download
                          </div>
                        </div>
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- container-scroller ends -->
            <!-- partial:../partials/_footer.html -->
            <footer>
                  <div class="footer-top">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-5">
                          <img src="../../assets/images/untitled.png" class="footer-logo" alt="" />
                          <h5 class="font-weight-normal mt-4 mb-5">
                            Newspaper is your news, entertainment, music fashion website. We
                            provide you with the latest breaking news and videos straight from
                            the entertainment industry.
                          </h5>
                          <ul class="social-media mb-3">
                            <li>
                              <a href="#">
                                <i class="mdi mdi-facebook"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <i class="mdi mdi-youtube"></i>
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <i class="mdi mdi-twitter"></i>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-sm-4">
                          <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="footer-border-bottom pb-2">
                                <div class="row">
                                  <div class="col-3">
                                    <img
                                      src="../../assets/images/dashboard/home_1.jpg"
                                      alt="thumb"
                                      class="img-fluid"
                                    />
                                  </div>
                                  <div class="col-9">
                                    <h5 class="font-weight-600">
                                      Cotton import from USA to soar was American traders
                                      predict
                                    </h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="footer-border-bottom pb-2 pt-2">
                                <div class="row">
                                  <div class="col-3">
                                    <img
                                      src="../../assets/images/dashboard/home_2.jpg"
                                      alt="thumb"
                                      class="img-fluid"
                                    />
                                  </div>
                                  <div class="col-9">
                                    <h5 class="font-weight-600">
                                      Cotton import from USA to soar was American traders
                                      predict
                                    </h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div>
                                <div class="row">
                                  <div class="col-3">
                                    <img
                                      src="../../assets/images/dashboard/home_3.jpg"
                                      alt="thumb"
                                      class="img-fluid"
                                    />
                                  </div>
                                  <div class="col-9">
                                    <h5 class="font-weight-600 mb-3">
                                      Cotton import from USA to soar was American traders
                                      predict
                                    </h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                          <div class="footer-border-bottom pb-2">
                            <div class="d-flex justify-content-between align-items-center">
                              <h5 class="mb-0 font-weight-600">Magazine</h5>
                              <div class="count">1</div>
                            </div>
                          </div>
                          <div class="footer-border-bottom pb-2 pt-2">
                            <div class="d-flex justify-content-between align-items-center">
                              <h5 class="mb-0 font-weight-600">Business</h5>
                              <div class="count">1</div>
                            </div>
                          </div>
                          <div class="footer-border-bottom pb-2 pt-2">
                            <div class="d-flex justify-content-between align-items-center">
                              <h5 class="mb-0 font-weight-600">Sports</h5>
                              <div class="count">1</div>
                            </div>
                          </div>
                          <div class="footer-border-bottom pb-2 pt-2">
                            <div class="d-flex justify-content-between align-items-center">
                              <h5 class="mb-0 font-weight-600">Arts</h5>
                              <div class="count">1</div>
                            </div>
                          </div>
                          <div class="pt-2">
                            <div class="d-flex justify-content-between align-items-center">
                              <h5 class="mb-0 font-weight-600">Politics</h5>
                              <div class="count">1</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="footer-bottom">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="d-sm-flex justify-content-between align-items-center">
                            <div class="fs-14 font-weight-600">
                              © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
                            </div>
                            <div class="fs-14 font-weight-600">
                              Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </footer>
        
            <!-- partial -->
            <!-- inject:js -->
            <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- plugin js for this page -->
        
            <script src="../../assets/vendors/aos/dist/aos.js/aos.js"></script>
            <!-- End plugin js for this page -->
            <!-- Custom js for this page-->
            <script src="../../assets/js/demo.js"></script>
            <script src="../../assets/js/jquery.easeScroll.js"></script>
            <script src="../../assets/js/easeCarousel.js"></script>
            
            <!-- End custom js for this page-->
          </body>
        </html>
        
EOS;


    }
}