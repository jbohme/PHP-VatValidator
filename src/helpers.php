<?php

use Jbohme\VatValidator\Documents\DocumentAbstract;
use Jbohme\VatValidator\Exceptions\CodeNotFoundException;
use Jbohme\VatValidator\Factories\LegalPersonDocumentFactory;
use Jbohme\VatValidator\Factories\NaturalPersonDocumentFactory;

if (! function_exists('legal_person_document')) {

    /**
     * @param string $countryCode
     * @param string $number
     * @return DocumentAbstract
     * @throws CodeNotFoundException
     */
    function legal_person_document(string $countryCode, string $number): DocumentAbstract
    {
        return (new LegalPersonDocumentFactory())->make($countryCode, $number);
    }
}

if (! function_exists('natural_person_document')) {

    /**
     * @param string $countryCode
     * @param string $number
     * @return DocumentAbstract
     * @throws CodeNotFoundException
     */
    function natural_person_document(string $countryCode, string $number): DocumentAbstract
    {
        return (new NaturalPersonDocumentFactory())->make($countryCode, $number);
    }
}