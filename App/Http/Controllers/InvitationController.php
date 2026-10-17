<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Template;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = auth()->user()->invitations()->with('template')->latest()->get();
        return view('invitations.index', compact('invitations'));
    }

    public function create(Template $template)
    {
        return view('invitations.create', compact('template'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'template_id' => 'required|exists:templates,id',
            'title' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'venue' => 'required|string|max:255',
            'personal_message' => 'nullable|string',
            'font_style' => 'required|string',
            'primary_color' => 'required|string',
            'background_color' => 'required|string',
        ]);

        $invitation = auth()->user()->invitations()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Invitation created successfully!');
    }

    public function show(Invitation $invitation)
    {
        $this->authorizeOwner($invitation);
        return view('invitations.show', compact('invitation'));
    }

    public function edit(Invitation $invitation)
    {
        $this->authorizeOwner($invitation);
        return view('invitations.edit', compact('invitation'));
    }

    public function update(Request $request, Invitation $invitation)
    {
        $this->authorizeOwner($invitation);

        $validated = $request->validate([
            'template_id' => 'required|exists:templates,id',
            'title'       => 'required|string|max:255',
            'groom_name'  => 'required|string|max:255',
            'bride_name'  => 'required|string|max:255',
            'quote'       => 'nullable|string|max:500', // Quote field
            'recipient'   => 'nullable|string|max:100', // Recipient field
            'event_date'  => 'required|date',
            'event_time'  => 'required',
            'venue'       => 'required|string|max:255',
        ]);

        $invitation->update($validated);

        return redirect()->route('dashboard')->with('success', 'Invitation updated successfully!');
    }

    public function destroy(Invitation $invitation)
    {
        $this->authorizeOwner($invitation);
        $invitation->delete();

        return redirect()->route('dashboard')->with('success', 'Invitation deleted successfully!');
    }

    private function authorizeOwner(Invitation $invitation)
    {
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }
    }
}