<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $standard_package = Package::where('name', 'standard')->first();
        $gold_package = Package::where('name', 'gold')->first();

        return view('member.pricing', [
            'standard_package' => $standard_package,
            'gold_package' => $gold_package
        ]);
    }
}
