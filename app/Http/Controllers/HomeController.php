<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Card;
use App\Models\Order;
use App\Models\comment;
use App\Models\reply;


class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);
        $comment = Comment::all();
        $reply = reply::all();
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }


    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $product = Product::all()->count();
            $order = Order::all();
            $totalRevenue = 0;
            foreach ($order as $order) {
                $totalRevenue = $totalRevenue + $order->price;
            };
            $delevered = Order::where('delevary_status', '=', 'Delevared')->get()->count();
            $processing_delevary = Order::where('delevary_status', '=', 'processing')->get()->count();
            // $paymentStatus = $order->payment_status;
            $allOrder = $order->count();
            $user = User::all()->count();
            return view('admin.home', compact('product', 'order', 'allOrder', 'processing_delevary', 'user', 'totalRevenue', 'delevered'));
        } else {
            $product = Product::paginate(10);
            $comment = Comment::all();
            $reply = reply::all();

            return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }
    public function product_detail($id)
    {
        $product = Product::find($id);
        return view('home.product_detail', compact('product'));
    }
    public function add_card(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userId = $user->id;
            $product = Product::find($id);
            $card = new Card;
            $product_exist_id = Card::where('product_id', '=', $id)->where('user_id', '=', $userId)->get()->first();
            if ($product_exist_id) {
                $cart = Card::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                $price = $cart->price;
                if ($product->discount_price == null) {
                    $card->price =  $price + $product->price * $request->quantity;
                } else {
                    $cart->price = $price + $product->discount_price * $request->quantity;
                }
                $cart->save();
                Alert::success('Product added Successfully', 'We have added product to the cart ...');
                return redirect()->back()->with('message', 'Product added successfully....');
            } else {
                $card->user_id = $user->id;
                $card->name = $user->name;
                $card->phone = $user->phone;
                $card->email = $user->email;
                $card->address = $user->address;
                $card->product_id = $product->id;
                $card->product_title = $product->title;
                $card->quantity = $request->quantity;
                if ($product->discount_price == null) {
                    $card->price = $product->price * $request->quantity;
                } else {
                    $card->price = $product->discount_price * $request->quantity;
                }
                $card->image = $product->images;
                $card->save();
                Alert::success('Product added Successfully', 'We have added product to the cart ...');
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    public function show_card()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $card = card::where('user_id', '=', $id)->get();
            $totalCardItem = $card->count();
            return view('home.show_card', compact('card', 'totalCardItem'));
        } else {
            return redirect('login');
        }
    }
    public function show_allcard_item()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $card = card::where('user_id', '=', $id)->get();
            $totalCardItem = $card->count();
            return view('home.header', compact('totalCardItem'));
        } else {
            return redirect('login');
        }
    }
    public function delete_card_product($id)
    {
        $card = card::find($id);
        $card->delete();
        return redirect()->back();
    }

    public function cash_delevary()
    {
        $user = Auth::user();
        $userid = $user->id;
        $card = card::where('user_id', '=', $userid)->get();
        foreach ($card as $card) {
            $order = new Order;

            $order->name = $card->name;
            $order->email = $card->email;
            $order->phone = $card->phone;
            $order->address = $card->address;
            $order->user_id = $card->user_id;

            $order->product_title = $card->product_title;
            $order->quantity = $card->quantity;
            $order->image = $card->image;
            $order->price = $card->price;
            $order->product_id = $card->product_id;
            $order->payment_status = "cash on delevary";
            $order->delevary_status = "processing";

            $order->save();
            $userId = $card->id;
            $user = card::find($userId);
            $user->delete();
        }
        return redirect()->back();
    }

    public function show_order()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $data = Order::where('user_id', '=', $id)->get();
            return view('home.order', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delete();
        // return response()->JSON(['success' => true]);
        return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $comment = new Comment;
            $comment->name = $user->name;
            $comment->user_id = $user->id;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }


    public function add_reply(Request $request)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $reply = new reply;
            $reply->name = $user->name;
            $reply->user_id = $user->id;
            $reply->reply = $request->reply;
            $reply->comment_Id = $request->commentId;
            $reply->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function product_search(Request $request)
    {
        $comment = Comment::all();
        $reply = reply::all();
        $search_text = $request->search;
        $product = Product::where('title', 'LIKE', "%$search_text%")->orWhere('catagory', 'LIKE', "%$search_text%")->paginate(10);
        return view('home.userpage', compact('product', 'reply', 'comment'));
    }

    public function all_product()
    {
        $product = Product::paginate(10);
        return view('home.all_products', compact('product'));
    }


    public function search_product(Request $request)
    {

        $search_text = $request->search;
        $product = Product::where('title', 'LIKE', "%$search_text%")->orWhere('catagory', 'LIKE', "%$search_text%")->paginate(10);
        return view('home.all_products', compact('product'));
    }
}
