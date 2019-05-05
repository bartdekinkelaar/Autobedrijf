<?php
if(!function_exists('get_transmissie')) {
    function get_transmissie()
    {
        $transmissies = array(
            '0' => 'Handgeschakeld',
            '1' => 'Automaat'
        );

        return $transmissies;
    }
}

if (!function_exists('get_page_info')) {
    function get_page_info($pagename)
    {
        $pageInfo = DB::table('pages')
            ->where('name', '=', $pagename)
            ->first();
//        if(isset($pageInfo) && !empty($pageInfo))
//        {
            $pageinformatie = array (
                'title' => $pageInfo->title,
                'name'  => $pageInfo->name,
                'public'    => $pageInfo->public,
                'single'    => $pageInfo->single_name,
                'template_id'   => $pageInfo->template_id,
                'page_id'       => $pageInfo->page_id,
                'has_creator'   => $pageInfo->has_creator,
            );
            return $pageinformatie;
    }
}

if (!function_exists('get_general_info')) {
    function get_general_info()
    {
        $generals   = DB::table('general')->get();
        $siteName   = $generals->where('name', 'site_name')->first();
        $siteSubname        = $generals->where('name', 'site_name')->first();
        $siteDeveloped      = $generals->where('name', 'site_developed')->first();
        $developerName      = $generals->where('name', 'developer_name')->first();
        $developerCompany   = $generals->where('name', 'developer_company')->first();
//        $name   = $generals->where('name', 'company_name')->first();
        $name   = $generals->where('name', 'company_name')->first();
        $address   = $generals->where('name', 'company_address')->first();
        $zipcode   = $generals->where('name', 'company_zipcode')->first();
        $city   = $generals->where('name', 'company_city')->first();
        $email  = $generals->where('name', 'company_email')->first();
        $phone  = $generals->where('name', 'company_phone')->first();
        $generalInfo = array (
            'siteName'      => $siteName->value,
            'siteSubname'   => $siteSubname->value,
            'siteDeveloped'     => $siteDeveloped->value,
            'developerName'     => $developerName->value,
            'developerCompany'  => $developerCompany->value,
            'companyName'       => $name->value,
            'companyAddress'    => $address->value,
            'companyZipcode'    => $zipcode->value,
            'companyCity'       => $city->value,
            'companyEmail'      => $email->value,
            'companyPhone'      => $phone->value,
        );
        return $generalInfo;
    }
}

//if (!function_exists('in_arrayi')) {
//
//    /**
//     * Checks if a value exists in an array in a case-insensitive manner
//     *
//     * @param mixed $needle
//     * The searched value
//     *
//     * @param $haystack
//     * The array
//     *
//     * @param bool $strict [optional]
//     * If set to true type of needle will also be matched
//     *
//     * @return bool true if needle is found in the array,
//     * false otherwise
//     */
//    function in_arrayi($needle, $haystack, $strict = false)
//    {
//        return in_array(strtolower($needle), array_map('strtolower', $haystack), $strict);
//    }
//}
?>