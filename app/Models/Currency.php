<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Currency's Model Class
 *
 * @property string $valueID
 * @property int $numCode
 * @property string $charCode
 * @property string $name
 * @property float $value
 * @property string $date
 * @method static Builder|Currency query()
 */
class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'valueID',
        'numCode',
        'charCode',
        'name',
        'value',
        'date',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
        'value' => 'float',
    ];
}
