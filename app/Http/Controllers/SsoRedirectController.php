<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SsoRedirectController extends Controller
{
    /**
     * Handle SSO
     *
     * @param Request $request
     * @return void
     */
    public function redirect(Request $request)
    {
        $client = $request->input('client');
        $redirectMap = [
            'nickdaoquan' => 'https://nickdaoquan.vn/sso/callback',
        ];

        if (!isset($redirectMap[$client])) {
            abort(404);
        }

        $user = Auth::user();
        $token = $user->createToken("Access from master")->accessToken;
        return redirect()->away($redirectMap[$client] . '?token=' . $token);
    }
}
