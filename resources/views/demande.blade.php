{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>طلب وثيقة</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form action="{{ route('demande') }}" method="POST" id="signup-form" class="signup-form" novalidate>
                        @csrf
                        <h2 class="form-title">طلب وثيقة</h2>
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                @if ($error == 'Vous avez déjà demandé ce document!')
                                    <p>لقد طلبت هذه الوثيقة مسبقًا!</p>
                                @elseif ($error == 'Étudiant non trouvé avec les informations saisies, Veuillez réessayer!')
                                    <p>لم يتم العثور على الطالب بالمعلومات المدخلة، يرجى إعادة المحاولة!</p>
                                @else
                                    <p>{{ $error }}</p>
                                @endif
                            @endforeach
                        </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <style>
                            .valid-message {
                                color: green;
                                font-weight: bold;
                                font-size: 14px;
                            }

                            .invalid-message {
                                color: red;
                                font-weight: bold;
                                font-size: 14px;
                            }
                        </style>

                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="بريدك الإلكتروني (مثال: الاسم.اللقب@etu.uae.ac.ma)" required/>
                            <div id="email-validation-message" class="invalid-message"></div>
                            <script>
                                const emailInput = document.getElementById('email');
                                const emailValidationMessage = document.getElementById('email-validation-message');

                                emailInput.addEventListener('input', function () {
                                    const emailPattern = /^[a-zA-Z]+\.[a-zA-Z]+@etu\.uae\.ac\.ma$/;
                                    const isValid = emailPattern.test(emailInput.value);

                                    if (isValid) {
                                        emailValidationMessage.textContent = 'صيغة صحيحة';
                                        emailValidationMessage.className = 'valid-message';
                                    } else {
                                        emailValidationMessage.textContent = 'صيغة غير صحيحة';
                                        emailValidationMessage.className = 'invalid-message';
                                    }
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="apogee" id="apogee" pattern="\d{8}" placeholder="رقم أبوجي (8 أرقام)" title="يرجى إدخال 8 أرقام متتالية" required/>
                            <div id="validation-message" class="invalid-message"></div>
                            <script>
                                const apogeeInput = document.getElementById('apogee');
                                const validationMessage = document.getElementById('validation-message');

                                apogeeInput.addEventListener('input', function () {
                                    const isValid = apogeeInput.checkValidity();

                                    if (isValid) {
                                        validationMessage.textContent = 'صيغة صحيحة';
                                        validationMessage.className = 'valid-message';
                                    } else {
                                        validationMessage.textContent = 'صيغة غير صحيحة';
                                        validationMessage.className = 'invalid-message';
                                    }
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="cin" id="cin" placeholder="رقم بطاقة التعريف الوطنية (مثال: أ123456)" pattern="^[A-Z]{1,2}\d{1,6}$" title="يجب أن يبدأ رقم بطاقة التعريف بحرف كبير واحد على الأقل ثم رقم واحد على الأقل" required/>
                            <div id="cin-validation-message" class="invalid-message"></div>
                            <script>
                                const cinInput = document.getElementById('cin');
                                const cinValidationMessage = document.getElementById('cin-validation-message');

                                cinInput.addEventListener('input', function () {
                                    const isValid = cinInput.checkValidity();

                                    if (isValid) {
                                        cinValidationMessage.textContent = 'صيغة صحيحة';
                                        cinValidationMessage.className = 'valid-message';
                                    } else {
                                        cinValidationMessage.textContent = 'صيغة غير صحيحة';
                                        cinValidationMessage.className = 'invalid-message';
                                    }
                                });
                            </script>
                        </div>
                        <label for="document" style="font-weight: bold; font-size:20; color:black;">اختر الوثيقة:</label>
                        <select class="form-input" id="document" name="document" onchange="showSubForm()" required>
                            <option value="option1">عقد الازدياد </option>
                            <option value="option2"> شهادة الوفاة</option>
                            <option value="option3">شهادة السكنى </option>
                        </select>
                        <br /><br />
                        <div id="sub-form1" class="sub-form hidden">
                            <!-- Select field for region of birth -->
                            <div class="form-group">
                                <select class="form-input" name="region_naissance" id="region_naissance" required>
                                    <option value="" disabled selected>اختر جهة الميلاد</option>
                                    <option value="rabat-sale">الرباط - سلا</option>
                                    <option value="casablanca">الدار البيضاء</option>
                                    <option value="tangier">طنجة</option>
                                    <option value="fes">فاس</option>
                                    <option value="marrakech">مراكش</option>
                                    <!-- Add other regions as needed -->
                                </select>
                            </div>

                            <!-- Input for full name -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="nom_complet" id="nom_complet" placeholder="اسمك الكامل" pattern="^[\u0600-\u06FF\s]+$" title="يرجى إدخال الاسم باللغة العربية فقط" required />
                            </div>

                            <!-- Input for date of birth -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="date_naissance" id="date_naissance" placeholder="تاريخ الميلاد (الصيغة: سنة-شهر-يوم)" pattern="^\d{4}-\d{2}-\d{2}$" title="يرجى إدخال تاريخ بصيغة سنة-شهر-يوم" required />
                                <div id="date-validation-message" class="invalid-message"></div>
                                <script>
                                    const dateInput = document.getElementById('date_naissance');
                                    const dateValidationMessage = document.getElementById('date-validation-message');

                                    dateInput.addEventListener('input', function () {
                                        const isValid = dateInput.checkValidity();

                                        if (isValid) {
                                            dateValidationMessage.textContent = 'صيغة صحيحة';
                                            dateValidationMessage.className = 'valid-message';
                                        } else {
                                            dateValidationMessage.textContent = 'صيغة غير صحيحة';
                                            dateValidationMessage.className = 'invalid-message';
                                        }
                                    });
                                </script>
                            </div>

                            <!-- Input for parent names -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="nom_pere" id="nom_pere" placeholder="اسم الأب الكامل" pattern="^[\u0600-\u06FF\s]+$" title="يرجى إدخال الاسم باللغة العربية فقط" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="nom_mere" id="nom_mere" placeholder="اسم الأم الكامل" pattern="^[\u0600-\u06FF\s]+$" title="يرجى إدخال الاسم باللغة العربية فقط" required />
                            </div>

                            <!-- Input for national ID number -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="cni" id="cni" placeholder="رقم البطاقة الوطنية" pattern="^[A-Za-z]\d{9}$" title="يرجى إدخال رقم يبدأ بحرف يتبعه 9 أرقام" required />
                                <div id="cni-validation-message" class="invalid-message"></div>
                                <script>
                                    const cniInput = document.getElementById('cni');
                                    const cniValidationMessage = document.getElementById('cni-validation-message');

                                    cniInput.addEventListener('input', function () {
                                        const isValid = cniInput.checkValidity();

                                        if (isValid) {
                                            cniValidationMessage.textContent = 'صيغة صحيحة';
                                            cniValidationMessage.className = 'valid-message';
                                        } else {
                                            cniValidationMessage.textContent = 'صيغة غير صحيحة';
                                            cniValidationMessage.className = 'invalid-message';
                                        }
                                    });
                                </script>
                            </div>
                        </div>


                        <div id="sub-form2" class="sub-form hidden">
                            <!-- Input for deceased's full name -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="nom_defunt" id="nom_defunt" placeholder="اسم المتوفى الكامل" pattern="^[\u0600-\u06FF\s]+$" title="يرجى إدخال الاسم باللغة العربية فقط" required />
                            </div>

                            <!-- Input for date of death -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="date_deces" id="date_deces" placeholder="تاريخ الوفاة (الصيغة: سنة-شهر-يوم)" pattern="^\d{4}-\d{2}-\d{2}$" title="يرجى إدخال تاريخ بصيغة سنة-شهر-يوم" required />
                                <div id="date-deces-validation-message" class="invalid-message"></div>
                                <script>
                                    const dateDecesInput = document.getElementById('date_deces');
                                    const dateDecesValidationMessage = document.getElementById('date-deces-validation-message');

                                    dateDecesInput.addEventListener('input', function () {
                                        const isValid = dateDecesInput.checkValidity();

                                        if (isValid) {
                                            dateDecesValidationMessage.textContent = 'صيغة صحيحة';
                                            dateDecesValidationMessage.className = 'valid-message';
                                        } else {
                                            dateDecesValidationMessage.textContent = 'صيغة غير صحيحة';
                                            dateDecesValidationMessage.className = 'invalid-message';
                                        }
                                    });
                                </script>
                            </div>

                            <!-- Input for place of death -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="lieu_deces" id="lieu_deces" placeholder="مكان الوفاة" pattern="^[\u0600-\u06FF\s]+$" title="يرجى إدخال المكان باللغة العربية فقط" required />
                            </div>

                            <!-- Input for national ID of requester -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="cni_demandeur" id="cni_demandeur" placeholder="رقم بطاقتك الوطنية" pattern="^[A-Za-z]\d{9}$" title="يرجى إدخال رقم يبدأ بحرف يتبعه 9 أرقام" required />
                                <div id="cni-demandeur-validation-message" class="invalid-message"></div>
                                <script>
                                    const cniDemandeurInput = document.getElementById('cni_demandeur');
                                    const cniDemandeurValidationMessage = document.getElementById('cni-demandeur-validation-message');

                                    cniDemandeurInput.addEventListener('input', function () {
                                        const isValid = cniDemandeurInput.checkValidity();

                                        if (isValid) {
                                            cniDemandeurValidationMessage.textContent = 'صيغة صحيحة';
                                            cniDemandeurValidationMessage.className = 'valid-message';
                                        } else {
                                            cniDemandeurValidationMessage.textContent = 'صيغة غير صحيحة';
                                            cniDemandeurValidationMessage.className = 'invalid-message';
                                        }
                                    });
                                </script>
                            </div>

                            <!-- Relationship to deceased -->
                            <div class="form-group">
                                <select class="form-input" name="relation_defunt" id="relation_defunt" required>
                                    <option value="" disabled selected>حدد علاقتك بالمتوفى</option>
                                    <option value="parent">أحد الوالدين</option>
                                    <option value="enfant">ابن/ابنة</option>
                                    <option value="epoux">زوج/زوجة</option>
                                    <option value="autre">أخرى</option>
                                </select>
                            </div>
                        </div>


                        <div id="sub-form3" class="sub-form hidden">
                            <!-- Full Name -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="nom_prenom" id="nom_prenom" placeholder="الاسم الكامل" required />
                            </div>

                            <!-- National ID -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="cni" id="cni" placeholder="رقم بطاقة التعريف الوطنية" pattern="^[A-Za-z]\d{9}$" title="يجب أن يبدأ رقم بطاقة التعريف الوطنية بحرف متبوع بـ 9 أرقام" required />
                                <div id="cni-validation-message" class="invalid-message"></div>
                                <script>
                                    const cniInput = document.getElementById('cni');
                                    const cniValidationMessage = document.getElementById('cni-validation-message');

                                    cniInput.addEventListener('input', function () {
                                        const isValid = cniInput.checkValidity();

                                        if (isValid) {
                                            cniValidationMessage.textContent = 'تنسيق صحيح';
                                            cniValidationMessage.className = 'valid-message';
                                        } else {
                                            cniValidationMessage.textContent = 'تنسيق غير صحيح';
                                            cniValidationMessage.className = 'invalid-message';
                                        }
                                    });
                                </script>
                            </div>

                            <!-- Current Address -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="adresse_actuelle" id="adresse_actuelle" placeholder="عنوان السكن الحالي" required />
                            </div>

                            <!-- Start Date of Residence -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="date_debut_residence" id="date_debut_residence" placeholder="تاريخ بدء الإقامة (الصيغة: YYYY-MM-DD)" pattern="^\d{4}-\d{2}-\d{2}$" title="التنسيق المطلوب: YYYY-MM-DD" required />
                                <div id="date-debut-residence-validation-message" class="invalid-message"></div>
                                <script>
                                    const dateDebutResidenceInput = document.getElementById('date_debut_residence');
                                    const dateDebutResidenceValidationMessage = document.getElementById('date-debut-residence-validation-message');

                                    dateDebutResidenceInput.addEventListener('input', function () {
                                        const isValid = dateDebutResidenceInput.checkValidity();

                                        if (isValid) {
                                            dateDebutResidenceValidationMessage.textContent = 'تنسيق صحيح';
                                            dateDebutResidenceValidationMessage.className = 'valid-message';
                                        } else {
                                            dateDebutResidenceValidationMessage.textContent = 'تنسيق غير صحيح';
                                            dateDebutResidenceValidationMessage.className = 'invalid-message';
                                        }
                                    });
                                </script>
                            </div>

                            <!-- Reason for Certificate -->
                            <div class="form-group">
                                <select class="form-input" name="raison_certificat" id="raison_certificat" required>
                                    <option value="" disabled selected>سبب طلب الشهادة</option>
                                    <option value="emploi">طلب عمل</option>
                                    <option value="etude">التسجيل الدراسي/الجامعي</option>
                                    <option value="administratif">إجراءات إدارية</option>
                                    <option value="autre">أخرى</option>
                                </select>
                            </div>

                            <!-- Witness 1 Information -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="temoin1_nom" id="temoin1_nom" placeholder="اسم الشاهد الأول" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="temoin1_cni" id="temoin1_cni" placeholder="رقم بطاقة الشاهد الأول" pattern="^[A-Za-z]\d{9}$" title="يجب أن يبدأ رقم البطاقة بحرف متبوع بـ 9 أرقام" required />
                            </div>

                            <!-- Witness 2 Information -->
                            <div class="form-group">
                                <input type="text" class="form-input" name="temoin2_nom" id="temoin2_nom" placeholder="اسم الشاهد الثاني" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="temoin2_cni" id="temoin2_cni" placeholder="رقم بطاقة الشاهد الثاني" pattern="^[A-Za-z]\d{9}$" title="يجب أن يبدأ رقم البطاقة بحرف متبوع بـ 9 أرقام" required />
                            </div>
                        </div>


                          <div id="sub-form4" class="sub-form hidden">
                            <div class="form-group">
                                <label for="birthdate" style="font-weight: 450; font-size:20; color:black;">تاريخ الميلاد :</label>
                                <input type="date" class="form-input" id="birthdate" name="birthdate" required />
                                <br /><br />
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="إرسال"/>
                        </div>
                    </form>
                    <script>
                        function showSubForm() {
                            var documentSelect = document.getElementById("document");
                            var subForm1 = document.getElementById("sub-form1");
                            var subForm2 = document.getElementById("sub-form2");
                            var subForm3 = document.getElementById("sub-form3");
                            var subForm4 = document.getElementById("sub-form4");

                            // Masquer tous les sous-formulaires
                            subForm1.classList.add("hidden");
                            subForm2.classList.add("hidden");
                            subForm3.classList.add("hidden");
                            subForm4.classList.add("hidden");

                            // Masquer tous les sous-formulaires
                            // subForm1.style.display = "none";
                            // subForm2.style.display = "none";
                            // subForm3.style.display = "none";
                            // subForm4.style.display = "none";

                            // Afficher le sous-formulaire correspondant à l'option sélectionnée
                            if (documentSelect.value === "option1") {
                                subForm1.classList.remove("hidden");
                            } else if (documentSelect.value === "option2") {
                                subForm2.classList.remove("hidden");
                            } else if (documentSelect.value === "option3") {
                                subForm3.classList.remove("hidden");
                            } else if (documentSelect.value === "option4") {
                                subForm4.classList.remove("hidden");
                            }
                        }
                    </script>
                    <style>
                        .hidden {
                            display: none;
                        }
                    </style>
                    <p class="loginhere">
                        <a href="{{ route('welcome') }}" class="loginhere-link">Retour à la page d'acceuil</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html> --}}
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
            <!-- Sidebar Stepper -->
            <div class="col-md-3">
                <div class="stepper" id="stepper">
                    <div class="step active" data-step="1">الخطوة 1: الإدارة</div>
                    <div class="step" data-step="2">الخطوة 2: الوثيقة</div>
                    <div class="step" data-step="3">الخطوة 3: التوصيل</div>
                    <div class="step" data-step="4">الخطوة 4: التحقق</div>
                    <div class="step" data-step="5">الخطوة 5: التسوية</div>
                    <div class="step" data-step="6">الخطوة 6: التأكيد</div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="col-md-9">
                <!-- Step 1: Administrative Details -->
                <div id="step-1" class="form-section form-container">
                    <h2 class="text-center mb-4">طلب وثيقة</h2>
                    <form action="#" method="POST">
                        @csrf

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

                        <div class="d-flex justify-content-end mt-4">
                            <!-- Next Button -->
                            <button type="button" class="btn btn-primary" id="nextButton">
                                التالي <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Step 2: Document Details (initially hidden) -->
                <div id="step-2" class="form-section form-container">
                    <form action="/submit-document" method="POST">
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
                                    <option value="option1">نعم </option>
                                    <option value="option2"> لا</option>
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
                            <form id="birthDateForm">
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
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">الجنس</label>
                                <select name="gender" class="form-select">
                                    <option value="" disabled selected>اختر...</option>
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثى</option>
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

                        <div class="d-flex justify-content-between mt-4">
                            <!-- Previous Button -->
                            <button type="button" class="btn btn-secondary" id="previousButton">
                                <i class="bi bi-arrow-left"></i> السابق
                            </button>

                            <!-- Next Button -->
                            <button type="button" class="btn btn-primary" id="nextButton2">
                                التالي <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div id="step-3" class="form-section form-container hidden">
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
                <div id="step-4" class="form-section form-container hidden">
                    <h3 class="text-primary mb-4 text-center">مستخرج شهادة الميلاد</h3>

                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">معلومات مكتب الحالة المدنية</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>مكتب الحالة المدنية:</strong> الحسيمة شكران الرئيسي</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">هوية صاحب الوثيقة</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>رقم وسنة الوثيقة:</strong> 3265 / 1980</p>
                                    <p><strong>الاسم بالعربية:</strong> محك</p>
                                    <p><strong>الاسم الأول بالعربية:</strong> الهام</p>
                                    <p><strong>الاسم الأول باللاتينية:</strong> Ilham</p>
                                    <p><strong>اللقب باللاتينية:</strong> adbib</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>اسم الأم:</strong> الهام</p>
                                    <p><strong>لقب الأم:</strong> adbib</p>
                                    <p><strong>اسم الأب:</strong> مهمد</p>
                                    <p><strong>تاريخ الميلاد:</strong> 1913</p>
                                    <p><strong>الجنس:</strong> أنثى</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">تفاصيل الوثيقة</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>رقم الوثيقة:</strong> 205</p>
                            <p><strong>سنة التسجيل:</strong> 1913</p>
                            <p><strong>لغة الوثيقة:</strong> عربي/فرنسي</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">الوثائق المطلوبة</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">* <strong>1</strong> مستخرج شهادة ميلاد</li>
                                <li class="list-group-item">* <strong>1</strong> نسخة كاملة</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h4 class="mb-0">معلومات المستلم</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>الاسم والكنية:</strong> adbib الهام</p>
                            <p><strong>البريد الإلكتروني:</strong> ilhamadbib30@gmail.com</p>
                            <p><strong>رقم الهاتف:</strong> +212 680-894343</p>
                            <p><strong>عنوان التوصيل:</strong> شارع المأمون، تطوان 39020، المغرب</p>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="terms_acceptance" required>
                        <label class="form-check-label" for="terms_acceptance">
                            أقرأ وأوافق على شروط استخدام الخدمة
                        </label>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <!-- Previous Button -->
                        <button type="button" class="btn btn-secondary" id="previousButton3">
                            <i class="bi bi-arrow-left"></i> السابق
                        </button>

                        <!-- Next Button -->
                        <button type="button" class="btn btn-primary" id="nextButton4">
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
