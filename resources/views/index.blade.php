
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Espace Etudiant</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Acceuil</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#newsletter">Contact</a></li>
              <li><div class="gradient-button"><a href="{{ route('reclamer') }}"><i class="fa fa-sign-in-alt"></i> Réclamer</a></div></li>
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 style="transform: translateX(-100PX); text-align: center;">Votre Espace Scolarité en Ligne</h2>
                  <p><img src=" {{ asset('images/true.png') }}" style="width: 18px;">Demandez nos services facilement.</p>
                  <p><img src="{{ asset('images/true.png') }}"style="width: 18px;">L'administration traite vos demandes sérieusement.</p>
                  <p><img src="{{ asset('images/true.png') }}"style="width: 18px;">Simplicité et efficacité pour votre scolarité.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                      <a href="#services">Demande<img src="{{ asset('images/need.png') }}" style="width:28px;height:28px; margin-bottom: 15px;margin-left: 10px;"></a>
                    </div><br><br>
                    <div class="white-button first-button scroll-to-section">
                      <a href="{{ route('reclamer') }}">Réclamation<img src="{{ asset('images/report.png') }}"style="width:22px;height:22px;margin-left: 10px;"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('images/Transfer files-pana.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4><em>Services </em></h4>
            <img src="{{ asset('images/heading-line-dec.png') }}" alt="">
            <p>Notre plateforme offre un ensemble complet de services pour simplifier votre demande de documents souhaités, ainsi que la gestion de leur traitement par l'administrateur. Profitez d'une expérience fluide et efficace dans toutes vos démarches administratives.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Attestation de scolarité</h4>
            <p>La récupération de ce document sera aprés trois jours de sa demande.</p>
            <div class="text-button">
              <a href="{{route('demande')}}">Demander<i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Attestation de réussite</h4>
            <p>La récupération de ce document sera aprés trois jours de sa demande.</p>
            <div class="text-button">
              <a href="{{ route('demande') }}">Demander<i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Convention de stage</h4>
            <p>La récupération de ce document sera aprés trois jours de sa demande.</p>
            <div class="text-button">
              <a href="{{route('demande')}}">Demander<i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>Relevé de notes</h4>
            <p>La récupération de ce document sera aprés trois jours de sa demande.</p>
            <div class="text-button">
              <a href="{{ route('demande') }}">Demander <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4 style="font-family: sans-serif;">Contactez-Nous</h4>
          </div>
        </div>
        </div>
      </div>
        <center>
                <center><h4 style="color: black;">Adresse</h4></center>
                <br>
                <center><p style="font-weight: 400; font-size:15px; color:white;">Tétouan,Maroc</p></center>
                <br>

            <h4 style="color: black;">Télephone</h4>
            <br>
            <center>
            <ul>
              <li><a href="#" style="font-weight: 400; font-size:15px; color:white;">+212 605040301</a></li>
              <li><a href="#" style="font-weight: 400; font-size:15px; color:white;">+212 744332945</a></li>
            </ul>

            </center>

        <br>

            <h4 style="color: black;">Emails</h4>
            <br>
            <center>
            <ul>
              <li><a href="#" style="font-weight: 400; font-size:15px; color:white;">contact.scolar@ent.com</a></li>
              <li><a href="#" style="font-weight: 400; font-size:15px; color:white;">etu.scolar@ent.com</a></li>
            </ul>

            </center>

        </center>

        <div class="col-lg-12">
          <div class="copyright-text">
            <p style="color: wheat;">Copyright © 2023. Tous droits réservés.
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl-carousel.js') }}"></script>
  <script src="{{ asset('js/animation.js') }} "></script>
  <script src="{{ asset('js/imagesloaded.js') }} "></script>
  <script src="{{ asset('js/popup.js') }} "></script>
  <script src="{{ asset('js/custom.js') }} "></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
