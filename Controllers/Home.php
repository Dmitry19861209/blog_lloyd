<?php

namespace Controllers;

use App\Db;

class Home extends \App\Controller
{
    /*
     * Show all blogs
     */
    public function index()
    {
        $blogs = (new Db())->execute("SELECT * FROM blogs;");
        return $this->render('Home', ['blogs' => $blogs]);
    }

}