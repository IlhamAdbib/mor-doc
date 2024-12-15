<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب شهادة الوفاة</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="form-container p-4">
        <h2 class="text-center mb-4">طلب شهادة الوفاة</h2>
        <form action="{{ route('deces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            <!-- معلومات الإدارة -->
            <h3 class="text-primary mb-4">الإدارة</h3>
            
            <div class="mb-3">
                <label for="region" class="form-label">الجهة</label>
                <select id="region" class="form-select" name="region" required>
                    <option value="">اختر الجهة</option>
                    <option value="1">جهة طنجة تطوان الحسيمة</option>
                    <option value="2">جهة فاس مكناس</option>
                    <option value="3">جهة الرباط سلا القنيطرة</option>
                    <option value="4">جهة الدار البيضاء سطات</option>
                    <option value="5">جهة مراكش آسفي</option>
                    <option value="6">جهة بني ملال خنيفرة</option>
                    <option value="7">جهة سوس ماسة</option>
                    <option value="8">جهة كلميم واد نون</option>
                    <option value="9">جهة العيون الساقية الحمراء</option>
                    <option value="10">جهة الداخلة وادي الذهب</option>
                    <option value="11">جهة درعة تافيلالت</option>
                    <option value="12">جهة الشرق</option>
                </select>
            </div>
        
            <!-- Select City -->
            <div class="mb-3">
                <label class="form-label">المدينة أو الإقليم</label>
                <input type="text" class="form-control" name="city" required>
            </div>
        
            <!-- Select Commune -->
            <div class="mb-3">
                <label class="form-label">الجماعة</label>
                <input type="text" class="form-control" name="commune" required>
            </div>         

            <!-- معلومات مقدم الطلب -->
            <h3 class="text-primary mb-4">معلومات مقدم الطلب</h3>

            <div class="mb-3">
                <label class="form-label">العلاقة بالمتوفى</label>
                <select class="form-select" name="requester_relationship" required>
                    <option value="">اختر العلاقة</option>
                    <option value="spouse">الزوج/الزوجة</option>
                    <option value="parent">أصل المتوفى (والد/والدة)</option>
                    <option value="child">فرع المتوفى (ابن/ابنة)</option>
                    <option value="legal_guardian">الوصي القانوني</option>
                    <option value="authorized_proxy">وكيل مفوض</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">الاسم الأول بالعربية</label>
                <input type="text" class="form-control" name="requester_first_name_ar" placeholder="أدخل الاسم الأول" required>
            </div>

            <div class="mb-3">
                <label class="form-label">اللقب بالعربية</label>
                <input type="text" class="form-control" name="requester_last_name_ar" placeholder="أدخل اللقب" required>
            </div>

            <div class="mb-3">
                <label class="form-label">رقم البطاقة الوطنية</label>
                <input type="text" class="form-control" name="requester_cnie_number" placeholder="أدخل رقم البطاقة الوطنية" required>
            </div>

            <div class="mb-3">
                <label class="form-label">مرفق صورة من البطاقة الوطنية</label>
                <input type="file" class="form-control" name="requester_cnie_document" accept=".pdf,.jpg,.png">
            </div>

            <div class="mb-3">
                <label class="form-label">وثيقة إثبات العلاقة (إذا لزم الأمر)</label>
                <input type="file" class="form-control" name="relationship_proof_document" accept=".pdf,.jpg,.png">
            </div>

            <div class="mb-3">
                <label class="form-label">الوثيقة الطبية للوفاة</label>
                <input type="file" class="form-control" name="medical_death_certificate" accept=".pdf,.jpg,.png">
            </div>

            <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="tel" class="form-control" name="requester_phone" placeholder="أدخل رقم الهاتف" required>
            </div>

            <!-- معلومات الوفاة -->
            <h3 class="text-primary mb-4">معلومات الوفاة</h3>

            <div class="mb-3">
                <label class="form-label">تاريخ الوفاة</label>
                <input type="date" class="form-control" name="death_date" required>
            </div>

            <div class="mb-3">
                <label class="form-label">مكان الوفاة</label>
                <input type="text" class="form-control" name="death_place" placeholder="أدخل مكان الوفاة">
            </div>

            <div class="mb-3">
                <label class="form-label">سبب الوفاة</label>
                <input type="text" class="form-control" name="death_cause" placeholder="أدخل سبب الوفاة">
            </div>

            <div class="mb-3">
                <label class="form-label">رقم الوثيقة</label>
                <input type="text" class="form-control" name="document_number" placeholder="رقم شهادة الوفاة">
            </div>

            <div class="mb-3">
                <label class="form-label">السنة</label>
                <select class="form-select" name="inscription_year">
                    <option value="">اختر سنة التسجيل</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">رقم دفتر العائلة (اختياري)</label>
                <input type="text" class="form-control" name="family_book_number" placeholder="أدخل رقم دفتر العائلة">
            </div>

            <!-- معلومات التوصيل -->
            <h3 class="text-primary mb-4">معلومات التوصيل</h3>

            <div class="mb-3">
                <label class="form-label">الاسم الكامل</label>
                <input type="text" class="form-control" name="recipient_full_name" placeholder="الاسم الكامل" required>
            </div>

            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" name="recipient_email" placeholder="أدخل البريد الإلكتروني" required>
            </div>

            <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="tel" class="form-control" name="recipient_phone" placeholder="أدخل رقم الهاتف" required>
            </div>

            <div class="mb-3">
                <label class="form-label">موقع التوصيل</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery_location" value="morocco" checked>
                    <label class="form-check-label">داخل المغرب</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery_location" value="abroad">
                    <label class="form-check-label">خارج المغرب</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">العنوان (السطر الأول)</label>
                <input type="text" class="form-control" name="address_line1" placeholder='مثال: "3، شارع النهضة" أو "67، بلوك م"'>
            </div>

            <div class="mb-3">
                <label class="form-label">العنوان (السطر الثاني، اختياري)</label>
                <input type="text" class="form-control" name="address_line2" placeholder='مثال: "3، شارع النهضة" أو "67، بلوك م"'>
            </div>

            <div class="mb-3">
                <label class="form-label">الرمز البريدي</label>
                <input type="text" class="form-control" name="postal_code" placeholder="أدخل الرمز البريدي" required>
            </div>

            <div class="mb-3">
                <label class="form-label">المدينة</label>
                <input type="text" class="form-control" name="locality" placeholder="أدخل المدينة" required>
            </div>

            <div class="mb-3">
                <label class="form-label">الدولة</label>
                <select class="form-select" name="country">
                    <option value="MA" selected>المغرب</option>
                </select>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">إرسال</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('region').addEventListener('change', function () {
    let regionId = this.value;
    let citySelect = document.getElementById('city');
    let communeSelect = document.getElementById('commune');
    let bureauSelect = document.getElementById('bureau');

    // Réinitialisation des options
    citySelect.innerHTML = '<option value="">اختر المدينة أو الإقليم</option>';
    communeSelect.innerHTML = '<option value="">اختر الجماعة</option>';
    bureauSelect.innerHTML = '<option value="">اختر مكتب الحالة المدنية</option>';

    if (regionId) {
        // Faites un appel AJAX pour récupérer les villes
        fetch(`/get-cities/${regionId}`)
            .then(response => response.json())
            .then(data => {
                data.cities.forEach(city => {
                    citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
                });
            });
    }
});

