<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentsResource;

class StudentsController extends Controller
{
    public function index()
    {
        return StudentsResource::collection(Student::all());
    }
}
