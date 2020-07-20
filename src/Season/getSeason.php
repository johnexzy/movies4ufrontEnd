<?php 
namespace Src\Season;

use Src\logic\CheckDate;


class getSeason{
    private $short_url, $series_name;
    public function __construct(String $short_url = null, $series_name) {
        $this->short_url = $short_url;
        $this->series_name = $series_name;
        
    }
    /**
     * checks if a url exist with status 200 and return bool
     * @return boolean
     */
    public static function is_url_exist(String $url)
    {
      $header = get_headers($url);
      if (strpos($header[0], '404')) {
          return false;
      }
      return true;
    }
    public static function makeRequest($short_url, $series_name)
    {
        if (self::is_url_exist("http://127.0.0.1:8090/api/v1/season/$series_name/$short_url")) {
          return \file_get_contents("http://127.0.0.1:8090/api/v1/season/$series_name/$short_url");
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
        $data = \json_decode(self::makeRequest($this->short_url, $this->series_name), true);
        if (isset($data["error"])) {
          $notFound = \file_get_contents(__DIR__."\..\..\..\pages/404new.html", true);
          return<<<HTML
            $notFound
        HTML;
        }
        $name = $data["series_name"];
        $seasonName = str_replace(" ", "-", $data["season_name"]);
        $download = "";
        // $url = $data["audio"][0]["song_url"];
        $coment_section ="";
        $cmcount = is_countable($data["comments"]) ? count($data["comments"]) : 0 ;

        //videos: usually one or $data['videos][0]
        foreach ($data['episodes'] as $key => $episode) {
            $download .= <<<HTML
            <a href="/view/series/$name/$seasonName/$episode[short_url]">
              <p style="background:grey; color:#fff; border-radius:2px; cursor:pointer" class="p-2">
                $episode[ep_name]
              </p>
            </a>
        HTML;
        }
        //comments
        foreach ($data['comments'] as $key => $coment) {
          $time = new CheckDate(strtotime($coment["updated_at"]));
          $time = $time->checkDay();
          $coment_section .= "<div class='comment-box'>
                                <div class='d-flex align-items-center'>
                                    <div class='rotate-img'>
                                        <img src='/assets/images/avatar.png' alt='banner' class='img-fluid img-rounded mr-3'>
                                    </div>
                                    <div>
                                        <p class='fs-12 mb-1 line-height-xs'>
                                        $time
                                        </p>
                                        <p class='fs-16 font-weight-600 mb-0 line-height-xs'>
                                            $coment[name]
                                        </p>
                                    </div>
                                </div>

                                <p class='fs-12 mt-3'>
                                    $coment[comment]
                                </p>
                            </div>";
        }
        return <<<HTML
  <!DOCTYPE html>
  <html lang="zxx">
    <head>
      <!-- Required meta tags -->
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Leccel::$data[season_name]</title>
      <!-- plugin css for this page -->
      <link
        rel="stylesheet"
        href="/assets/vendors/mdi/css/materialdesignicons.min.css"
      />
      <link rel="stylesheet" href="/assets/vendors/aos/dist/aos.css/aos.css" />
      <!-- End plugin css for this page -->
      <link rel="shortcut icon" href="/assets/images/favicon.png" />
      <!-- inject:css -->
      <link rel="stylesheet" href="/assets/css/style.css">
      <!-- endinject -->
    </head>
  
    <body>
      <div class="container-scroller">
        <!-- partial:../partials/_navbar.html -->
        
        <div class="flash-news-banner sticky-top">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <a href="/"><img src="/assets/images/LECCEL3.png" alt="LECCEL.NET" srcset=""></a>
                <p class="mb-0">
                  Get the Latest Movies, Music, Albums Series and more
                </p>
              </div>
              <div class="d-flex mt-3">

                <ul class="social-media mb-3">
                  <li>
                    <a href="#" class=" text-decoration-none">
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
        </div>
        <div class="content-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
              <div class="mb-3">
                <a href="/" class="mb-1 font-weight-bold pad2x text-decoration-none">Home</a> &RightArrow; 
                <a href="/pages/series.html" class="mb-1 font-weight-bold pad2x text-decoration-none">Series</a>&RightArrow;
                <a href="#" class="mb-1 font-weight-bold pad2x text-decoration-none">$data[series_name]</a>&RightArrow;
                <a href="#" class="mb-1 font-weight-bold pad2x text-decoration-none">$data[season_name]</a>
              </div>
                <div class="card"  data-aos="fade-up">
                      <div class="card-header">
                          <p class="font-weight-bold" style="text-align:center">
                              $name - $data[season_name]
                          </p>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-6">
                                  
                                  $download
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                  <h1 class="mt-5 text-center mb-5">
                                      Add Your Comment
                                  </h1>
                                  <div class="col-lg-12 mb-5 mb-sm-2">
                                      <form>
                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group">
                                                      <textarea
                                                      class="form-control textarea"
                                                      placeholder="Comment *"
                                                      id="comment"
                                                      ></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-sm-12">
                                              <div class="form-group">
                                                  <input
                                                  type="text"
                                                  class="form-control"
                                                  id="name"
                                                  aria-describedby="name"
                                                  placeholder="Name *"
                                                  />
                                              <input type="hidden" id="commentKey" value="$data[season_key]">
                                              </div>
                                              </div>
                                              
                                          </div>

                                          <div class="row">
                                              <div class="col-sm-12">
                                              <div class="form-group">
                                                  <button type="button" id="handleSubmit"
                                                  class="btn btn-lg btn-dark font-weight-bold mt-3"
                                                  >Comment</button>
                                              </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="post-comment-section">
                                      <i class="mdi mdi-comment"></i> 
                                      <span class="count">($cmcount)</span>
                                      <div class="comment-section"> 
                                          $coment_section
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
      </div>
      <!-- container-scroller ends -->
      <!-- partial:../partials/_footer.html -->
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
                <div class="d-sm-flex justify-content-between align-items-center">
                  <div class="fs-14 font-weight-600">
                    © 2020 @ <a href="https://www.leccel.net" target="_blank" class="text-white"> Leccel.net</a>. All rights reserved.
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
      <!-- inject:js -->
      <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- plugin js for this page -->
  
      <script src="/assets/vendors/aos/dist/aos.js/aos.js"></script>
      <!-- End plugin js for this page -->
      <!-- Custom js for this page-->
      <script src="/assets/js/demo.js"></script>
      <script src="/assets/js/jquery.easeScroll.js"></script>
      <script src="/assets/js/easeCarousel.js"></script>
      <script src="/assets/js/comment.ajax.js"></script>
      
      <!-- End custom js for this page-->
    </body>
  </html>
        
HTML;


    }
}