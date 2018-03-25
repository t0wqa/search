<?php

namespace Core;


class Response
{

    protected $content;

    protected $redirect = null;

    protected $is404 = false;

    public function addContent($content)
    {
        $this->content = $content;
    }

    public function setRedirect($uri)
    {
        $this->redirect = $uri;
    }

    public function setIs404()
    {
        $this->is404 = true;
    }

    public function send()
    {
        if (!is_null($this->redirect)) {
            header('Location: ' . $this->redirect);

            return;
        }

        if ($this->is404) {
            $this->content = '/not-found';
        }

        echo $this->content;
    }

}