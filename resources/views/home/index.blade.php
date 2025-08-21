<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS-APP</title>
    <!-- MDB CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/home/CSS/style.css') }}">
</head>
<body>


    <div class="surface">
        <!-- Navigation -->
        <header>
            <div class="container">
                <a class="brand" href="#" aria-label="Brand">
                    <img src="{{ asset('assets/home/img/tesda_logo.png') }}" alt="tesda_logo" style="width: 50px; height: 50px;">
                </a>
                <nav class="nav">
                    <a class="active" href="#">Home</a>
                    <a href="#">About us</a>
                    <a href="#">How it works?</a>
                    <a href="#">Info</a>
                    <a href="#">Contact</a>
                </nav>
                <!-- Updated button with MDB attributes -->
                <button type="button" class="login-btn" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#modal-login">
                    <span class="login-dot"></span> Login
                </button>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container inner">
                <div class="hero-copy">
                    <h1>
                        Human Resource
                        <span class="strong"> System</span>
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <a href="#" class="cta">Get Started</a>
                </div>
                <div class="hero-figure" aria-hidden="true">
                    <img src="{{ asset('assets/home/img/hrm.png') }}" alt="HR" style="width: 400px; height: 400px;">
                </div>
            </div>
            <!-- Wave gradient -->
            <svg class="wave" viewBox="0 0 1440 320" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <defs>
                    <linearGradient id="waveGradient" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="#7f6fff"/>
                        <stop offset="50%" stop-color="#6a5cf5"/>
                        <stop offset="100%" stop-color="#19c6ff"/>
                    </linearGradient>
                </defs>
                <path d="M0,224 L48,192 C96,160 192,96 288,96 C384,96 480,160 576,186.7 C672,213 768,203 864,176 C960,149 1056,107 1152,117.3 C1248,128 1344,192 1392,224 L1440,256 L1440,320 L0,320 Z" fill="url(#waveGradient)"/>
            </svg>
        </section>
    </div>

    <!-- Include auth modals -->
    @include('auth.login')
    @include('auth.register')
    @include('auth.forgot-password')

    <!-- MDB JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>
</html>