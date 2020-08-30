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
            <div class="flash-news-banner sticky-top">
                <div class="container">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <a href="/">
                                <img src="/assets/images/LECCEL3.png" alt="">
                            </a>
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
