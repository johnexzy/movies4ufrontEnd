<?php
namespace Src\Components;


class Layout
{
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
}
