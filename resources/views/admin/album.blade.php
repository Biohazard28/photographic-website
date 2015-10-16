








         <table class="table">
             @foreach($albums as $Album)
           <tr><th>{{$Album->album_name}}</th></tr>
             <tr>
               <td>{{$Album->description}}</td>
               <td><a href="{{url('album/view').'/'.$Album->id}}">View</a></td>
             </tr>
               @endforeach
         </table>

