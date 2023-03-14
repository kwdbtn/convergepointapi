<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @property int $id
 * @property string $name
 * @property bool $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Customer extends Model {
    protected $table = 'customers';

    protected $casts = [
        'active' => 'bool',
    ];

    protected $fillable = [
        'name',
        'erp_id',
        'active',
    ];

    public function customer_readings() {
        return $this->hasMany(CustomerReading::class);
    }
}
