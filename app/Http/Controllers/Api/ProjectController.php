<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('brand', 'category')->paginate(5);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('brand', 'category', 'colors', 'texture')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $product
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Product not found !'
            ]);
        }


    }
}
