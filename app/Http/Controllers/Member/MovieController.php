<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\UserPremium;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('member.movie-details', [
            'movie' => $movie
        ]);
    }

    public function watch($id)
    {
        $userId = auth()->user()->id;

        $user_premiums = UserPremium::with('package')->where('user_id', $userId)->first();

        if ($user_premiums) {
            $endOfSubscription = $user_premiums->end_of_subscription;
            $date = Carbon::createFromFormat('Y-m-d', $endOfSubscription);
            $isValidSubscription = $date->greaterThan(now());

            if ($isValidSubscription) {
                $movie = Movie::find($id);
                return view('member.watching-movie', compact('movie'));
            }
        }

        return redirect()->route('pricing');
    }
}
