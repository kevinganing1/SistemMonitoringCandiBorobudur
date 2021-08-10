<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kuliner</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll active" href="#">Kuliner</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          @if(Auth::check())
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/home">Home</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/">Home</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/kuliner">Kuliner</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/wisata">Wisata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/event">Event</a>
          </li>
          @if(Auth::check())
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn btn-link dropdown-toggle nav-link js-scroll" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{auth()->user()->name}}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/logout">LOGOUT</a>
            </div>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link js-scroll" href="/login">Login</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(/img/candiborobudur.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Kuliner</h2>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section id="about" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
      @foreach($data_kuliner as $kuliner)
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-img">
              <a href="/kuliner/{{$kuliner->id}}"><img src="{{$kuliner->getGambar()}}" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <h2 class="card-title"><a href="#">{{$kuliner->nama_kuliner}}</a></h2>
              <p class="card-description">
                {{$kuliner->deskripsi}}
              </p>
              <h6 class="card-description"><a href="#">{{$kuliner->lokasi}}</a></h6>
            </div>
            <div class="card-footer">
              <div class="post-author">
                <a href="#">
                  <span class="card-title">{{$kuliner->waktu}}</span>
                </a>
              </div>
              <div class="post-date">
                <span class="card-title">{{$kuliner->harga}}</span> 
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  </section>
  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(/img/awan.jpg)">
    <div class="overlay-mf"></div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>Candi Borobudur</strong>. All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/lib/popper/popper.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="/lib/easing/easing.min.js"></script>
  <script src="/lib/counterup/jquery.waypoints.min.js"></script>
  <script src="/lib/counterup/jquery.counterup.js"></script>
  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/lib/lightbox/js/lightbox.min.js"></script>
  <script src="/lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/js/main.js"></script>

</body>
</html>
