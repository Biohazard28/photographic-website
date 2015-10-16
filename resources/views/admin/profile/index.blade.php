@extends('admin.profile.master')
@section('main-panel')
    <article class="module width_3_quarter">
        <header><h3 class="tabs_involved">Content Manager</h3>
            <ul class="tabs">
                <li><a href="#tab1">Posts</a></li>
                <li><a href="#tab2">Comments</a></li>
            </ul>
        </header>

        <div class="tab_container" style="max-height:400px;overflow-y:scroll;">
            <div id="tab1" class="tab_content">
                <table class="tablesorter" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Album Nmae</th>
                        <th>Category</th>
                        <th>Created On</th>
                        <th>Actions</th>
                    </tr>

                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                    <tr>

                        <td>{{$category->album_name}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a href="{{url('album').'/'.$category->id.'/'.'add-photos'}}">
                            <input type="image" src="{{url('admin/images/icn_edit.png')}}" title="Edit"></a>&nbsp;&nbsp;
                            <input type="image" src="{{url('admin/images/icn_trash.png')}}" title="Trash"></td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- end of #tab1 -->

            <div id="tab2" class="tab_content">
                <table class="tablesorter" cellspacing="0">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Comment</th>
                        <th>Posted by</th>
                        <th>Posted On</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>Lorem Ipsum Dolor Sit Amet</td>
                        <td>Mark Corrigan</td>
                        <td>5th April 2011</td>
                        <td><input type="image" src="images/icn_edit.png" title="Edit"><input type="image" src="images/icn_trash.png" title="Trash"></td>
                    </tr>

                    </tbody>
                </table>

            </div><!-- end of #tab2 -->

        </div><!-- end of .tab_container -->

    </article><!-- end of content manager article -->

    <article class="module width_quarter">
        <header><h3>Messages</h3></header>
        <div class="message_list">
            <div class="module_content">
                <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
                    <p><strong>John Doe</strong></p></div>
                <div class="message"><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor.</p>
                    <p><strong>John Doe</strong></p></div>

            </div>
        </div>
        <footer>
            <form class="post_message">
                <input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
                <input type="submit" class="btn_post_message" value=""/>
            </form>
        </footer>
    </article><!-- end of messages article -->

    <div class="clear"></div>

    @endsection




