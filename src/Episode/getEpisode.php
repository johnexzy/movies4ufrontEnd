<?php
namespace Src\Episode;

use Src\Components\Layout;
use Src\logic\CheckDate;

class getEpisode{
    private $short_url, $series_name;
    public function __construct(String $short_url = null, $series_name = null) {
        $this->short_url = $short_url;
        $this->series_name = $series_name;
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
    public static function makeRequest($short_url, $series_name)
    {
        if (self::is_url_exist("http://127.0.0.1:8090/api/v1/episode/$series_name/$short_url")) {
          return \file_get_contents("http://127.0.0.1:8090/api/v1/episode/$series_name/$short_url");
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
          $notFound = \file_get_contents(__DIR__."/../../pages/404new.html", true);
          return<<<HTML
            $notFound
        HTML;
        }
        $indicator = "";
        $item = "";
        $details = $data["ep_details"];
        $name = str_replace("_", " ", $data["ep_name"]);
        $size = (int) $data["videos"][0]["video_bytes"];
        $size = ceil(($size / 1024) / 1024);
        $download = "";
        $coment_section ="";
        $cmcount = is_countable($data["comments"]) ? count($data["comments"]) : 0 ;

        //videos: usually one or $data['videos][0]
        foreach ($data['videos'] as $key => $video) {
            $download .= "<a  href='http://127.0.0.1:8090/$video[video_url]' style='text-decoration:none; color:inherit' download>
                            <button type='button' class='btn btn-primary btn-lg btn-block'>Download</button>
                          </a>";
        }
        //images
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
        $nav = Layout::navBar();
        $footer = Layout::footer();
        return <<<HTML
        <!DOCTYPE html>
        <html lang="zxx">
          <head>
            <!-- Required meta tags -->
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>Leccel</title>
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
              
              <!-- NavBar -->
              $nav
              <!-- NavBar Ends -->
              <div class="content-wrapper">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                    <div class="mb-3">
                      <a href="/" class="mb-1 font-weight-bold pad2x text-decoration-none">Home</a> &RightArrow; 
                      <a href="/pages/movies.html" class="mb-1 font-weight-bold pad2x text-decoration-none">Movies</a>&RightArrow;
                      <a href="#" class="mb-1 font-weight-bold pad2x text-decoration-none">Download</a>
                    </div>
                      <div class="card card-square" data-aos="fade-up">
                            <div class="card-header">
                                <p class="font-weight-bold" style="text-align:center">
                                    $name
                                </p>
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
                                                    <input type="hidden" id="commentKey" value="$data[ep_key]">
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
      $footer
      
      <script src="/assets/js/easeCarousel.js"></script>
      <script src="/assets/js/comment.ajax.js"></script>
      
      <!-- End custom js for this page-->
    </body>
  </html>
        
HTML;


    }
}