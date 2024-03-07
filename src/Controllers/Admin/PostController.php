<?php

namespace Admin\Mvcoop2\Controllers\Admin;

use Admin\Mvcoop2\Commons\Controller;
use Admin\Mvcoop2\Models\Category;
use Admin\Mvcoop2\Models\Post;

class PostController extends Controller
{
    private Post $post;

    //* posts 'chấm' ở đây là dùng để nối chuỗi đến thư mục (folder) View/Admin/posts (blade)
    private string $folder = 'posts.';

    const PATH_UPLOAD = '/uploads/posts/';

    public function __construct()
    {
        $this->post = new Post;
    }

    //* Hiển Thị Danh sách
    public function index()
    {
        // Hiển thị danh sách các posts qua func getAll() đã viết ở Models
        $data['posts'] = $this->post->getAll();

        // Sau khi lấy được dữ liệu từ DB thì ta sẽ chạy func renderViewAdmin() để hiển thị view bằng cách nối tên func để trỏ đúng file trong View/Admin/posts
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    //* Xem chi tiết theo ID
    public function show($id)
    {
        // Một cách viết khác để hiển thị danh sách các post qua func getByID($id) đã viết ở Models
        $post = $this->post->getByID($id);

        // Nếu không tìm thấy dữ liệu post nào thì sẽ hiển thị ra trang 404 lỗi không tìm thấy đã viết ở helpers.php
        if (empty($post)) {
            e404();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['post' => $post]);
    }

    //* Xóa theo ID
    public function delete($id)
    {
        // Một cách viết khác để hiển thị danh sách các post qua func getByID($id) đã viết ở Models
        $post = $this->post->getByID($id);

        // Nếu không tìm thấy dữ liệu post nào thì sẽ hiển thị ra trang 404 lỗi không tìm thấy đã viết ở helpers.php
        if (empty($post)) {
            e404();
        }

        // Nếu tìm thấy thì sẽ tiến hành xóa file, chạy func deleteByID đã viết ở Models/post
        $this->post->deleteByID($id);

        // Thực hiện xóa cả file ảnh, if empty ở để để kiểm tra xem file nếu có tồn tại thì sẽ xóa
        if (!empty($post['image']) && file_exists(PATH_ROOT . $post['image'])) {
            unlink(PATH_ROOT . $post['image']);
        }

        //! Lưu ý là khi upload 2 file ảnh giống nhau thì thư mục upload chỉ nhận 1 thôi, nên là nếu xóa file ảnh avt của 1 post thì có thể sẽ
        //! làm mất ảnh của 1 post khác do có sử dụng ảnh giống post bị xóa đó

        //* Vậy nên phải thêm time() để tên ảnh được viết thêm thời gian, giúp dễ phân biệt các ảnh bị giống nhau đó

        header('Location: /admin/posts');
        exit();
    }

    //* Thêm mới 
    public function create()
    {
        $data['categories'] = (new Category)->getAll(); 

        if (!empty($_POST)) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];

            $image = $_FILES['image'] ?? null;
            $imagePath = null;
            if (!empty($image)) {

                // $imagePath = PATH_ROOT . self::PATH_UPLOAD . time() . $image['name'];
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                //* Đoạn mã này sẽ đổi đường dẫn ảnh thành null (tức là không có ảnh được hiển thị) nếu quá trình di chuyển tệp tải lên thất bại.
                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }

            $this->post->insert($category_id, $title, $excerpt, $content, $imagePath);

            header('Location: /admin/posts');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    //* Cập nhật theo ID
    public function update($id)
    {
        $data['post'] = $this->post->getByID($id);
        $data['categories'] = (new Category)->getAll();

        if (empty($data['post'])) {
            e404();
        }

        if (!empty($_POST)) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];

            $image = $_FILES['image'] ?? null;

            //* $imagePath = $post['image']; để đảm bảo rằng khi người dùng không muốn đổi ảnh thì ảnh sẽ vẫn được giữ nguyên
            $imagePath = $data['post']['p_image'];
            $move = false;
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                //* Đoạn mã này giữ hình đại diện của người dùng nguyên vẹn nếu quá trình di chuyển tệp tải lên thất bại
                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $data['post']['p_image'];
                } else {
                    $move = true;
                }
            }

            $this->post->update($id, $category_id, $title, $excerpt, $content, $imagePath);

            //* Nếu move = true thì tức là để cập nhật ảnh thành công, sau đó check xem trong db đã có giá trị ảnh chưa, check lại một lần nữa để đảm bảo rằng
            //* đó là file ảnh file_exists(PATH_ROOT . $data['post']['p_image'] rồi sau đó mới thực hiện xóa ảnh cũ
            if (
                $move
                && $data['post']['p_image']
                && file_exists(PATH_ROOT . $data['post']['p_image'])
            ) {
                unlink(PATH_ROOT . $data['post']['p_image']);
            }

            header('Location: /admin/posts');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

}