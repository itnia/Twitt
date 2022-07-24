<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionsController extends Controller
{
    public function index ()
    {
        $users = DB::table('users')
            ->leftJoin('subscriptions', 'subscriptions.subscription_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'subscriptions.subscription_id')
            ->where('users.id', '!=', Auth::id())
            ->get();

        return view('subscription', ['users' => $users]);
    }

    public function store (Request $request) {
        $subscription = new Subscription;
        $subscription->user_id = Auth::id();
        $subscription->subscription_id = $request->subscription_id;
        $subscription->save();
        
        return $this->index();
    }

    public function destroy (Request $request) {

        $subscription = Subscription::where('user_id', '=', Auth::id())->where('subscription_id', '=', $request->subscription_id)->delete();

        return $this->index();
    }
}
