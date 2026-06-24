<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bitforge CMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f0f1a;
            position: relative;
            overflow: hidden;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            animation: orbFloat 10s ease-in-out infinite;
        }

        .orb:nth-child(1) {
            width: 600px;
            height: 600px;
            background: #6366f1;
            top: -200px;
            right: -200px;
            animation-delay: 0s;
        }

        .orb:nth-child(2) {
            width: 500px;
            height: 500px;
            background: #f97316;
            bottom: -150px;
            left: -150px;
            animation-delay: 3s;
        }

        .orb:nth-child(3) {
            width: 300px;
            height: 300px;
            background: #8b5cf6;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 6s;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, -50px) scale(1.2); }
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.04);
            border-radius: 32px;
            padding: 48px 40px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            transition: all 0.4s ease;
        }

        .login-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 40px 80px rgba(99, 102, 241, 0.15);
        }

        .brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand .logo {
            display: inline-block;
            font-size: 52px;
            background: linear-gradient(135deg, #818cf8, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand .logo-sub {
            display: block;
            font-size: 14px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 4px;
            letter-spacing: 2px;
            -webkit-text-fill-color: rgba(255, 255, 255, 0.4);
        }

        .brand .badge {
            display: inline-block;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(249, 115, 22, 0.2));
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 8px;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Inter', sans-serif;
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.2);
        }

        .form-group input:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: #818cf8;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6, #f97316);
            border: none;
            border-radius: 12px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
            margin-top: 12px;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #f97316, #8b5cf6, #6366f1);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .btn-login:hover::after {
            opacity: 1;
        }

        .btn-login span {
            position: relative;
            z-index: 2;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.35);
        }

        .btn-login:active {
            transform: scale(0.97);
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }

        .alert-danger i {
            color: #f87171;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.04);
            color: rgba(255, 255, 255, 0.25);
            font-size: 12px;
            font-weight: 300;
        }

        .login-footer strong {
            color: rgba(255, 255, 255, 0.4);
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 32px 20px;
            }
            .brand .logo {
                font-size: 38px;
            }
        }
    </style>
</head>
<body>
    <div class="orb"></div>
    <div class="orb"></div>
    <div class="orb"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="brand">
                <span class="logo">Bitforge</span>
                <span class="logo-sub">CONTENT MANAGEMENT SYSTEM</span>
            </div>

            @if(session('error') || $errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    @if(session('error'))
                        {{ session('error') }}
                    @else
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="admin@bitforge.com" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-login">
                    <span><i class="fas fa-arrow-right-to-bracket"></i> &nbsp;Login</span>
                </button>
            </form>

            <div class="login-footer">
                Default: <strong>admin@bitforge.com</strong> / <strong>password</strong>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</body>
</html>