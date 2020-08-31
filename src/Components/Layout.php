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
                                    <input type="text" class="form-control searchInput border-info shadow" style="border-radius:20px 10px 10px 20px; height:40px; " placeholder="Search here">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-info btn-icon-text searchButton text-center" style="border-radius:0 20px 20px 0; margin-left:-20px; z-index:1000; width:60px" type="button">
                                        <i class="mdi mdi-search-web"></i> 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-center border-top menu-bottom">
                            <div class="d-flex justify-content-center">
                                <ul class="d-flex flex-flow">
                                    <li class="d-inline m-2 shadow">
                                        <a class="m-2" href="/pages/music.html">
                                            <i class="mdi mdi-24px mdi-music"></i>
                                        </a>
                                    </li>
                                    <li class="d-inline m-2 shadow">
                                        <a class="m-2" href="/pages/movies.html">
                                            <i class="mdi mdi-24px mdi-video"></i>
                                        </a>
                                    </li>
                                    <li class="d-inline m-2 shadow">
                                        <a class="m-2" href="/pages/series.html">
                                            <i class="mdi mdi-24px mdi-movie"></i>
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
        HTML;
    }
}
