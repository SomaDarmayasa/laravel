<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = ['nama','gender','telp','role'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function turnamen()
    {
        return $this->hasMany(Turnamen::class);
    }
}
