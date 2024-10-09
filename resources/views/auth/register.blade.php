<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #a9c1ee;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .register-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-header img {
            width: 80px;
            height: 80px;
        }

        .register-header h2 {
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
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <img class="w-16 cursor-pointer" src="{{ asset('image/logo_FourTalk.png') }}" alt="...">
            <h2>F-OURTALK</h2>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-form">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required>
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
                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
                <button type="submit" class="submit-btn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>