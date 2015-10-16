@extends('admin.profile.master')
@section('main-panel')

    <article class="module width_full">
        <header><h3>Add new Category</h3></header>
        <form class="form" method="post" action="{{url('add-category')}}"  >
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


                <fieldset >
                    <label>Category Title</label>



                    <input type="text" style="height:5%;margin-bottom:2%" name="category_name" placeholder="name of the category" value="{{old('category_name')}}" >

                </fieldset>
               <div class="clear"></div>
            <footer>

                <div class="submit_link">

                    <input type="submit" value="Create" class="alt_btn">
                    <input type="reset" value="reset">
                </div>

            </footer>

                </div>
        </form>
    </article>

@endsection