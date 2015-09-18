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

    /**
     * Return the correct response depending on the request.
     * Either launch the API layer or render the start/error pages,
     */
    public function start()
    {
        $uri = $this->request->getRequestUri();
        if (strlen($uri) > 5 and substr($uri, 0, 5) == '/api/')  {
            $this->startApi();
        } elseif ($uri == '/') {
            $this->renderHome();
        } else {
            $this->render404();
        }
    }

    /**
     * Render the static page.
     */
    private function renderHome()
    {
        include resource_path('/views/home.php');
    }

    /**
     * Render the 404 page for any unknown requests
     */
    private function render404()
    {
        include resource_path('/views/error.php');
    }

    /**
     * Launch the API to handle the AJAX requests
     */
    private function startApi()
    {
        $api = new ApiHandler($this->request);
        $api->handle();
    }
}