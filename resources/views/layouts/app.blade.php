<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚀 Laranotes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #FFD6E0, #A7C7E7);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
        }

        nav {
            background: linear-gradient(135deg, rgba(40, 40, 40, 0.7), rgba(90, 90, 90, 0.6));
            backdrop-filter: blur(15px); /* Smooth blur effect */
            -webkit-backdrop-filter: blur(15px); /* Safari support */
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); /* Subtle border */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Soft depth shadow */
            padding: 8px 0;
        }


        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .navbar-brand em {
            text-transform: capitalize;
            font-style: italic;
            font-weight: normal;
        }

        .footer {
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.6), rgba(50, 50, 50, 0.6));
            color: white;
            text-align: center;
            padding: 12px 0;
            margin-top: 30px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }

        .footer a{
            text-decoration: none;
            color:white;
        }

    </style>
</head>

<body>

    <!-- 🚀 EXTREME HEADER -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
        <div class="container">
            <a class="navbar-brand text-warning" href="{{ route('notes.index') }}">📝 Laranotes - <em><span class="font-semibold">The Ultimate Notes App</span></em></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('notes.index') }}">🏠 Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('notes.create') }}">➕ New Note</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🌟 CONTENT WRAPPER -->
    <div class="container mt-4 content-wrapper">
        @yield('content')
    </div>

    <!-- 🔥 EXTREME FOOTER -->
    <footer class="footer mt-auto">
        <div class="container">
            <p class="mb-0">
                🔥 Built with ❤️ by
                <strong class="text-warning"><em>
                    <a href="https://github.com/codeartsbyhassan" target="_blank" class="link">Hassan Zahid</a>
                </em></strong> | 🚀 {{ date('Y') }} <sup>&copy;</sup>
            </p>
        </div>
    </footer>

</body>

</html>
