<?php
header("Content-Type: text/xml");
echo<<<HTML
    <?xml version="1.0" encoding="UTF-8"?>
    HTML;
    $movies = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/videos/"), true);
    $series = json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/series/"), true);
    $audios =  json_decode(file_get_contents("http://127.0.0.1:8090/api/v1/music/"), true);
?>
    
        <urlset
            xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
            xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
            xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
            <url>
                <loc>https://leccel.net/</loc>
                <changefreq>hourly</changefreq>
                <priority>1.00</priority>
            </url>
            <url>
                <loc>https://leccel.net/pages/contactus.html</loc>
                <changefreq>yearly</changefreq>
                <priority>0.50</priority>
            </url>
            <url>
                <loc>https://leccel.net/pages/music.html</loc>
                <changefreq>hourly</changefreq>
                <priority>0.80</priority>
            </url>
            <url>
                <loc>https://leccel.net/pages/movies.html</loc>
                <changefreq>hourly</changefreq>
                <priority>0.80</priority>
            </url>
            <url>
                <loc>https://leccel.net/pages/series.html</loc>
                <changefreq>daily</changefreq>
                <priority>0.60</priority>
            </url>
            <url>
                <loc>https://leccel.net/pages/albums.html</loc>
                <changefreq>weekly</changefreq>
                <priority>0.50</priority>
            </url>
            <?php
                foreach ($movies as $key => $movie) {
                    $short = strip_tags(preg_replace("/&(?!#?[a-z0-9]+;)/", "&amp;", $movie["short_url"]));
                    ?>
                        <url>
                            <loc>https://leccel.net/view/movies/<?=
                            <<<XML
                            $short
                            XML;
                            ?></loc>
                            <lastmod><?=date(DATE_W3C, strtotime($movie["created_at"])) ?></lastmod>
                            <priority>0.60</priority>
                        </url>
                    <?php
                }
                foreach ($series as $key => $serie) {
                    $short = strip_tags(preg_replace("/&(?!#?[a-z0-9]+;)/", "&amp;", $serie["short_url"]));
                    ?>
                        <url>
                            <loc>https://leccel.net/view/series/<?=
                            <<<XML
                            $short
                            XML;
                            ?></loc>
                            <lastmod><?=date(DATE_W3C, strtotime($serie["created_at"])) ?></lastmod>
                            <priority>0.60</priority>
                        </url>
                    <?php
                }
                foreach ($audios as $key => $music) {
                    $short = strip_tags(preg_replace("/&(?!#?[a-z0-9]+;)/", "&amp;", $music["short_url"]));
                    ?>
                        <url>
                            <loc>https://leccel.net/view/music/<?=
                            <<<XML
                            $short
                            XML;
                            ?></loc>
                            <lastmod><?=date(DATE_W3C, strtotime($music["created_at"])) ?></lastmod>
                            <priority>0.60</priority>
                        </url>
                    <?php
                }
                
                ?>
        </urlset>