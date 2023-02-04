<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerReading
 *
 * @property int $id
 * @property int $customer_id
 * @property int $reading_period_id
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class CustomerReading extends Model {
    protected $table = 'customer_readings';

    protected $casts = [
        'customer_id'       => 'int',
        'reading_period_id' => 'int',
    ];

    protected $fillable = [
        'customer_id',
        'reading_period_id',
        'status',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

	public function reading_period() {
		return $this->belongsTo(ReadingPeriod::class);
	}
}
