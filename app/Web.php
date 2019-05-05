<?php

namespace App;

use DB;
//use App\General;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    public function scopeContact()
    {
        $general    = DB::table('general')->get();
        $companyName    = $general->where('name', 'company_name')->first();
        $companyAddress = $general->where('name', 'company_address')->first();
        $companyZipcode = $general->where('name', 'company_zipcode')->first();
        $companyCity    = $general->where('name', 'company_city')->first();
        $developerName  = $general->where('name', 'developer_name')->first();
//        $companyName    = $general->where('name', 'company_name')->first();

        $companyInfo    =
            array('Name' => $companyName,'Adress' => $companyAddress,
                'Zipcode' => $companyZipcode, 'City' => $companyCity);
        $fullCompany    = array();
//        foreach($general as $k => $v)
//        {
//            $fullCompany[] = $v;
//        }

//        print_r($companyInfo);
//        echo "<br/>";
        foreach ($general as $datas) {
            $dataname   = $datas->name;
            $datavalue  = $datas->value;

            $fullCompany[] = array('name' => $dataname, 'value' => $datavalue);
        };
        foreach($fullCompany as $obj)
        {
            echo $obj['name'] . $obj['value'];
            echo "<br/>";
        }
        return $fullCompany;
    }
}
