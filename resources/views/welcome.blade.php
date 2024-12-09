<!DOCTYPE html>
<html lang="ar" dir="rtl">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="بوابة الخدمات الرقمية للإدارة المغربية - رؤية المغرب الرقمي 2030">
    <meta name="author" content="المديرية العامة للإدارة الرقمية">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <title>بوابة الخدمات الإدارية الرقمية</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">

    <style>
      body {
        font-family: 'Tajawal', sans-serif;
      }
      :root {
            --primary-bg: #2c3e50;
            --secondary-bg: #4b8ef1;
            --accent-color: #3498db;
            --text-light: #ecf0f1;
            --text-muted: #bdc3c7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            direction: rtl;
        }

        footer {
            background: linear-gradient(to right, var(--primary-bg), var(--secondary-bg));
            color: var(--text-light);
            font-family: 'Cairo', sans-serif;
            padding: 2rem 0;
            box-shadow: 0 -4px 6px rgba(0,0,0,0.1);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            align-items: center;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-section h4 {
            color: var(--accent-color);
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-section h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .footer-contact ul {
            list-style-type: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .footer-contact a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s ease;
            font-weight: 300;
        }

        .footer-contact a:hover {
            color: var(--accent-color);
        }

        .footer-copyright {
            grid-column: 1 / -1;
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        @media (max-width: 992px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-section {
                margin-bottom: 1.5rem;
            }
        }

        /* Subtle Animations */
        .footer-contact a {
            position: relative;
            display: inline-block;
        }

        .footer-contact a::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -3px;
            left: 0;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }

        .footer-contact a:hover::before {
            width: 100%;
        }
        .main-banner {
            padding: 6rem 0;
            overflow: hidden;
        }

        .banner-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .banner-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 3rem;
        }

        .left-content {
            display: flex;
            flex-direction: column;
        }

        .main-title {
            color: var(--text-color);
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .main-title .subtitle {
            display: block;
            font-size: 0.6em;
            font-weight: 400;
            color: rgba(44, 62, 80, 0.7);
            margin-top: 0.5rem;
        }

        .features-list {
            margin-bottom: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .feature-item img {
            width: 25px;
            margin-left: 10px;
            transition: transform 0.3s ease;
        }

        .feature-item:hover img {
            transform: scale(1.1);
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-success {
            background-color: var(--accent-color);
            color: white;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 8px rgba(0,0,0,0.15);
        }

        .right-image-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right-image {
            max-width: 100%;
            z-index: 2;
            position: relative;
            transition: transform 0.3s ease;
        }

        .right-image:hover {
            transform: scale(1.05);
        }

        .image-background {
            position: absolute;
            top: -10%;
            right: -10%;
            width: 200px;
            height: 200px;
            background-color: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            z-index: 1;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @media (max-width: 992px) {
            .banner-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .right-image-container {
                margin-top: 2rem;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }

            .feature-item {
                justify-content: center;
            }
        }
    </style>
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
                <li class="scroll-to-section"><a href="#top" class="active">الصفحة الرئيسية</a></li>
                <li class="scroll-to-section"><a href="#services">الخدمات</a></li>
                <li class="scroll-to-section"><a href="#newsletter">اتصل بنا</a></li>
                <li><div class="gradient-button"><a href="{{ route('reclamer') }}"><i class="fa fa-sign-in-alt"></i> تقديم شكوى</a></div></li>
                <li><div class="gradient-button"><a href="{{ route('login') }}"><i class="fa fa-user"></i> تسجيل الدخول</a></div></li>
              </ul>

            <a class='menu-trigger'>
                <span>القائمة</span>
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
              <div class="left-content show-up header-text wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="text-right mb-4" style="color: #2c3e50; font-weight: 700; line-height: 1.3;">
                      بوابة الخدمات الإدارية الرقمية
                      <span class="d-block text-muted mt-2" style="font-size: 0.6em; font-weight: 400;">رؤية المغرب الرقمي 2030</span>
                    </h2>

                    <div class="mb-4">
                      <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/true.png') }}" style="width: 25px; margin-right: 10px;">
                        <span style="color: #34495e; font-weight: 500;">طلب الخدمات بسهولة وسرعة</span>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('images/true.png') }}" style="width: 25px; margin-right: 10px;">
                        <span style="color: #34495e; font-weight: 500;">معالجة طلباتك بجدية وشفافية</span>
                      </div>
                      <div class="d-flex align-items-center">
                        <img src="{{ asset('images/true.png') }}" style="width: 25px; margin-right: 10px;">
                        <span style="color: #34495e; font-weight: 500;">تبسيط وتسريع الإجراءات الإدارية</span>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6 mb-3">
                        <a href="#services" class="btn btn-primary btn-block d-flex align-items-center justify-content-center" style="background-color: #3498db; border: none; padding: 12px; border-radius: 8px;">
                          <img src="{{ asset('images/need.png') }}" style="width: 24px; margin-left: 10px;">
                          طلب وثيقة
                        </a>
                      </div>
                      <div class="col-lg-6">
                        <a href="{{ route('reclamer') }}" class="btn btn-primary btn-block d-flex align-items-center justify-content-center" style="background-color: #3498db; border: none; padding: 12px; border-radius: 8px;">
                          <img src="{{ asset('images/report.png') }}" style="width: 24px; margin-left: 10px;">
                          تقديم شكوى
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="right-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s" style="position: relative;">
                <img src="{{ asset('images/Transfer files-pana.png') }}" alt="خدمات إدارية رقمية" class="img-fluid" style="z-index: 2; position: relative;">
                <div style="
                  position: absolute;
                  top: -20px;
                  right: -20px;
                  width: 100px;
                  height: 100px;
                  background-color: rgba(52, 152, 219, 0.1);
                  border-radius: 50%;
                  z-index: 1;
                "></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <!-- Centered Heading Section -->
          <div class="section-heading wow fadeInDown text-center" data-wow-duration="1s" data-wow-delay="0.5s">
            <!-- Main Heading -->
            <h4 style="color: #2c3e50; font-weight: 700; line-height: 1.6; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
              <em style="font-style: normal; color: #3498db;">الخدمات الرقمية</em>
            </h4>
            <!-- Decorative Image -->
            <img src="{{ asset('images/heading-line-dec.png') }}" alt="خط فاصل" style="margin: 10px auto; display: block; width: 60px;">
            <!-- Subheading Text -->
            <p style="color: #34495e; font-size: 1rem; line-height: 1.8; margin-top: 10px;">
              في إطار رؤية المغرب الرقمي 2030، نقدم منصة متكاملة لتبسيط الإجراءات الإدارية وتقريب الخدمات العمومية من المواطن. استفد من تجربة رقمية سلسة وفعالة.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Services Section -->
    <div class="container">
      <div class="row">
        <!-- Service Items -->
        <div class="col-lg-4">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>عقد الازدياد</h4>
            <p>هذه الوثيقة تُعتبر من الوثائق الإدارية الأساسية المطلوبة في العديد من المعاملات الرسمية بالمغرب، وتصدر عن السلطات المختصة.</p>
            <div class="text-button">
              <a href="{{route('demande')}}">طلب <i class="fa fa-arrow-left"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>شهادة الوفاة</h4>
            <p>هذه الوثيقة تُعتبر من الوثائق الإدارية الأساسية المطلوبة في العديد من المعاملات الرسمية بالمغرب، وتصدر عن السلطات المختصة.</p>
            <div class="text-button">
              <a href="{{ route('deces') }}">طلب <i class="fa fa-arrow-left"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>شهادة السكنى</h4>
            <p>هذه الوثيقة تُعتبر من الوثائق الإدارية الأساسية المطلوبة في العديد من المعاملات الرسمية بالمغرب، وتصدر عن السلطات المختصة.</p>
            <div class="text-button">
              <a href="{{route('residence')}}">طلب <i class="fa fa-arrow-left"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <footer id="newsletter">
    <div class="footer-container">
        <div class="footer-grid">
            <div class="footer-section">
                <h4>العنوان</h4>
                <p>تطوان، المملكة المغربية</p>
            </div>

            <div class="footer-section footer-contact">
                <h4>الهاتف</h4>
                <ul>
                    <li><a href="tel:+212605040301">+212 605040301</a></li>
                    <li><a href="tel:+212744332945">+212 744332945</a></li>
                </ul>
            </div>

            <div class="footer-section footer-contact">
                <h4>البريد الإلكتروني</h4>
                <ul>
                    <li><a href="mailto:contact.scolar@ent.com">contact.scolar@ent.com</a></li>
                    <li><a href="mailto:etu.scolar@ent.com">etu.scolar@ent.com</a></li>
                </ul>
            </div>

            <div class="footer-copyright">
                <p>حقوق النشر © 2023. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </div>
</footer>

  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl-carousel.js') }}"></script>
  <script src="{{ asset('js/animation.js') }}"></script>
  <script src="{{ asset('js/imagesloaded.js') }}"></script>
  <script src="{{ asset('js/popup.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
