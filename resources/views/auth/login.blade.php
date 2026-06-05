<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
        }

        .login-card {
            width: 300px;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .login-title {
            text-align: center;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 600;
            color: #111827;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 9px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99,102,241,0.15);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            margin-bottom: 12px;
        }

        .options label {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #6b7280;
        }

        .options a {
            color: #4f46e5;
            text-decoration: none;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background: #4f46e5;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 13px;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #3730a3;
        }

        .footer-text {
            text-align: center;
            font-size: 11px;
            margin-top: 12px;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="login-title">Welcome Back</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="options">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                <a href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            </div>

            <button class="login-btn" type="submit">Login</button>
        </form>

        <div class="footer-text">
            © {{ date('Y') }} Student management System
        </div>
    </div>

</body>
</html>