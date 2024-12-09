<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap');

        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --text-color: #2c3e50;
            --background-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif;
        }

        body {
    background-image: url("../images/bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    background-position: center center;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    direction: rtl;
    background-attachment: fixed;
    overflow: hidden;
}

        /* Animated Background Shapes */
        .bg-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.4;
            animation: float 10s infinite alternate;
        }

        .shape1 {
            width: 200px;
            height: 200px;
            background: rgba(52, 152, 219, 0.3);
            top: -10%;
            right: -5%;
        }

        .shape2 {
            width: 300px;
            height: 300px;
            background: rgba(46, 204, 113, 0.3);
            bottom: -15%;
            left: -10%;
            animation-delay: -3s;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            100% { transform: translateY(50px); }
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 450px;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }

        .login-container:hover {
            transform: scale(1.02);
            box-shadow: 0 25px 60px rgba(0,0,0,0.2);
        }

        .login-header {
            margin-bottom: 30px;
        }

        .login-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group input {
            margin-right:10px;
            width: 100%;
            padding: 15px 30px 15px 50px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 15px rgba(52, 152, 219, 0.2);
        }

        .input-group i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .input-group input:focus + i {
            color: var(--primary-color);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
        }

        .login-btn:hover {
            background: #2980b9;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(52, 152, 219, 0.4);
        }

        .error-message {
            color: #e74c3c;
            margin-bottom: 20px;
            font-size: 0.9rem;
            display: none;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        @media (max-width: 480px) {
            .login-container {
                width: 95%;
                padding: 25px;
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-shapes">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
    </div>

    <div class="login-container">
        <div class="login-header">
            <h2>تسجيل الدخول</h2>
            <p>أدخل رقم بطاقة التعريف الوطنية ورقم المرجع الخاص بك</p>
        </div>

        <form id="loginForm" onsubmit="return validateLogin()">
            <div class="error-message" id="errorMessage"></div>

            <div class="input-group">
                <input
                    type="text"
                    id="cinInput"
                    placeholder="رقم بطاقة التعريف الوطنية"
                    required
                >
                <i class="fas fa-id-card"></i>
            </div>

            <div class="input-group">
                <input
                    type="password"
                    id="referenceInput"
                    placeholder="رقم المرجع"
                    required
                >
                <i class="fas fa-lock"></i>
            </div>

            <button type="submit" class="login-btn">تسجيل الدخول</button>
        </form>
    </div>

    <script>
        function validateLogin() {
            const cinInput = document.getElementById('cinInput');
            const referenceInput = document.getElementById('referenceInput');
            const errorMessage = document.getElementById('errorMessage');

            // Reset error message
            errorMessage.style.display = 'none';
            errorMessage.textContent = '';

            // Basic validation
            if (!cinInput.value.trim()) {
                showError('يرجى إدخال رقم بطاقة التعريف الوطنية');
                return false;
            }

            if (!referenceInput.value.trim()) {
                showError('يرجى إدخال رقم المرجع');
                return false;
            }

            // Here you would typically make an AJAX call to validate credentials
            console.log('Attempting login:', {
                cin: cinInput.value,
                reference: referenceInput.value
            });

            // Prevent form submission for this example
            return false;
        }

        function showError(message) {
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</body>
</html>
