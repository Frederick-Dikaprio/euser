<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Services\WrapperJsonClass;
use Illuminate\Support\Facades\Lang;
use App\Services\Contracts\WrapperJsonContract;

class EnsureTokenIsValid
{
    protected WrapperJsonContract $eUserApiWrapper;

    /**
     * Undocumented function
     *
     * @param WrapperJsonContract $eUserApiWrapper
     */
    public function __construct(WrapperJsonClass $eUserApiWrapper)
    {
        $this->eUserApiWrapper = $eUserApiWrapper;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = session()->get('tokens');

        try {
            if ($token) {
                $this->eUserApiWrapper->ensureTokenIsValid($token);
                return $next($request);
            } else {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return redirect()->route('login')->with('error', Lang::get('Connectez vous, sinon créez vous un compte'));
        }
    }
}
