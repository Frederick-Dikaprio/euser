<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Traits\PaginationTrait;
use Illuminate\Http\JsonResponse;
use App\Services\WrapperJsonClass;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use App\Services\Contracts\WrapperJsonContract;

class PackageController extends Controller
{
    use PaginationTrait;

    protected WrapperJsonContract $eUserApiWrapper;

    public function __construct(WrapperJsonClass $eUserApiWrapper)
    {
        $this->eUserApiWrapper = $eUserApiWrapper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listPackageResources()
    {
        try {
            $packages = $this->eUserApiWrapper->getAllPackages()['packages'];
            $prix = [];

            foreach ($packages as $package) {
                $idprod = $package['product_id'];
                $prix[$idprod] = [
                    "name" => $package['product_name'],
                    "idprice" => $package['recurring_intervals']['year']['price_id'],
                    "infdprice" => $package['recurring_intervals']['year']['tiers']
                ];
            }
            return view('abonnement.index', compact('packages', 'prix'));
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', Lang::get("Erreur, recommencer ce procédé plus tard"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendInfosPaymentPage(Request $request)
    {
        $infos = ([
            'langue' => $request->input('langue'),
            'bouquet' => $request->input('bouquet'),
            'prix' => $request->input('prix'),
            'monnais' => $request->input('monnais'),
            'place' => $request->input('place'),
            'price_id' => $request->input('price_id'),

        ]);
        return view('paiement.index', compact('infos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function paiementCardStripe(Request $request): JsonResponse
    {
        $request->validate([
            'product_name' => 'required|string',
            'price_id' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'number' => 'required|string|min:16|max:16',
            'exp_month' => 'required|numeric|min:1|max:12',
            'exp_year' => 'required|numeric|min:1',
            'cvc' => 'required|numeric|min:1',
            'city' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            'postal_code' => 'required|string',
            'state' => 'required|string',
        ]);

        $exp_month = json_decode(stripslashes($request->input('exp_month')));
        $exp_year = json_decode(stripslashes($request->input('exp_year')));
        $cvc = json_decode(stripslashes($request->input('cvc')));
        $quantity = json_decode(stripslashes($request->input('quantity')));

        $number = $request->input('number');
        $city = $request->input('city');
        $country = $request->input('country');
        $phone = $request->input('phone');
        $postal_code = $request->input('postal_code');
        $state = $request->input('state');

        $product_name = $request->input('product_name');
        $price_id =  $request->input('price_id');


        $payment_method = [
            "type" => "card",
            "card" => [
                "number" => $number,
                "exp_month" => $exp_month,
                "exp_year" => $exp_year,
                "cvc" => $cvc
            ]
        ];

        $address = [
            "city" => $city,
            "country" => $country,
            "line1" => $phone,
            "line2" => $phone,
            "postal_code" => $postal_code,
            "state" => $state
        ];

        $token = session('tokens');

        $data = [
            "product_name" => $product_name,
            "price_id" => $price_id,
            "quantity" => $quantity,
            "payment_method" => $payment_method,
            "address" => $address,
        ];

        try {
            $response = $this->eUserApiWrapper->makeSubscriptionPayment($token, $data);
            return response()->json($response);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', Lang::get('Erreur de paiement, recommencer plus tard'));
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSubscriptions(Request $request)
    {
        $token = session('tokens');

        try {
            $user = $this->eUserApiWrapper->currentConnectedUser($token)['user'];
            $response = $this->eUserApiWrapper->getSubscriptions(
                $token,
                $user['id'],
                $request->has('onlySponsored')
            );

            return response()->json($response['data']);
        } catch (\Exception $e) {
            app()->get(Handler::class)->report($e);
            return back()->with('error', $e->getMessage());
        }
    }
}
