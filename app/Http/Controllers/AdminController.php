<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Notifications\Notification;

class AdminController extends Controller
{
    public function view_catagory()
    {
        if (Auth::id()) {
            $catagory = Catagory::all();
            return view('admin.catagory', compact('catagory'));
        } else {
            return redirect('login');
        }
    }
    public function add_catagory(Request $request)
    {
        if (Auth::id()) {
            $data = new Catagory;
            $data->catagory_name = $request->catagory;
            $data->save();
            return redirect()->back()->with('message', 'Catagory Add Successfully');
        } else {
            return redirect('login');
        }
    }
    public function delete_catagory($id)
    {
        if (Auth::id()) {
            $data = Catagory::find($id);
            $data->delete();
            return redirect()->back()->with('delete', 'Catagory Deleted Successfully');
        } else {
            return redirect('login');
        }
    }
    public function view_product()
    {
        if (Auth::id()) {
            $catagory = Catagory::all();
            $data = Product::all();
            return view('admin.product', compact('catagory', 'data'));
        } else {
            return redirect('login');
        }
    }
    public function add_product(Request $request)
    {
        if (Auth::id()) {
            $data = new Product;
            $data->title = $request->title;
            $data->discription = $request->discription;
            $image = $request->file('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->move('product', $imageName);
            $data->images = $imagePath;
            $data->catagory = $request->catagory;
            $data->quntity = $request->quntity;
            $data->price = $request->price;
            $data->discount_price = $request->discount_price;
            $data->save();
            return redirect()->back()->with('product', 'Product Add Successfully');
        } else {
            return redirect('login');
        }
    }
    public function delete_product($id)
    {
        if (Auth::id()) {
            $data = Product::find($id);
            $data->delete();
            return redirect()->back()->with('delete', 'Product Deleted Successfully');
        } else {
            return redirect('login');
        }
    }
    public function show_product()
    {
        if (Auth::id()) {
            $data = Product::all();
            return view('admin.show_product', compact('data'));
        } else {
            return redirect('login');
        }
    }
    public function edit_product($id)
    {
        if (Auth::id()) {
            $catagory = Catagory::all();
            $product = Product::find($id);
            return view('admin.edit_product', compact('catagory', 'product'));
        } else {
            return redirect('login');
        }
    }
    public function update_product(Request $request, $id)
    {
        if (Auth::id()) {
            $product = Product::find($id);
            $product->title = $request->title;
            $product->discription = $request->discription;
            $product->catagory = $request->catagory;
            $product->quntity = $request->quntity;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $image = $request->images;
            if ($image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->images->move('product', $imagename);
                $product->images = $imagename;
            }
            $product->save();
            return redirect()->back()->with('product', 'Product add successfully,,');
        } else {
            return redirect('login');
        }
    }
    public function order()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }
    public function delevary($id)
    {
        $data = Order::find($id);
        $data->delevary_status = "Delevared";
        $data->payment_status = "Paid";
        $data->save();
        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);
        // return view('admin.pdf', compact('order'));
        // die;
        $pdf = PDF::loadview('admin.pdf', compact('order'));
        return $pdf->download('order_details');
    }
    public function send_email($id)
    {
        $order = Order::find($id);
        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        // Notification::send($order, new SendEmailNotification($details));
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchText = $request->search;
        $data = Order::where('name', 'LIKE', "%$searchText%")->orwhere('phone', 'LIKE', "%$searchText%")->orwhere('product_title', 'LIKE', "%$searchText%")->get();
        return view('admin.order', compact('data'));
    }
}
