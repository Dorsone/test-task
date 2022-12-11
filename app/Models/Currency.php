<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Currency's Model Class
 *
 * @property string $valueID
 * @property int $numCode
 * @property string $charCode
 * @property string $name
 * @method static Builder|Currency query()
 */
class Currency extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'valuteID',
        'numCode',
        'charCode',
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relation with CurrencyValue model
     *
     * @return HasMany
     */
    public function currencyValues(): HasMany
    {
        return $this->hasMany(CurrencyValue::class, 'currency_id', 'id');
    }
}
