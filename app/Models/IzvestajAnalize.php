<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IzvestajAnalize extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'izvestaj_analize',
        'zakljucivanje_analize_id',
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
            'zakljucivanje_analize_id' => 'integer',
        ];
    }

    public function zakljucivanjeAnalize(): BelongsTo
    {
        return $this->belongsTo(ZakljucivanjeAnalize::class);
    }
}
