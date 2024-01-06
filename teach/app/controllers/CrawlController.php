<?php

namespace Controllers;

use DOMDocument;
use Goutte\Client;

class CrawlController
{

    function getHtmlContent($url)
    {
        $content = file_get_contents($url);
        return $content;
    }

    function parseHtml($html)
    {
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $titles = $doc->getElementsByTagName('title');

        if ($titles->length > 0) {
            return $titles->item(0)->textContent;
        }
        return false;
    }

    function crawlPage($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        echo "current crawl $url";
        // Process the page content
        $crawler->filter('.product-box')->each(function ($node) {
            $node->filter('a')->each(function ($aNode) {
                // For each <a> tag
                $linkText = $aNode->text();
                $linkHref = $aNode->attr('href');

                // echo "Text: $linkText, URL: $linkHref\n";
            });

            $node->filter('.product-name')->each(function ($aNode) {
                // For each <a> tag
                $linkText = $aNode->text();
                // $linkHref = $aNode->attr('href');

                echo "Name: $linkText </br> ";
            });

            $node->filter('.product-thumbnail img')->each(function ($aNode) {
                // For each <a> tag
                $linkText = str_replace("//", "", $aNode->attr('data-lazyload'));
                // $linkHref = $aNode->attr('href');
                echo "<image src=\"https://$linkText\"/>";
            });
            $node->filter('.product-price')->each(function ($aNode) {
                // For each <a> tag
                $linkText = $aNode->text();
                // $linkHref = $aNode->attr('href');

                echo "Price: $linkText </br>";
            });
        });

        // Check for pagination
        $pagination = $crawler->filter('.pagination');
        if ($pagination->count() > 0) {

            $parsedUrl = parse_url($url);
            parse_str($parsedUrl['query'] ?? '', $queryParams);
            $currentPage = $queryParams['page'] ?? 1;

            // Build the URL for the next page
            $nextPage = $currentPage + 1;
            $queryParams['page'] = $nextPage;
            $nextPageUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'] . '?' . http_build_query($queryParams);

            // Find the link to the next page, if it exists
            $nextPageLink = $pagination->filter('a.page-link')->link();
            if ($nextPageLink) {
                // Recursively call crawlPage with the new URL
                $this->crawlPage($nextPageUrl);
            }
        }
    }

    public function index()
    {
        $startUrl = 'https://thegioitraicay.net/collections/trai-cay-nhap-khau?page=1';
        $this->crawlPage($startUrl);
    }
}
