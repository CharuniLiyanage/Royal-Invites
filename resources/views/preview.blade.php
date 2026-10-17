<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $invitation->title }}</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cinzel:wght@500;700;800&family=Great+Vibes&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- html2canvas Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    @php
        $category = strtolower($invitation->template->category ?? 'luxury');
        $schema = json_decode($invitation->template->design_schema ?? '{}', true);
        $headerImg = $schema['header_img'] ?? 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?auto=format&fit=crop&w=1000&q=80';
        $recipientText = !empty($invitation->recipient) ? $invitation->recipient : 'You';
    @endphp

    <style>
        :root {
            --burgundy: #4a121a;
            --gold: #c5a059;
            --gold-light: #f7e7ce;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px 15px;
        }

        .card-outer {
            width: 100%;
            max-width: 550px;
            border-radius: 16px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.18);
            overflow: hidden;
            position: relative;
            background-color: #ffffff;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .card-art-header {
            height: 240px;
            background-size: cover !important;
            background-position: center !important;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .couple-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
            object-fit: cover;
            margin-bottom: -50px;
            position: relative;
            z-index: 10;
        }

        .card-body {
            padding: 70px 35px 45px;
            text-align: center;
        }

        .sub-title { font-family: 'Cinzel', serif; font-size: 11px; letter-spacing: 3px; text-transform: uppercase; margin-bottom: 12px; font-weight: 700; }
        
        /* Custom Quote Styling */
        .love-quote {
            font-style: italic;
            font-size: 13px;
            color: #555555;
            margin: 8px auto 18px;
            max-width: 88%;
            line-height: 1.5;
            font-weight: 500;
        }

        .groom-name, .bride-name { font-size: 58px; line-height: 1; margin: 0; }
        .ampersand { font-family: 'Cinzel', serif; font-size: 20px; display: block; margin: 6px 0; }
        
        .invitation-text {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0.85;
            margin: 20px 0 22px;
            font-weight: 600;
        }

        .recipient-highlight {
            color: var(--burgundy);
            font-weight: 700;
            text-decoration: underline;
            text-decoration-color: var(--gold);
        }

        .gold-divider { width: 80px; height: 2px; margin: 0 auto 25px; }

        .details-grid {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
            border-top: 1px solid rgba(0,0,0,0.08);
            border-bottom: 1px solid rgba(0,0,0,0.08);
            margin-bottom: 24px;
        }

        .detail-item h4, .venue-box h4 { font-family: 'Cinzel', serif; font-size: 11px; margin-bottom: 5px; letter-spacing: 1px; }
        .detail-item p, .venue-box p { font-size: 15px; font-weight: 600; }

        /* Themes */
        .theme-luxury { background-color: #ffffff !important; color: #222222 !important; }
        .theme-luxury .sub-title, .theme-luxury .ampersand, .theme-luxury .gold-divider { color: var(--gold) !important; background-color: var(--gold); }
        .theme-luxury .groom-name, .theme-luxury .bride-name { font-family: 'Alex Brush', cursive; color: var(--burgundy) !important; }

        .theme-floral { background-color: #f4f9f4 !important; color: #1b4332 !important; }
        .theme-floral .sub-title, .theme-floral .ampersand, .theme-floral .gold-divider { color: #2d6a4f !important; background-color: #2d6a4f; }
        .theme-floral .groom-name, .theme-floral .bride-name { font-family: 'Great Vibes', cursive; color: #1b4332 !important; }

        .theme-modern { background-color: #0f172a !important; color: #ffffff !important; }
        .theme-modern .sub-title, .theme-modern .ampersand, .theme-modern .gold-divider { color: #38bdf8 !important; background-color: #38bdf8; }
        .theme-modern .groom-name, .theme-modern .bride-name { font-family: 'Cinzel', serif; font-size: 36px; color: #38bdf8 !important; font-weight: 700; }
        .theme-modern .details-grid { border-color: #334155 !important; }
        .theme-modern .love-quote { color: #cbd5e1 !important; }

        .theme-royal { background-color: #fff0f3 !important; color: #590d22 !important; }
        .theme-royal .sub-title, .theme-royal .ampersand, .theme-royal .gold-divider { color: #c9184a !important; background-color: #800f2f; }
        .theme-royal .groom-name, .theme-royal .bride-name { font-family: 'Alex Brush', cursive; color: #590d22 !important; }

        .actions { margin-top: 25px; display: flex; gap: 12px; }
        .btn-action {
            padding: 12px 22px;
            background: var(--burgundy);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-action:hover { background: var(--gold); }
        .btn-png { background: #15803d; }
        .btn-png:hover { background: #166534; }

        @media print {
            @page { size: portrait; margin: 0mm !important; }
            html, body { background: white !important; padding: 0 !important; margin: 0 !important; width: 100% !important; height: 100% !important; display: flex !important; justify-content: center !important; align-items: center !important; }
            .actions { display: none !important; }
            .card-outer { box-shadow: none !important; border: none !important; width: 100% !important; height: 100vh !important; border-radius: 0px !important; display: flex !important; flex-direction: column !important; justify-content: center !important; }
            .card-art-header { height: 35vh !important; }
            .couple-avatar { width: 160px !important; height: 160px !important; margin-bottom: -60px !important; }
            .card-body { padding: 90px 50px 60px !important; }
            .groom-name, .bride-name { font-size: 80px !important; }
            .detail-item p, .venue-box p { font-size: 20px !important; }
        }
    </style>
</head>
<body>

    <div id="weddingCard" class="card-outer theme-{{ $category }}">
        <div class="card-art-header" style="background-image: url('{{ $headerImg }}');">
            <img class="couple-avatar" src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80" alt="Couple" crossorigin="anonymous">
        </div>

        <div class="card-body">
            <div class="sub-title">Together With Their Families</div>

            <!-- Custom Love Quote Display -->
            @if(!empty($invitation->quote))
                <div class="love-quote">“{{ $invitation->quote }}”</div>
            @endif

            <div class="groom-name">{{ $invitation->groom_name }}</div>
            <span class="ampersand">&</span>
            <div class="bride-name">{{ $invitation->bride_name }}</div>

            <!-- Recipient Display -->
            <div class="invitation-text">
                Cordially invite <span class="recipient-highlight">{{ $recipientText }}</span> to celebrate their wedding day
            </div>

            <div style="height:2px;" class="gold-divider"></div>

            <div class="details-grid">
                <div class="detail-item">
                    <h4>DATE</h4>
                    <p>{{ \Carbon\Carbon::parse($invitation->event_date)->format('M d, Y') }}</p>
                </div>
                <div class="detail-item">
                    <h4>TIME</h4>
                    <p>{{ \Carbon\Carbon::parse($invitation->event_time)->format('g:i A') }}</p>
                </div>
            </div>

            <div class="venue-box">
                <h4>LOCATION</h4>
                <p>{{ $invitation->venue }}</p>
            </div>
        </div>
    </div>

    <div class="actions">
        <button onclick="downloadPNG()" class="btn-action btn-png">🖼️ Download PNG Image</button>
        <button onclick="window.print()" class="btn-action">📄 Save as PDF / Print</button>
        <a href="{{ url('/') }}" class="btn-action" style="background: #6c757d;">🏠 Back to Home</a>
    </div>

    <script>
        function downloadPNG() {
            const cardElement = document.getElementById('weddingCard');
            const themeBg = window.getComputedStyle(cardElement).backgroundColor || '#ffffff';

            html2canvas(cardElement, {
                scale: 3,
                useCORS: true,
                allowTaint: true,
                backgroundColor: themeBg,
                logging: false
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = '{{ Str::slug($invitation->groom_name . "-" . $invitation->bride_name . "-wedding-invitation") }}.png';
                link.href = canvas.toDataURL('image/png', 1.0);
                link.click();
            });
        }
    </script>

</body>
</html>