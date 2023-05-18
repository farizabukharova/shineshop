<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{


    public function confirm(Cart $cart){
        $cart->update([
            'status' => 'confirmed'
        ]);
        return back()->with('message', __('validation.confirm_pro'));
    }

    public function cart(){
        $cart = Cart::where('status', 'ordered')->with(['app', 'user'])->get();
        return view('adm.cart', ['cart' => $cart]);
    }

    public function buy(){
        $sum = 0;
        $prices = Auth::user()->BoughtCart()->where('status', 'in_cart')->get();
        foreach($prices as $q){
            $sum = ($sum + $q->price)*$q->pivot->number;
        }
        if(Auth::user()->pays()->first()->money >= $sum) {
            $buy = Auth::user()->postswithStatus('in_cart')->allRelatedIds();
            foreach ($buy as $b) {
                Auth::user()->postswithStatus('in_cart')->updateExistingPivot($b, ['status' => 'ordered']);
            }
        }else{
            return back()->with('error', __('messages.nocash'));
        }
        $new =  Auth::user()->pays()->first()->money - $sum;
        DB::table('pays')
            ->where('user_id', Auth::user()->id)
            ->update(['money' => $new]);

        return back()->with('message', __('messages.s_cart'));
    }

    public function deleteCart(App $app){

        $cart =  Auth::user()->appsCart()->where('app_id', $app->id)->get();

        if ($cart != null){
            Auth::user()->appsCart()->detach($app->id);
        }
        return view('cart.index',['cart' => $cart])->with('messages.del');
    }

    public function addCart(Request $request, App $app){
        $request->validate([
            'number' => 'required|numeric'
        ]);

        $cart = Auth::user()->appsCart()->where('app_id', $app->id)->first();
        if($cart != null){
            Auth::user()->appsCart()->updateExistingPivot($app->id, ['number' => $request->input('number')]);
        }else {
            Auth::user()->appsCart()->attach($app->id, ['number' => $request->input('number')]);
        }
        return back()->with('message', __('messages.add'));
    }

    public function cartIndex(Cart $cart){
        $cart = Auth::user()->appsCart()->get();
        return view('cart.index', ['cart' => $cart]);
    }


    public function app(Request $request){
        if ($request->search){
            $apps = App::where('name', 'LIKE', '%' .$request->search. '%')
                ->with('category')->get();
        }else{
            $apps = App::with('category')->get();
        }
        return view('adm.apps.product', ['products' => $apps, 'product'=>App::all()]);
    }

    public function appCategory(Category $category){
        $app = Category::all();
        return view('adm.apps.index', ['apps'=>$category->apps ,'categories' => Category::all()]);
    }

    public function index(){;
        $all = App::all();
        return view('adm.apps.index', ['apps'=>$all, 'categories' => Category::all()]);
    }

    public function create(){
        return view('adm.apps.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_kz' => 'string|max:255',
            'name_ru' => 'string|max:255',
            'name_en' => 'string|max:255',
            'price' => 'required|numeric',
            'content' => 'required|string',
            'content_kz' => 'required|string',
            'content_ru' => 'required|string',
            'content_en' => 'required|string',
            'category_id' => 'required',
            'img' => 'required|mimes:jpg,png,jpeg,gif|max:2048',
        ]);
        $fn = time() . $request->file('img')->getClientOriginalName();
        $imgPath = $request->file('img')->storeAs('appsImg', $fn, 'public');
        $validated['img'] = '/storage/' . $imgPath;
        Auth::user()->apps()->create($validated);

        return redirect()->route('adm.apps.product')->with('message', __('validation.save_pst'));
    }


    public function show(App $app){
        return view('adm.apps.show', ['app' => $app, 'categories' => Category::all()]);
    }

    public function edit(App $app){
        return view('adm.apps.edit', ['app' => $app, 'categories' => Category::all()]);
    }

    public function update(Request $request, App $app){
        $app->update([
            'name' => $request->input('name'),
            'name_kz' => $request->input('name_kz'),
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
            'price' => $request->input('price'),
            'content' => $request->input('content'),
            'content_kz' => $request->input('content_kz'),
            'content_ru' => $request->input('content_ru'),
            'content_en' => $request->input('content_en'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('adm.apps.product',['categories' => Category::all()])->with('message', __('validation.update_pst'));
    }


    public function destroy(App $app){
        $app->delete();
        return redirect()->route('adm.apps.product')->with('error', __('validation.delete_pst'));
    }
    public function product(){
        return view('adm.apps.product', ['products' => App::all()]);
    }
}
