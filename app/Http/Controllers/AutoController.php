<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Auto;

class AutoController extends Controller
{
	public function index()
    {
        $voertuigen     = DB::table('voertuigen')->get();
        $transmissie    = DB::table('voertuigen')->distinct()->pluck('transmissie');
        $merk_id        = DB::table('voertuigen')->distinct()->pluck('merk_id');
        $kleur          = DB::table('voertuig_informatie')->distinct()->pluck('kleur');
        $brandstof      = DB::table('voertuig_informatie')->distinct()->pluck('brandstof');
        $merken         = DB::table('voertuig_merken')->distinct()->pluck('merknaam');
        $voertuig_merk  = DB::table('voertuig_merken')->where('merk_id', '=', $merk_id);

        //return view('show', ['autos' => $autos]);
        return view('occasions', compact('voertuigen', 'voertuig_merk','merk_id','brandstof','transmissie','kleur', 'merken'));
    }

    public function contact()
    {
        $informatie = DB::table('informatie')->get();

        return view('contact', ['informatie' => $informatie]);
    }
    public function specifieke_auto($id)
    {
        $voertuigen     = DB::table('voertuigen')->where('id', '=', $id);
        $bouwjaar       = DB::table('voertuigen')->where('id', '=', $id)->value('bouwjaar');
        $kleur          = DB::table('voertuigen')->where('id', '=', $id)->value('kleur');
        $kilometerstand = DB::table('voertuigen')->where('id', '=', $id)->value('kilometerstand');
        $naam           = DB::table('voertuigen')->where('id', '=', $id)->value('naam');
        $prijs          = DB::table('voertuigen')->where('id', '=', $id)->value('prijs');
        $transmissie    = DB::table('voertuigen')->where('id', '=', $id)->value('transmissie');

        $merk_id           = DB::table('voertuig_informatie')->where('id', '=', $id)->value('merk_id');
        $brandstof      = DB::table('voertuig_informatie')->where('id', '=', $id)->value('brandstof');
        $APK            = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('APK');
        $cilinder_inhoud    = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('cilinder_inhoud');
        $deuren         = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('deuren');
        $gewicht        = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('gewicht');
        $vermogen       = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('vermogen');
        $laadvermogen   = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('laadvermogen');
        $stadsverbruik  = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('stadverbruik');
        $coverbruik     = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('coverbruik');
        $verbruik       = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('verbruik');
        $topsnelheid    = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('topsnelheid');
        $versnellingen    = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('versnellingen');
        $zitplaatsen    = DB::table('voertuig_informatie')->where('auto_id', '=', $id)->value('zitplaatsen');

        //return view('show', ['autos' => $autos]);
        return view('voertuig', compact('voertuigen','naam','merk_id','brandstof','transmissie','kleur','APK','kilometerstand','prijs','bouwjaar','gewicht','deuren','verbruik','stadsverbruik','vermogen',
            'laadvermogen','coverbruik','zitplaatsen','topsnelheid','cilinder_inhoud','versnellingen'));
    }
    // public function voertuig()
    // {
    // 	return view('voertuig');
    // }
    public function indexfilter(Request $request)
    {
        $autos          = DB::table('voertuigen')->get();

    // Search for a user based on their name.
    if ($request->has('merk_id') && $request->has('transmissie')) {
        
        if ($request->has('minPrijs') && $request->has('maxPrijs')) {
            
            $autos = Auto::where([
                ['merk_id',        '=', $request->input('merk_id')],
                ['transmissie', '=', $request->input('transmissie')],
                ['prijs',       '>', $request->input('minPrijs')],
                ['prijs',       '<', $request->input('maxPrijs')]
            ])->get();
        }

        $autos = Auto::where([
                ['merk_id',        '=', $request->input('merk_id')],
                ['transmissie', '=', $request->input('transmissie')]
            ])->get();

        $Gekozen_merk_id   = $request->get('merk_id');
        $Gekozen_transmissie = $request->get('transmissie');
        $merk_id           = DB::table('voertuigen')->distinct()->pluck('merk_id');
        $brandstof      = DB::table('voertuigen')->distinct()->pluck('brandstof');
        $transmissie    = DB::table('voertuigen')->distinct()->pluck('transmissie');
        $kleur          = DB::table('voertuigen')->distinct()->pluck('kleur');
        return view('voertuigen', compact('voertuigen','brandstof', 'merk_id','Gekozen_merk_id', 'Gekozen_transmissie', 'transmissie', 'brandstof','kleur'));
    }
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }
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

        Auto::create([
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
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}