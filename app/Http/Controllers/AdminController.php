<?php

namespace App\Http\Controllers;

use App\Exports\ExportContact;
use App\Exports\ExportOrder;
use App\Exports\ExportParty;
use App\Models\Contactmodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use PDF;
use EXCEL;
use App\Exports\UserExport;
use App\Models\order;
use App\Models\party_done;
use App\Models\Party_model;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;


class AdminController extends Controller
{
    public function index(Request $users)
    {
        $users = DB::table('users')->where('role', '=', 'user')->get();
        return view('Admin.Admin_Users', compact('users'));
    }

    public function contactdata(Request $users)
    {
        $users = DB::table('contactmodel')->get();
        return view('Admin.Admin_cotact', compact('users'));
    }

    public function deletecon($id)
    {
        $user = DB::table('contactmodel')->where('id', '=', $id)->first();

        if ($user) {
            DB::table('contactmodel')->where('id', '=', $id)->delete();
        }
        return back()->with('success', 'deleted Successfully');
    }

    public function order_delete($id)
    {
        $user = DB::table('order')->where('item_id', '=', $id)->first();
        if ($user) {
            DB::table('order')->where('item_id', '=', $id)->delete();
        }
        return back()->with('success', 'Order Deleted Successfully');
    }

    public function delete($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('users')->where('id', '=', $id)->update(['status' => 'Deactive']);
        }

