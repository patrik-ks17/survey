<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollResponses extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function poll() {
        return $this->belongsTo(Poll::class);
    }
}
