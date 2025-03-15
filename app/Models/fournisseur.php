<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'raison_social',
        'adresse',
        'tele',
        'email',
        'description',
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
