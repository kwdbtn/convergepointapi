<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReadingPeriod
 *
 * @property int $id
 * @property string $name
 * @property int $month
 * @property int $year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ReadingPeriod extends Model {
    protected $table = 'reading_periods';

    protected $casts = [
        'month' => 'int',
        'year'  => 'int',
    ];

    protected $fillable = [
        'name',
        'month',
        'year',
    ];

    public function customer_reading() {
        return $this->hasMany(CustomerReading::class);
    }
}
