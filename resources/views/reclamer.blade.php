<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تقديم شكوى</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            direction: rtl;
        }

        .main {
            padding: 50px 0;
        }

        .signup-content {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            margin: 0 auto;
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            color: #5a5a5a;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #007bff;
            background-color: #fff;
            outline: none;
        }

        .form-submit {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-submit:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 10px;
            text-align: center;
        }

        .invalid-message, .valid-message {
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
        }

        .invalid-message {
            color: red;
        }

        .valid-message {
            color: green;
        }

        .loginhere {
            text-align: center;
            margin-top: 20px;
        }

        .loginhere-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .loginhere-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form action="{{ route('reclamer') }}" method="POST" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">تقديم شكوى</h2>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @elseif (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                    
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="بريدك الإلكتروني" 
                                   pattern="[a-zA-Z0-9._%+-]+@.+\..+" title="يرجى إدخال بريد إلكتروني صالح" required />
                        </div>
                    
                        <div class="form-group">
                            <input type="text" class="form-input" name="cin" id="cin" placeholder="رقم التعريف الشخصي (CIN)" 
                                   title="يرجى إدخال رقم صالح" required />
                        </div>
                    
                        <div class="form-group">
                            <textarea class="form-input" name="description" id="description" placeholder="وصف الشكوى" required></textarea>
                        </div>
                    
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="إرسال" />
                        </div>
                    </form>
                        <p class="loginhere">
                        <a href="{{ route('welcome') }}" class="loginhere-link">العودة إلى الصفحة الرئيسية</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
