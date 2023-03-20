<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

   /**
    * Get all of the comments for the Kategori
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function produk(): HasMany
   {
       return $this->hasMany(Produk::class, 'idkategori', 'id');
   }
}


