<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransectionRequest;
use App\Http\Requests\UpdateTransectionRequest;
use App\Models\Customer;
use App\Models\Transection;
use Illuminate\Http\Request;

class TransectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pay(Request $request,Customer $customer)

    {
//        dd($request->all());
        $transection = new Transection();
        $transection->user_id = 1;
        $transection->customer_id = $customer->id;
        $transection->amount = $request->amount;
        $transection->type = $request->transection;
        $transection->save();
//        Transection::create([
//            'user_id' => 1,
//            'customer_id' => $customer->id,
//            'amount' => $request->amount,
//            'type'=> $request->transection,
//        ]);
        $account = $customer->account ;
        if($request->transection == 'income'){
            $account->update([
                'amount'   => $account->amount - $request->amount,
            ]);
            Alert("success", "$request->amount has been paid in $customer->full_name account");

        }else if($request->transection === 'expense'){
            $account->update([
                'amount' => $account->amount + $request->amount,
            ]);
            Alert("success", "$request->amount has been paid in $customer->full_name account");

        }
        Alert("success", "$request->amount has been paid in $customer->full_name account");
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $data['transections'] = Transection::latest()->get();
        return view("pages.Customers.transections")->with($data);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transection $transection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transection $transection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransectionRequest $request, Transection $transection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transection $transection)
    {
        //
    }
}
