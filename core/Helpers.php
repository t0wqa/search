<?php

namespace Core;


class Helpers
{

    public static function render(Layout $layout, $file, $params = [])
    {
        ob_start();

        extract($params);
        require (__DIR__ . '/../app/view/' . $file . '.php');

        $content = ob_get_contents();
        ob_end_clean();

        return $layout->render($content);
    }

    public static function renderNotFound()
    {
        $layout = new Layout();

        $layout->setBaseView('base');
        $layout->setTitle('Not Found');

        return static::render($layout, 'not-found');
    }

}