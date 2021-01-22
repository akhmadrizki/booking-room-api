<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRoom extends Model
{
    use HasFactory;

    protected $table = 'category_rooms';
    protected $fillable = [
        'category',
    ];

    // Relations
    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
