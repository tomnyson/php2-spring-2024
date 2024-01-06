<?php

namespace Controllers;

use Goutte\Client;
use Models\ProductModel as ProductModel;
use Models\CarModel as CarModel;

class Product
{
    public $name;
    public $price;
    public $image;
    // public function __construct($name, $price, $image)
    // {
    //     $this->name = $name;
    //     $this->price = $price;
    //     $this->image = $image;
    // }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImageUrl()
    {
        return $this->image;
    }
}
class CrawlController
{

    public function index()
    {
        $client = new Client();
        $numberPage = 5;
        $products = [];
        $productMode =  new ProductModel();
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
            );
            $productMode->insert($insert);
        }

        // var_dump($products); // To check the structure and data of the products array
    }

    public function getCar()
    {
        $products = [];
        $i = 1;

        while (true) {
            echo "Page: $i\n";
            $products = array_merge($products, $this->scrapePage("https://xeluottoantrung.com/san-pham?p=$i"));
            if (!$this->shouldContinueCrawling("https://xeluottoantrung.com/san-pham?p=$i")) {
                break;
            }
            $i++;
        }

        var_dump($products);

        // Save products to database or perform other operations
    }

    private function shouldContinueCrawling($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $lastPage = $crawler->filter('.pagination .page-item:last-child')->text();
        return trim($lastPage) === 'Last';
    }

    private function scrapePage($url)
    {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $products = [];

        $crawler->filter('.grid_product a')->each(function ($node) use (&$products) {
            $product = new Product();
            // Populate the product object with scraped data
            // Add checks if the elements exist
            $product->setName($node->attr('title') ?? 'N/A');
            $product->setImage($node->filter(".sp__img  img")->attr('src') ?? 'N/A');
            $product->setPrice($node->filter(".sp__price")->text() ?? 'N/A');
            // ... continue setting other properties ...

            $products[] = $product;
        });

        return $products;
    }
}
