<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\VoertuigKenmerk;
use Illuminate\Support\Facades\Schema;

class CMSController extends Controller
{
    public function __construct()
    {
        $this->voertuigen       = Auto::get();
        $id = Route::current()->parameter('id');
        if($id) {
            $this->voertuig     = Auto::find($id);
            $this->merk_id      = Auto::find($id)->value('merk_id');
            $this->naam         = Auto::find($id)->value('naam');
            $this->prijs        = Auto::find($id)->value('prijs');
            $this->deuren       = Auto::find($id)->value('deuren');

            $this->kilometers   = VoertuigInfo::whereVoertuigId($id)->value('kilometers');
            $this->transmissie  = Auto::find($id)->value('transmissie');
            $this->kleur        = VoertuigInfo::whereVoertuigId($id)->value('kleur');
            $this->brandstof    = VoertuigInfo::whereVoertuigId($id)->value('brandstof');

            $this->APK          = VoertuigInfo::whereVoertuigId($id)->value('APK');
            $this->gewicht      = VoertuigInfo::whereVoertuigId($id)->value('gewicht');
            $this->vermogen     = VoertuigInfo::whereVoertuigId($id)->value('vermogen');
            $this->laadvermogen = VoertuigInfo::whereVoertuigId($id)->value('laadvermogen');
            $this->verbruik     = VoertuigInfo::whereVoertuigId($id)->value('verbruik');
            $this->topsnelheid  = VoertuigInfo::whereVoertuigId($id)->value('topsnelheid');
            $this->zitplaatsen  = VoertuigInfo::whereVoertuigId($id)->value('zitplaatsen');
            $this->stadsverbruik    = VoertuigInfo::whereVoertuigId($id)->value('stadverbruik');
            $this->coverbruik       = VoertuigInfo::whereVoertuigId($id)->value('coverbruik');
            $this->cilinder_inhoud  = VoertuigInfo::whereVoertuigId($id)->value('cilinder_inhoud');
            $this->versnellingen    = VoertuigInfo::whereVoertuigId($id)->value('versnellingen');
        }
        $this->kenmerken    = VoertuigKenmerk::get();
        $this->merken       = DB::table('voertuig_merken')->get();
        $this->pages        = DB::table('pages')->get();
        $this->verkochte    = DB::table('verkocht')->get();
    }
	public function index()
    {
        $voertuigen = $this->voertuigen;
        $kenmerken  = $this->kenmerken;
        $merken     = $this->merken;
        $pages      = $this->pages;
        $verkochte  = $this->verkochte;
        $merk_id        = Auto::distinct()->pluck('merk_id');
        $transmissie    = Auto::distinct()->pluck('transmissie');
        $kleur          = DB::table('voertuig_informatie')->distinct()->pluck('kleur');
        $brandstof      = DB::table('voertuig_informatie')->distinct()->pluck('brandstof');

        $pagename   = "Dashboard";
        return view('CMS.home', compact('voertuigen','pagename',
            'kenmerken', 'merken', 'pages', 'verkochte',
            'merk_id','transmissie', 'kleur','brandstof'));
    }
    public function nieuw_voertuig()
    {
        $pagename   = "Voertuig toevoegen";
        $merken     = DB::table('voertuig_merken')->get();
        return view('CMS.nieuwVoertuig', compact('merken', 'pagename'));
    }
    public function nieuw_kenmerk()
    {
        $pagename   = "Kenmerk toevoegen";
        $kenmerken     = VoertuigKenmerk::get();
        return view('CMS.nieuwKenmerk', compact('kenmerken','pagename'));
    }
    public function nieuw_formulier()
    {
        $pagename   = "Formulier toevoegen";
        $formulieren    = DB::table('formulieren')->get();
        return view('CMS.nieuwFormulier', compact('formulieren','pagenae'));
    }
    public function nieuw_page()
    {
        $pagename   = "Page toevoegen";
        $templates  = DB::table('page_template')->get();
        return view('CMS.nieuwPage', compact('templates', 'pagename'));
    }
    public function store(Request $request)
    {
        $bouwdatum      = $request->get('bouwdatum');
        $bouwjaar       = new Carbon($bouwdatum);
        $naam           = $request->get('naam');
        $prijs          = $request->get('prijs');
        $bouwjaar_def   = $bouwjaar->year;
        $transmissie    = $request->get('transmissie');


        $brandstof      = $request->get('brandstof');
        $kleur          = $request->get('kleur');
        $kilometerstand = $request->get('kilometerstand');
        $APK            = $request->get('APK');
        $zitplaatsen    = $request->get('zitplaatsen');
        $deuren         = $request->get('deuren');
        $created_at     = date('Y-m-d');
        $updated_at     = date('Y-m-d');
        $merk_id        = $request->get('merken');

        Auto::insert(
            ['naam' => $naam, 'bouwjaar' => $bouwjaar_def, 'merk_id' => $merk_id,
                'prijs' => $prijs, 'transmissie' => $transmissie,
                'created_at' => $created_at, 'updated_at' => $updated_at]
        );
//        $merknaam   = DB::table('voertuig_merken')->where('merk_id', '=', $merk_id)->value('merknaam');

        DB::table('voertuig_informatie')->insert(
            ['brandstof' => $brandstof, 'kleur' => $kleur,
                'kilometers' => $kilometerstand,
                'APK' => $APK, 'zitplaatsen' => $zitplaatsen, 'deuren' => $deuren,
                'created_at' => $created_at, 'updated_at' => $updated_at]
        );


        return back()->with('gelukt', "Uw bericht is verzonden.");
//        Auto::create($request->all());
    }
    public function store_formulier(Request $request)
    {
        $formuliernaam  = $request->get('naam');
        $actief         = $request->get('actief');
        $created_at     = date('Y-m-d');
        $updated_at     = date('Y-m-d');

        DB::table('formulieren')->insert(
            ['naam' => $formuliernaam, 'actief' => $actief,
                'created_at' => $created_at, 'updated_at' => $updated_at]
        );

        return back()->with('gelukt', "Uw bericht is verzonden.");
    }
    public function store_kenmerk(Request $request)
    {
        $kenmerknaam    = $request->get('naam');
        $waarde         = $request->get('waarde');
        $uitleg         = $request->get('uitleg');

        VoertuigKenmerk::insert(
            ['naam' => $kenmerknaam, 'waarde' => $waarde,
                'uitleg' => $uitleg]
        );

        return back()->with('gelukt', "Uw bericht is verzonden.");
    }
    public function store_page(Request $request)
    {
        $naam_kort      = $request->get('naam');
        $naam_lang      = $request->get('naam_kort');
        $template_id    = $request->get('templates');
        $public         = $request->get('publiek');
        $titel          = $request->get('titel');
        $created_at     = date('Y-m-d');
        $updated_at     = date('Y-m-d');

        if($template_id == 6)
        {
            $has_creator = 1;
        }
        else {
            $has_creator = 0;
        }
        DB::table('pages')->insert(
            ['template_id' => $template_id, 'name' => $naam_lang,
                'single_name' => $naam_kort, 'title' => $titel,
                'has_creator' => $has_creator, 'public' => $public,
                'created_at' => $created_at, 'updated_at' => $updated_at
                ]
        );
        return back()->with('gelukt', "De pagina is toegevoegd.");
    }
    public function alle_voertuigen()
    {
        $pagename   = "Voertuigen";
        $pages      = DB::table('pages')
            ->where('name','=', $pagename)->first();
        $page_template = $pages->template_id;
        $voertuigen = Auto::get();
        return view('CMS.alle_voertuigen', compact('voertuigen','pagename','page_template'));
    }
    public function alle_formulieren()
    {
        $pagename       = "Formulieren";
        $formulieren    = DB::table('formulieren')->get();
        return view('CMS.alle_formulieren', compact('formulieren','pagename'));
    }
    public function alle_pages()
    {
        $templates  = DB::table('page_template')->get();
        $pagename   = "Pages";
        $pages      = DB::table('pages')->get();
        return view('CMS.alle_pages', compact('pages','pagename','templates'));
    }
    public function alle_kenmerken()
    {
        $pagename   = "Kenmerken";
        $count      = VoertuigKenmerk::count();
        $kenmerken  = VoertuigKenmerk::get();
        return view('CMS.alle_kenmerken', compact('count','kenmerken','pagename'));
    }
    public function next_kenmerken($number)
    {
        if(!empty($number) && isset($number))
        {
            if($number == 1) {
            $kenmerken = DB::table('voertuig_kenmerken')
                ->where('kenmerk_id', '>', 10)
                ->get();
            }
            else if($number == 2)
            {
                $kenmerken = DB::table('voertuig_kenmerken')
                    ->where('kenmerk_id', '>', 20)
                    ->get();
            }
            $count = VoertuigKenmerk::count();
            return view('CMS.alle_kenmerken', compact('count','kenmerken','number'));
        }
        $kenmerken  = VoertuigKenmerk::get();
        return view('CMS.alle_kenmerken', compact('kenmerken'));
    }
    public function specifiek_voertuig($id)
    {
        $voertuig       = $this->voertuig;
        $voertuignaam   = $voertuig->naam;
        $bouwjaar   = Auto::find($id)->value('bouwjaar');
        $date       = new Carbon($bouwjaar);
        $bouwdatum  = $date->year;

        $brandstof      = $this->brandstof;
        $kleur          = $this->kleur;
        $transmissie    = $this->transmissie;
        $merk_id        = $this->merk_id;
        $naam           = $this->naam;
        $prijs          = $this->prijs;
        $km_stand       = $this->kilometers;

        $APK        = $this->APK;
        $deuren     = $this->deuren;
        $gewicht    = $this->gewicht;
        $vermogen   = $this->vermogen;
        $laadvermogen   = $this->laadvermogen;
        $stadsverbruik  = $this->stadsverbruik;
        $coverbruik     = $this->coverbruik;
        $verbruik       = $this->verbruik;
        $topsnelheid    = $this->topsnelheid;
        $versnellingen  = $this->versnellingen;
        $zitplaatsen    = $this->zitplaatsen;
        $cilinder_inhoud    = $this->cilinder_inhoud;

        return view('CMS.voertuig', compact('voertuignaam','voertuigen', 'naam',
            'transmissie','kleur','brandstof', 'APK', 'km_stand', 'prijs', 'bouwjaar', 'bouwdatum',
            'deuren', 'verbruik', 'stadsverbruik', 'vermogen', 'laadvermogen', 'coverbruik',
            'topsnelheid', 'cilinder_inhoud', 'zitplaatsen', 'merk_id', 'gewicht', 'versnellingen'));
    }

