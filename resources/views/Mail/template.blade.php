<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soft Mailer | Mail Body</title>

    <style>
        .container {
            max-width: 640px;
            width: 100%;
            padding: 2rem;
            margin: 0 auto;
            background: #ecebeb;
            border-radius: 20px;
        }

        .logo {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .logo img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>{{ $sub }}</h2>
        <p>{{ $msg }}</p>

        <div class="logo">
            <a href="https://devsohelrana.github.io/SoftFinding/">
                <img src="https://devsohelrana.github.io/SoftFinding/assets/img/Soft%20Finding%20Logo.png"
                    alt="Soft Finding" class="w-full">
            </a>
        </div>
    </div>
</body>

</html>