<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $title="welcome";
        return view('admin.user.index',compact('title'));
    }

    public function home()
    {
        $title = "Home";
        $carousel = DB::table('categories')
                       ->join('albums','categories.id','=','albums.category_id')
                       ->join('photos','albums.id','=','photos.id')
                       ->select('photos.photo_name','categories.category_name','categories.id')->get();

        $albums = DB::table('photos')
                 ->join('albums','albums.id','=','photos.album_id')
                 ->select('photos.photo_name','album_name','description')->get();


          return view('admin.user.home',compact('title','carousel','albums'));



    }

}
