<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turnamen extends Model
{
    protected $table = 'turnamens';
    protected $guarded = [] ;
    protected $fillable = ['namaturnamen','gambar','role','nama','tgl'];
    use HasFactory;
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function coaches()
    {
        return $this->belongsTo(Coach::class);
    }
}
