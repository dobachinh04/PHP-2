<?php

namespace Admin\Mvcoop2\Controllers\Client;

use Admin\Mvcoop2\Commons\Controller;
use Admin\Mvcoop2\Commons\Model;
use Admin\Mvcoop2\Models\Search;

class SearchController extends Controller
{
    private Search $search;

    //* posts 'chấm' ở đây là dùng để nối chuỗi đến thư mục (folder) View/Admin/posts (blade)
    private string $folder = 'posts.';

    const PATH_UPLOAD = '/uploads/posts/';

    public function __construct()
    {
        $this->search = new Search;
    }

    //* Hiển Thị Danh sách
    public function index()
    {
        // Hiển thị danh sách các posts qua func getAll() đã viết ở Models
        $data['users'] = $this->search->Searched();

        // Sau khi lấy được dữ liệu từ DB thì ta sẽ chạy func renderViewAdmin() để hiển thị view bằng cách nối tên func để trỏ đúng file trong View/Admin/posts
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
}
