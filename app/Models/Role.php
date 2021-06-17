<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "role";
    protected $primarykey = "id";
    protected $fillable = ['id','role'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }

    public function turnamen()
    {
        return $this->hasMany(Turnamen::class);
    }
}
