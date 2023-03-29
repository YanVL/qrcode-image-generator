<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias', 'user_id', 'linkedin_url', 'github_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
