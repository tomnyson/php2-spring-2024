<?php
class Router
{
    private $routes = [];

    public function addRoute($url, $controllerAction)
    {
        $this->routes[$url] = $controllerAction;
    }

    public function route($url)
    {
        foreach ($this->routes as $route => $controllerAction) {
            $routePattern = preg_quote($route, '/');
            $routePattern = "/^" . str_replace(['\{id\}', '\{slug\}'], ['([0-9]+)', '([a-zA-Z0-9\-_]+)'], $routePattern) . "$/";

            if (preg_match($routePattern, $url, $matches)) {
                array_shift($matches);

                $controllerName = "Controllers\\" . $controllerAction[0];
                $action = $controllerAction[1];
                $controller = new $controllerName();

                call_user_func_array([$controller, $action], $matches);
                return;
            }
        }

        // Handle 404 Not Found
        echo "404 Not Found";
    }
}
