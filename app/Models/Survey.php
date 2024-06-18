<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return url('/survey/' . $this->id);
    }

    public function publicPath() {
        return url('/surveys/' . $this->id . '-' . Str::slug($this->title) );
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function polls() {
        return $this->hasMany(Poll::class);
    }
}
