<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies')->paginate(3);
        return response()->json(
            [
                'projects' => $projects,
                'success' => true
            ]
        );
    }
}
