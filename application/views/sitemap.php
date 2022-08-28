<?php

    header("Content-Type: application/xml; charset=utf-8");
    echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 

    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
    
    foreach($sitemap as $item) {
        echo '<url>' . PHP_EOL;
        echo '<loc>'.base_url(). $item->url .'</loc>' . PHP_EOL;
        echo '<changefreq>daily</changefreq>' . PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
    /*foreach($categories as $item) {
        echo '<url>' . PHP_EOL;
        echo '<loc>'.base_url('welcome/pngs/'. $item->slug) .'</loc>' . PHP_EOL;
        echo '<changefreq>daily</changefreq>' . PHP_EOL;
        echo '</url>' . PHP_EOL;
    }*/
    foreach($pngs as $item) {
        echo '<url>' . PHP_EOL;
        echo '<loc>'.base_url('welcome/show/'. $item->slug) .'</loc>' . PHP_EOL;
        echo '<changefreq>daily</changefreq>' . PHP_EOL;
        echo '</url>' . PHP_EOL;
    }
    echo '</urlset>' . PHP_EOL;
?>