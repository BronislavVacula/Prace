<?php
class Firmy
{
    function StahniAresXML($url, $data)
    {
        $data = file_get_contents("http://wwwinfo.mfcr.cz/cgi-bin/ares{$url}{$data}");

        if ($data) return simplexml_load_string($data);
        return null;
    }

    function ICOElementNaObjekt($xml_element)
    {
        return [
            "ico" => $xml_element->ICO,
            "dic" => $xml_element->DIC,
            "nazev" => $xml_element->OF,
            "vznik" => $xml_element->DV,
            "adresa" => $xml_element->AD->UC,
            "mesto" => $xml_element->AD->PB
        ];
    }

    function JmenoElementNaObjekt($xml_element)
    {
        return [
            'ico' => (string) $xml_element->ico,
            'dic' => '',
            'nazev' => (string) $xml_element->ojm,
            'vznik' => '',
            'adresa' => (string) $xml_element->jmn,
            'mesto' => ''
        ];
    }

    function PodleICO($ico)
    {
        $xml = $this->StahniAresXML("/darv_bas.cgi?ico=", $ico);
        if(!$xml) return false;

        $ns = $xml->getDocNamespaces();
        $data = $xml->children($ns['are']);

        $vysledek = $data->children($ns['D'])->VBAS;

        return $this->ICOElementNaObjekt($vysledek);
    }

    function PodleNazvu($nazev_firmy)
    {
        $xml = $this->StahniAresXML("/ares_es.cgi?obch_jm=", $nazev_firmy);
        if(!$xml) return false;

        $ns = $xml->getDocNamespaces();
        $data = $xml->children($ns['are']);

        $polozky = $data->children($ns['dtt'])->V->S;
        if($polozky == null) return null;

        $vysledek = [];

        foreach($polozky as $polozka)
            $vysledek[] = $this->JmenoElementNaObjekt($polozka);

        return $vysledek;
    }
};
