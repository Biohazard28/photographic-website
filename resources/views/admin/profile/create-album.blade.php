@extends('admin.profile.master')
@section('main-panel')

    <article class="module width_full">
        <header><h3>Post New Article</h3></header>
        <form class="form" method="post" action="{{url('album/save')}}"  >
            <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="module_content">

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <fieldset>
                <label>Post Title</label>



                <input type="text" style="height:5%" name="album_name" placeholder="name of the album"  value="{{old('album_name')}}">

            </fieldset>
            <fieldset>
                <label>Content</label>
                <textarea rows="10" name="description" value="{{old('description')}}" ></textarea>
            </fieldset>
            <fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>Category</label>
                <select name="cid" style="width:92%;">
                    @foreach($categories as $category)

                    <option  value="{{$category->id}}">{{$category->category_name}}</option>

                    @endforeach
                </select>
            </fieldset>
            <fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>Tags</label>
                <input type="text" style="width:92%;">
            </fieldset><div class="clear"></div>
        </div>
        <footer>
            <div class="submit_link">
                <select>
                    <option>Draft</option>
                    <option>Published</option>
                </select>
                <input type="submit" value="Publish" class="alt_btn">
                <input type="reset" value="Reset">

            </div>
        </footer>
        </form>
    </article>

@endsection