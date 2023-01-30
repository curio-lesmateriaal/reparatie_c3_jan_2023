<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
    protected $fillable = [
        'name',
        'creator_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