document.getElementById('city').addEventListener('change', function () {
    let cityId = this.value;
    let communeSelect = document.getElementById('commune');
    let bureauSelect = document.getElementById('bureau');

    // Réinitialisation des options
    communeSelect.innerHTML = '<option value="">اختر الجماعة</option>';
    bureauSelect.innerHTML = '<option value="">اختر مكتب الحالة المدنية</option>';

    if (cityId) {
        // Faites un appel AJAX pour récupérer les communes
        fetch(`/get-communes/${cityId}`)
            .then(response => response.json())
            .then(data => {
                data.communes.forEach(commune => {
                    communeSelect.innerHTML += `<option value="${commune.id}">${commune.name}</option>`;
                });
            });

        // Faites un appel AJAX pour récupérer les bureaux
        fetch(`/get-bureaux/${cityId}`)
            .then(response => response.json())
            .then(data => {
                data.bureaux.forEach(bureau => {
                    bureauSelect.innerHTML += `<option value="${bureau.id}">${bureau.name}</option>`;
                });
            });
    }
});
</script>
<script>
    // Cities by Region
const citiesByRegion = {
    1: ["طنجة", "تطوان", "الحسيمة", "شفشاون"],
    2: ["فاس", "مكناس", "إفران", "الحاجب"],
    3: ["الرباط", "سلا", "القنيطرة", "تمارة"],
    4: ["الدار البيضاء", "الجديدة", "سطات", "برشيد"],
    5: ["مراكش", "آسفي", "الصويرة", "شيشاوة"],
    6: ["بني ملال", "خنيفرة", "الفقيه بن صالح", "أزيلال"],
    7: ["أكادير", "تارودانت", "تزنيت", "إنزكان"],
    8: ["كلميم", "طانطان", "سيدي إفني"],
    9: ["العيون", "بوجدور", "طرفاية"],
    10: ["الداخلة", "أوسرد"],
    11: ["الرشيدية", "ورزازات", "زاكورة"],
    12: ["وجدة", "الناظور", "بركان"]
};

