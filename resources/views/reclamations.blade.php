<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الشكاوى</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #002147;
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
            text-align: center;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: row;
            overflow: hidden;
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

        .content {
            flex: 1;
            padding: 40px 20px;
            text-align: center;
            overflow-y: auto;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        table, th, td {
            border: 1px solid #0056b3;
        }

        th {
            background-color: #0056b3;
            color: #fff;
            padding: 15px;
            font-size: 1.2em;
            text-align: center;
        }

        td {
            padding: 10px;
            font-size: 1em;
            text-align: center;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f0f8ff;
        }

        tr:hover {
            background-color: #e0f0ff;
        }

        .empty-row {
            color: #888;
            font-size: 1.1em;
        }

        footer {
            background-color: #0056b3;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        مرحبا بك في تطبيقنا
    </header>
    <main>
        <nav class="menu">
            <a href="#" onclick="updateContent('طلبات الوثائق', 'هنا يمكنك الاطلاع على طلبات الوثائق.'); return false;">طلبات الوثائق</a>
            <a href="{{ route('reclamations') }}">الشكاوى</a>
            <a href="{{ route('logout') }}">تسجيل الخروج</a>
        </nav>
        <div class="content">
            <center><h1>الشكاوى الخاصة بك</h1></center>
            <table>
                <thead>
                    <tr>
                        <th>رقم الشكوى</th>
                        <th>البريد الإلكتروني</th>
                        <th>الوصف</th>
                        <th>الحالة</th>
                        <th>تاريخ الإضافة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reclamations as $reclamation)
                        <tr>
                            <td>{{ $reclamation->id }}</td>
                            <td>{{ $reclamation->email }}</td>
                            <td>{{ $reclamation->description }}</td>
                            <td>
                                @if($reclamation->statut == 'En cours')
                                قيد المعالجة
                                @else
                                تمت المعالجة
                                @endif
                            </td>
                            <td>{{ $reclamation->created_at }}</td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="4">لا توجد شكاوى مسجلة.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        جميع الحقوق محفوظة © 2024
    </footer>
</body>
</html>
