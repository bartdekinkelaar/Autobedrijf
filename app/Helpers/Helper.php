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
//        }
//        else {
//            $pageinformatie = $pagename;
//            return $pageinformatie;
//        }
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