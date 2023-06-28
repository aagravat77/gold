<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Party_model;
use App\Models\payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function user_profile()
    {
        return view('User.user_profile');
    }

    public function user_profile_post(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:20|min:2',
                'number' => 'required|max:10|min:10',
            ]
        );
        echo $id = $request->input('email');
        echo $a = $request->input('name');
        echo $b = $request->input('number');

        $user = DB::table('users')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('users')->where('id', '=', $id)->update(['name' => $a, 'number' => $b]);
        }
        return back()->with('success', 'Profile Updated Successfully');
    }

    public function change_password()
    {
        return view('User.change_password');
    }
    public function change_password_post(Request $request)
    {
        $request->validate(
            [
                'old' => 'required',
                'new' => 'required|min:8',
                'con' => 'required|same:new',
            ]
        );
        echo $id = $request->input('old');
        echo $a = $request->input('new');
        echo $b = $request->input('con');

        if (!Hash::check($request->old, auth()->user()->password)) {
            return back()->with("error", "old password is wrong");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->con),
            'repeat_password' => $request->con

        ]);
        return back()->with('success', 'Password changed Successfully');
    }

    public function party_detail(Request $request)
    {
        // dd($request);
        $request->validate([
            'party_name' => 'required|min:2|',
            'license_image' => 'required|mimes:jpeg,png,jpg,gif|max:5090|image',
            'address' => 'required|min:5',
            'party_logo' => 'required|mimes:jpeg,png,jpg,gif|max:5090|image',
        ]);
        $id = auth()->user()->id;
        $party_id = md5(rand());
        $item_id = substr($party_id, 8, 4);
        $a = $request->input('party_name');
        $b = $request->file('license_image');
        $c = $request->input('address');
        $d = $request->file('party_logo');

        $name = uniqid() . "." . $b->getClientOriginalExtension();
        $b->move('public/License_images', $name);

        $name2 = uniqid() . "." . $d->getClientOriginalExtension();
        $d->move('public/Party_logo', $name2);

        $user = DB::table('users')->where('id', '=', $id)->first();

        if ($user) {
            $user = DB::table('users')->where('id', '=', $id)->first();
            if ($user) {
                $success = Party_model::insert([
                    'id' => $id,
                    'party_id' => $item_id,
                    'party_name' => $a,
                    'bis_license_image' => $name,
                    'address' => $c,
                    'party_logo' => $name2,
                    //  'status' => 'pending',

                ]);

                if ($success) {
                    Auth::logout();
                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    return redirect()->route('login')->with('success', 'Your company profile has been send successfully, now you can watch your status after login');
                    return Redirect::to('user_after_party_wait');
                } else {
                    echo "error";
                }
            }
        }
    }

    public function order(Request $request)
    {
        $request->validate([
            'item_name' => 'required|min:2|',
            'item_price' => 'required|min:3|',
            'item_quantity' => 'required|numeric|gt:0',
            'item_weight' => 'required|numeric',
            'item_image' => 'required|mimes:jpeg,png,jpg,gif|max:5090|image',
        ]);
        $st = uniqid(md5(rand()));
        $item_id = substr($st, 13, 11);
        $id = $request->input('email');
        $a = $request->input('item_name');
        $b = $request->input('item_price');
        $c = $request->input('item_quantity');
        $d = $request->input('item_weight');
        $image = $request->file('item_image');

        // dd($e);

        $file1 = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move('public/order_item_image', $file1);
        // echo $file1;
        $user = DB::table('party')->where('party_id', $id)->first();

        if ($user) {
            $success = order::insert([
                'party_id' => $id,
                'item_id' => $item_id,
                'item_name' => $a,
                'item_price' => $b,
                'item_quantity' => $c,
                'item_weight' => $d,
                'item_image' => $file1,
            ]);
            if ($success) {
                return back()->with('success', 'Your order has been taken successfully, wait till done your order!!');
            } else {
                return back()->with('error', 'Something went wrong/!!');
            }
        } else {
            return back()->with('error', 'Something went wrong/!!');
        }
    }
    public function order_form()
    {
        $id = auth()->user()->id;

        $orderfom = DB::table('party')
            ->where('id', $id)
            ->get()->count();

        $users = DB::table('party')->where('id', $id)
            ->where('status', 'Not Approved')
            ->get()
            ->count();

        $users2 = DB::table('party')->where('id', $id)
            ->where('status', 'Approve')
            ->get()
            ->count();


        if ($orderfom == 0) {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        } elseif ($users == 1) {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        } elseif ($users2 == 1) {
            $users2 = DB::table('party')->where('id', $id)
                ->where('status', 'Approve')
                ->get();
            return view('User.user_index', compact('users2'));
        } else {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        }
    }

    public function order_data()
    {
        $id = auth()->user()->id;
        //  $data =
        //  DB::table('users')
        // ->select('users.*', 'party.*', 'order.*')
        // ->join('party', 'users.id', '=', 'party.id')
        // ->join('order', 'party.party_id', '=', 'order.party_id')
        // ->get();
        $data = DB::table('users')
            ->select('users.*', 'party.*', 'order.*')
            ->join('party', 'users.id', '=', 'party.id')
            ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
            ->where('users.id', '=', $id)
            ->get()->count();

        $orderfom = DB::table('party')
            ->where('id', $id)
            ->get()->count();

        $users = DB::table('party')->where('id', $id)
            ->where('status', 'Not Approved')
            ->get()
            ->count();

        $users2 = DB::table('party')->where('id', $id)
            ->where('status', 'Approve')
            ->get()
            ->count();


        if ($orderfom == 0) {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        } elseif ($users == 1) {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        } elseif ($users2 == 1) {
            $data = DB::table('users')
                ->select('users.*', 'party.*', 'order.*')
                ->join('party', 'users.id', '=', 'party.id')
                ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
                ->where('users.id', '=', $id)
                ->get();

            return view('User.user_order_details', compact('data'));
        } else {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        }


        return view('User.user_order_details', compact('data'));
    }

    public function pdf_view($id)
    {
        // $id = auth()->user()->id;

        // $data = DB::table('users')
        //     ->select('users.*', 'party.*', 'order.*')
        //     ->join('party', 'users.id', '=', 'party.id')
        //     ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
        //     ->where('users.id', '=', $id)
        //     ->get();
        $user = DB::table('order')->where('item_id', '=', $id)->first();
        if ($user) {
            $data = DB::table('order')->where('item_id', '=', $id)
                ->get();
            // $data=User::all();
            $pdf = PDF::loadView('User.user_order_details', compact('data'));
            return $pdf->stream('order.pdf');
        }

        // return $pdf->download('invoice.pdf');


        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }

    public function payment($id)
    {
        // $id1 = auth()->user()->id;

        $user = DB::table('order')->where('item_id', '=', $id)->first();
        
        if ($user) {
            $data = DB::table('order')->where('item_id', '=', $id)
                ->get();
        }

        $data1 = DB::table('users')
            ->select('users.*', 'party.*', 'order.*', 'party_done.*')
            ->join('party', 'users.id', '=', 'party.id')
            ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
            ->join('party_done', 'order.item_id', '=', 'party_done.item_done_id')
            ->where('order.item_id', '=', $id)
            ->get();

        return view('User.user_payment', compact('data1'));
    }
    public function payment_post(Request $request)
    {
        $request->validate([
            'card_number' => 'required|min:16|max:16',
            'cvv' => 'required|min:3|max:3',
            'date' => 'required|gt:4|lte:12',
            'year' => 'required|gte:2023|lte:2030',
        ]);
        $id = $request->input('email');
        $a = $request->input('card_number');
        $b = $request->input('cvv');
        $c = $request->input('date');
        $d = $request->input('year');
        $e = $request->input('amount');

        if ($id) {
            $data = DB::table('party_done')->where('item_done_id', '=', $id)
                ->get();
            $success = payment::insert([
                'item_pay_id' => $id,
                'card_num' => $a,
                'cvv' => $b,
                'date_card' => $c,
                'year' => $d,
                'amount' => $e
            ]);
            return back()->with('success', 'Payment taken successfully');
        } else {
            return back()->with('error', 'something went wrong');
        }
    }
    public function pay_data()
    {
        $id = auth()->user()->id;
        //  $data =
        //  DB::table('users')
        // ->select('users.*', 'party.*', 'order.*')
        // ->join('party', 'users.id', '=', 'party.id')
        // ->join('order', 'party.party_id', '=', 'order.party_id')
        // ->get();
        $data = DB::table('users')
            ->select('users.*', 'party.*', 'order.*')
            ->join('party', 'users.id', '=', 'party.id')
            ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
            ->where('users.id', '=', $id)
            ->get()->count();

        $orderfom = DB::table('party')
            ->where('id', $id)
            ->get()->count();

        $users = DB::table('party')->where('id', $id)
            ->where('status', 'Not Approved')
            ->get()
            ->count();

        $users2 = DB::table('party')->where('id', $id)
            ->where('status', 'Approve')
            ->get()
            ->count();


        if ($orderfom == 0) {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        } elseif ($users == 1) {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        } elseif ($users2 == 1) {
            $data = DB::table('users')
                ->select('users.*', 'party.*', 'order.*', 'party_done.*','payment.*')
                ->join('party', 'users.id', '=', 'party.id')
                ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
                ->join('party_done', 'order.item_id', '=', 'party_done.item_done_id')
                ->join('payment', 'party_done.item_done_id', '=', 'payment.item_pay_id')
                ->where('users.id', '=', $id)
                ->get();

            return view('User.user_payment_details', compact('data'));
        } else {
            return back()->with('error', 'Sorry can`t able to access this page First verify your company');
        }
    }
    public function Payment_view_user($id)
    {
        $data = DB::table('users')
        
        ->select('users.*', 'party.*', 'order.*', 'party_done.*', 'payment.*')
        ->join('party', 'users.id', '=', 'party.id')
        ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
        ->join('party_done', 'order.item_id', '=', 'party_done.item_done_id')
        ->join('payment', 'party_done.item_done_id', '=', 'payment.item_pay_id')
        ->where('users.id', '=', $id)
            ->get();

        $user = DB::table('party_done')->where('item_done_id', '=', $id)->first();
        if ($user) {
            $data = DB::table('party_done')->where('item_done_id', '=', $id)
                ->get();
            // $data=User::all();
            
        }
        $pdf = PDF::loadView('User.user_paypdf', compact('data'));
            return $pdf->stream('order.pdf');
        // $pdf = PDF::loadView('User.user_paypdf', compact('data'));
        // return $pdf->stream('order.pdf');
        // return view('User.user_paypdf', compact('data'));

    }
}
