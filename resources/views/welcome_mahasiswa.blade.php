<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Laravel 12 | STMIK IKMI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pastel-blue: #a7d7f2;
            --pastel-lavender: #d8c7ff;
            --pastel-green: #c5e8b7;
            --pastel-pink: #ffd6e7;
            --pastel-yellow: #fff9c4;
            --soft-gray: #f8f9fa;
            --text-dark: #4a5568;
            --text-light: #718096;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #fafafa;
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
            background-image: 
                radial-gradient(circle at 5% 10%, var(--pastel-lavender) 0%, transparent 50%),
                radial-gradient(circle at 95% 90%, var(--pastel-blue) 0%, transparent 50%);
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--pastel-lavender), var(--pastel-blue));
            padding: 50px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.3;
        }

        .avatar-container {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border: 4px solid white;
        }

        .avatar {
            font-size: 42px;
            color: var(--pastel-lavender);
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));
        }

        .title {
            font-size: 2.8rem;
            font-weight: 300;
            color: white;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Main Content */
        .content {
            padding: 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .content {
                grid-template-columns: 1fr;
                padding: 30px 20px;
            }
        }

        /* Cards */
        .card {
            background: var(--soft-gray);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(0,0,0,0.05);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--pastel-lavender), var(--pastel-blue));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            box-shadow: 0 4px 12px rgba(168, 199, 255, 0.3);
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(to bottom right, var(--pastel-yellow), white);
        }

        .welcome-message {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            padding: 12px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            border-left: 4px solid var(--pastel-green);
        }

        .info-item i {
            color: var(--pastel-lavender);
            font-size: 18px;
        }

        /* Mata Kuliah Card */
        .matkul-card {
            background: linear-gradient(to bottom right, var(--pastel-blue), white);
        }

        .matkul-list {
            list-style: none;
        }

        .matkul-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px;
            margin-bottom: 12px;
            background: white;
            border-radius: 12px;
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.2s ease;
        }

        .matkul-item:hover {
            background: rgba(202, 140, 140, 0.9);
            border-color: var(--pastel-blue);
            transform: translateX(5px);
        }

        .matkul-number {
            width: 36px;
            height: 36px;
            background: var(--pastel-pink);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 15px;
        }

        .matkul-name {
            flex-grow: 1;
            font-weight: 500;
            color: var(--text-dark);
        }

        /* Stats */
        .stats-container {
            display: flex;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .stat-item {
            flex: 1;
            min-width: 100px;
            text-align: center;
            padding: 20px 15px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 300;
            color: var(--pastel-lavender);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 500;
        }

        /* Footer */
        .footer {
            padding: 40px;
            text-align: center;
            background: linear-gradient(to right, var(--pastel-green), var(--pastel-blue));
            border-top: 1px solid rgba(255,255,255,0.3);
        }

        .quote-container {
            max-width: 600px;
            margin: 0 auto 25px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            border-left: 4px solid var(--pastel-pink);
        }

        .quote {
            font-size: 1.1rem;
            color: var(--text-dark);
            font-style: italic;
            line-height: 1.7;
        }

        .quote-author {
            margin-top: 15px;
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .ai-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            background: white;
            color: var(--text-dark);
            border-radius: 25px;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-top: 15px;
        }

        .ai-badge i {
            color: var(--pastel-lavender);
        }

        /* Simple Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }

        .delay-1 { animation-delay: 0.2s; opacity: 0; }
        .delay-2 { animation-delay: 0.4s; opacity: 0; }
        .delay-3 { animation-delay: 0.6s; opacity: 0; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="avatar-container">
                <i class="fas fa-user-graduate avatar"></i>
            </div>
            <h1 class="title fade-in">Selamat Datang, {{ $nama }}!</h1>
            <p class="subtitle fade-in delay-1">
                Modul Pembelajaran Laravel 12 dengan Asistensi AI
            </p>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Welcome Card -->
            <div class="card welcome-card fade-in delay-1">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h2 class="card-title">Selamat Bergabung</h2>
                </div>
                
                <p class="welcome-message">
                    Halo <strong>{{ $nama }}</strong>! Senang bertemu dengan Anda di perjalanan belajar Laravel 12 ini. 
                    Bersama-sama kita akan menjelajahi dunia pengembangan web modern dengan bantuan AI sebagai asisten pembelajaran.
                </p>
                
                <div class="info-item">
                    <i class="fas fa-university"></i>
                    <div>
                        <strong>STMIK IKMI Cirebon</strong>
                        <div style="font-size: 0.9rem; color: var(--text-light);">Sistem Informasi</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <i class="fas fa-calendar-alt"></i>
                    <div>
                        <strong>Semester {{ $semester ?? '4' }}</strong>
                        <div style="font-size: 0.9rem; color: var(--text-light);">Tahun Akademik 2024</div>
                    </div>
                </div>

                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-value">{{ count($mataKuliah ?? []) }}</div>
                        <div class="stat-label">Mata Kuliah</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">20</div>
                        <div class="stat-label">Total SKS</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">A</div>
                        <div class="stat-label">IPK Semester</div>
                    </div>
                </div>
            </div>

            <!-- Mata Kuliah Card -->
            <div class="card matkul-card fade-in delay-2">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h2 class="card-title">Mata Kuliah Semester</h2>
                </div>

                @if(isset($mataKuliah) && count($mataKuliah) > 0)
                    <ul class="matkul-list">
                        @foreach($mataKuliah as $index => $mk)
                            <li class="matkul-item">
                                <span class="matkul-number">{{ $index + 1 }}</span>
                                <span class="matkul-name">{{ $mk }}</span>
                                <i class="fas fa-check-circle" style="color: var(--pastel-green);"></i>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="matkul-item">
                        <span class="matkul-number"><i class="fas fa-spinner"></i></span>
                        <span class="matkul-name">Data sedang dimuat...</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="footer fade-in delay-3">
            <div class="quote-container">
                <p class="quote">
                    "AI adalah Kopilot, Anda adalah Pilot-nya. Pilot harus tahu cara menerbangkan pesawat secara manual jika sistem otomatis bermasalah."
                </p>
                <div class="quote-author">
                    — Pedoman Etis Penggunaan AI dalam Pembelajaran
                </div>
            </div>

            <div class="ai-badge">
                <i class="fas fa-robot"></i>
                Dikembangkan dengan bantuan DeepSeek AI Assistant
            </div>

            <p style="margin-top: 25px; color: rgba(255,255,255,0.9); font-size: 0.9rem;">
                © 2024 STMIK IKMI Cirebon | Modul Pemrograman Web Lanjut | Laravel 12
            </p>
        </div>
    </div>

    <script>
        // Simple animation on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElements = document.querySelectorAll('.fade-in');
            
            const checkVisibility = () => {
                fadeElements.forEach(element => {
                    const rect = element.getBoundingClientRect();
                    if (rect.top < window.innerHeight - 100) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }
                });
            };
            
            // Initial check
            checkVisibility();
            
            // Check on scroll
            window.addEventListener('scroll', checkVisibility);
            
            // Add hover effect to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
            
            // Add ripple effect to matkul items
            const matkulItems = document.querySelectorAll('.matkul-item');
            matkulItems.forEach(item => {
                item.addEventListener('click', function() {
                    this.style.transform = 'translateX(5px) scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = 'translateX(5px) scale(1)';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>