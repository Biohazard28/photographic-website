<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Album;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $categories = DB::table('albums')
            ->join('categories','albums.category_id','=','categories.id')
            ->select('albums.id','categories.category_name','albums.album_name','albums.created_at')->get();
        return view('admin.profile.index',compact('categories'));

    }




}
