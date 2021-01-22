<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'image_ruangan',
        'nama_ruangan',
        'kapasitas_ruangan',
        'proyektor',
        'panggung',
        'status_ruangan',
        'category_id',
    ];

    // Relations
    public function categoryroom()
    {
        return $this->belongsTo(CategoryRoom::class, 'category_id');
    }

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class);
    }
}
