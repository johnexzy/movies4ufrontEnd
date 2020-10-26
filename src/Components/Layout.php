<?php
namespace Src\Components;


class Layout
{
    /**
     * Returns NavBar
     * @return HTML
     */
    public static function navBar(){
        return <<<HTML
            <div class="flash-news-banner" style="background:#ffffff; margin-top:-5px">
                <div class="d-flex justify-content-between mt-2">
                    <a href="/">
                        <img src="/assets/images/LECCEL3.png" alt="">
                    </a>
                    <div class="form-group" data-aos="fade-down">
                        <div class="input-group">
                            <input type="text" class="form-control searchInput border-info shadow" style="border-radius:20px; height:40px; " placeholder="Search here">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-info btn-icon-text searchButton text-center" style="border-radius:0 20px 20px 0; margin-left:-20px; z-index:1000; max-width:10%" type="button">
                                <i class="mdi mdi-search-web"></i> 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block text-center border-top menu-bottom">
                    <div class="d-flex justify-content-center" >
                        <ul class="d-flex flex-flow" style="margin-left:-30px">
                            <li class="d-inline pt-2 pl-2 pr-2 pb-0 ml-1 mb-1 mr-1 shadow" style="width:62px; height:62px;">
                                <a href="/" class="text-decoration-none">
                                    <i class=" d-block mdi mdi-24px mdi-home"></i>
                                    <p class="font-weight-bold text-uppercase">Home</p>
                                </a>
                            </li>
                            <li class="d-inline pt-2 pl-2 pr-2 pb-0 ml-1 mb-1 mr-1 shadow" style="width:62px; height:62px;">
                                <a href="/pages/music.html" class="text-decoration-none">
                                    <i class=" d-block mdi mdi-24px mdi-music-note"></i>
                                    <p class="font-weight-bold text-uppercase">Music</p>
                                </a>
                            </li>
                            <li class="d-inline pt-2 pl-2 pr-2 pb-0 ml-1 mb-1 mr-1 shadow" style="width:62px; height:62px;">
                                <a href="/pages/movies.html" class="text-decoration-none">
                                    <i class=" d-block mdi mdi-24px mdi-video"></i>
                                    <p class="font-weight-bold text-uppercase">Movies</p>
                                </a>
                            </li>
                            <li class="d-inline pt-2 pl-2 pr-2 pb-0 ml-1 mb-1 mr-1 shadow" style="width:62px; height:62px;">
                                <a href="/pages/series.html" class="text-decoration-none">
                                    <i class=" d-block mdi mdi-24px mdi-movie"></i>
                                    <p class="font-weight-bold text-uppercase">Series</p>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        HTML;
    }
    /**
     * Returns Footer Layout
     * @return HTML
     */
    public static function footer()
    {
        return <<<HTML
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
            <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- plugin js for this page -->
            <script src="/assets/vendors/aos/dist/aos.js/aos.js"></script>
            <!-- End plugin js for this page -->
            <!-- Custom js for this page-->
            <script src="/assets/js/demo.js"></script>
            <script src="/assets/js/jquery.easeScroll.js"></script>
            <script src="/assets/js/util.js" ></script>
        HTML;
    }
}
