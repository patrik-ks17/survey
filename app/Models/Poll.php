<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function responses() {
        return $this->hasMany(PollResponses::class);
    }
}
