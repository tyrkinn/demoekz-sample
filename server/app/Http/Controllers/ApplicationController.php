<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "name" => ['string', 'max:255', 'required'],
            "description" => ['string', 'max:500'],
            "categoryId" => ['required', 'integer'],
            "photo" => ['file', 'mimes:jpg,jpeg,bmp,png', 'max:10240']
        ]);

        $newApplication = new Application;

        $newApplication->name = $request->name;
        $newApplication->description = $request->description;
        $newApplication->category_id = $request->categoryId;
        $photo = $request->file('photo');
        $path = $photo->storePublicly('public');
        $newApplication->photo_url = Storage::url(str_replace('public/', '', $path));
        $newApplication->save();

        return $newApplication;
    }

    public function getAll()
    {
        return Application::all();
    }

    public function getById($id)
    {
        $application = Application::find($id);

        return $application;
    }


    public function getLastFiveSolved()
    {
        return Application::where('status', 'solved')->take(-5)->get();
    }
}
