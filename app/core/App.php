<?php

class App
{

    protected $controller;

    protected $method = 'render';

    protected $parametri = [];

    public function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    public function __construct()
    {

        $url = $this->parseazaURL();
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            echo "No such file " . $url[0];
            if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
                $uri = 'https://';
            } else {
                $uri = 'http://';
            }
            $uri .= $_SERVER['HTTP_HOST'];
            header('Location: ' . $uri . '/TehnologiiWeb/public/home');
        }
        require_once '../app/controllers/' . $this->controller . '.php';


        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (array_values($url)) {
            $this->parametri = $url;
        } else {
            $this->parametri = [];
        }

        call_user_func_array([$this->controller, $this->method], $this->parametri);
    }

    public function parseazaURL()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
