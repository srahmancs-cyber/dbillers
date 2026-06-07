<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadReply extends Model
{
    protected $fillable = ['contact_lead_id', 'user_id', 'type', 'body'];

    public function lead()
    {
        return $this->belongsTo(ContactLead::class, 'contact_lead_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
