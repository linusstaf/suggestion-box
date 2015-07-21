<?php
namespace Staf\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

class ApiHandler {

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ParameterBag
     */
    protected $attributes;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        if ($request->getMethod() == 'POST') {
            $this->attributes = $this->request->request;
        }

        var_dump($this);
    }

    public function handle()
    {
        
    }

}