<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public function leads(){
        return $this->belongsToMany(Lead::class, 'lead_note', 'note_id', 'lead_id');
    }
}
