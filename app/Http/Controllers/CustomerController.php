<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerPostRequest;
use App\Models\Customer;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //

    public function add(CustomerPostRequest $request){
        
        Customer::create($request->validated());

        return to_route('/');
    }

    public function customers(){
        return Inertia::render('Customers', ['customers' => fn () => Customer::get()]);
    }

    public function updateCustomer(CustomerPostRequest $request){

        Customer::where('id', $request->id)
            ->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
            ]);


    }

    public function deleteCustomer($id){
        Customer::where('id',$id)->delete();
    }
 
}
