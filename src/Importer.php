<?php

namespace GateSoftware\SitemapImporter;

class Importer
{
    public function parse($file)
    {
        $xml = simplexml_load_file($file) or die('Error when tried to load sitemap file');
        $pages = [];
        foreach ($xml->url as $page) {
            $parsed = parse_url($page->loc);
            $pages[] = array('host' => $parsed['host'], 'page' => $parsed['path']);
        }

        return $pages;
    }
}

