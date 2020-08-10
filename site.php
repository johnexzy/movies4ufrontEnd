<?php

$movies = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/videos/"), true);
$series = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/series/"), true);
$audios =  json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/music/"), true);
$albums = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/album/"), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leccel</title>
</head>
<body>
    <ol>
    <?php
    foreach ($movies as $key => $movie) {
        echo<<<HTML
            <li>
                <a href="/view/movies/$movie[short_url]">$movie[video_name]</a>
            </li>
        HTML;
    }
    foreach ($series as $key => $serie) {
        echo<<<HTML
            <li>
                <a href="/view/series/$serie[short_url]">$serie[series_name]</a>
            </li>
        HTML;
    }
    foreach ($audios as $key => $music) {
        echo<<<HTML
            <li>
                <a href="/view/music/$music[short_url]">$music[music_name]</a>
            </li>
        HTML;
    }
    foreach ($albums as $key => $album) {
        echo<<<HTML
            <li>
                <a href="/view/albums/$album[short_url]">$album[album_name]</a>
            </li>
        HTML;
    }
    ?>
    </ol>
</body>
</html>

