@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <form action="{{ route('invitations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="template_id" value="{{ $template->id }}">

        <div class="row">
            <!-- Left Panel: Customization Form -->
            <div class="col-md-5">
                <div class="card border-0 shadow-sm rounded-3 p-4">
                    <h5 class="fw-bold mb-3" style="color: #1B2A4A;">CARD SPECIFICATIONS</h5>
                    <hr>
                    
                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Invitation Title</label>
                        <input type="text" name="title" class="form-control" value="Wedding Invitation" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Bride Name</label>
                            <input type="text" id="bride_name" name="bride_name" class="form-control" value="Sophia Anderson" oninput="updatePreview()" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Groom Name</label>
                            <input type="text" id="groom_name" name="groom_name" class="form-control" value="Alexander Wright" oninput="updatePreview()" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Date</label>
                            <input type="date" id="event_date" name="event_date" class="form-control" value="2026-11-20" onchange="updatePreview()" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Time</label>
                            <input type="time" id="event_time" name="event_time" class="form-control" value="17:30" onchange="updatePreview()" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Venue</label>
                        <input type="text" id="venue" name="venue" class="form-control" value="The Grand Ballroom, Shangri-La" oninput="updatePreview()" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Personal Message</label>
                        <textarea id="personal_message" name="personal_message" class="form-control" rows="2" oninput="updatePreview()">Request the pleasure of your company to celebrate our union...</textarea>
                    </div>

                    <h6 class="fw-bold mt-4 mb-2" style="color: #1B2A4A;">TYPOGRAPHY & ACCENTS</h6>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Font Style</label>
                            <select id="font_style" name="font_style" class="form-select" onchange="updatePreview()">
                                <option value="'Cinzel Decorative', serif">Cinzel Decorative</option>
                                <option value="'Playfair Display', serif">Playfair Display</option>
                                <option value="'Poppins', sans-serif">Poppins Minimal</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Primary Color</label>
                            <input type="color" id="primary_color" name="primary_color" class="form-control form-control-color w-100" value="#C5A880" onchange="updatePreview()">
                        </div>
                        <div class="col">
                            <label class="form-label">Background</label>
                            <input type="color" id="background_color" name="background_color" class="form-control form-control-color w-100" value="#FAF9F6" onchange="updatePreview()">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gold w-100 py-2 mt-3">💾 Save Invitation Card</button>
                </div>
            </div>

            <!-- Right Panel: Live SVG/HTML Canvas Preview -->
            <div class="col-md-7">
                <div class="card border-0 shadow-sm rounded-3 p-4 text-center">
                    <span class="text-muted small fw-bold mb-3 d-block" style="letter-spacing: 1px;">LIVE CANVAS PREVIEW</span>
                    
                    <div id="cardCanvas" class="mx-auto p-5 rounded position-relative" style="width: 100%; max-width: 480px; min-height: 520px; background-color: #FAF9F6; border: 2px solid #C5A880; transition: all 0.3s ease;">
                        <div class="border p-4 h-100 d-flex flex-column justify-content-center" id="cardBorder" style="border-color: #C5A880 !important;">
                            <p class="small text-uppercase text-muted tracking-wide mb-2">Together with their families</p>
                            <h2 id="previewCouple" style="font-family: 'Cinzel Decorative', serif; color: #1B2A4A;">Sophia & Alexander</h2>
                            <p class="small text-uppercase my-3" id="previewAccent" style="color: #C5A880; font-weight: 600;">Invite you to celebrate their wedding</p>
                            <hr class="w-50 mx-auto" id="previewHr" style="border-color: #C5A880;">
                            <h5 id="previewDate" class="fw-bold text-dark mt-2">NOVEMBER 20, 2026</h5>
                            <p id="previewTime" class="small text-secondary mb-3">AT 05:30 PM</p>
                            <p id="previewVenue" class="fw-bold small text-dark mb-4">THE GRAND BALLROOM, SHANGRI-LA</p>
                            <p id="previewMessage" class="fst-italic small text-muted">"Request the pleasure of your company to celebrate our union..."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function updatePreview() {
        const bride = document.getElementById('bride_name').value;
        const groom = document.getElementById('groom_name').value;
        const date = document.getElementById('event_date').value;
        const time = document.getElementById('event_time').value;
        const venue = document.getElementById('venue').value;
        const message = document.getElementById('personal_message').value;
        const font = document.getElementById('font_style').value;
        const primaryColor = document.getElementById('primary_color').value;
        const bgColor = document.getElementById('background_color').value;

        document.getElementById('previewCouple').innerText = `${bride} & ${groom}`;
        document.getElementById('previewCouple').style.fontFamily = font;
        document.getElementById('previewDate').innerText = date ? new Date(date).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' }).toUpperCase() : '';
        document.getElementById('previewTime').innerText = `AT ${time}`;
        document.getElementById('previewVenue').innerText = venue.toUpperCase();
        document.getElementById('previewMessage').innerText = `"${message}"`;

        document.getElementById('cardCanvas').style.backgroundColor = bgColor;
        document.getElementById('cardCanvas').style.borderColor = primaryColor;
        document.getElementById('cardBorder').style.borderColor = primaryColor;
        document.getElementById('previewAccent').style.color = primaryColor;
        document.getElementById('previewHr').style.borderColor = primaryColor;
    }
</script>
@endsection