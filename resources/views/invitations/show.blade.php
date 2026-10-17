@extends('layouts.app')

@section('content')
<div class="container py-4 text-center">
    <div class="mb-4 no-print">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm me-2">← Back to Dashboard</a>
        <button onclick="window.print()" class="btn btn-gold btn-sm">🖨️ Print / Save as PDF</button>
    </div>

    <!-- Printable Canvas View -->
    <div class="card border-0 shadow-lg mx-auto p-5 rounded" style="max-width: 500px; min-height: 550px; background-color: {{ $invitation->background_color }}; border: 3px solid {{ $invitation->primary_color }} !important;">
        <div class="border p-4 h-100 d-flex flex-column justify-content-center" style="border-color: {{ $invitation->primary_color }} !important;">
            <p class="small text-uppercase text-muted tracking-wide mb-2">Together with their families</p>
            <h2 style="font-family: {{ $invitation->font_style }}; color: #1B2A4A;">
                {{ $invitation->bride_name }} & {{ $invitation->groom_name }}
            </h2>
            <p class="small text-uppercase my-3" style="color: {{ $invitation->primary_color }}; font-weight: 600;">
                Invite you to celebrate their wedding
            </p>
            <hr class="w-50 mx-auto" style="border-color: {{ $invitation->primary_color }};">
            <h5 class="fw-bold text-dark mt-2">{{ strtoupper(\Carbon\Carbon::parse($invitation->event_date)->format('F d, Y')) }}</h5>
            <p class="small text-secondary mb-3">AT {{ \Carbon\Carbon::parse($invitation->event_time)->format('h:i A') }}</p>
            <p class="fw-bold small text-dark mb-4">{{ strtoupper($invitation->venue) }}</p>
            @if($invitation->personal_message)
                <p class="fst-italic small text-muted">"{{ $invitation->personal_message }}"</p>
            @endif
        </div>
    </div>
</div>

<style>
    @media print {
        .no-print, nav, footer { display: none !important; }
        body { background: #fff !important; }
        .card { box-shadow: none !important; }
    }
</style>
@endsection