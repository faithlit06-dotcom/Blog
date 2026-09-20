<!DOCTYPE html>
<html>
<head>
    <title>Register - AjoBlog</title>
    <style>
        body { font-family: sans-serif; display: center; justify-content: center; align-items: center; min-height: 80vh; background: #f4f6f8; display: flex; }
        .box { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); width: 320px; }
        input { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #16a34a; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .error { color: #dc2626; font-size: 13px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Register for AjoBlog</h2>
        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="/register">
            @csrf
            <div>
                <label>Name:</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label>Confirm Password:</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button type="submit">Create Account</button>
        </form>
        <p style="font-size: 13px; text-align: center; margin-top: 15px;">
            Already registered? <a href="/login">Log In</a>
        </p>
    </div>
</body>
</html>