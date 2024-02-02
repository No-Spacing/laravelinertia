<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //

    public function add(Request $request){
        
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers'
        ]);

        Customer::create($request->all());

        return to_route('/');
    }

    public function customers(){
        $customers = Customer::all();
        return Inertia::render('Customers', ['customers' => $customers]);
    }

    public function deleteCustomer($id){
        Customer::where('id',$id)->delete();
    }
 
}
