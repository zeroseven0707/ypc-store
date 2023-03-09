<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gambar extends Model
{
    use HasFactory;
    protected $guarded=['id'];

   /**
    * Get the user that owns the Gambar
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function produk(): BelongsTo
   {
       return $this->belongsTo(Produk::class, 'kdproduk', 'id');
   }
}
