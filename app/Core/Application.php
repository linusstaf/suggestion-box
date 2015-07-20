<?php
namespace Staf\Core;


use Symfony\Component\HttpFoundation\Request;

class Application {

    protected $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    public function start()
    {
        $uri = $this->request->getRequestUri();
        if ($uri == '/')  {
            $this->startWeb();
        } elseif (substr($uri, 0, 4) == '/api') {
            $this->startApi();
        } else {
            echo 'Wrong';
        }
    }

    private function startWeb()
    {
        include resource_path('/views/home.php');
    }

    private function startApi()
    {
        echo 'Starting API';
    }
}