<?php

namespace Admin\Mvcoop2\Controllers\Admin;

use Admin\Mvcoop2\Commons\Controller;
use Admin\Mvcoop2\Models\User;

class AuthenticateController extends Controller
{
    private User $user;

    private string $folder = 'users.';

    const PATH_UPLOAD = '/uploads/users/';
    public function __construct()
    {
        $this->user = new User;
    }
    public function login()
    {
        // Validate
        if (!empty($_POST)) {
            $_SESSION['errors'] = [];

            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if (empty($email)) {
                $_SESSION['errors']['email'] = 'Email Không Được Để Trống';
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errors']['email'] = 'Email Nhập Sai Định Dạng';
            }

            if (empty($password)) {
                $_SESSION['errors']['password'] = 'Mật Khẩu Không Được Để Trống';
            }

            $user = (new User)->getByEmailAndPassword($_POST['email'], $_POST['password']);

            if (empty($user)) {
                $_SESSION['errors']['not-found'] = 'Không Tìm Thấy Người Dùng';

            } elseif ($_SESSION['user']['role'] == 1) {
                $_SESSION['user'] = $user;

                echo "<script>alert('Đăng Nhập Thành Công!')</script>";

                header('Location: /admin/');
                exit();

            } elseif ($_SESSION['user']['role'] == 0) {
                $_SESSION['user'] = $user;

                echo "<script>alert('Đăng Nhập Thành Công!')</script>";

                header('Location: /');
                exit();
            }
        }
        // Hiển thị view theo tên func (ở đây là login, hiển thị view blade login)
        return $this->renderViewClient(__FUNCTION__);
    }

    public function register()
    {
        if (!empty($_POST)) {
            $_SESSION['errors_register'] = [];

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];

            if (empty($name)) {
                $_SESSION['errors_register']['name'] = 'Tên Không Được Để Trống';
            }

            if (empty($email)) {
                $_SESSION['errors_register']['email'] = 'Email Không Được Để Trống';
            }

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errors_register']['email'] = 'Email Nhập Sai Định Dạng';
            }

            if (empty($password)) {
                $_SESSION['errors_register']['password'] = 'Mật Khẩu Không Được Để Trống';
            } else {
                if ($password != $re_password) {
                    $_SESSION['errors_register']['password'] = 'Nhập Lại Mật Khẩu Không Trùng Khớp';
                }
            }



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

            if (empty($_SESSION['errors_register'])) {
                echo "<script>alert('Tạo Tài Khoản Thành Công!')</script>";
                $this->user->insert($name, $email, $password, $avatarPath);

                header('Location: /auth/login');
                exit();
            }
        }

        return $this->renderViewClient(__FUNCTION__);
    }

    public function logout()
    {
        session_destroy();

        header('Location: /auth/login');
        exit();
    }

}
