<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TrainingCourseDataTable;
use App\Http\Controllers\Controller;
use App\Models\TrainingCourse;
use Illuminate\Http\Request;

class TrainingCourseController extends Controller
{
    public function index(TrainingCourseDataTable $dataTable)
    {
        return $dataTable->render('admin.trainingcourse.index');
    }


    public function create()
    {
        return view('admin.trainingcourse.create');
    }

    public function store(Request $request)
    {
        
    }
}
