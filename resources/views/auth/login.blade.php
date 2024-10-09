<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a6c1ee;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header img {
            width: 80px;
            height: 80px;
        }

        .login-header h2 {
            margin-top: 10px;
            font-size: 24px;
            color: #333333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #8b6a51;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .additional-links {
            margin-top: 15px;
            text-align: center;
        }

        .additional-links a {
            color: #8b6a51;
            text-decoration: none;
        }

        .additional-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img class="w-16 cursor-pointer" src="{{ asset('image/logo_FourTalk.png') }}" alt="...">
            <h2>F-OURTALK</h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-form">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus>
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </div>
        </form>
        <div class="additional-links">
            <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>
</html>