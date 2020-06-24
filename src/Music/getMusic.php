<?php 
namespace Src\Music;

use Src\logic\CheckDate;


class getMusic{
    private $short_url;
    public function __construct(String $short_url = null) {
        $this->short_url = $short_url;
    }
    public static function makeRequest($short_url)
    {
        $res = file_get_contents("http://127.0.0.1:8090/api/v1/music/url/$short_url");
        return $res;
    } 
    public function bodyParser()
    {
        $data = \json_decode(self::makeRequest($this->short_url), true);

        $indicator = "";
        $item = "";
        $details = $data["music_details"];
        $name = $data["music_name"];
        $download = "";
        $url = $data["audio"]["song_url"];
        $coment_section ="";
        $cmcount = is_countable($data["comments"]) ? count($data["comments"]) : 0 ;

        //videos: usually one or $data['videos][0]
        
            $download = "<a  href='http://127.0.0.1:8090/$url' class='btn btn-primary btn-lg btn-block' download>
                            Download
                          </a>";
        
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
                                        <img src='../../assets/images/avatar.png' alt='banner' class='img-fluid img-rounded mr-3'>
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
              
              <div class="flash-news-banner sticky-top">
                <div class="container">
                  <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <span class="badge badge-dark mr-3">Leccel.net</span>
                      <p class="mb-0">
                        <a href="/">Home</a> / <a href="/pages/music.html">music</a> / <a href="#">Download</a>
                      </p>
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
                                                    <input type="hidden" id="commentKey" value="$data[music_key]">
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
            <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- plugin js for this page -->
        
            <script src="../../assets/vendors/aos/dist/aos.js/aos.js"></script>
            <!-- End plugin js for this page -->
            <!-- Custom js for this page-->
            <script src="../../assets/js/demo.js"></script>
            <script src="../../assets/js/jquery.easeScroll.js"></script>
            <script src="../../assets/js/easeCarousel.js"></script>
            <script src="../../assets/js/comment.ajax.js"></script>
            
            <!-- End custom js for this page-->
          </body>
        </html>
        
HTML;


    }
}