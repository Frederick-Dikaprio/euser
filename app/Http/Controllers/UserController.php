<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Services\WrapperJsonClass;
use Illuminate\Support\Facades\Lang;
use App\Services\Contracts\WrapperJsonContract;

class UserController extends Controller
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
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birthday' => 'required|string',
            'phone' => 'required|string',
            'alias' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|confirmed'
        ]);

        $user['ip'] = $request->ip();

        try {
            $response = $this->eUserApiWrapper->createUser($user);
            $token = $response["data"]["token"];
            session(['token' => $token]);
            return redirect()->to('/code')->with('success', $response['data']['message']);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with(
                'error',
                Lang::get('Erreur veuillez recommencer, si ca persiste changez les donneées')
            );
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actveAccount(Request $request)
    {
        $token = session('token');
        $data = [
            'pin' => $request->input('code')
        ];
        try {
            $message = $this->eUserApiWrapper->activeAccount($data, $token);
            /** Supprimer les données de la séssion */
            session()->forget('token');
            return redirect()->route('login')->with('success', $message);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', Lang::get("Problème d'activation du compte, veuillez prendre plus tard"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPassword(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'ip' => $request->ip()
        ];
        try {
            $response = $this->eUserApiWrapper->resetPassword($data);
            session(['tokens' => $response]);
            return redirect()->to(route('valide.passwordcode'))->with('status', 'Merci de consulter vos mails');
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('statuse', "erreur, recommencer plus tard");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validatedCode(Request $request)
    {
        $token = session('token');
        $data = [
            'pin' => $request->code,
        ];
        try {
            $this->eUserApiWrapper->validatedCode($data, $token);
            session()->forget('token');
            return redirect()->route('login')->with('status', Lang::get('Compte vérifier avec succèss'));
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            session()->flash('error', "erreur, recommencer plus tard");
            return back()->with('statuse', "erreur, recommencer plus tard");
        }
    }
}
