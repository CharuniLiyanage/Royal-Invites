<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Invitation - AuraInvites</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root { --burgundy: #4a121a; --gold: #c5a059; --cream-bg: #faf7f2; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--cream-bg); margin: 0; padding: 50px 20px; display: flex; justify-content: center; align-items: center; min-height: 90vh; }
        .form-box { width: 100%; max-width: 600px; background: white; padding: 45px; border-radius: 16px; box-shadow: 0 15px 35px rgba(74, 18, 26, 0.08); border-top: 6px solid var(--burgundy); }
        .form-header { text-align: center; margin-bottom: 35px; }
        .form-header h2 { font-family: 'Cinzel', serif; color: var(--burgundy); font-size: 28px; margin-bottom: 5px; }
        .form-group { margin-bottom: 22px; }
        label { display: block; font-size: 12px; font-weight: 700; color: #374151; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        input { width: 100%; padding: 14px 16px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 15px; box-sizing: border-box; transition: all 0.3s; }
        input:focus { outline: none; border-color: var(--burgundy); box-shadow: 0 0 0 3px rgba(74, 18, 26, 0.1); }
        .form-row { display: flex; gap: 20px; }
        .form-row .form-group { flex: 1; }
        .btn-submit { width: 100%; padding: 16px; background: var(--burgundy); color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; cursor: pointer; transition: background 0.3s; margin-top: 10px; }
        .btn-submit:hover { background: var(--gold); }
    </style>
</head>
<body>
    <div class="form-box">
        <div class="form-header">
            <h2>Invitation Details</h2>
            <p style="color: #6b7280; font-size: 14px;">Selected Template: <strong>{{ $template->name }}</strong></p>
        </div>

        <form action="{{ route('generate.invitation') }}" method="POST">
            @csrf
            <input type="hidden" name="template_id" value="{{ $template->id }}">

            <div class="form-row">
                <div class="form-group">
                    <label>Groom's Name</label>
                    <input type="text" name="groom_name" required placeholder="e.g. Kasun Perera">
                </div>
                <div class="form-group">
                    <label>Bride's Name</label>
                    <input type="text" name="bride_name" required placeholder="e.g. Nimali Silva">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required>
                </div>
                <div class="form-group">
                    <label>Event Time</label>
                    <input type="time" name="event_time" required>
                </div>
            </div>

            <div class="form-group">
                <label>Venue / Location</label>
                <input type="text" name="venue" required placeholder="e.g. Grand Ballroom, Shangri-La Colombo">
            </div>

            <!-- Custom Romantic Sentence / Quote -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="font-weight: 600; font-size: 13px; color: #4a121a; display: block; margin-bottom: 6px;">
                    Special Love Quote / Sentence (Optional):
                </label>
                <input type="text" name="quote" class="form-control" 
                    placeholder="e.g. 'Two hearts, one beautiful journey together.'" 
                    style="width: 100%; padding: 10px 14px; border: 1px solid #c5a059; border-radius: 6px; font-size: 14px;">
            </div>

            <!-- Recipient Selection -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="font-weight: 600; font-size: 13px; color: #4a121a; display: block; margin-bottom: 6px;">
                    Who are you inviting?
                </label>
                <select name="recipient" class="form-control" style="width: 100%; padding: 10px 14px; border: 1px solid #c5a059; border-radius: 6px; font-size: 14px;">
                    <option value="You">You</option>
                    <option value="Both of You">Both of You</option>
                    <option value="You & Your Family">You & Your Family</option>
                    <option value="All of You">All of You</option>
                </select>
            </div>

            <div class="form-group">
                <label>RSVP Contact Info (Optional)</label>
                <input type="text" name="rsvp_contact" placeholder="e.g. 077 123 4567">
            </div>

            <button type="submit" class="btn-submit">GENERATE DIGITAL INVITATION</button>
        </form>
    </div>
</body>
</html>