// Communes by City
const communesByCity = {
    "طنجة": ["بني مكادة", "مغوغة", "السواني"],
    "تطوان": ["تطوان المدينة", "مرتيل", "السمارة"],
    "الحسيمة": ["بني بوفراح", "بني حذيفة", "الرواضي"],
    "فاس": ["فاس المدينة", "سايس", "زواغة"],
    "الرباط": ["يعقوب المنصور", "أكدال الرياض", "السويسي"],
    "الدار البيضاء": ["أنفا", "الفداء مرس السلطان", "عين الشق"],
    "مراكش": ["المدينة", "النخيل", "جيليز"],
    "العيون": ["المدينة القديمة", "المسيرة", "الإبداع"],
    // Add more cities and their communes...
};

// Bureaux d'état civil by Commune
const bureauByCommune = {
    "بني مكادة": ["مكتب بني مكادة 1", "مكتب بني مكادة 2", "مكتب بني مكادة 3"],
    "مغوغة": ["مكتب مغوغة 1", "مكتب مغوغة 2"],
    "تطوان المدينة": ["مكتب تطوان المركز", "مكتب مرتيل", "مكتب السمارة"],
    "سايس": ["مكتب سايس 1", "مكتب سايس 2", "مكتب سايس 3"],
    "أنفا": ["مكتب أنفا 1", "مكتب أنفا 2", "مكتب أنفا 3"],
    "النخيل": ["مكتب النخيل 1", "مكتب النخيل 2"],
    "جيليز": ["مكتب جيليز 1", "مكتب جيليز 2"],
    "المدينة القديمة": ["مكتب العيون 1", "مكتب العيون 2"],
    // Add more communes and their bureaux...
};


        // Populate Cities based on Region
        $('#region').on('change', function () {
            const regionId = $(this).val();
            const cities = citiesByRegion[regionId] || [];
            $('#city').empty().append('<option value="">اختر المدينة أو الإقليم</option>');
            cities.forEach(city => {
                $('#city').append(new Option(city, city));
            });
            $('#commune, #bureau').empty().append('<option value="">اختر...</option>'); // Reset child dropdowns
        });

        // Populate Communes based on City
        $('#city').on('change', function () {
            const cityName = $(this).val();
            const communes = communesByCity[cityName] || [];
            $('#commune').empty().append('<option value="">اختر الجماعة</option>');
            communes.forEach(commune => {
                $('#commune').append(new Option(commune, commune));
            });
            $('#bureau').empty().append('<option value="">اختر مكتب الحالة المدنية</option>'); // Reset bureau dropdown
        });

        // Populate Bureaux d'état civil based on Commune
        $('#commune').on('change', function () {
            const communeName = $(this).val();
            const bureaux = bureauByCommune[communeName] || [];
            $('#bureau').empty().append('<option value="">اختر مكتب الحالة المدنية</option>');
            bureaux.forEach(bureau => {
                $('#bureau').append(new Option(bureau, bureau));
            });
        });
</script>
<script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2024/12/14/13/20241214130417-DY05I8AQ.js"></script>

    <!-- Custom Script to Position and Toggle Chatbot -->
    <script>
        // Initialize the chatbot
        window.botpressWebChat.init({
            configUrl: "https://files.bpcontent.cloud/2024/12/14/13/20241214130417-9BRV1IIW.json",
            hostUrl: "https://cdn.botpress.cloud/webchat/v2.3",
            closeButton: true,         // Enables the close button
            showPoweredBy: false,      // Removes 'Powered by Botpress' footer
        });

        // Functionality to toggle the chatbot visibility
        const toggleChatbot = () => {
            const iframe = document.querySelector("iframe[src*='webchat']");
            if (iframe) {
                iframe.style.display = iframe.style.display === "none" ? "block" : "none";
            }
        };

        // Add a floating button at the bottom right
        document.addEventListener("DOMContentLoaded", () => {
            const button = document.createElement("button");
            button.innerText = "💬";
            button.style.position = "fixed";
            button.style.bottom = "20px";
            button.style.right = "20px";
            button.style.backgroundColor = "#007bff"; // Blue background
            button.style.color = "white";            // White chat icon
            button.style.border = "none";
            button.style.borderRadius = "50%";
            button.style.width = "60px";
            button.style.height = "60px";
            button.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.1)";
            button.style.cursor = "pointer";
            button.style.fontSize = "28px";
            button.style.display = "flex";
            button.style.alignItems = "center";
            button.style.justifyContent = "center";
            button.style.zIndex = "1000"; // Ensure it appears on top of other elements
            button.addEventListener("click", toggleChatbot);
            document.body.appendChild(button);
        });
    </script>
</body>
</html>