<?php

namespace Core;


class BaseController
{

    protected $layout;

    public function __construct()
    {
        $this->layout = new Layout();
    }

    protected function render($file, $params = [])
    {
        return Helpers::render($this->layout, $file, $params);
    }

}