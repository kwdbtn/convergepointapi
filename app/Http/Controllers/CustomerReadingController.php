<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerReading as CustomerReadingResource;
use App\Models\Customer;
use App\Models\CustomerReading;
use App\Models\ReadingPeriod;

class CustomerReadingController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $readings = CustomerReading::all();
        return CustomerReadingResource::collection($readings);
    }

    public function getCustomerReadings(Customer $customer) {
        $readings = CustomerReading::where('customer_id', $customer->id)->get();
        return CustomerReadingResource::collection($readings);
    }

    public function status(Customer $customer, ReadingPeriod $period) {
        $reading = CustomerReading::where('customer_id', $customer->id)
            ->where('reading_period_id', $period->id)
            ->first();
        return new CustomerReadingResource($reading);
    }
}
