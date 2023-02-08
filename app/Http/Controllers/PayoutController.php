<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use App\Enums\PayoutStatus;
use Inertia\Inertia;
use App\Models\Payout;

class PayoutController extends Controller
{
    public function index()
    {
        $payouts = Payout::all();
        return Inertia::render('Payouts', [
            'payouts' => $payouts
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'details' => 'required',
            'amount' => 'required',
            'currency' => 'required',
        ]);
        $payout = Payout::create($data);
        return $payout;
    }
}
