<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function showFrame(Lecture $lecture)
    {
        return view($lecture->view_name);
    }
}
