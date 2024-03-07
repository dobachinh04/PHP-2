<?php

namespace Admin\Mvcoop2\Controllers\Admin;

use Admin\Mvcoop2\Commons\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->renderViewAdmin('dashboard');
    }
}