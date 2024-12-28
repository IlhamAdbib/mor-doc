<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلبات الوثائق</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #0056b3;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        footer {
            background-color: #0056b3;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        button, .btn {
            display: inline-block;
            padding: 5px 10px;
            font-size: 0.9em;
            color: #fff;
            background-color: #0056b3;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #003a75;
        }
    </style>
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
            <h1>طلبات الوثائق</h1>

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>نوع الوثيقة</th>
                        <th>الحالة</th>
                        <th>تنزيل الوثيقة</th>
                        <th>إرسال</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Actes de Naissance --}}
                    @foreach($birthRequests as $request)
                        <tr>
                            <td>عقد الميلاد</td>
                            <td>
                                @if($request->statut == 'En cours')
                                قيد المعالجة
                                @else
                                تمت المعالجة
                                @endif
                            </td>
                            <td>
                                @if($request->statut == 'Acceptée')
                                    <a class="btn" href="{{ route('download_birth_pdf', ['id' => $request->id]) }}">تنزيل</a>
                                @else
                                    غير متاح
                                @endif
                            </td>
                            <td>
                                <a class="btn" href="{{ route('send_birth_certificate', ['id' => $request->id]) }}">إرسال</a>
                            </td>                                                        
                        </tr>
                    @endforeach

                    {{-- Actes de Décès --}}
                    @foreach($deathRequests as $request)
                        <tr>
                            <td>عقد الوفاة</td>
                            <td>
                                @if($request->statut == 'En cours')
                                قيد المعالجة
                                @else
                                تمت المعالجة
                                @endif
                            </td>
                            <td>
                                @if($request->statut == 'Acceptée')
                                    <a class="btn" href="{{ route('download_pdf', ['id' => $request->id]) }}">تنزيل</a>
                                @else
                                    غير متاح
                                @endif
                            </td>
                            <td>
                                <a class="btn" href="{{ route('send_death_certificate', ['id' => $request->id]) }}">إرسال</a>
                            </td>                                                      
                        </tr>
                    @endforeach

                    {{-- Certificats de Résidence --}}
                    @foreach($residenceRequests as $request)
                        <tr>
                            <td>شهادة السكنى</td>
                            <td>
                                @if($request->statut == 'En cours')
                                قيد المعالجة
                                @else
                                تمت المعالجة
                                @endif
                            </td>
                            <td>
                                @if($request->statut == 'Acceptée')
                                    <a class="btn" href="{{ route('download_residence_pdf', ['id' => $request->id]) }}">تنزيل</a>
                                @else
                                    غير متاح
                                @endif
                            </td>
                            <td>
                                <a class="btn">إرسال</a>
                            </td>                                                     
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        جميع الحقوق محفوظة © 2024
    </footer>
</body>
</html>
