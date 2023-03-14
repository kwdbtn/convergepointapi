<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerReading as CustomerReadingResource;
use App\Models\Customer;
use App\Models\CustomerReading;
use App\Models\ReadingPeriod;
use Illuminate\Http\Request;

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

    public function getERPCustomerReadings($customer) {
        $customerResult = Customer::where('erp_id', $customer)->first();
        $readings = CustomerReading::where('customer_id', $customerResult->id)->get();
        return CustomerReadingResource::collection($readings);
    }

    public function status(Customer $customer, ReadingPeriod $period) {
        $reading = CustomerReading::where('customer_id', $customer->id)
            ->where('reading_period_id', $period->id)
            ->first();
        return new CustomerReadingResource($reading);
    }

    public function periodStatus($customer, $period) {
        $customerResult = Customer::where('erp_id', $customer)->first();
        $periodResult = ReadingPeriod::where('name', $period)->first();
        $reading = CustomerReading::where('customer_id', $customerResult->id)
            ->where('reading_period_id', $periodResult->id)
            ->first();
        return new CustomerReadingResource($reading);
    }

    public function monthYearStatus($customer, $month, $year) {
        $customerResult = Customer::where('erp_id', $customer)->first();
        $mnth = 1;
        $month = strtolower($month);

        if ($month == 'jan' || $month == 'january') {
            $mnth = 1;
        } else if ($month == 'feb' || $month == 'february') {
            $mnth = 2;
        } else if ($month == 'mar' || $month == 'march') {
            $mnth = 3;
        } else if ($month == 'apr' || $month == 'april') {
            $mnth = 4;
        } else if ($month == 'may') {
            $mnth = 5;
        } else if ($month == 'jun' || $month == 'june') {
            $mnth = 6;
        } else if ($month == 'jul' || $month == 'july') {
            $mnth = 7;
        } else if ($month == 'aug' || $month == 'august') {
            $mnth = 8;
        } else if ($month == 'sep' || $month == 'september') {
            $mnth = 9;
        } else if ($month == 'oct' || $month == 'october') {
            $mnth = 10;
        } else if ($month == 'nov' || $month == 'november') {
            $mnth = 11;
        } else if ($month == 'dec' || $month == 'december') {
            $mnth = 12;
        }

        $periodResult = ReadingPeriod::where('month', '=', $mnth)
            ->where('year', '=', $year)
            ->first();
        $reading = CustomerReading::where('customer_id', $customerResult->id)
            ->where('reading_period_id', $periodResult->id)
            ->first();
        return new CustomerReadingResource($reading);
    }
}
