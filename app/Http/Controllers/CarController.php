<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
Use App\CarInfo;
Use App\CarBrand;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all cars
        $cars       = Car::all();
        $carInfo    = CarInfo::all();
        $carBrand   = CarBrand::all();

        return view('cars.index',
            compact('cars','carInfo','carBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return create form page
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'naam' => 'required',
            'prijs' => 'required|numeric',
            'merk_id' => 'required',
            'brandstof' => 'required',
            'transmissie' => 'required',
            'kleur' => 'required',
            'deuren' => 'required',
            'algemeen_verbruik' => 'required',
            'stad_verbruik' => 'required',
            'co2_verbruik' => 'required',
            'zitplaatsen' => 'required',
            'APK' => 'required',
            'trekgewicht' => 'required',
            'gewicht' => 'required',
            'laadvermogen' => 'required',
            'vermogen' => 'required',
            'topsnelheid' => 'required',
            'bouwjaar' => 'required',
            'kilometerstand' => 'required',
        ]);

        Car::create([
            'naam' => $request->get('naam'),
            'prijs' => $request->get('prijs'),
            'merk_id' => $request->get('merk_id'),
            'brandstof' => $request->get('brandstof'),
            'transmissie' => $request->get('transmissie'),
            'kleur' => $request->get('kleur'),
            'deuren' => $request->get('deuren'),
            'verbruik' => $request->get('algemeen_verbruik'),
            'stadverbruik' => $request->get('stad_verbruik'),
            'coverbruik' => $request->get('co2_verbruik'),
            'APK' => $request->get('APK'),
            'zitplaatsen' => $request->get('zitplaatsen'),
            'trekgewicht' => $request->get('trekgewicht'),
            'gewicht' => $request->get('gewicht'),
            'laadvermogen' => $request->get('laadvermogen'),
            'topsnelheid' => $request->get('topsnelheid'),
            'vermogen' => $request->get('vermogen'),
            'bouwjaar' => $request->get('bouwjaar'),
            'kilometerstand' => $request->get('kilometerstand')
        ]);
        return back()->with('success', 'You have just created one item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get car by ID
        $car        = Car::find($id);
        $carInfo    = CarInfo::find($id);

        return view('cars.show', compact('car','carInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $cars   = Car::all();

        // Search a car based on search values
        if ($request->has('merk_id') && $request->has('transmissie')) {

            if ($request->has('minPrijs') && $request->has('maxPrijs')) {

                $cars = Auto::where([
                    ['merk_id', '=', $request->input('merk_id')],
                    ['transmissie', '=', $request->input('transmissie')],
                    ['prijs', '>', $request->input('minPrijs')],
                    ['prijs', '<', $request->input('maxPrijs')]
                ])->get();
            }

            $cars = Auto::where([
                ['merk_id', '=', $request->input('merk_id')],
                ['transmissie', '=', $request->input('transmissie')]
            ])->get();

            $Gekozen_merk_id = $request->get('merk_id');
            $Gekozen_transmissie = $request->get('transmissie');
            $merk_id = Car::distinct()->pluck('merk_id');
            $brandstof = Car::distinct()->pluck('brandstof');
            $transmissie = Car::distinct()->pluck('transmissie');
            $kleur = Car::distinct()->pluck('kleur');
            return view('voertuigen', compact('cars', 'brandstof',
                'merk_id', 'Gekozen_merk_id', 'Gekozen_transmissie', 'transmissie',
                'brandstof', 'kleur'));
        }
    }
}
