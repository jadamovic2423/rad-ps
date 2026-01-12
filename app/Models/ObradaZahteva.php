<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ObradaZahteva extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'komentar_product_sp',
        'komentar_klijenta',
        'dodatni_fajl',
        'zahtev_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'zahtev_id' => 'integer',
        ];
    }

    public function zahtev(): BelongsTo
    {
        return $this->belongsTo(Zahtev::class);
    }
}
