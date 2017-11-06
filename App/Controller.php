<?php

namespace App;

use App;

class Controller
{
    public function render($viewName, array $params = [])
    {
        $viewFile = ROOTPATH . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $viewName . '.php';
        extract($params);

        ob_start();
        include $viewFile;
        $renderedView = ob_get_clean();

        return $renderedView;
    }

}