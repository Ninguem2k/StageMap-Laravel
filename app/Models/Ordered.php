<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'deadline',
        'predictions',
        'status',
        'priority',
        'description',
        'user_id',
        'client_id',
    ];

    public function Client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id')->select('id', 'name');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select('id', 'name');
    }
    public function Image()
    {
        return $this->hasMany(Ordered_Image::class, 'id', 'ordered_id');
    }

    public function Stage()
    {
        return $this->hasMany(Stage::class, 'ordered_id', 'id');
    }
}
