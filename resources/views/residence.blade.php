<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب شهادة السكنى</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
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
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4">طلب شهادة السكنى</h2>
        
        <!-- Success message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('residence') }}" method="POST" enctype="multipart/form-data">
            @csrf
        

            <!-- معلومات شخصية -->
            <h4 class="text-primary mt-4">معلومات شخصية</h4>
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

            <!-- إثبات الإقامة -->
            <h4 class="text-primary mt-4">إثبات الإقامة</h4>
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
                </select>
            </div>

            <!-- الوثائق الداعمة -->
            <h4 class="text-primary mt-4">الوثائق الداعمة</h4>
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
                <input type="file" class="form-control" name="supporting_document" accept=".pdf,.jpg,.png" required>
            </div>
            <div class="mb-3">
                <label class="form-label">نسخة من البطاقة الوطنية</label>
                <input type="file" class="form-control" name="id_document" accept=".pdf,.jpg,.png" required>
            </div>

              <!-- عنوان التوصيل -->
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
                  </select>
              </div>

            <!-- معلومات التوصيل -->
            <h4 class="text-primary mt-4">معلومات التوصيل</h4>
            <div class="mb-3">
                <label class="form-label">الاسم الكامل</label>
                <input type="text" class="form-control" name="recipient_name" placeholder="أدخل الاسم الكامل">
            </div>
            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" name="recipient_email" placeholder="أدخل البريد الإلكتروني">
            </div>
            <div class="mb-3">
                <label class="form-label">رقم الهاتف</label>
                <input type="tel" class="form-control" name="recipient_phone" placeholder="أدخل رقم الهاتف">
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">إرسال الطلب</button>
            </div>
        </form>
    </div>
</div>

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
