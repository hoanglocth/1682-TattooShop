<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

}
