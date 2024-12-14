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
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            
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
                <label for="city" class="form-label">المدينة أو الإقليم</label>
                <select id="city" class="form-select" name="city" required>
                    <option value="">اختر المدينة أو الإقليم</option>
                    <option value="طنجة">طنجة</option>
                    <option value="تطوان">تطوان</option>
                    <option value="فاس">فاس</option>
                    <option value="مكناس">مكناس</option>
                    <option value="الرباط">الرباط</option>
                    <option value="سلا">سلا</option>
                </select>
            </div>

            <!-- Select Commune -->
            <div class="mb-3">
                <label for="commune" class="form-label">الجماعة</label>
                <select id="commune" class="form-select" name="commune" required>
                    <option value="">اختر الجماعة</option>
                    <option value="بني مكادة">بني مكادة</option>
                    <option value="مغوغة">مغوغة</option>
                    <option value="السواني">السواني</option>
                </select>
            </div>

            <!-- Select Bureau d'état civil -->
            <div class="mb-3">
                <label for="bureau" class="form-label">مكتب الحالة المدنية</label>
                <select id="bureau" class="form-select" name="bureau" required>
                    <option value="">اختر مكتب الحالة المدنية</option>
                    <option value="مكتب 1">مكتب 1</option>
                    <option value="مكتب 2">مكتب 2</option>
                    <option value="مكتب 3">مكتب 3</option>
                </select>
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
                <input type="file" class="form-control" name="requester_cnie_document" accept=".pdf,.jpg,.png" required>
            </div>

            <div class="mb-3">
                <label class="form-label">وثيقة إثبات العلاقة (إذا لزم الأمر)</label>
                <input type="file" class="form-control" name="relationship_proof_document" accept=".pdf,.jpg,.png">
            </div>

            <div class="mb-3">
                <label class="form-label">الوثيقة الطبية للوفاة</label>
                <input type="file" class="form-control" name="medical_death_certificate" accept=".pdf,.jpg,.png" required>
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

    const communesByCity = {
        "طنجة": ["بني مكادة", "مغوغة", "السواني"],
        "تطوان": ["تطوان المدينة", "مرتيل", "السمارة"],
        "الحسيمة": ["بني بوفراح", "بني حذيفة", "الرواضي"],
        "فاس": ["فاس المدينة", "سايس", "زواغة"],
        "الرباط": ["يعقوب المنصور", "أكدال الرياض", "السويسي"],
        "الدار البيضاء": ["أنفا", "الفداء مرس السلطان", "عين الشق"],
        "مراكش": ["المدينة", "النخيل", "جيليز"],
        "العيون": ["المدينة القديمة", "المسيرة", "الإبداع"]
    };

    document.getElementById('region').addEventListener('change', function () {
        const regionId = this.value;
        const cities = citiesByRegion[regionId] || [];
        const citySelect = document.getElementById('city');
        citySelect.innerHTML = '<option value="">اختر المدينة أو الإقليم</option>';
        cities.forEach(city => citySelect.innerHTML += <option value="${city}">${city}</option>);
    });

    document.getElementById('city').addEventListener('change', function () {
        const cityName = this.value;
        const communes = communesByCity[cityName] || [];
        const communeSelect = document.getElementById('commune');
        communeSelect.innerHTML = '<option value="">اختر الجماعة</option>';
        communes.forEach(commune => communeSelect.innerHTML += <option value="${commune}">${commune}</option>);
    });
</script>

</body>
</html>