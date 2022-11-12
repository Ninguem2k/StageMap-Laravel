<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'fone',
        'email'
    ];

    public function Ordered()
    {
        return $this->hasMany(Ordered::class, 'Client_id', 'id');
    }
}
