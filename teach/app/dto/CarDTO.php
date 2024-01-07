<?php

namespace DTO;

class Product
{
    public $name;
    public $price;
    public $image;
    public function __construct($name = "", $price = 0, $image = "")
    {
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }
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


class CarDTO extends Product
{
    public $brand;
    public $km;
    public $status;
    public $location;
    public $year;

    public function __construct($name = "", $price = 0, $image = "", $brand = "", $km = 0, $status = 0, $location = "", $year = 0)
    {
        parent::__construct($name, $price, $image);
        $this->brand = $brand;
        $this->km = $km;
        $this->status = $status;
        $this->location = $location;
        $this->year = $year;
    }

    public function setKm($km)
    {
        $this->km = $km;
    }

    public function getKm()
    {
        return $this->km;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getBrand()
    {
        return $this->brand;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }
    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }
}
