<?php
$filename = "sitemap.php";
if (file_exists($filename)) {
    $ext = explode(".", $filename);
    header("$_SERVER[SERVER_PROTOCOL] 200 OK");
    header("Cache-Control: public");
    header("Content-Type: text/".$ext[count($ext) - 1]);
    header("Content-Transfer-Encoding: gzip");
    header("Content-Length: ".filesize($filename));
    // header("Content-Disposition: attachment; filename=".$uri[count($uri) - 1]);
   
    echo passthru("php $filename");
}
else {
    header("HTTP/1.1 404 Not Found");
    exit();
}