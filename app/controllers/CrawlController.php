<?php

namespace Controllers;

use Goutte\Client;
use Models\ProductModel as ProductModel;

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
}
