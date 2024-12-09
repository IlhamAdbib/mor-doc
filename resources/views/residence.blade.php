<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب شهادة السكنى</title>
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
        .upload-section {
            border: 2px dashed #ced4da;
            padding: 20px;
            text-align: center;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <!-- Sidebar Stepper -->
            <div class="col-md-3">
                <div class="stepper" id="stepper">
                    <div class="step active" data-step="1">الخطوة 1: معلومات شخصية</div>
                    <div class="step" data-step="2">الخطوة 2: إثبات الإقامة</div>
                    <div class="step" data-step="3">الخطوة 3: وثائق الدعم</div>
                    <div class="step" data-step="4">الخطوة 4: التحقق والتأكيد</div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="col-md-9">
                <!-- Step 1: Administrative Details -->
                <div id="step-1" class="form-section form-container">
                    <h2 class="text-center mb-4">طلب شهادة السكنى</h2>
                    <form action="#" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">الاسم الأول</label>
                                <input type="text" class="form-control" name="first_name_ar" placeholder="أدخل الاسم الأول" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">اللقب</label>
                                <input type="text" class="form-control" name="last_name_ar" placeholder="أدخل اللقب" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">رقم البطاقة الوطنية</label>
                            <input type="text" class="form-control" name="cnie_number" placeholder="أدخل رقم البطاقة الوطنية" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">تاريخ الميلاد</label>
                            <input type="date" class="form-control" name="birth_date" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">مكان الولادة</label>
                            <input type="text" class="form-control" name="birth_place" placeholder="أدخل مكان الولادة" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">المهنة</label>
                            <input type="text" class="form-control" name="profession" placeholder="أدخل مهنتك" required>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-primary" id="nextButton">
                                التالي <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>


                <!-- Step 2: Document Details (initially hidden) -->
                <div id="step-2" class="form-section form-container hidden">
                    <h3 class="text-primary mb-4 text-center">إثبات الإقامة</h3>

                    <div class="mb-3">
                        <label class="form-label">نوع الإقامة</label>
                        <select class="form-select" name="residence_type" required>
                            <option value="">اختر نوع الإقامة</option>
                            <option value="owner">مالك</option>
                            <option value="tenant">مستأجر</option>
                            <option value="family">مع العائلة</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">العنوان الكامل</label>
                        <input type="text" class="form-control" name="full_address" placeholder="أدخل العنوان الكامل" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الرمز البريدي</label>
                        <input type="text" class="form-control" name="postal_code" placeholder="أدخل الرمز البريدي">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">المدينة</label>
                        <select class="form-select" name="city" required>
                            <option value="">اختر المدينة</option>
                            <option value="rabat">الرباط</option>
                            <option value="casablanca">الدار البيضاء</option>
                            <option value="marrakech">مراكش</option>
                            <!-- Add more cities -->
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" id="previousButton">
                            <i class="bi bi-arrow-left"></i> السابق
                        </button>
                        <button type="button" class="btn btn-primary" id="nextButton2">
                            التالي <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div id="step-3" class="form-section form-container hidden">
                    <h3 class="text-primary mb-4 text-center">الوثائق الداعمة</h3>

                    <div class="mb-3">
                        <label class="form-label">نوع الوثيقة الداعمة</label>
                        <select class="form-select" name="supporting_document_type" required>
                            <option value="">اختر نوع الوثيقة</option>
                            <option value="utility_bill">فاتورة المياه أو الكهرباء</option>
                            <option value="property_deed">عقد الملكية</option>
                            <option value="rental_contract">عقد الإيجار</option>
                            <option value="professional_document">وثيقة مهنية</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">تحميل الوثيقة الداعمة</label>
                        <div class="upload-section">
                            <input type="file" class="form-control" name="supporting_document" accept=".pdf,.jpg,.png" required>
                            <small class="text-muted">يرجى تحميل نسخة واضحة من الوثيقة</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">نسخة من البطاقة الوطنية</label>
                        <div class="upload-section">
                            <input type="file" class="form-control" name="id_document" accept=".pdf,.jpg,.png" required>
                            <small class="text-muted">يرجى تحميل نسخة من البطاقة الوطنية</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" id="previousButton2">
                            <i class="bi bi-arrow-left"></i> السابق
                        </button>
                        <button type="button" class="btn btn-primary" id="nextButton3">
                            التالي <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div id="step-4" class="form-section form-container hidden">
                    <h3 class="text-primary mb-4 text-center">معلومات التوصيل</h3>



                    <h4 class="text-primary mt-4 mb-3">معلومات المستلم</h4>

                    <div class="mb-3">
                        <label class="form-label">الاسم الكامل</label>
                       <input type="text" class="form-control" name="nom complet " placeholder=" الاسم الكامل" >
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
                            <option value="MA" selected>المغرب</option>
                            <!-- Add more countries as needed -->
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <!-- Previous Button -->
                        <button type="button" class="btn btn-secondary" id="previousButton2">
                            <i class="bi bi-arrow-left"></i> السابق
                        </button>

                        <!-- Next Button -->
                        <button type="button" class="btn btn-primary" id="nextButton3">
                            التالي <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
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
