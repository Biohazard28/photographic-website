<?php

namespace App\Http\Controllers;
use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageServiceProvider;

class AlbumController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewAlbumList()
{
    //showing all the albums list
    if(Auth::user()) {
        $Albums = Album::all();
        return view('admin.album')->with('albums', $Albums);
    }
    else{

        return redirect(route('login'));
    }
}

    public function newAlbum()

    {
        $categories = Category::all();

        return view('admin.profile.create-album',compact('categories'));

    }

    public function newCategory()
    {
        return view('admin.profile.category');
    }

    public function addPhotos($id)
    {
     $albums =  Album::findOrFail($id);
      return view('admin.profile.add-photos',compact('albums'));
    }
 //function for save the album in database

 public function saveAlbum( Request $request)
 {
    //Validating the album fields




     $validator = Validator::make($request->all(), ['album_name'=>'required|min:4',
                                                    'description' =>'required|min:30']);

     if($validator->fails())
     {
         return redirect('new-album')
             ->withErrors($validator)
             ->withInput();

     }



     //saving a new albums in database
      $Album = new Album;
      $Album->album_name = $request->input('album_name');
      $Album->description =$request->input('description');
      $Album->category_id=$request->input('cid');

      $Album->save();

      return redirect()->back();

 }
 public function viewAlbumPics($id)

 {
    //showing the albums-details by its id

     $albums =Album::findOrFail($id);
     $photos =$albums->photos()->get();
     return view('admin.album-details',compact('albums','photos'));

 }
    //function for adding photos
 public function uploadPhotos(Request $request)
 {
     //adding image during image intervention

     $image = Input::file('image');
     $filename = time() . '-' . $image->getClientOriginalName();
     $path = $image->move('images\photos',$filename);
    // Image::make($image->getRealPath())->resize('600','400')->save($path);

     $photo = new Photo;
     $photo->photo_name = $filename;
     $photo->album_id = $request->input('album_id');
     $photo->save();
     return redirect('profile');

 }
    public function addCategory(Request $request)
 {

     $validator = Validator::make($request->all(), ['category_name'=>'required|min:4']);

     if($validator->fails())
     {
         return redirect('new-category')
             ->withErrors($validator)
             ->withInput();

     }
     $category = new Category;
     $category->category_name = $request->input('category_name');

     $category->save();
     return redirect()->back();
 }
  //show album's photos
  public function showAlbumPhotos()
  {
   //$photos = Photo::findOrFail($id);
   return view('admin.user.show-album-photos');
  }
}

