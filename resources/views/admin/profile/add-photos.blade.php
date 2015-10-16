@extends('admin.profile.master')
@section('main-panel')


    <article class="module width_full">
        <header><h3>Add new Category</h3></header>
        <form class="form-group" action="{{url('upload')}}" method="post"  enctype="multipart/form-data">
            <input type="hidden" value ="{{csrf_token()}}" name="_token" >
            <input type="hidden" name="album_id" value="{{$albums->id}}">
            <div class="module_content">
                <fieldset >
                    <label>Category Title</label>
                </fieldset>
                <fieldset>


                        <input type="file"  name="image">

                </fieldset>
                <div class="clear"></div>
                <footer>
                    <div class="submit_link">

                        <button class="btn btn-danger">Upload</button>

                    </div>

                </footer>

            </div>
        </form>
    </article>
@endsection