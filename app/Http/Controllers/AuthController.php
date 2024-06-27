<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Services\WrapperJsonClass;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Services\Contracts\WrapperJsonContract;

class AuthController extends Controller
{
    protected WrapperJsonContract $eUserApiWrapper;

    /**
     * @param WrapperJsonContract $eUserApiWrapper
     */
    public function __construct(WrapperJsonClass $eUserApiWrapper)
    {
        $this->eUserApiWrapper = $eUserApiWrapper;
    }

    /**
     * Handle a login attempt
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate(['alias' => 'required|string', 'password' => 'required|string']);
        $userLoginInfo = [
            'alias' => $request->input('alias'),
            'ip' => $request->ip(),
            'password' => $request->input('password')
        ];

        try {
            $response = $this->eUserApiWrapper->openSession($userLoginInfo);
            $token = $response['data']['token'];
            session()->put('tokens', $token);
            return redirect()->intended(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', Lang::get("L'alias ou le mot de passe ne correspondent pas"));
        }
    }

    /**
     * Logs out the currently authenticated user
     */
    public function logout(): RedirectResponse
    {
        $token = session()->get('tokens');
        try {
            $this->eUserApiWrapper->closeSession($token);
            session()->forget('tokens');
            return redirect()->route('login');
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', Lang::get("Erreur, recommencer ce procédé plus tard"));
        }
    }
}
