@extends('admin.user.master')
<body style="height:768px;width:100%" xmlns="http://www.w3.org/1999/html">
<nav class="navbar navbar-default navbar-fixed-top header">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a> <!-- Your logo here-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" id="menu">
                <li class="active"><a class="page-scroll" href="#banner">Home</a></li>
                <li class=""><a class="page-scroll" href="#portfolio">Albums</a></li>
                <li><a class="page-scroll" href="#about">About</a></li>
                <li><a class="page-scroll" href="#contact">Contact</a></li>
                <li><a href="blog.html">Blog</a></li>
            </ul>
        </div><!-- End navbar-collapse -->
    </div><!-- End container -->
</nav>


<div  class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" ><!-- Inner wrapper for slides -->
    @foreach($carousel as $index =>$image)

        <div class="item @if($index == '1'){{'active'}}@endif"> <!-- First item slider -->
            <img src="{{  url('images/photos').'/'.$image->photo_name}}"> <!-- First item background image slider -->
            <div class="carousel-caption overlay">
                <div class="content">
                    <div class="text wow bounceIn animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.2s; -webkit-animation-delay: 0.2s; animation-name: bounceIn; -webkit-animation-name: bounceIn;">
                        <h1>{{$image->category_name.' photography'}}</h1>

                    </div>
                </div>
            </div> <!-- End first item background image slider -->
        </div> <!-- End first item slider -->
        @endforeach
    </div>


    <!-- Controls -->
    <div class="arrow">
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span><img src="{{ url('user/image/left.png')}}"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span><img src="{{ url('user/image/right.png')}}"></span>
        </a>


  </div>
    </div>
<section id="portfolio" class="grid">
    <div class="header2">
        <p>Latest Album </p>
    </div>
    @foreach($albums as $album)
<figure class="albums"> <!-- Portfolio 1 -->
    <img src="{{url('images/Photos').'/'.$album->photo_name}}" alt="01_img" style="width:10%;height:450px;"> <!-- Your image here -->
    <figcaption><!-- Caption -->

        <p>{{$album->album_name}}</p>



    </figcaption> <!-- End caption -->
</figure>

@endforeach
</section>
<section id="contact1" class="grid">
    <div class="header2" id="contact">

    </div>
     <div id="contact-form">
         <p>Get in touch with me</p>
      <form action="sendEmail" method="post">
          <input type="text" name="name" placeholder="Enter Your Name">
          <input type="email" name="email" placeholder="You@example.com">
          <textarea name="message" placeholder="Message"></textarea>
          <input type="submit" value ="Send">
      </form>
     </div>
     <div id="contact-details">
         <h1><b>Contact Me</b></h1>
       <div class="cdetails"><span class="contact-icon"><img src="{{url('user/image/phone_icon.png')}}"></span>
           +91-9038669257</div>
         <div class="cdetails"><span class="contact-icon"><img src ="{{url('user/image/email_icon.png')}}"></span>
                 example@example.com</div>

     </div>
</section>
<section id="map" class="grid">

</section>
<script
        src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
    var myCenter=new google.maps.LatLng(22.595867, 88.432488);
    var marker;

    function initialize()
    {
        var mapProp = {
            center:myCenter,
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map=new google.maps.Map(document.getElementById("map"),mapProp);

        var marker=new google.maps.Marker({
            position:myCenter,
            animation:google.maps.Animation.BOUNCE
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
