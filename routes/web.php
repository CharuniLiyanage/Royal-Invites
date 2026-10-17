<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Invitation;
use App\Models\User;

// 1. Homepage Route - පළමු Templates 6 පෙන්වීම
Route::get('/', function () {
    $templates = Template::all()->take(6);
    return view('welcome', compact('templates'));
});

// 2. All Templates Route - Templates 20+ සියල්ල පෙන්වීම
Route::get('/templates', function () {
    $templates = Template::all();
    return view('templates.index', compact('templates'));
})->name('templates.index');

// 3. Customize Form Route
Route::get('/customize/{id}', function ($id) {
    $template = Template::findOrFail($id);
    return view('customize', compact('template'));
})->name('customize');

// 4. Generate Invitation Route
Route::post('/generate-invitation', function (Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'template_id'  => 'required|exists:templates,id',
        'groom_name'   => 'required|string|max:255',
        'bride_name'   => 'required|string|max:255',
        'quote'        => 'nullable|string|max:500',
        'recipient'    => 'nullable|string|max:100',
        'event_date'   => 'required|date',
        'event_time'   => 'required',
        'venue'        => 'required|string|max:255',
        'rsvp_contact' => 'nullable|string|max:255',
    ]);

    $user = App\Models\User::first() ?? App\Models\User::create([
        'name'     => 'Guest User',
        'email'    => 'guest@example.com',
        'password' => bcrypt('password123'),
    ]);

    $invitation = App\Models\Invitation::create([
        'user_id'      => $user->id,
        'template_id'  => $validated['template_id'],
        'title'        => $validated['groom_name'] . ' & ' . $validated['bride_name'] . "'s Wedding",
        'groom_name'   => $validated['groom_name'],
        'bride_name'   => $validated['bride_name'],
        'quote'        => $request->input('quote'),         // Form එකෙන් එන Value එක
        'recipient'    => $request->input('recipient', 'You'), // Default 'You'
        'event_date'   => $validated['event_date'],
        'event_time'   => $validated['event_time'],
        'venue'        => $validated['venue'],
        'rsvp_contact' => $validated['rsvp_contact'] ?? null,
    ]);

    return redirect()->route('preview', ['id' => $invitation->id]);
})->name('generate.invitation');

// 5. Preview Route
Route::get('/invitation/{id}', function ($id) {
    $invitation = Invitation::findOrFail($id);
    return view('preview', compact('invitation'));
})->name('preview');