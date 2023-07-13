<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\UserPremium;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $user_premiums = UserPremium::with('package')->where('user_id', $userId)->first();

        // dd($userId);

        if (!$user_premiums) {
            return redirect()->route('pricing');
        }

        return view('member.subscription', compact('user_premiums'));
    }

    public function destroy($id)
    {
        $user_premiums = UserPremium::findOrFail($id);

        $user_premiums->delete();

        return redirect()->route('member.dashboard');
    }
}
