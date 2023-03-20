<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    protected $guarded=[];
    protected $id=['kdproduk'];
    protected $keyType = 'string';
    protected $primaryKey = 'kdproduk';
    use HasFactory;


    /**
     * Get all of the comments for the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gambar(): HasMany
    {
        return $this->hasMany(Gambar::class, 'kdproduk', 'id');
    }
    public function kategori(){
        return $this->belongsTo(kategori::class, 'idkategori', 'id');
    }
    /**
     * Get the user that owns the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Penjual::class, 'idpenjual', 'id');
    }
    /**
     * Get all of the comments for the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'kdproduk', 'id');
    }
    /**
     * Get all of the comments for the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function like(): HasMany
    {
        return $this->hasMany(Like::class, 'kdproduk', 'id');
    }
}
