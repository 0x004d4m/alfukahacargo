<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function submit(Request $request){
        $ContactRequest = ContactRequest::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);

        Session::flash('success', true);
        return redirect('/#contact');
    }

    public function order(Request $request){
        $Order = Order::where('vin_number', $request->vin)->first();
        if(!$Order){
            return view('order');
        }

        return view('order',[
            'Order'=>$Order,
        ]);
    }
}
