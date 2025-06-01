<?php
class App {
    protected $controller = DEFAULT_CONTROLLER;
    protected $action = DEFAULT_ACTION;
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        if(file_exists('app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once 'app/controllers/' . ucfirst($this->controller) . 'Controller.php';
        $this->controller = ucfirst($this->controller) . 'Controller';
        $controller = new $this->controller;

        if(isset($url[1])) {
            if(method_exists($controller, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$controller, $this->action], $this->params);
    }

    protected function parseUrl() {
        if(isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [DEFAULT_CONTROLLER];
    }
}
