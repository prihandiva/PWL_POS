<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Webss Kitchen</title>
    <!-- Google Font: Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #01153E;
            color: #3C3C3B;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 56px;
            margin-bottom: 10px;
            color: #FAF3E0;
        }

        p {
            font-size: 20px;
            margin-bottom: 40px;
            color: #857575;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #FAF3E0;
            color: #563C5C;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #8C7297;
            transform: translateY(-5px);
        }

        .btn-login {
            background-color: #01153E;
            border: 2px solid #FAF3E0;
            color: #FAF3E0;
        }

        .btn-login:hover {
            background-color: #1E3A5F;
        }

        .btn-register {
            background-color: #EE6C4D;
        }

        .container {
            max-width: 700px;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 14px;
        }

        .footer a {
            color: #FAF3E0;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('adminlte/dist/img/logo.png')}}" alt="Webss Kitchen Logo" style="width: 100px; margin-bottom: 20px;">
        <h1>🍴 Webss Kitchen 🍴</h1>
        <p>Rediscover your culinary journey with us.</p>
        <a href="{{ url('login') }}" class="btn btn-login">Login</a>
        <a href="{{ url('register') }}" class="btn">Register</a>
    </div>

    <div class="footer">
        <p>&copy; 2024 Webss Kitchen. <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></p>
        <p>FITRIA RAMADHANI PRIHANDIVA | SIB 3D / 17</p>
    </div>
</body>

</html>
