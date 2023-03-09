<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GambarToko extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    

    /**
     * Get the user that owns the GambarToko
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjual(): BelongsTo
    {
        return $this->belongsTo(Penjual::class, 'id_toko', 'id');
    }
}
