<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Templates - Royal Invites</title>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cinzel:wght@500;700;800&family=Great+Vibes&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --burgundy: #4a121a;
            --gold: #c5a059;
            --gold-light: #f7e7ce;
            --cream-bg: #faf7f2;
            --white: #ffffff;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', sans-serif; background-color: var(--cream-bg); color: #222; }

        .navbar { background: var(--white); padding: 18px 60px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--gold-light); position: sticky; top: 0; z-index: 100; }
        .brand { font-family: 'Cinzel', serif; font-size: 22px; font-weight: 700; color: var(--burgundy); text-decoration: none; }
        .brand span { color: var(--gold); }
        .back-link { color: var(--burgundy); text-decoration: none; font-weight: 600; font-size: 14px; }

        .banner { background: var(--burgundy); color: white; padding: 45px 20px; text-align: center; }
        .banner h1 { font-family: 'Cinzel', serif; font-size: 32px; color: var(--gold-light); }

        .container { max-width: 1240px; margin: 40px auto 80px; padding: 0 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; }

        .card-wrapper {
            background: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
            border: 1px solid var(--gold-light);
            transition: all 0.35s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-wrapper:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(74, 18, 26, 0.15);
            border-color: var(--gold);
        }

        .mini-generated-card { position: relative; border-bottom: 1px solid var(--gold-light); }

        .mini-card-header {
            height: 130px;
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .mini-couple-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 3px solid #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            object-fit: cover;
            margin-bottom: -25px;
            position: relative;
            z-index: 10;
        }

        .badge {
            position: absolute; top: 10px; right: 10px; z-index: 12;
            background: rgba(255, 255, 255, 0.92); color: var(--burgundy);
            font-size: 9px; font-weight: 700; padding: 3px 10px; border-radius: 12px; text-transform: uppercase;
        }

        .mini-card-body { padding: 35px 18px 20px; text-align: center; }
        .mini-sub-title { font-family: 'Cinzel', serif; font-size: 9px; letter-spacing: 2px; text-transform: uppercase; font-weight: 700; margin-bottom: 4px; }
        .mini-groom-name, .mini-bride-name { font-size: 34px; line-height: 1; margin: 0; }
        .mini-ampersand { font-family: 'Cinzel', serif; font-size: 13px; display: block; margin: 3px 0; }
        .mini-invitation-text { font-size: 9px; letter-spacing: 1px; text-transform: uppercase; opacity: 0.8; margin: 6px 0 10px; }
        .mini-divider { width: 45px; height: 1px; margin: 0 auto 10px; }
        .mini-details { display: flex; justify-content: space-around; font-size: 10px; font-weight: 600; padding-top: 8px; border-top: 1px solid rgba(0,0,0,0.08); }

        /* Category Styles */
        .theme-luxury { background: #ffffff; }
        .theme-luxury .mini-sub-title, .theme-luxury .mini-ampersand, .theme-luxury .mini-divider { color: var(--gold); background-color: var(--gold); }
        .theme-luxury .mini-groom-name, .theme-luxury .mini-bride-name { font-family: 'Alex Brush', cursive; color: var(--burgundy); }

        .theme-floral { background: #f4f9f4; }
        .theme-floral .mini-sub-title, .theme-floral .mini-ampersand, .theme-floral .mini-divider { color: #2d6a4f; background-color: #2d6a4f; }
        .theme-floral .mini-groom-name, .theme-floral .mini-bride-name { font-family: 'Great Vibes', cursive; color: #1b4332; }

        .theme-modern { background: #0f172a; color: white; }
        .theme-modern .mini-sub-title, .theme-modern .mini-ampersand, .theme-modern .mini-divider { color: #38bdf8; background-color: #38bdf8; }
        .theme-modern .mini-groom-name, .theme-modern .mini-bride-name { font-family: 'Cinzel', serif; font-size: 20px; color: #38bdf8; font-weight: 700; }
        .theme-modern .mini-details { border-color: #334155; color: #f8fafc; }

        .theme-royal { background: #fff0f3; }
        .theme-royal .mini-sub-title, .theme-royal .mini-ampersand, .theme-royal .mini-divider { color: #c9184a; background-color: #800f2f; }
        .theme-royal .mini-groom-name, .theme-royal .mini-bride-name { font-family: 'Alex Brush', cursive; color: #590d22; }

        .card-action-bar { padding: 18px 20px; text-align: center; background: #fff; }
        .template-title { font-family: 'Cinzel', serif; font-size: 15px; color: var(--burgundy); font-weight: 700; margin-bottom: 10px; }

        .btn-use { display: block; width: 100%; padding: 11px; background: var(--burgundy); color: white; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 12px; text-align: center; text-transform: uppercase; letter-spacing: 1px; transition: background 0.3s; }
        .btn-use:hover { background: var(--gold); }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ url('/') }}" class="brand">ROYAL <span>INVITES</span></a>
        <a href="{{ url('/') }}" class="back-link">← Back to Home</a>
    </nav>

    <div class="banner">
        <h1>All Invitation Designs </h1>
        <p>Explore luxury customizable wedding invitation cards</p>
    </div>

    <div class="container">
        <div class="grid">
            @foreach($templates as $template)
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
    </div>

</body>
</html>