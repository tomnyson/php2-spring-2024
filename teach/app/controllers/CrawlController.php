<?php

namespace Controllers;

use Goutte\Client;
use Models\ProductModel as ProductModel;
use Models\CarModel as CarModel;
use DTO\CarDTO as CarDTO;

class CrawlController
{

    public function index()
    {
        $client = new Client();
        $numberPage = 5;
        $products = [];
        $productMode =  new CarModel();
        for ($i = 1; $i <= $numberPage; $i++) {
            $crawler = $client->request('GET', "https://thegioitraicay.net/collections/all?page=$i");

            $crawler->filter('.product-box')->each(function ($node) use (&$products) {
                $product = new Product();

                // Assuming you have setters in your Product class
                $name = $node->filter('.product-name')->text();
                $product->setName($name);

                $imageUrl = $node->filter('.product-thumbnail img')->attr('data-lazyload');
                $product->setImage("https://" . ltrim($imageUrl, "//"));

                $price = $node->filter('.product-price')->text();
                $product->setPrice($price);

                // Add product to the list
                $products[] = $product;
            });
        }
        foreach ($products as $product) {
            $insert = array(
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'image' => $product->getImageUrl(),
                "km" => $product->getKm(),
                "brand" => $product->getBrand(),
                "year" => $product->getYear(),
                "status" => $product->getStatus()
            );
            $productMode->insert($insert);
        }
    }

    public function getCar()
    {
        $products = [];
        $i = 1;
        $productMode =  new CarModel();
        while (true) {
            echo "Page: $i\n";
            $products = array_merge($products, $this->scrapePage("https://xeluottoantrung.com/san-pham?p=$i"));
            if (!$this->shouldContinueCrawling("https://xeluottoantrung.com/san-pham?p=$i")) {
                break;
            }
            $i++;
        }

        foreach ($products as $product) {
            $insert = array(
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'image' => $product->getImageUrl(),
                "km" => $product->getKm(),
                "brand" => $product->getBrand(),
                "year" => $product->getYear(),
                "status" => $product->getStatus()
            );
            $productMode->insert($insert);
        }

        // Save products to database or perform other operations
    }

    private function shouldContinueCrawling($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $lastPage = $crawler->filter('.pagination .page-item:last-child')->text();
        return trim($lastPage) === 'Last';
    }

    function convertToNumber($string, $type = "price")
    {
        $number = 0;
        if ($type == "price") {
            $numberString = preg_replace('/[^0-9.]/', '', $string);

            $number = floatval($numberString);

            if (strpos($string, 'TRIỆU') !== false) {
                $number *= 1000000;
            }
        }
        if ($type == "odo") {
            $numberString = preg_replace('/[^0-9]/', '', $string);
            $number = intval($numberString);
        }

        return $number;
    }

    function getFirstWord($string)
    {
        preg_match('/^\S+/', $string, $matches);
        return $matches[0];
    }

    private function scrapePage($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $products = [];

        $crawler->filter('.grid_product a')->each(function ($node) use (&$products) {
            $product = new CarDTO();
            $product->setName($node->attr('title') ?? '');
            $brand = $this->getFirstWord($product->getName());
            $product->setBrand($brand);
            $product->setImage($node->filter(".sp__img  img")->attr('src') ?? null);
            $product->setPrice($this->convertToNumber($node->filter(".sp__price")->text(), "price") ?? 0);
            $product->setStatus($node->filter(".sp__tinhtrang")->text() ?? 'N/A');
            $product->setYear($this->convertToNumber($node->filter(".spi__item:nth-child(1) .spi__title span")->text(), "price") ?? 'N/A');
            $product->setKm($this->convertToNumber($node->filter(".spi__item:nth-child(3) .spi__title span")->text(), "odo") ?? 0);
            $product->setLocation($node->filter(".spi__item:nth-child(4) .spi__title span")->text() ?? 0);
            $products[] = $product;
        });

        return $products;
    }
}
