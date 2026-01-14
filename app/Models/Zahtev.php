<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zahtev extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv',
        'sadrzaj',
        'status_zahteva',
        'vrsta',
        'prioritet',
        'fajl',
        'datum_kreiranja',
        'klijent_id',
        'product_specialist_id',
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
            'datum_kreiranja' => 'datetime',
            'klijent_id' => 'integer',
            'product_specialist_id' => 'integer',
        ];
    }

    public function klijent(): BelongsTo
    {
        return $this->belongsTo(Klijent::class);
    }

    public function productSpecialist(): BelongsTo
    {
        return $this->belongsTo(ProductSpecialist::class);
    }

    public function obradaZahteva()
    {
        return $this->hasMany(ObradaZahteva::class, 'zahtev_id');
    }


    public function reprodukovanjeZahtevas(): HasMany
    {
        return $this->hasMany(ReprodukovanjeZahteva::class);
    }
}
