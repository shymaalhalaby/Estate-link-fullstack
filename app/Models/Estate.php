<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estate extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'address',
        'type',
        'price',
        'description',
        'image',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
