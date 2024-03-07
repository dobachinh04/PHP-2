<?php

namespace Admin\Mvcoop2\Controllers\Admin;

use Admin\Mvcoop2\Commons\Controller;
use Admin\Mvcoop2\Models\User;

class UserController extends Controller
{
    private User $user;

    //* users 'chấm' ở đây là dùng để nối chuỗi đến thư mục (folder) View/Admin/users (blade)
    private string $folder = 'users.';

    const PATH_UPLOAD = '/uploads/users/';

    public function __construct()
    {
        $this->user = new User;
    }

    //* Hiển Thị Danh sách
    public function index()
    {
        // Hiển thị danh sách các users qua func getAll() đã viết ở Models
        $data['users'] = $this->user->getAll();

        // Sau khi lấy được dữ liệu từ DB thì ta sẽ chạy func renderViewAdmin() để hiển thị view bằng cách nối tên func để trỏ đúng file trong View/Admin/users
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    //* Xem chi tiết theo ID
    public function show($id)
    {
        // Một cách viết khác để hiển thị danh sách các user qua func getByID($id) đã viết ở Models
        $user = $this->user->getByID($id);

        // Nếu không tìm thấy dữ liệu user nào thì sẽ hiển thị ra trang 404 lỗi không tìm thấy đã viết ở helpers.php
        if (empty($user)) {
            e404();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['user' => $user]);
    }

    //* Delete theo ID
    public function delete($id)
    {
        // Một cách viết khác để hiển thị danh sách các user qua func getByID($id) đã viết ở Models
        $user = $this->user->getByID($id);

        // Nếu không tìm thấy dữ liệu user nào thì sẽ hiển thị ra trang 404 lỗi không tìm thấy đã viết ở helpers.php
        if (empty($user)) {
            e404();
        }

        // Nếu tìm thấy thì sẽ tiến hành xóa file, chạy func deleteByID đã viết ở Models/User
        $this->user->deleteByID($user['id']);

        // Thực hiện xóa cả file ảnh, if empty ở để để kiểm tra xem file nếu có tồn tại thì sẽ xóa
        if (!empty($user['avatar']) && file_exists(PATH_ROOT . $user['avatar'])) {
            unlink(PATH_ROOT . $user['avatar']);
        }

        //! Lưu ý là khi upload 2 file ảnh giống nhau thì thư mục upload chỉ nhận 1 thôi, nên là nếu xóa file ảnh avt của 1 user thì có thể sẽ
        //! làm mất ảnh của 1 user khác do có sử dụng ảnh giống user bị xóa đó

        //* Vậy nên phải thêm time() để tên ảnh được viết thêm thời gian, giúp dễ phân biệt các ảnh bị giống nhau đó

        header('Location: /admin/users');
        exit();
    }

    //* Thêm mới 
    public function create()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

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

            $this->user->insert($name, $email, $password, $avatarPath);

            header('Location: /admin/users');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    //* Cập nhật theo ID
    public function update($id)
    {
        $user = $this->user->getByID($id);

        if (empty($user)) {
            e404();
        }

        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $avatar = $_FILES['avatar'] ?? null;

            //* $avatarPath = $user['avatar']; để đảm bảo rằng khi người dùng không muốn đổi ảnh thì ảnh sẽ vẫn được giữ nguyên
            $avatarPath = $user['avatar'];
            if (!empty($avatar)) {

                // $avatarPath = PATH_ROOT . self::PATH_UPLOAD . time() . $avatar['name'];
                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];

                //* Đoạn mã này giữ hình đại diện của người dùng nguyên vẹn nếu quá trình di chuyển tệp tải lên thất bại
                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = $user['avatar'];
                }
            }

            $this->user->update($id, $name, $email, $password, $avatarPath);

            header('Location: /admin/users');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['user' => $user]);
    }

}