<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bilings = Billing::all();
        return view('billing', ['billings'=>$bilings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $billings = Billing::create([
            'number_Card'=> $request->number_Card,
            'card_Holder'=> $request->card_Holder,
            'expires'=> $request->expires,
        ]);

        $billings = Billing::all();
        return view('billing', ['billings'=>$billings]);
    }

    /**
     * Display the specified resource.
     */
    public function show(billing $vc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(billing $vc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $billing = Billing::find($id);

        if ($billing) {
            $billing->number_Card = $request->number_Card;

            // Проверка на пустое значение card_Holder
            if (!empty($request->card_Holder)) {
                $billing->card_Holder = $request->card_Holder;
            }

            $billing->expires = $request->expires;

            $billing->save(); // Сохраняем изменения в базе данных
        }

        $billings = Billing::all();
        return view('billing', ['billings' => $billings]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $billing = Billing::find($id);
        if ($billing){
            $billing->delete();
        }

        $billings = Billing::all();
        return view('billing', ['billings'=>$billings]);
    }
}
