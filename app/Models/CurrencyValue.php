<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Currency's Values Model Class
 *
 * @property int $currency_id
 * @property float $value
 * @property string $date
 * @method Builder|Currency getByDate()
 * @method static Builder|CurrencyValue query()
 */
class CurrencyValue extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'currency_id',
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

    /**
     * Relation with Currency model
     *
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }


    public function scopeGetByDate(Builder $query)
    {
        $from = request('from');
        $to = request('to');

        $query->when($from && $to, function (Builder $query) use ($from, $to) {
            $query->where([
                ['date', '>=', $from],
                ['date', '<=', $to],
            ]);
        });
    }
}
