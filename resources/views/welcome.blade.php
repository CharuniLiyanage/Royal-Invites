<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Invites - Premium Wedding Invitations</title>
    <!-- Google Fonts & FontAwesome Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cinzel:wght@500;700;800&family=Great+Vibes&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --burgundy: #4a121a;
            --dark-burgundy: #2e0a10;
            --gold: #c5a059;
            --gold-light: #f7e7ce;
            --cream-bg: #faf7f2;
            --white: #ffffff;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background-color: var(--cream-bg); color: #222; }

        .navbar { background: #fff; padding: 18px 60px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--gold-light); position: sticky; top: 0; z-index: 100; }
        .brand { font-family: 'Cinzel', serif; font-size: 22px; font-weight: 700; color: var(--burgundy); text-decoration: none; letter-spacing: 2px; }
        .brand span { color: var(--gold); }
        .nav-btn { background: var(--burgundy); color: white; padding: 10px 22px; border-radius: 30px; text-decoration: none; font-size: 13px; font-weight: 600; }

        .hero { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; max-width: 1200px; margin: 50px auto 70px; padding: 0 20px; align-items: center; }
        .hero-title { font-family: 'Cinzel', serif; font-size: 42px; color: var(--burgundy); line-height: 1.25; margin-bottom: 15px; }
        .hero-title span { font-family: 'Alex Brush', cursive; font-size: 58px; color: var(--gold); display: block; }
        .hero-desc { color: #555; font-size: 15px; margin-bottom: 30px; line-height: 1.7; }

        .hero-image-frame {
            border-radius: 20px;
            overflow: hidden;
            border: 8px solid white;
            box-shadow: 0 20px 45px rgba(74, 18, 26, 0.18);
            position: relative;
        }
        .hero-image-frame img {
            width: 100%;
            height: 360px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }
        .hero-image-frame:hover img {
            transform: scale(1.03);
        }

        .container { max-width: 1200px; margin: 0 auto 100px; padding: 0 20px; }
        .section-header { text-align: center; margin-bottom: 45px; }
        .section-header h2 { font-family: 'Cinzel', serif; font-size: 30px; color: var(--burgundy); letter-spacing: 1px; }

        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 35px; }

        .card-wrapper {
            background: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 1px solid var(--gold-light);
            transition: all 0.35s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-wrapper:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(74, 18, 26, 0.18);
            border-color: var(--gold);
        }

        .mini-generated-card { position: relative; border-bottom: 1px solid var(--gold-light); }

        .mini-card-header {
            height: 140px;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .mini-couple-avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            border: 3px solid #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            object-fit: cover;
            margin-bottom: -28px;
            position: relative;
            z-index: 10;
        }

        .badge {
            position: absolute; top: 10px; right: 10px; z-index: 12;
            background: rgba(255, 255, 255, 0.92); color: var(--burgundy);
            font-size: 9px; font-weight: 700; padding: 3px 10px; border-radius: 12px; text-transform: uppercase;
        }

        .mini-card-body { padding: 38px 20px 22px; text-align: center; }

        .mini-sub-title { font-family: 'Cinzel', serif; font-size: 9px; letter-spacing: 2px; text-transform: uppercase; font-weight: 700; margin-bottom: 4px; }
        .mini-groom-name, .mini-bride-name { font-size: 36px; line-height: 1; margin: 0; }
        .mini-ampersand { font-family: 'Cinzel', serif; font-size: 13px; display: block; margin: 3px 0; }
        .mini-invitation-text { font-size: 9px; letter-spacing: 1px; text-transform: uppercase; opacity: 0.8; margin: 8px 0 10px; }
        .mini-divider { width: 45px; height: 1px; margin: 0 auto 12px; }
        .mini-details { display: flex; justify-content: space-around; font-size: 10px; font-weight: 600; padding-top: 10px; border-top: 1px solid rgba(0,0,0,0.08); }

        /* Category Styles */
        .theme-luxury { background: #ffffff; }
        .theme-luxury .mini-sub-title, .theme-luxury .mini-ampersand, .theme-luxury .mini-divider { color: var(--gold); background-color: var(--gold); }
        .theme-luxury .mini-groom-name, .theme-luxury .mini-bride-name { font-family: 'Alex Brush', cursive; color: var(--burgundy); }

        .theme-floral { background: #f4f9f4; }
        .theme-floral .mini-sub-title, .theme-floral .mini-ampersand, .theme-floral .mini-divider { color: #2d6a4f; background-color: #2d6a4f; }
        .theme-floral .mini-groom-name, .theme-floral .mini-bride-name { font-family: 'Great Vibes', cursive; color: #1b4332; }

        .theme-modern { background: #0f172a; color: white; }
        .theme-modern .mini-sub-title, .theme-modern .mini-ampersand, .theme-modern .mini-divider { color: #38bdf8; background-color: #38bdf8; }
        .theme-modern .mini-groom-name, .theme-modern .mini-bride-name { font-family: 'Cinzel', serif; font-size: 22px; color: #38bdf8; font-weight: 700; }
        .theme-modern .mini-details { border-color: #334155; color: #f8fafc; }

        .theme-royal { background: #fff0f3; }
        .theme-royal .mini-sub-title, .theme-royal .mini-ampersand, .theme-royal .mini-divider { color: #c9184a; background-color: #800f2f; }
        .theme-royal .mini-groom-name, .theme-royal .mini-bride-name { font-family: 'Alex Brush', cursive; color: #590d22; }

        .card-action-bar { padding: 18px 20px; text-align: center; background: #fff; }
        .template-title { font-family: 'Cinzel', serif; font-size: 16px; color: var(--burgundy); font-weight: 700; margin-bottom: 10px; }

        .btn-use { display: block; width: 100%; padding: 12px; background: var(--burgundy); color: white; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 12px; text-align: center; text-transform: uppercase; letter-spacing: 1px; transition: background 0.3s; }
        .btn-use:hover { background: var(--gold); }

        .explore-more-container { text-align: center; margin-top: 55px; }
        .btn-explore-more {
            display: inline-flex; align-items: center; gap: 10px; padding: 16px 36px;
            background: linear-gradient(135deg, var(--burgundy) 0%, #701a28 100%);
            color: white; text-decoration: none; border-radius: 50px;
            font-family: 'Cinzel', serif; font-size: 15px; font-weight: 700; letter-spacing: 1.5px;
            box-shadow: 0 10px 25px rgba(74, 18, 26, 0.25); transition: all 0.35s ease; border: 2px solid var(--gold);
        }
        .btn-explore-more:hover {
            background: linear-gradient(135deg, var(--gold) 0%, #b38b45 100%);
            color: #fff; transform: translateY(-4px); box-shadow: 0 15px 30px rgba(197, 160, 89, 0.4);
        }

        /* PREMIUM PROFESSIONAL FOOTER STYLES */
        .site-footer {
            background: var(--dark-burgundy);
            color: #d1d5db;
            padding-top: 70px;
            border-top: 3px solid var(--gold);
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
        }

        .footer-brand .footer-logo {
            font-family: 'Cinzel', serif;
            font-size: 24px;
            font-weight: 800;
            color: var(--gold-light);
            text-decoration: none;
            display: inline-block;
            margin-bottom: 15px;
        }

        .footer-brand .footer-logo span { color: var(--gold); }

        .footer-brand p {
            font-size: 13px;
            line-height: 1.8;
            color: #9ca3af;
            margin-bottom: 20px;
        }

        .footer-social { display: flex; gap: 12px; }

        .social-btn {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            color: var(--gold-light);
            display: flex; justify-content: center; align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(197, 160, 89, 0.3);
        }

        .social-btn:hover {
            background: var(--gold);
            color: var(--dark-burgundy);
            transform: translateY(-3px);
        }

        .footer-col h4 {
            font-family: 'Cinzel', serif;
            font-size: 16px;
            color: var(--gold-light);
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 35px; height: 2px;
            background: var(--gold);
        }

        .footer-col ul { list-style: none; }
        .footer-col ul li { margin-bottom: 12px; }

        .footer-col ul li a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s ease, padding-left 0.3s ease;
            display: inline-block;
        }

        .footer-col ul li a:hover {
            color: var(--gold-light);
            padding-left: 5px;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 13px;
            color: #9ca3af;
        }

        .contact-info-item i {
            color: var(--gold);
            font-size: 15px;
            width: 20px;
        }

        .contact-info-item a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-info-item a:hover { color: var(--gold-light); }

        .footer-bottom {
            margin-top: 60px;
            padding: 22px 20px;
            background: rgba(0, 0, 0, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            text-align: center;
            font-size: 13px;
            color: #6b7280;
        }

        .footer-bottom strong { color: var(--gold-light); }

        @media (max-width: 900px) {
            .footer-container { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 600px) {
            .footer-container { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">ROYAL <span>INVITES</span></a>
        <a href="{{ route('templates.index') }}" class="nav-btn">ALL TEMPLATES</a>
    </nav>

    <div class="hero">
        <div>
            <h1 class="hero-title">Craft Exceptional <span>Wedding Cards</span></h1>
            <p class="hero-desc">Bespoke digital wedding invitations designed with royal gold foil borders, delicate floral artwork, and premium typography.</p>
        </div>
        <div class="hero-image-frame">
            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1000&q=80" alt="Royal Wedding Showcase">
        </div>
    </div>

    <div class="container">
        <div class="section-header">
            <h2>Featured Invitation Collection</h2>
        </div>

        <div class="grid">
            @foreach($templates->take(3) as $template)
                @php
                    $cat = strtolower($template->category ?? 'luxury');
                    $schema = json_decode($template->design_schema, true);
                    $headerImg = $schema['header_img'] ?? 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=800&q=80';

                    $themeClass = 'theme-luxury';
                    if(in_array($cat, ['floral', 'botanical'])) $themeClass = 'theme-floral';
                    elseif(in_array($cat, ['modern', 'boho'])) $themeClass = 'theme-modern';
                    elseif(in_array($cat, ['royal', 'romantic', 'classic'])) $themeClass = 'theme-royal';
                @endphp

                <div class="card-wrapper">
                    <div class="mini-generated-card {{ $themeClass }}">
                        <span class="badge">{{ $template->category }}</span>
                        <div class="mini-card-header" style="background-image: url('{{ $headerImg }}');">
                            <img class="mini-couple-avatar" src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=300&q=80" alt="Couple">
                        </div>

                        <div class="mini-card-body">
                            <div class="mini-sub-title">Together With Their Families</div>
                            <div class="mini-groom-name">Kasun</div>
                            <span class="mini-ampersand">&</span>
                            <div class="mini-bride-name">Nimali</div>

                            <div class="mini-invitation-text">Invite you to celebrate their wedding</div>
                            <div style="height:1px;" class="mini-divider"></div>

                            <div class="mini-details">
                                <div><strong>DATE:</strong> Oct 26, 2026</div>
                                <div><strong>LOCATION:</strong> Shangri-La Colombo</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-action-bar">
                        <div class="template-title">{{ $template->name }}</div>
                        <a href="{{ route('customize', $template->id) }}" class="btn-use">CUSTOMIZE THIS TEMPLATE</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="explore-more-container">
            <a href="{{ route('templates.index') }}" class="btn-explore-more">
                ✨ EXPLORE MORE DESIGNS &rarr;
            </a>
        </div>
    </div>

    <!-- HIGH-END PROFESSIONAL FOOTER -->
    <footer class="site-footer">
        <div class="footer-container">
            <!-- Col 1: Brand Info -->
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="footer-logo">ROYAL <span>INVITES</span></a>
                <p>Creating timeless, elegant digital wedding invitations with royal gold foil borders, customizable themes, and high-resolution PDF/PNG exports for your most magical day.</p>
                <div class="footer-social">
                    <a href="https://www.linkedin.com/in/charuni-hansika/" target="_blank" class="social-btn" title="LinkedIn Profile">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="mailto:hansikachl721@gmail.com" class="social-btn" title="Send Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="tel:0762753753" class="social-btn" title="Call Us">
                        <i class="fas fa-phone"></i>
                    </a>
                </div>
            </div>

            <!-- Col 2: Navigation -->
            <div class="footer-col">
                <h4>Explore</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Home Page</a></li>
                    <li><a href="{{ route('templates.index') }}">All Templates (27+)</a></li>
                    <li><a href="{{ route('templates.index') }}">Featured Designs</a></li>
                </ul>
            </div>

            <!-- Col 3: Categories -->
            <div class="footer-col">
                <h4>Categories</h4>
                <ul>
                    <li><a href="{{ route('templates.index') }}">Luxury Collection</a></li>
                    <li><a href="{{ route('templates.index') }}">Floral & Botanical</a></li>
                    <li><a href="{{ route('templates.index') }}">Royal Heritage</a></li>
                    <li><a href="{{ route('templates.index') }}">Modern Minimalist</a></li>
                </ul>
            </div>

            <!-- Col 4: Owner & Contact Info -->
            <div class="footer-col">
                <h4>Get in Touch</h4>
                <div class="contact-info-item">
                    <i class="fas fa-user-tie"></i>
                    <span>Owned & Developed by <strong>Charuni Liyanage</strong></span>
                </div>
                <div class="contact-info-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:hansikachl721@gmail.com">hansikachl721@gmail.com</a>
                </div>
                <div class="contact-info-item">
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:0762753753">0762753753</a>
                </div>
                <div class="contact-info-item">
                    <i class="fab fa-linkedin"></i>
                    <a href="https://www.linkedin.com/in/charuni-hansika/" target="_blank">Charuni Hansika</a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} <strong>Charuni Liyanage</strong>. All Rights Reserved. Crafted with Elegance for Royal Invites.</p>
        </div>
    </footer>

</body>
</html>