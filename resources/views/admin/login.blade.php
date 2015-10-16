<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{url(elixir('css/all.css'))}}">

</head>
<body>
<div class="well" style="width:350px;height:300px;margin:200px auto">
<form method="POST" action="{{route('login')}}" class="form-horizontal">
    {!! csrf_field() !!}

    @if(count($errors)>0)

        <ul>
        @foreach($errors->all() as $error)
           <li>{{$error}}</li>

        @endforeach
            </ul>
        @endif
    <div class="form-group-danger">
      <div class="col-lg-12">
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter your Email" value="{{ old('email') }}" >
      </div><br><br><br>
    </div>

    <div class="form-group-danger">

    <div class="col-lg-12">
        <input type="password" class="form-control" id="inputPassword" placeholder=" Enter your Password" name="password">
    </div>
       <input type="checkbox">

    <button class="btn btn-success btn-lg" type="submit" style="width:300px;height:40px">Login</button><br>

    <a href="{{'auth/facebook'}}"><img src="{{url('images/btnLoginFacebook.png')}}" width="300" height="40"></a>
</form>
</div>
</body>
</html>