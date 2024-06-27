<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\WrapperJsonClass;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use App\Services\Contracts\WrapperJsonContract;

class ProfileController extends Controller
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

    public function showAccountSettings()
    {
        $token = session('tokens');
        try {
            $user = $this->eUserApiWrapper->currentConnectedUser($token)['user'];
            return view('profil.parametres', compact('user'));
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', Lang::get("Une erreur s'est produite, recommencer plus tard"));
        }
    }

    public function getCurrentUser()
    {
        $token = session('tokens');
        try {
            $user = $this->eUserApiWrapper->getCurrentUser($token)['user'];
            return response()->json($user);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', Lang::get("Une erreur s'est produite, recommencer plus tard"));
        }
    }

    public function getUser($id)
    {
        $token = session('tokens');
        try {
            $user = $this->eUserApiWrapper->getUser($id, $token)['user'];
            return response()->json($user);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', "Une erreur s'est produite, recommencer plus tard");
        }
    }

    /**
     * updateUser information function
     *
     * @param Request $request
     * @param [int] $id
     * @return JsonResponse
     */
    public function updateUser(Request $request, $id): JsonResponse
    {
        // $request->validate([
        //     'first_name' => 'required|min:3',
        //     'last_name' => 'required|min:3',
        //     'email' => 'required',
        //     'phone' => 'required',
        // ]);
        $user = array_filter([
            'first_name' => $request->input('first_name'),
            'email' =>  $request->input('email'),
            'last_name' =>  $request->input('last_name'),
            'phone' =>  $request->input('phone'),
        ]);

        $token = session('tokens');
        try {
            $this->eUserApiWrapper->updateCurrentUser($user, $id, $token);
            session()->flash('message', 'Profile Updated');
            return response()->json(['success', 'Profile Updated']);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            session()->flash('error', Lang::get("Erreur, recommencer ce procédé plus tard"));
            return response()->json(['error', Lang::get("erreur, recommencer ce procédé plus tard")]);
        }
    }

    /**
     * update password function
     *
     * @param Request $request
     * @param [type] $id
     * @return JsonResponse
     */
    public function resetPassword(Request $request, $id): JsonResponse
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password|min:8'
        ]);
        $password = [
            'password' => $request->input('password'),
        ];
        $token = session('tokens');
        try {
            $this->eUserApiWrapper->resetPasswordForget($password, $id, $token);
            session()->flash('message', 'Password Updated');
            return response()->json(['success', 'Password Updated']);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            session()->flash('error', Lang::get("Erreur, recommencer plus tard"));
            return response()->json(['error', "Erreur, recommencer plus tard"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id): JsonResponse
    {
        $token = session('tokens');
        try {
            $this->eUserApiWrapper->destroyUser($id, $token);
            session()->forget('tokens');
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            session()->flash('error', Lang::get("Erreur, recommencer ce procédé plus tard"));
            return response()->json(['error', Lang::get("Une erreur s'est produite, recommencer plus tard")]);
        }
    }
}
