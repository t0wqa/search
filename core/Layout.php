<?php

namespace Core;


class Layout
{

    private $baseView;

    private $title;

    private $content;

    private $styles = [];

    private $scripts = [];

    /**
     * @return mixed
     */
    public function getBaseView()
    {
        return $this->baseView;
    }

    /**
     * @param mixed $baseView
     */
    public function setBaseView($baseView)
    {
        $this->baseView = $baseView;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function addStyle($style)
    {
        $this->styles[] = $style;
    }

    public function addScript($script)
    {
        $this->scripts[] = $script;
    }

    public function render($content)
    {
        $this->setContent($content);

        ob_start();

        require (__DIR__ . '/../app/view/' . $this->baseView . '.php');

        $result = ob_get_contents();
        ob_end_clean();

        $response = new Response();
        $response->addContent($result);

        return $response;
    }

}