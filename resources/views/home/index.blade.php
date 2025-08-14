<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS-APP</title>
</head>
<link rel="stylesheet" href="{{ asset('assets/home/CSS/style.css') }}">
<body>


    <div class="surface">
        <!-- Navigation -->
        <header>
            <div class="container">
                <a class="brand" href="#" aria-label="Brand">
                    <span class="brand-icon">●</span>
                    LOGO
                </a>
                <nav class="nav">
                    <a class="active" href="#">Home</a>
                    <a href="#">About us</a>
                    <a href="#">Work</a>
                    <a href="#">Info</a>
                    <a href="#">Contact</a>
                </nav>
                <a href="#" class="login-btn"><span class="login-dot"></span> Login</a>
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
                    <a href="#" class="cta">Learn More</a>
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
</body>
</html>


