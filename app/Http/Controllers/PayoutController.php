<?php

namespace App\Http\Controllers;

use App\Enums\PayoutStatus;
use App\Models\Payout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Inertia\Inertia;

class PayoutController extends Controller
{
    public function index()
    {
        $payouts = Payout::all();

        return Inertia::render('Payouts', [
            'payouts' => $payouts,
        ]);
    }

    public function store(Request $request)
    {
        // test
        $data = $request->validate([
            'username' => 'required',
            'details' => 'required',
            'amount' => 'required',
            'currency' => 'required',
        ]);
        $payout = Payout::create($data);

        return $payout;
    }

    public function changeStatus($id, Request $request)
    {
        $data = $request->validate([
            'status' => ['required', new Enum(PayoutStatus::class)],
        ]);
        $payout = Payout::find($id);
        $payout->status = $data['status'];
        $payout->save();

        return response('Success', 201);
    }
}
