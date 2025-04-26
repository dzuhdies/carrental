<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
            width: 90%;
            max-width: 400px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo h1 {
            color: #333;
            font-size: 2rem;
            font-weight: 700;
        }
        
        .logo-icon {
            background-color: #764ba2;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 24px;
        }
        
        .error-message {
            background-color: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #dc2626;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            color: #4b5563;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            border-color: #764ba2;
            outline: none;
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.2);
        }
        
        .btn {
            background-color: #764ba2;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 24px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }
        
        .btn:hover {
            background-color: #5d3b82;
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #4b5563;
        }
        
        .login-link a {
            color: #764ba2;
            font-weight: 600;
            text-decoration: none;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e5e7eb;
        }
        
        .social-register {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 8px;
            color: white;
            text-decoration: none;
        }
        
        .password-requirements {
            font-size: 12px;
            color: #6b7280;
            margin-top: 6px;
        }
        
        .terms {
            font-size: 14px;
            color: #4b5563;
            text-align: center;
            margin-top: 1rem;
        }
        
        .terms a {
            color: #764ba2;
            text-decoration: none;
        }
        
        .terms a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <div class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <line x1="20" y1="8" x2="20" y2="14"></line>
                    <line x1="23" y1="11" x2="17" y2="11"></line>
                </svg>
            </div>
            <h1>Buat Akun</h1>
        </div>
        
        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="password-requirements">
                    Password harus memiliki minimal 8 karakter, termasuk huruf dan angka
                </div>
            </div>
            
            <button type="submit" class="btn">Daftar Sekarang</button>
            
            <div class="terms">
                Dengan mendaftar, Anda menyetujui <a href="#">Syarat dan Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>
            </div>
        </form>
        
        <div class="login-link">
            <p>Sudah punya akun? <a href="/">Login di sini</a></p>
        </div>
        
    
    </div>
</body>
</html>