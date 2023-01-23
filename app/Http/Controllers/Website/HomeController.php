<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\Image;
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
        $Order = Order::whereHas('vehicle', function($q)use($request){$q->where('vin',$request->vin);},)->first();
        if(!$Order){
            return view('order');
        }

        $Images = Image::where('order_id',$Order->id)->get();
        return view('order',[
            'Order'=>$Order,
            'Images'=>$Images->groupBy('image_type_id'),
        ]);
    }
}
