<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبا بك</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #002147;
            text-align: center;
            direction: rtl;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            background-color: #0056b3;
            color: #fff;
            padding: 20px;
            font-size: 1.5em;
            font-weight: bold;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: row;
        }

        .content {
            flex: 1;
            padding: 40px 20px;
            text-align: center;
        }

        .menu {
            background-color: #0056b3;
            color: #fff;
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .menu a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #003a75;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s ease;
            width: 80%;
            text-align: center;
        }

        .menu a:hover {
            background-color: #002147;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        a.logout {
            display: inline-block;
            background-color: #0056b3;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a.logout:hover {
            background-color: #003a75;
        }

        footer {
            background-color: #0056b3;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
    <script>
        function updateContent(title, content) {
            document.getElementById('content-title').innerText = title;
            document.getElementById('content-text').innerText = content;
        }
    </script>
</head>
<body>
    <header>
        مرحبا بك في تطبيقنا
    </header>
    <main>
        <nav class="menu">
            <a href="{{ route('document_requests_agent') }}">طلبات الوثائق (للوكيل)</a>
            <a href="{{ route('reclamations_agent') }}">الشكاوى (للوكيل)</a>
            <a href="{{ route('logout') }}">تسجيل الخروج</a>
        </nav>        
        <div class="content">
            <h1 id="content-title">مرحباً بك</h1>
            <p id="content-text">لقد تم تسجيل الدخول بنجاح! نحن سعداء بوجودك معنا.</p>
        </div>
    </main>
    <footer>
        جميع الحقوق محفوظة © 2024
    </footer>
</body>
</html>
