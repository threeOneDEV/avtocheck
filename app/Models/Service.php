<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public const TYPE_PRIMARY = 'primary';
    public const TYPE_REPEAT  = 'repeat';

    public const TYPES = [
        self::TYPE_PRIMARY => 'Первичный',
        self::TYPE_REPEAT  => 'Повторный',
    ];

    protected $guarded = false;

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function getFormattedPriceAttribute(): string
    {
        return rtrim(rtrim(number_format((float) $this->price, 2, '.', ''), '0'), '.');
    }
}
