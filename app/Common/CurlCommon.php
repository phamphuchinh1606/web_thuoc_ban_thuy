<?php

namespace App\Common;

use Storage;
use Curl;

class CurlCommon{

    public static function curl_get_page_to_dom_xpath($url){
        $response = Curl::to($url)->withTimeout(300)->get();
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $internalErrors = libxml_use_internal_errors(true);
        $dom->loadHTML($response);
        $finder = new \DOMXPath($dom);
        return $finder;
    }

    public static function innerHTML(\DOMElement $element)
    {
        $doc = $element->ownerDocument;

        $html = '';

        foreach ($element->childNodes as $node) {
            $html .= $doc->saveHTML($node);
        }

        return $html;
    }

}
