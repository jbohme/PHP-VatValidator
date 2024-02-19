<?php

namespace Jbohme\VatValidator\Factories;

use Jbohme\VatValidator\Documents\DocumentAbstract;
use Jbohme\VatValidator\Exceptions\CodeNotFoundException;

class NaturalPersonDocumentFactory implements DocumentFactoryInterface
{
    protected array $config;

    /**
     * @param string $countryCode
     * @param string $number
     * @return DocumentAbstract
     * @throws CodeNotFoundException
     */
    public function make(string $countryCode, string $number): DocumentAbstract
    {
        $this->config = require(__DIR__."/../Documents/NaturalPerson/country_mapping.php");
        if (array_key_exists($countryCode, $this->config)) {
            return new $this->config[$countryCode]($number);
        } else {
            throw new CodeNotFoundException("{$countryCode} code not found");
        }
    }
}