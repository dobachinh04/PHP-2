<?php

namespace Admin\Mvcoop2\Controllers\Admin;

use Admin\Mvcoop2\Commons\Controller;
use Admin\Mvcoop2\Models\Category;

class categoryController extends Controller
{
    private Category $category;

    //* categories 'chấm' ở đây là dùng để nối chuỗi đến thư mục (folder) View/Admin/categories (blade)
    private string $folder = 'categories.';

    const PATH_UPLOAD = '/uploads/categories/';

    public function __construct()
    {
        $this->category = new Category;
    }

    //* Hiển Thị Danh sách
    public function index()
    {
        // Hiển thị danh sách các categories qua func getAll() đã viết ở Models
        $data['categories'] = $this->category->getAll();

        // Sau khi lấy được dữ liệu từ DB thì ta sẽ chạy func renderViewAdmin() để hiển thị view bằng cách nối tên func để trỏ đúng file trong View/Admin/categories
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    //* Xem chi tiết theo ID
    public function show($id)
    {
        // Một cách viết khác để hiển thị danh sách các category qua func getByID($id) đã viết ở Models
        $category = $this->category->getByID($id);

        // Nếu không tìm thấy dữ liệu category nào thì sẽ hiển thị ra trang 404 lỗi không tìm thấy đã viết ở helpers.php
        if (empty($category)) {
            e404();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['category' => $category]);
    }

    //* Delete theo ID
    public function delete($id)
    {
        // Một cách viết khác để hiển thị danh sách các category qua func getByID($id) đã viết ở Models
        $category = $this->category->getByID($id);

        // Nếu không tìm thấy dữ liệu category nào thì sẽ hiển thị ra trang 404 lỗi không tìm thấy đã viết ở helpers.php
        if (empty($category)) {
            e404();
        }

        // Nếu tìm thấy thì sẽ tiến hành xóa file, chạy func deleteByID đã viết ở Models/category
        $this->category->deleteByID($category['id']);

        // Thực hiện xóa cả file ảnh, if empty ở để để kiểm tra xem file nếu có tồn tại thì sẽ xóa
        if (!empty($category['avatar']) && file_exists(PATH_ROOT . $category['avatar'])) {
            unlink(PATH_ROOT . $category['avatar']);
        }

        //! Lưu ý là khi upload 2 file ảnh giống nhau thì thư mục upload chỉ nhận 1 thôi, nên là nếu xóa file ảnh avt của 1 category thì có thể sẽ
        //! làm mất ảnh của 1 category khác do có sử dụng ảnh giống category bị xóa đó

        //* Vậy nên phải thêm time() để tên ảnh được viết thêm thời gian, giúp dễ phân biệt các ảnh bị giống nhau đó

        header('Location: /admin/categories');
        exit();
    }

    //* Thêm mới 
    public function create()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];

            $avatar = $_FILES['avatar'] ?? null;
            $avatarPath = null;
            if (!empty($avatar)) {

                // $avatarPath = PATH_ROOT . self::PATH_UPLOAD . time() . $avatar['name'];
                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];

                //* Đoạn mã này sẽ đổi đường dẫn ảnh thành null (tức là không có ảnh được hiển thị) nếu quá trình di chuyển tệp tải lên thất bại.
                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = null;
                }
            }

            $this->category->insert($name, $avatarPath);

            header('Location: /admin/categories');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    //* Cập nhật theo ID
    public function update($id)
    {
        $category = $this->category->getByID($id);

        if (empty($category)) {
            e404();
        }

        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $avatar = $_FILES['avatar'] ?? null;

            //* $avatarPath = $category['avatar']; để đảm bảo rằng khi người dùng không muốn đổi ảnh thì ảnh sẽ vẫn được giữ nguyên
            $avatarPath = $category['avatar'];
            if (!empty($avatar)) {

                // $avatarPath = PATH_ROOT . self::PATH_UPLOAD . time() . $avatar['name'];
                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];

                //* Đoạn mã này giữ hình đại diện của người dùng nguyên vẹn nếu quá trình di chuyển tệp tải lên thất bại
                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = $category['avatar'];
                }
            }

            $this->category->update($id, $name, $avatarPath);

            header('Location: /admin/categories');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['category' => $category]);
    }

}