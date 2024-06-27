<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WrapperJsonClass;
use Illuminate\Support\Facades\Lang;
use App\Services\Contracts\WrapperJsonContract;

class PriceController extends Controller
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

    public function retriveAllPrices()
    {
        $token = session()->get('tokens');
        $price = $this->eUserApiWrapper->getPrice($token);
        return view('price.listeprice', compact('price'));
    }

    public function storePrice(Request $request)
    {
        $request->validate([
            'language' => 'required|string',
            'currency' => 'required|string',
            'unit_amount' => 'required|int',
            'recurring_interval' => 'required|int'
        ]);

        $data = [
            'language' => $request->input('language'),
            'currency' => $request->input('currency'),
            'unit_amount' => $request->input('unit_amount'),
            'recurring_interval' => $request->input('recurring_interval')
        ];

        $token = session()->get('tokens');

        $this->eUserApiWrapper->createPrice($data, $token);

        return back()->with('message', Lang::get('créer avec succes'));
    }

    public function update(Request $request, $id_price)
    {
        $request->validate([
            'language' => 'something|string',
            'currency' => 'something|string',
            'unit_amount' => 'something|int',
            'recurring_interval' => 'something|int'
        ]);

        $data = array_filter([
            'language' => $request->input('language'),
            'currency' => $request->input('currency'),
            'unit_amount' => $request->input('unit_amount'),
            'recurring_interval' => $request->input('recurring_interval')
        ]);

        $token = session()->get('tokens');

        $this->eUserApiWrapper->updatePrice($id_price, $data, $token);

        return back()->with('message', Lang::get('mise à jour avec succes'));
    }

    public function destroyPrice($id_price)
    {
        $token = session()->get('tokens');

        $this->eUserApiWrapper->deletePrice($id_price, $token);

        return back()->with('message', Lang::get('Supprimé avec succes'));
    }
}
