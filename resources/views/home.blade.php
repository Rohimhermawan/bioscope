<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bioscope</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('files/Logo.png')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/fonts/icomoon/style.css')}}">    
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('user/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('files/general.css')}}">
    <script src="https://kit.fontawesome.com/1479144cfe.js" crossorigin="anonymous"></script>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <!-- modal -->
    <!-- logo -->
    <div class="modal fade" id="tanda" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Logo</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body logo p-0">
              <img src="{{asset('files/event/logo-in.png')}}" alt="Popup Logo">
            </div>
          </div>
        </div>
    </div>
    <!-- introduction -->
    <div class="modal fade" id="introduction" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Introduction</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body logo p-0">
              <img src="{{asset('files/event/what-in.jpeg')}}" alt="Popup Introduction">
            </div>
          </div>
        </div>
    </div>
    <!-- maskot -->
    <div class="modal fade" id="maskot" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Maskot</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body logo p-0">
              <img src="{{asset('files/event/mascot-in.jpeg')}}" alt="Popup Mascot">
            </div>
          </div>
        </div>
    </div>
    <!-- tema -->
    <div class="modal fade" id="tema" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
      <div class="modal-dialog modal-lg  modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tema</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body logo p-0">
              <img src="{{asset('files/event/theme-in.png')}}" alt="Popup Theme">
            </div>
          </div>
      </div>
    </div>
    <!-- olym -->
    <div class="modal fade" id="Olym" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Medical Olympiade</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body logo p-0">
              <img src="{{asset('files/competition/medolym-in.png')}}" alt="Popup Medical Olympiad">
            </div>
          </div>
      </div>
    </div>
    <!-- Poster -->
    <div class="modal fade" id="Poster" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Public Poster</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body logo p-0">
              <img src="{{asset('files/competition/poster-in.jpg')}}" alt="Popup Public Poster">
            </div>
          </div>
      </div>
    </div>
    <!-- Essay -->
    <div class="modal fade" id="Essay" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel7" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scientific Essay</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body logo p-0">
              <img src="{{asset('files/competition/essay-in.png')}}" alt="Popup Scientitic Essay">
            </div>
          </div>
      </div>
    </div>
    <!-- docum -->
    <div class="modal fade" id="Docum" tabindex="-99" role="dialog" aria-labelledby="exampleModalLabel8" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Documentations</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body logo p-0">
              <img src="{{asset('files/competition/documentation-in.jpg')}}" alt="Popup Documentation">
            </div>
          </div>
      </div>
    </div>
    </div>
  <div style="background-image: url({{asset('files/homepage/full.png')}}); background-size:cover;">
  <!-- <div class="sponsor d-flex justify-content-center" style="height:80px; background-color: red;">
    <div style="color: white; background-color: seagreen; width: 70px; height:70px; border-radius: 50%; padding-left:15px;">Ini</div>
    <div style="color: white; background-color: seagreen; width: 70px; height:70px; border-radius: 50%; padding-left:15px;">Logo</div>
  </div> -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
    <div class="site-logo mr-auto w-25">
      <a id="up" href="#top">
        <img src="{{asset('logo.png')}}" id="logo" alt="Bioscope">
      </a>
    </div>
          <ul>
            <li class="cta">
              <a href="#down" class="nav-link" style="position: absolute; right: 0%; top: 15%"><span>Contact Us</span></a>
            </li>
          </ul>
        </div>
  </nav>
<div class="intro-section" id="home-section"> 
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center">
                <div class="col-lg-6 mb-4 justify-content-center text-center text-dark">
                <h1  data-aos="fade-up" data-aos-delay="100" style="margin:auto; font-size:5em;">Welcome</h1>
                  <h1 class="section-title" data-aos="fade-up" data-aos-delay="100" style="margin:auto">BIOSCOPE</h1>
                  <h2 class="mb-4 text-white"  data-aos="fade-up" data-aos-delay="200">Biomedical Science Competition</h2>
                  <p data-aos="fade-up" data-aos-delay="300">
                    @if($data->first()->nilai == "Aktif")
                    <a href="{{route('login')}}" class="btn btn-success py-3 px-5 btn-pill">Login Now</a>  
                    @endif
                    @if($data->find(2)->nilai == "Aktif")
                    <a href="{{route('registrasi')}}" class="btn btn-primary py-3 px-5 btn-pill">Register</a>
                    @endif
                  </p>
                  <p data-aos="fade-up" data-aos-delay="300">
                    @if($data->first()->nilai == "Aktif" || $data->last()->nilai == "Aktif")
                    <a href="{{$data->find(9)->nilai}}" target="_blank" class="py-3 px-5 btn btn-warning btn-pill">See the Guideline</a>
                    @endif
                  </p>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  
  <!-- Pengenalan -->
    <div class="site-section middle"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row justify-content-center">
          <h2 class="text-white section-title">About Us</h2>
        </div>
        <div class="row">
          <div class="owl-carousel col-12 nonloop-block-14">
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#introduction">
            <img class="my-3" src="{{asset('files/event/what-out.png')}}" alt="Introduction">
              </img>
            </div>
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#tanda">
            <img class="my-3" src="{{asset('files/event/logo-out.png')}}" alt="Logo">
              </img>
            </div>
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#maskot">
              <img class="my-3" src="{{asset('files/event/mascot-out.png')}}" alt="Mascot">
              </img>
            </div>
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#tema">
              <img class="my-3" src="{{asset('files/event/theme-out.png')}}" alt="Theme">
              </img>
            </div>
          </div>      
        </div>
        <div class="row d-flex justify-content-center" id="prev">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
        </div>
      </div>
    </div>
    <div class="site-section last" id="programs-section" data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="100">
            <h2 class="section-title text-white">Our Events</h2>
          </div>
        </div>
        <div class="site-section mb-5" data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="100">
            <h1 class="text-white">Competition</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="owl-carousel col-12 nonloop-block-14">
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#Olym">
            <img class="my-3" src="{{asset('files/competition/medolym-out.png')}}" alt="Medical Olympiad">
            </div>
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#Essay">
            <img class="my-3" src="{{asset('files/competition/essay-out.png')}}" alt="Scientific Essay">
            </div>
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#Poster">
            <img class="my-3" src="{{asset('files/competition/poster-out.jpg')}}" alt="Public Poster">
            </div>
            <div class="course bg-white h-100 align-self-stretch" data-toggle="modal" data-target="#Docum">
            <img class="my-3" src="{{asset('files/competition/documentation-out.png')}}" alt="Documentation">
            </div>
        </div>
        <div class="row justify-content-center" id="prev">
          <div class="col-7 text-center d-flex">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div>
      </div>
    </div>
        <div id="program1" class="row align-items-center justify-content-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('files/program/webinar.png')}}" alt="Webinar" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Webinar</h2>
            <!-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p> -->
            @if ($data->find(14)->nilai == "Tidak Aktif")
            <a class="btn btn-warning btn-pill" style="color: honeydew;">Coming Soon!</a>
            @else
            <a class="btn btn-success btn-pill" href="{{route('webinar')}}" style="color: honeydew;">See More</a>
            @endif
          </div>
        </div>

        <div id="program2" class="row mb-5 align-items-center justify-content-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset('files/program/merch.png')}}" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Merchandise</h2>
            <!-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem maxime nam porro possimus fugiat quo molestiae illo.</p> -->
            @if ($data->find(17)->nilai == "Tidak Aktif")
            <a class="btn btn-warning btn-pill" style="color: honeydew;">Coming Soon!</a>
            @else
            <a class="btn btn-success btn-pill" href="{{$data->find(19)->nilai}}" style="color: honeydew;">See More!</a>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Timeline -->
      <div class="site-section timeline" id="courses-section" data-aos="fade" data-aos-delay="100">
        <div class="container">
          <div class="row justify-content-center text-white mb-5">
            <h1>Timeline Competition</h1>  
          </div>
        </div>
      </div>
      <div class="site-section text-center position-relative" id="T1" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div id="line"></div>
          <div class="row text-center align-round" id="satu">
            <div class="col-xl-2 tengah bg-warning satu">
            <div class="one px-3">12-26 July 2021</div> 
            Early Registration 
            </div>
            <div id="line1"></div>
            <div id="round1"></div>
            <div class="col-xl-2 tengah bg-warning dua" id="dua">
            <div class="two px-3">9-23 August 2021</div>
            <p>Late Registration</p>
            </div>
            <div id="line2"></div>
            <div id="round2"></div>
            <div class="col-xl-2 pt-2 bg-warning satu" id="tiga">
            <div class="one px-3">18 September 2021</div>
            <p>Medical Olympiad Elimination & Submission of Public Poster and Scientific Essay</p>
            </div>
            <div id="line3"></div>
            <div id="round3"></div>
            <div class="col-xl-2 tengah bg-warning dua" id="empat">
            <div class="two px-2">19 September 2021</div>
            <p>First Elimination Announcement</p>
            </div>
            <div id="line4"></div>
            <div id="round4"></div>
            <div class="col-xl-2 tengah bg-warning satu" id="lima">
            <div class="one px-3">29 October 2021</div>
            <p>Opening</p>
            </div>
            <div id="line5"></div>
            <div id="round5"></div>
            <div class="col-xl-2 pt-2 bg-warning dua" id="enam">
            <div class="two px-3">30 October 2021</div>
            <p>Semi-final : Medical Olympiad</p>
            <p>Final : Public Poster</p>
            </div>
            <div id="line6"></div>
            <div id="round6"></div>
            <div class="col-xl-2 pt-2 bg-warning satu" id="tujuh">
            <div class="one px-3" >31 October 2021</div>
            <p>Final : Medical Olympiad & Scientific Essay</p>
            </div>
            <div id="line7"></div>
            <div id="round7"></div>
          </div>
        </div>
      </div>

  </div>
    <footer class="py-1 text-white" style="background-color: rgb(89,89,89); margin-bottom: -70px;">
      <div class="row">
        <div class="col-md-5" id="down">
          <b class="ml-2">Hubungi kami di</b>
          <ul style="list-style-type:none; background-opacity: 0;">
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
              </svg>
              <b>081293539122 / </b>
              <i class="fab fa-line"></i>
              <b> komanganindhita</b>
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
              </svg>
              <b>082113600101 / </b>
              <i class="fab fa-line"></i>
              <b> ardairiana</b>
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16"><path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
              </svg>
              <a href="https://twitter.com/bioscope2021?s=11" class="text-white" target="_blank"><b>@bioscope2021</b></a>
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/></svg>
              <a href="https://instagram.com/bioscope2021" class="text-white" target="_blank"><b>@bioscope2021</b></a> 
            </li>
            <li>
            <i class="fab fa-line"></i>
              <a href="https://liff.line.me/1645278921-kWRPP32q?accountId=ftf6502r&openerPlatform=native&openerKey=talkroom%3Aheader#mst_challenge=-cEu2itLcRkYr5Ht1974qAp_oqPShclUC5u3whbz4-I" class="text-white" target="_blank"><b>@ftf6502r</b></a> 
            </li>
          </ul>
        </div>
      </div>  
          <div class="text-center">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <hr class="bg-white">
            </p>
          </div>
    </footer>
  <script src="{{asset('user/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('user/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('user/js/jquery-ui.js')}}"></script>
  <script src="{{asset('user/js/popper.min.js')}}"></script>
  <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('user/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('user/js/aos.js')}}"></script>
  <script src="{{asset('user/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.sticky.js')}}"></script>
  <script src="https://kit.fontawesome.com/1479144cfe.js" crossorigin="anonymous">
  var top = document.getElementById("top");
  var down = document.getElementById("down");
  top.onclick.scrollTop = 0;
  down.addEventListener("click", window.scroll(20, 2000));
  </script>  
  <script src="{{asset('user/js/main.js')}}"></script>
    
  </body>
</html>