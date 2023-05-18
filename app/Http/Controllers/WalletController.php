<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        $wallet = Pay::all();
        return view('wallet.index',['wallet' => $wallet]);
    }

    public function create(){
        return view('wallet.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'money' => 'required|numeric',
            'wallet_id' => 'numeric'
        ]);
        Auth::user()->pays()->create($validated);
        return redirect()->route('wallet.index')->with('message', __('messages.wallet_add'));
    }

    public function edit(Pay $pay){
        return view('wallet.edit', ['wallet' => $pay]);
    }

    public function update(Request $request, Pay $pay){
        $pay->update([
            'money' => $request->input('money'),
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->route('wallet.index')->with('message', __('messages.wallet_update'));
    }

    public function destroy(Pay $pay){
        $pay->delete();
        return redirect()->route('wallet.index')->with('message', __('messages.wallet_delete'));
    }
}