    public function specifiek_kenmerk($id)
    {
        $kenmerken      = VoertuigKenmerk::where('kenmerk_id', '=', $id)->first();
        $kenmerk_naam       = $kenmerken->kenmerk_naam;
        $kenmerk_uitleg     = $kenmerken->kenmerk_uitleg;
        $kenmerk_standaard  = $kenmerken->kenmerk_standaard;

        //return view('show', ['autos' => $autos]);
        return view('CMS.kenmerk', compact('kenmerken','kenmerk_naam',
            'kenmerk_uitleg', 'kenmerk_standaard'));
    }
    public function delete($id)
    {
        $verwijder_voertuig= Auto::find($id);
        $verwijder_voertuig->delete();
        return back();
    }
    public function new_CMSall($type)
    {
        $cmsAll_info    = DB::table('pages_cms_all')
            ->where('item_type_single','=', $type)
            ->first();
        $tableValues    = $cmsAll_info->table_values;
        $type_long      = $cmsAll_info->item_type_long;
        $type_single    = $cmsAll_info->item_type_single;

        $page       = DB::table('pages')
            ->where('name', '=', $type_long)
            ->first();
        $pagename   = $page->name;
        $type_long_cars = "voertuig_" . $type_long;
        if (Schema::hasTable($type_long)) {
            $getItems   = DB::table($type_long)
                ->get();
            $countItems = count($getItems);
        }
        else if(Schema::hasTable($type_long_cars))
        {
            $getItems   = DB::table($type_long_cars)
                ->get();
            $countItems = count($getItems);
        }
        $merken     = DB::table('voertuig_merken')->get();
        return view('basics.CMS.CMSall_template',
            compact('cmsAll_info','tableValues',
                'merken','pagename','getItems','countItems'));
    }
}