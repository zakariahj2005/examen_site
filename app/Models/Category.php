<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // dit maakt een relatie met de model product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
