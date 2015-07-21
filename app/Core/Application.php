<?php
namespace Staf\Core;

use Staf\Core\ApiHandler;
use Symfony\Component\HttpFoundation\Request;

class Application
{

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
        } elseif (substr($uri, 0, 5) == '/api/' and strlen($uri) > 5) {
            $this->startApi();
        } else {
            $this->send404();
        }
    }

    private function startWeb()
    {
        include resource_path('/views/home.php');
    }

    private function startApi()
    {
        $api = new ApiHandler($this->request);
        $api->handle();
    }

    private function send404()
    {
        include resource_path('/views/error.php');
    }
}