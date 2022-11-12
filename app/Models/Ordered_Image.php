<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordered_Image extends Model
{
    protected $table = "ordered_images";

    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'ordered_id'
    ];

    public function ordered()
    {
        return $this->belongsTo(ordered::class);
    }
}