        return redirect()->route('/admin_user');
    }

    public function admin_profile()
    {
        return view('Admin.Admin_profile');
    }

    public function admin_user_profile_post(Request $request)
    {
        echo $id = $request->input('id');
        echo $c = $request->input('email');
        echo $a = $request->input('name');
        echo $b = $request->input('number');
        echo $d = $request->input('status');


        $request->validate(
            [
                'name' => 'required|max:20|min:2',
                'number' => 'required|max:10|min:10',
            ]
        );

        $user = DB::table('users')->where('id', '=', $id)->first();

        if ($user->email == $c) {

            DB::table('users')->where('id', '=', $id)->update(['name' => $a, 'number' => $b, 'email' => $c, 'status' => $d]);
            return back()->with('success', 'Profile Updated Successfully');
        } else {
            $request->validate(
                [
                    'email' => 'required|unique:users|email',
                    'name' => 'required|max:20|min:2',
                    'number' => 'required|max:10|min:10',
                ]
            );
            echo $id = $request->input('id');
            echo $c = $request->input('email');
            echo $a = $request->input('name');
            echo $b = $request->input('number');
            echo $d = $request->input('status');    


            $user = DB::table('users')->where('id', '=', $id)->first();

            if ($user) {
                DB::table('users')->where('id', '=', $id)->update(['name' => $a, 'number' => $b, 'email' => $c, 'status' => $d]);
                return back()->with('success', 'Profile Updated Successfully');
            }
        }
    }

    public function admin_profile_post(Request $request)
    {
        echo $id = $request->input('id');
        echo $c = $request->input('email');
        echo $a = $request->input('name');
        echo $b = $request->input('number');


        $request->validate(
            [
                'name' => 'required|max:20|min:2',
                'number' => 'required|max:10|min:10',
            ]
        );

        $user = DB::table('users')->where('id', '=', $id)->first();

        if ($user->email == $c) {

            DB::table('users')->where('id', '=', $id)->update(['name' => $a, 'number' => $b, 'email' => $c]);
            return back()->with('success', 'Profile Updated Successfully');
        } else {
            $request->validate(
                [
                    'email' => 'required|unique:users|email',
                    'name' => 'required|max:20|min:2',
                    'number' => 'required|max:10|min:10',
                ]
            );
            echo $id = $request->input('id');
            echo $c = $request->input('email');
            echo $a = $request->input('name');
            echo $b = $request->input('number');


            $user = DB::table('users')->where('id', '=', $id)->first();

            if ($user) {
                DB::table('users')->where('id', '=', $id)->update(['name' => $a, 'number' => $b, 'email' => $c]);
                return back()->with('success', 'Profile Updated Successfully');
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $data = User::where('id', '=', $id)->get();
        return view('Admin.Admin_edit_user', compact('data'));
    }

    public function change_password()
    {
        return view('Admin.Admin_change_pass');
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

    public function contact(Request $request)
    {
        echo $a = $request->input('name');
        echo $c = $request->input('email');
        echo $d = $request->input('msg');

        $success = Contactmodel::insert([
            'name' => $a,
            'email' => $c,
            // 'email'=>$c->unique(),
            'message' => $d

        ]);
        if ($success) {
            return back()->with('success', 'message send Successfully');
        } else {
            echo "error";
        }
    }

    public function party_show()
    {
        $party = DB::table('party')->get();
        return view('Admin.Admin_party', compact('party'));
    }

    public function party_approve(Request $request, $id)
    {
        $user = DB::table('party')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('party')->where('id', '=', $id)->update(['status' => 'Approve']);
        }
        return back()->with('success', 'Party Approved Successfully');
    }

    public function edit_party(Request $request, $id)
    {
        $party = Party_model::where('id', '=', $id)->get();
        return view('Admin.Admin_party_edit', compact('party'));
    }

    public function edit_party_post(Request $request)
    {
        $request->validate([
            'party_name' => 'required|min:2|',
            'address' => 'required|min:5|',
            'bis_license_image' => 'mimes:jpeg,png,jpg,gif|max:5090|image',
            'party_logo' => 'mimes:jpeg,png,jpg,gif|max:5090|image',
        ]);
        $id = $request->input('email');
        $a = $request->input('party_name');
        $b = $request->input('address');
        $image1 = $request->file('bis_license_image');
        $image2 = $request->file('party_logo');


        $user = DB::table('party')->where('id', '=', $id)->first();

        if ($user) {
            if ($request->hasfile('bis_license_image')) {
                $file1 = 'public/License_images' . $request->bis_license_image;
                File::delete($file1);

                $file1 = uniqid() . "." . $image1->getClientOriginalExtension();
                $image1->move('public/License_images', $file1);

                DB::table('party')->where('id', '=', $id)->update(['party_name' => $a, 'address' => $b, 'bis_license_image' => $file1]);
                return back()->with('success', 'party Data  Updated Successfully');
            } elseif ($request->hasfile('party_logo')) {
                $file2 = 'public/Party_logo' . $request->party_logo;
                File::delete($file2);

                $file2 = uniqid() . "." . $image2->getClientOriginalExtension();
                $image2->move('public/Party_logo', $file2);

                DB::table('party')->where('id', '=', $id)->update(['party_name' => $a, 'address' => $b, 'party_logo' => $file2]);
                return back()->with('success', 'party Data  Updated Successfully');
            } else {
                DB::table('party')->where('id', '=', $id)->update(['party_name' => $a, 'address' => $b]);
                return back()->with('success', 'party Data  Updated Successfully');
            }
        }
    }

    public function party_delete(Request $request, $id)
    {
        $user = DB::table('party')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('party')->where('id', '=', $id)->delete();
        }
        return back()->with('success', 'Party Deleted Successfully');
    }

    public function order()
    {
        // $users = DB::table('order')->get();
        $users = DB::table('users')
            ->select('users.*', 'party.*', 'order.*')
            ->join('party', 'users.id', '=', 'party.id')
            ->join('ORDER', 'party.party_id', '=', 'ORDER.party_id')
            ->get();
        return view('Admin.Admin_order', compact('users'));
    }

    public function edit_order(Request $request, $id)
    {
        $order = order::where('item_id', '=', $id)->get();
        return view('Admin.Admin_order_edit', compact('order'));
    }

    public function order_done(Request $request, $id)
    {
        // $order = order::where('item_id', '=', $id)->get();
        // return view('Admin.Admin_party_done', compact('order'));

        $order = order::where('item_id', '=', $id)->get();
        if ($order) {
            DB::table('order')->where('item_id', '=', $id)->get();
            return view('Admin.Admin_party_done', compact('order'));
        }
        // return back()->with('success', 'Order Completed Successfully');
    }

    public function order_done_post(Request $request)
    {
        $id = $request->input('email');
        $a = $request->input('item_name');
        $b = $request->input('item_price');
        $c = $request->input('item_quantity');
        $d = $request->input('item_weight');
        $e = $request->input('purity');
        $f = $request->input('per');
        $g = $request->input('met');
        $h = $request->input('charge');

        $ch = 45;
        $sum = $c * 45;
        $tax = 3;
        $per = 1.35;
        $total = $sum + $per;

        $success = party_done::insert([
            'item_done_id' => $id,
            'karat' => $e,
            'gold' => $f,
            'other' => $g,
            'charges' => 45,
            'tax' => 3,
            'total' => $total,

        ]);
        $users = order::where('item_id', '=', $id)->get();
        if ($users) {
            DB::table('order')->where('item_id', '=', $id)->update(['status' => 'Done']);
            return redirect()->to('order_data');
        } else {
            echo "error";
        }
    }

    public function edit_order_post(Request $request)
    {
        $request->validate([
            'item_name' => 'required|min:2|',
            'item_price' => 'required|min:3|',
            'item_quantity' => 'required',
            'item_weight' => 'required|numeric',
            'item_image' => 'mimes:jpeg,png,jpg,gif|max:5090|image',


        ]);
        $id = $request->input('email');
        $a = $request->input('item_name');
        $b = $request->input('item_price');
        $c = $request->input('item_quantity');
        $d = $request->input('item_weight');
        $image = $request->file('item_image');

        $user = DB::table('order')->where('item_id', '=', $id)->first();

        if ($user) {
            if ($request->hasfile('item_image')) {
                $file = 'public/order_item_image' . $request->item_image;
                File::delete($file);

                $file1 = uniqid() . "." . $image->getClientOriginalExtension();
                $image->move('public/order_item_image', $file1);

                DB::table('order')->where('item_id', '=', $id)->update(['item_name' => $a, 'item_price' => $b, 'item_quantity' => $c, 'item_weight' => $d, 'item_image' => $file1]);
                return back()->with('success', 'Order Data  Updated Successfully');
            } else {
                DB::table('order')->where('item_id', '=', $id)->update(['item_name' => $a, 'item_price' => $b, 'item_quantity' => $c, 'item_weight' => $d]);
                return back()->with('success', 'Order Data  Updated Successfully');
            }
        }
    }

    public function payment()
    {
        $party = DB::table('payment')->get();
        return view('Admin.Admin_payment_show', compact('party'));
    }

    public function getExcelUser()
    {
        return FacadesExcel::download(new UserExport, 'user_details_excel.xlsx');
        return back();
    }
    public function getExcelContact()
    {
        return FacadesExcel::download(new ExportContact, 'contact_details_excel.xlsx');
        return back();
    }

    public function getExcelParty()
    {
        return FacadesExcel::download(new ExportParty, 'party_details_excel.xlsx');
        return back();
    }

    public function getExcelOrder()
    {
        return FacadesExcel::download(new ExportOrder, 'order_details_excel.xlsx');
        return back();
    }


    public function pdf_view($id)
    {
        // $id = auth()->user()->id;
        // $user = DB::table('order')->where('item_id', '=', $id)->first();
        // if ($user) {
        //     DB::table('order')->where('item_id', '=', $id)->delete();
        // }
        $user = DB::table('order')->where('item_id', '=', $id)->first();
        if ($user) {
            $data = DB::table('order')->where('item_id', '=', $id)
                ->get();
            // $data=User::all();
            $pdf = PDF::loadView('User.user_order_details', compact('data'));
            return $pdf->stream('order.pdf');
        }
        // return back()->with('success', 'Order Deleted Successfully');

        // return $pdf->download('invoice.pdf');


        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('payment')
                    ->where('p_id', 'like', '%' . $query . '%')
                    ->orWhere('item_pay_id', 'like', '%' . $query . '%')
                    ->orWhere('card_num', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orderBy('date_card', 'desc')
                    ->get();
            } else {
                $data = DB::table('payment')
                    ->orderBy('item_pay_id', 'desc')
                    ->get();
            }

            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr>
                    <td>' . $row->item_pay_id . '</td>
                    <td>' . $row->date_card . '</td>
                    <td>' . $row->year . '</td>
                    <td>' . $row->amount . '</td>
                    <td>' . $row->card_num . '</td>
                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }

    public function active_option()
    {
        echo "h";
    }
}

//very good for all sql queries:
// https://blog.quickadminpanel.com/5-ways-to-use-raw-database-queries-in-laravel/
