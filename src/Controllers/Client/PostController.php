<?php

namespace Admin\Mvcoop2\Controllers\Client;

use Admin\Mvcoop2\Commons\Controller;
use Admin\Mvcoop2\Commons\Model;
use Admin\Mvcoop2\Models\Post;

class PostController extends Controller
{

    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function show($id)
    {
        $post = $this->post->getByID($id);

        return $this->renderViewClient('post-show', ['post' => $post]);

        // public function index2()
        // {
        //     echo 'Đây là trang chủ 2' . __FUNCTION__;
        // }
    }

    public function category($categoryID)
    {
        $getPostsByCategoryID = $this->post->getPostsByCategoryID($categoryID);

        return $this->renderViewClient(
            'category',
            [
                'getPostsByCategoryID' => $getPostsByCategoryID
            ]
        );
    }

}