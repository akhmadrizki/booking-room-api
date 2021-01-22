<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjams';
    protected $fillable = [
        'room_id',
        'user_id',
        'tujuan',
        'tgl_pinjam',
        'tambahan',
        'jam_pinjam',
        'status',
    ];

    // Relations
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
