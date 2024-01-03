<?php
class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // Parse URL, set controller, method, and params
    }

    private function parseUrl()
    {
        // Logic to extract controller, method, and params from URL
    }
}