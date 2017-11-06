<?php

namespace Controllers;

use App\Db;

class Blog extends \App\Controller
{
    /*
     * View for add blog
     */
    public function addView()
    {
        return $this->render('Add');
    }

    /*
     * Add blog GET
     */
    public function add($params)
    {
        $id = (new Db())->execute("SELECT * FROM blogs order by id DESC limit 1");
        $id = $id ? $id : 0;
        (new Db())->insert(['blog_id' => ((int) $id + 1), 'header' => $params['header'], 'text' => $params['text']]);
        return header('Location: /');
    }

    /*
     * Show one blog
     */
    public function show($id)
    {
        $blog = (new Db())->execute("SELECT * FROM blogs WHERE id=" . $id[0]);
        return $this->render('Show', ['blog' => $blog[0]]);
    }

    /*
     * Edit blog
     */
    public function edit($params)
    {
        (new Db())->update(['header' => $params['header'], 'text' => $params['text'], 'blog_id' => $params['blog_id']]);
        return header('Location: /blog/show/' . $params['blog_id']);
    }

    /*
     * Delete blog
     */
    public function delete($id)
    {
        (new Db())->delete(['blog_id' => $id]);
//        return header('Location: /blog/show/' . $params['blog_id']);
    }
}