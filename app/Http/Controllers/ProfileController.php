<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profiles = Profile::all()->sortByDesc('updated_at');

        if (count($profiles) > 0) {
            $headline = $profiles->shift();
        } else {
            $headline = null;
        }

        return view('profile.index', ['headline' => $headline, 'posts' => $profiles]);
    }
}
