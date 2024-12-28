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

        .response-btn {
            background-color: #0056b3;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .response-btn:hover {
            background-color: #003a75;
            transform: scale(1.05);
        }

        footer {
            background-color: #0056b3;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .btn-reply {
            display: inline-block;
            background-color: #0056b3;
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            font-size: 0.9em;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-reply:hover {
            background-color: #0056b3;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <center><h1>الشكاوى</h1></center>
            <table>
                <thead>
                    <tr>
                        <th>رقم الشكوى</th>
                        <th>البريد الإلكتروني</th>
                        <th>الوصف</th>
                        <th>الحالة</th>
                        <th>تاريخ الإضافة</th>
                        <th>الرد</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reclamations_agent as $reclamation)
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
                            <td>
                                @if($reclamation->statut == 'En cours')
                                <form method="POST" action="{{ route('reclamations.reply', $reclamation->id) }}">
                                    @csrf
                                    <button type="button" class="btn-reply" onclick="openReplyPopup({{ $reclamation->id }})">رد</button>
                                    <input type="hidden" id="reply-text-{{ $reclamation->id }}" name="reply_text">
                                </form>
                                @else
                                تمت المعالجة
                                @endif
                            </td>                            
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="6">لا توجد شكاوى مسجلة.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        جميع الحقوق محفوظة © 2024
    </footer>

    <script>
        function openReplyPopup(id) {
            Swal.fire({
                title: 'إضافة رد',
                input: 'textarea',
                inputLabel: 'نص الرد',
                inputPlaceholder: 'اكتب ردك هنا...',
                showCancelButton: true,
                confirmButtonText: 'إرسال',
                cancelButtonText: 'إلغاء',
                inputValidator: (value) => {
                    if (!value) {
                        return 'يجب إدخال نص الرد!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Remplir le champ caché et soumettre le formulaire
                    document.getElementById(`reply-text-${id}`).value = result.value;
                    document.querySelector(`form[action*="reclamations_agent/reply/${id}"]`).submit();

                    Swal.fire({
                        icon: 'success',
                        title: 'تم إرسال الرد بنجاح!',
                        text: 'تمت معالجة الشكوى وإرسال الرد إلى البريد الإلكتروني.',
                        confirmButtonText: 'موافق'
                    });
                    
                }
            });
        }
    </script>
        
</body>
</html>
