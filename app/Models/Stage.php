<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "status",
        "ordered_id",
        "user_id"
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select('id', 'name');
    }

    public function Ordered()
    {
        return $this->belongsTo(Ordered::class, 'ordered_id', 'id');
    }

    // public function Stage()
    // {
    //     return $this->hasMany(Stage::class, 'section_id', 'id');
    // }
}
