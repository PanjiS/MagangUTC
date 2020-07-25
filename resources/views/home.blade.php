@extends('layout.navbar')

@section('title','Analisis Penilaian')

@section('container')
  

<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="/img/banner2.jpeg" alt="Gambar - 1" width="1280" height="700">
    <div class="carousel-caption">
      <!-- <h3>Slide 1</h3>
      <p>Deskripsi Slide 1</p> -->
    </div>
  </div>
  <div class="carousel-item">
    <img src="/img/banner1.png" alt="Gambar - 2" width="1280" height="700">
    <div class="carousel-caption">
      <!-- <h3>Slide 2</h3>
      <p>Deskripsi Slide 2</p> -->
    </div>
  </div>
  <div class="carousel-item">
    <img src="/img/wallpaper.jpg" alt="Gambar - 3" width="1280" height="700">
    <div class="carousel-caption">
      <!-- <h3>Slide 3</h3>
      <p>Deskripsi Slide 3</p> -->
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div id="copyright text-right">© Copyright 2020 Magang TI UMY Melinda Panji Namira</div>

  </div>
</div>


@endsection

<!-- </body>
</html> -->