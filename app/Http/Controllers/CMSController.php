<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\CarFeature;
use App\Car;
Use App\CarInfo;
Use App\CarBrand;
use Illuminate\Support\Facades\Schema;

class CMSController extends Controller
{
    public function __construct()
    {
        $this->voertuigen       = Car::get();
        $id = Route::current()->parameter('id');
        if($id) {
            $this->car      = Car::find($id);
            $this->carInfo  = CarInfo::find($id);
        }

        $this->cars         = Car::all();
        $this->carInfo      = CarInfo::all();
        $this->features     = CarFeature::all();
        $this->brands       = CarBrand::all();
        $this->pages        = DB::table('pages')->get();
        $this->verkochte    = DB::table('verkocht')->get();
    }
	public function index()
    {
        $cars       = $this->cars;
        $features   = $this->features;
        $brands     = $this->brands;
        $pages      = $this->pages;
        $verkochte  = $this->verkochte;
        $brand_id       = Car::distinct()->pluck('brand_id');
        $transmission   = Car::distinct()->pluck('transmission');
        $color          = CarInfo::distinct()->pluck('color');
        $fuel           = CarInfo::distinct()->pluck('fuel');

        $pagename   = "Dashboard";
        return view('CMS.index', compact('cars','pagename',
            'features', 'brands', 'pages', 'verkochte',
            'brand_id','transmission', 'color','fuel'));
    }
    public function newCar()
    {
        $pagename   = "Create car";
        $merken     = CarBrand::get();
        return view('CMS.newCar', compact('merken', 'pagename'));
    }
    public function newFeature()
    {
        $pagename   = "Create feature";
        $features     = CarFeature::get();
        return view('CMS.newFeature', compact('features','pagename'));
    }
    public function newForm()
    {
        $pagename   = "Create form";
        $formulieren    = DB::table('formulieren')->get();
        return view('CMS.newForm', compact('formulieren','pagename'));
    }
    public function newPage()
    {
        $pagename   = "Create page";
        $templates  = DB::table('page_template')->get();
        return view('CMS.newPage', compact('templates', 'pagename'));
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

        Car::insert(
            ['naam' => $naam, 'bouwjaar' => $bouwjaar_def, 'merk_id' => $merk_id,
                'prijs' => $prijs, 'transmissie' => $transmissie,
                'created_at' => $created_at, 'updated_at' => $updated_at]
        );
//        $merknaam   = CarBrand::where('merk_id', '=', $merk_id)->value('merknaam');

        CarInfo::insert(
            ['brandstof' => $brandstof, 'kleur' => $kleur,
                'kilometers' => $kilometerstand,
                'APK' => $APK, 'zitplaatsen' => $zitplaatsen, 'deuren' => $deuren,
                'created_at' => $created_at, 'updated_at' => $updated_at]
        );


        return back()->with('gelukt', "Uw bericht is verzonden.");
//        Car::create($request->all());
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

        CarFeature::insert(
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
    public function allCars()
    {
        $pagename   = "Cars";
        $pages      = DB::table('pages')
            ->where('name','=', $pagename)->first();
        $page_template = $pages->template_id;
        $cars       = Car::all();
        $carBrands  = CarBrand::all();
        return view('CMS.allCars', compact('cars','carBrands','pagename','page_template'));
    }
    public function allForms()
    {
        $pagename       = "Forms";
        $formulieren    = DB::table('formulieren')->get();
        return view('CMS.allForms', compact('formulieren','pagename'));
    }
    public function allPages()
    {
        $templates  = DB::table('page_template')->get();
        $pagename   = "Pages";
        $pages      = DB::table('pages')->get();
        return view('CMS.allPages', compact('pages','pagename','templates'));
    }
    public function allFeatures()
    {
        $pagename   = "Features";
        $count      = CarFeature::count();
        $features   = CarFeature::get();
        return view('CMS.allFeatures', compact('count','features','pagename'));
    }
    public function next_kenmerken($number)
    {
        if(!empty($number) && isset($number))
        {
            if($number == 1) {
            $features   = CarFeature::where('kenmerk_id', '>', 10)->get();
            }
            else if($number == 2)
            {
                $features   = CarFeature::where('kenmerk_id', '>', 20)->get();
            }
            $count = CarFeature::count();
            return view('CMS.allFeatures', compact('count','features','number'));
        }
        $features  = CarFeature::get();
        return view('CMS.allFeatures', compact('features'));
    }
    public function getCar($id)
    {
        $carBrands  = CarBrand::all();
        $car        = $this->car;
        $carInfo    = CarInfo::find($id);
        $bouwjaar   = Car::find($id)->value('year');
        $build_date = Carbon::createFromFormat('Y', $bouwjaar);
//        $build_date = date(strtotime('Y', $date));

        return view('CMS.getCar', compact('carBrands','car','build_date','carInfo'));
    }

    public function feature($id)
    {
        $feature            = CarFeature::where('kenmerk_id', '=', $id)->first();
        $feature_naam       = $feature->kenmerk_naam;
        $feature_uitleg     = $feature->kenmerk_uitleg;
        $feature_standaard  = $feature->kenmerk_standaard;

        //return view('show', ['Cars' => $Cars]);
        return view('CMS.getFeature', compact('feature','feature_naam',
            'feature_uitleg', 'feature_standaard'));
    }
    public function delete($id)
    {
        $verwijder_voertuig= Car::find($id);
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
        $merken     = CarBrand::get();
        return view('basics.CMS.CMSall_template',
            compact('cmsAll_info','tableValues',
                'merken','pagename','getItems','countItems'));
    }
}