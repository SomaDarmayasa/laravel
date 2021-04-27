<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['nama','role_id','nickname','gender','telp'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
