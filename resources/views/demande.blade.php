<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب وثيقة</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }


        .form-container {
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            background-color: white;
        }

        .stepper {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 20px;
        position: relative;
    }

    .stepper::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 4px;
        background-color: #e0e0e0;
        z-index: 1;
    }

    .step {
        position: relative;
        padding: 15px 15px 15px 40px;
        margin-bottom: 10px;
        background-color: #fff;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: 1px solid #e0e0e0;
        color: #6c757d;
    }

    .step::before {
        content: attr(data-step);
        position: absolute;
        left: -35px;
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #e0e0e0;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        z-index: 2;
        transition: all 0.3s ease;
    }

    .step.active {
        background-color: #f0f8ff;
        border-color: #007bff;
        color: #007bff;
        box-shadow: 0 3px 6px rgba(0,123,255,0.16);
    }

    .step.active::before {
        background-color: #007bff;
        color: #fff;
    }

    .step.completed {
        background-color: #e6f3ff;
        color: #0056b3;
    }

    .step.completed::before {
        background-color: #28a745;
        content: '✓';
    }

    @media (max-width: 768px) {
        .stepper::before {
            display: none;
        }

        .step::before {
            position: static;
            margin-right: 10px;
            margin-bottom: 5px;
            align-self: center;
        }

        .step {
            display: flex;
            align-items: center;
            padding: 10px;
        }
    }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">

            <!-- Form Content -->
            <div class="col-md-12">
                <!-- Step 1: Administrative Details -->
                <div id="step-1" class="form-section form-container">
                    <h2 class="text-center mb-4">طلب عقد الازدياد</h2>
                    <form action="{{ route('demande.store') }}" method="POST">
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
                    
                        <!-- Select Region -->
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
                            </select>
                        </div>
                    
                        <!-- Select Commune -->
                        <div class="mb-3">
                            <label for="commune" class="form-label">الجماعة</label>
                            <select id="commune" class="form-select" name="commune" required>
                                <option value="">اختر الجماعة</option>
                            </select>
                        </div>
                    
                        <!-- Select Bureau d'état civil -->
                        <div class="mb-3">
                            <label for="bureau" class="form-label">مكتب الحالة المدنية</label>
                            <select id="bureau" class="form-select" name="bureau" required>
                                <option value="">اختر مكتب الحالة المدنية</option>
                            </select>
                        </div>

                        <h3 class="text-primary mb-4 text-center">الوثائق المطلوبة</h3>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">مستخرج من شهادة الميلاد</label>
                                <input type="number" class="form-control" name="birth_extract" placeholder="أدخل الرقم">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">نسخة كاملة</label>
                                <input type="number" class="form-control" name="integral_copy" placeholder="أدخل الرقم">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">لغرض الزواج</label>
                                <select name="marriage_type" class="form-select">
                                    <option value="" disabled selected>اختر...</option>
                                    <option value="نعم">نعم </option>
                                    <option value="لا"> لا</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">لغة الوثيقة</label>
                                <select name="document_language" class="form-select">
                                    <option value="frar">الفرنسية-العربية</option>
                                    <option value="ar">العربية</option>
                                    <option value="fr">الفرنسية</option>
                                </select>
                            </div>
                        </div>

                        <h4 class="text-primary mt-4 mb-3">بيانات التعريف</h4>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">الاسم الأول بالعربية</label>
                                <input type="text" class="form-control" name="first_name_ar" placeholder="أدخل الاسم">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">اللقب بالعربية</label>
                                <input type="text" class="form-control" name="last_name_ar" placeholder="أدخل اللقب">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">الاسم الأول باللاتينية (اختياري)</label>
                                <input type="text" class="form-control" name="first_name_latin" placeholder="أدخل الاسم">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">اللقب باللاتينية (اختياري)</label>
                                <input type="text" class="form-control" name="last_name_latin" placeholder="أدخل اللقب">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">اسم الأم</label>
                                <input type="text" class="form-control" name="mother_first_name" placeholder="أدخل اسم الأم">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">لقب الأم</label>
                                <input type="text" class="form-control" name="mother_last_name" placeholder="أدخل لقب الأم">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">اسم الأب</label>
                                <input type="text" class="form-control" name="father_first_name" placeholder="أدخل اسم الأب">
                            </div>
                        </div>

                        <div class="container mt-5">

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="unknown_birth_date" name="unknown_birth_date">
                                    <label class="form-check-label" for="unknown_birth_date">لا أعرف اليوم والشهر لميلادي</label>
                                </div>

                                <div class="mb-3" id="birthDateInputs">
                                    <label class="form-label">تاريخ الميلاد</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="birth_day" name="birth_day" placeholder="اليوم (JJ)" min="1" max="31">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="birth_month" name="birth_month" placeholder="الشهر (MM)" min="1" max="12">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="birth_year" name="birth_year" placeholder="السنة (YYYY)" min="1900" max="2024" required>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">الجنس</label>
                                <select name="gender" class="form-select">
                                    <option value="" disabled selected>اختر...</option>
                                    <option value="ذكر">ذكر</option>
                                    <option value="أنثى">أنثى</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">رقم الوثيقة</label>
                                <input type="text" class="form-control" name="act_number" placeholder="أدخل الرقم">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">سنة التسجيل</label>
                            <select name="transcription_year" class="form-select">
                                <option value="" disabled selected>اختر...</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>

                        <h3 class="text-primary mb-4 text-center">معلومات التوصيل</h3>

                        <h4 class="text-primary mt-4 mb-3">معلومات المستلم</h4>

                        <div class="mb-3">
                            <label class="form-label">الاسم الكامل</label>
                        <input type="text" class="form-control" name="nom_complet" placeholder=" الاسم الكامل" >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" name="recipient_email" placeholder="أدخل البريد الإلكتروني">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">رقم الهاتف</label>
                            <div class="phone-input-container">
                                <select class="form-select country-code" name="phone_country_code">
                                    <option value="+212">المغرب +212</option>
                                    <option value="+1">الولايات المتحدة +1</option>
                                    <!-- Add more country codes as needed -->
                                </select>
                                <input type="tel" class="form-control" name="recipient_phone" placeholder="أدخل رقم الهاتف">
                            </div>
                        </div>

                        <h4 class="text-primary mt-4 mb-3">عنوان التوصيل</h4>

                        <div class="mb-3">
                            <label class="form-label">موقع التوصيل</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_location" id="delivery_morocco" value="morocco" checked>
                                <label class="form-check-label" for="delivery_morocco">
                                    داخل المغرب
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_location" id="delivery_abroad" value="abroad">
                                <label class="form-check-label" for="delivery_abroad">
                                    خارج المغرب
                                </label>
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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">الرمز البريدي</label>
                                <input type="text" class="form-control" name="postal_code" placeholder="أدخل الرمز البريدي">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">المدينة</label>
                                <input type="text" class="form-control" name="locality" placeholder="أدخل المدينة">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">الدولة</label>
                            <select class="form-select" name="country">
                                <option value="المغرب" selected>المغرب</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>
                    
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                تقديم الطلب <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>                    
                    
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
                </div>

            </div>
        </div>
    </div>
    <script>
        // Cities by Region
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
    <script>
        $(document).ready(function() {
            let currentStep = 1;

            function showStep(step) {
                // Hide all form sections
                $(".form-section").addClass("hidden");

                // Show the current step
                $(`#step-${step}`).removeClass("hidden");

                // Update stepper active state
                $(".step").removeClass("active");
                $(`.step[data-step=${step}]`).addClass("active");
            }

            // Next button for Step 1
            $("#nextButton").on("click", function() {
                // Add validation for Step 1 fields if needed
                currentStep = 2;
                showStep(currentStep);
            });

            // Previous button for Step 2
            $("#previousButton").on("click", function() {
                currentStep = 1;
                showStep(currentStep);
            });

            // Next button for Step 2
            $("#nextButton2").on("click", function() {
                // Add validation for Step 2 fields if needed
                currentStep = 3;
                showStep(currentStep);
            });

            // Previous button for Step 3
            $("#previousButton2").on("click", function() {
                currentStep = 2;
                showStep(currentStep);
            });

            // Next button for Step 3
            $("#nextButton3").on("click", function() {
                // Add validation for Step 3 fields if needed
                currentStep = 4;
                showStep(currentStep);
            });
            $("#previousButton3").on("click", function() {
                currentStep = 3;
                showStep(currentStep);
            });

            // Next button for Step 3
            $("#nextButton4").on("click", function() {
                // Add validation for Step 3 fields if needed
                currentStep = 5;
                showStep(currentStep);
            });

            // Initial setup
            showStep(currentStep);
        });
        </script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            const unknownBirthDateCheckbox = document.getElementById('unknown_birth_date');
            const birthDayInput = document.getElementById('birth_day');
            const birthMonthInput = document.getElementById('birth_month');
            const birthYearInput = document.getElementById('birth_year');

            unknownBirthDateCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    // Disable day and month inputs
                    birthDayInput.disabled = true;
                    birthMonthInput.disabled = true;

                    // Clear day and month inputs
                    birthDayInput.value = '';
                    birthMonthInput.value = '';

                    // Ensure year input remains required and enabled
                    birthYearInput.required = true;
                    birthYearInput.disabled = false;
                } else {
                    // Enable day and month inputs
                    birthDayInput.disabled = false;
                    birthMonthInput.disabled = false;
                }
            });
        });
        </script>
</body>
</html>
