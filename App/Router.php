<?php
namespace App;

class Router

{

    public function resolve()
    {
        $route = null;
        $params = [];

        if(($pos = strpos($_SERVER['REQUEST_URI'], '?')) !== false){
            $route = substr($_SERVER['REQUEST_URI'], 0, $pos);
            $params['header'] = $_GET['header'];
            $params['text'] = $_GET['text'];
            $params['blog_id'] = $_GET['blog_id'];
//            var_dump($params);
//            exit;
        }
        $route = is_null($route) ? $_SERVER['REQUEST_URI'] : $route;
        $route = explode('/', $route);
        array_shift($route);
        $result[0] = array_shift($route);
        $result[1] = array_shift($route);
        $result[2] = !empty($params) ? $params : $route;
//        var_dump($result);
//            exit;

        return $result;

    }

}
