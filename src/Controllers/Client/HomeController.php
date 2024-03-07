<?php

namespace Admin\Mvcoop2\Controllers\Client;

use Admin\Mvcoop2\Commons\Controller;
use Admin\Mvcoop2\Commons\Model;
use Admin\Mvcoop2\Models\Post;

class HomeController extends Controller
{

    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function index()
    {
        $postFirstLatest = $this->post->getFirstLatest();

        $postTop6 = $this->post->getTop6();
        $postTop6Chunk = array_chunk($postTop6, 3);

        $getTrendingPostsByView = $this->post->getTrendingPostsByView();

        return $this->renderViewClient(
            'home',
            [
                'postFirstLatest' => $postFirstLatest,
                'postTop6Chunk' => $postTop6Chunk,
                'getTrendingPostsByView' => $getTrendingPostsByView
            ]
        );

        // public function index2()
        // {
        //     echo 'Đây là trang chủ 2' . __FUNCTION__;
        // }
    }

}