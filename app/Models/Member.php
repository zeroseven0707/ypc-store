<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    // public function member(){
    //     return $this->belongsTo(Member::class,'iduser','id');
    // }
    /**
     * Get the user that owns the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'iduser', 'id');
    }
    public function penjual(): BelongsTo
    {
        return $this->belongsTo(Penjual::class, 'id', 'idmember');
    }
    /**
     * Get all of the comments for the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class, 'idmember', 'id');
    }
}
?>