<?php

abstract class AController
{
    abstract function execute();

    protected function render($file, $params)
    {
        extract($params);
        ob_start();
        include('./view/' . $file . '.php');

        return ob_get_clean();
    }
}