<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // dit maakt een relatie met de model category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
