<?php
namespace Controller\Movie;


class getMovie{
    private $short_url;
    public function __construct(String $short_url = null) {
        $this->short_url = $short_url;
    }
    public function makeRequest()
    {
        $res = file_get_contents("http://127.0.0.1:8090/api/v1/videos/url/$this->short_url");
        return $res;
    }
    public function bodyParser()
    {
        
    }
}