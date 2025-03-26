{{-- <h1>Forget Password Email</h1>

You can reset password from bellow link:

<a href="{{ route('reset.password.get', $token) }}">Reset Password</a> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; text-align: center;">
    <div style="max-width: 500px; background: #ffffff; padding: 20px; margin: auto; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #333;">Forgot Your Password?</h2>
        <p style="color: #666;">No worries! Click the button below to reset your password.</p>
        <a href="{{ route('reset.password.get', $token) }}" 
           style="display: inline-block; background-color: #000000; color: #ffffff; text-decoration: none; padding: 12px 20px; font-size: 16px; border-radius: 5px; margin-top: 10px;">
           Reset Password
        </a>
        <p style="color: #999; font-size: 12px; margin-top: 20px;">
            If you didn't request a password reset, please ignore this email.
        </p>
    </div>
</body>
</html>
