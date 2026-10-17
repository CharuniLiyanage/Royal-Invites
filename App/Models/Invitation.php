<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'template_id',
        'title',
        'groom_name',
        'bride_name',
        'quote',         // මෙය ඇතුළත් විය යුතුය
        'recipient',     // මෙය ඇතුළත් විය යුතුය
        'event_date',
        'event_time',
        'venue',
        'rsvp_contact',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}