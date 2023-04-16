<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Helper;
use App\Models\Tour;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Tests\Integration\Queue\Order;

class OrderController extends Controller
{
    
    public function checkout(Tour $tour){
        if(Auth::check()){
           
            return view('checkout', compact('tour'));
        } 
        else{
            return view('auth.login');
        }

       
    }

    public function store(Request $request){
        $order = new Order();
        $order->order_number = 'ORD-'.strtoupper(Str::random(10));
        $order->user_id = $request->user()->id;
        $order->tour_id = $request['tour_id'];
        $order->first_name = $request['first_name'];
        $order->last_name = $request['last_name'];
        $order->email = $request['email'];
        $order->phone = $request['phone'];
        $order->address = $request['address'];
        $order->quantity = $request['quantity'];
        if($request['payment_method'] == 'paypal'){
            $order->payment_method = 'paypal';
            $order->payment_status = 'paid';
        } else {
            $order->payment_method = 'cod';
            $order->payment_status = 'Unpaid';
        }
        $order->total_amount = $request['total_amount'];

        $order->save();

        $tour = Tour::find($order->tour_id);
        DB::table('tours')->where('id', $order->tour_id)->update(['quality'=>$tour->quality - $order->quantity]);

        return redirect()->route('home')->with('message', 'Order Successfully !');
        
    }

}
