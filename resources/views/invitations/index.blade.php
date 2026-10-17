@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold" style="color: #1B2A4A;">My Invitations Dashboard</h3>
            <p class="text-muted small mb-0">Manage, edit, and download your customized wedding cards.</p>
        </div>
        <a href="{{ route('templates.index') }}" class="btn btn-gold">+ Create New Card</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse($invitations as $invitation)
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded p-3 text-center me-3" style="background-color: {{ $invitation->background_color }}; border: 1px solid {{ $invitation->primary_color }}; min-width: 70px;">
                                <span class="fw-bold" style="color: {{ $invitation->primary_color }}; font-family: {{ $invitation->font_style }}; font-size: 14px;">
                                    {{ substr($invitation->bride_name, 0, 1) }} & {{ substr($invitation->groom_name, 0, 1) }}
                                </span>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1" style="color: #1B2A4A;">{{ $invitation->title }}</h5>
                                <p class="text-muted small mb-0">Event Date: {{ $invitation->event_date }}</p>
                            </div>
                        </div>
                        
                        <div class="p-3 bg-light rounded mb-3">
                            <p class="small text-secondary mb-1"><strong>Couple:</strong> {{ $invitation->bride_name }} & {{ $invitation->groom_name }}</p>
                            <p class="small text-secondary mb-0"><strong>Venue:</strong> {{ $invitation->venue }}</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('invitations.show', $invitation->id) }}" class="btn btn-sm btn-outline-primary">Preview / Print</a>
                                <a href="{{ route('invitations.edit', $invitation->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </div>
                            <form action="{{ route('invitations.destroy', $invitation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this card?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5 bg-white rounded-3 shadow-sm">
                    <h5 class="text-muted">No invitations created yet.</h5>
                    <p class="text-secondary small">Select a template to start designing your personalized wedding card.</p>
                    <a href="{{ route('templates.index') }}" class="btn btn-gold mt-2">Browse Templates</a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection