<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penjual extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    /**
     * Get all of the comments for the Penjual
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gambartoko(): HasMany
    {
        return $this->hasMany(GambarToko::class, 'id_toko', 'id');
    }
    /**
     * Get all of the comments for the Penjual
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produk(): HasMany
    {
        return $this->hasMany(Produk::class, 'idpenjual', 'id');
    }

    /**
     * Get the user that owns the Penjual
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'idmember', 'id');
    }
}
