<?php

namespace Jbohme\VatValidator\Factories;

use Jbohme\VatValidator\Documents\DocumentAbstract;

interface DocumentFactoryInterface
{
    /**
     * @param string $countryCode
     * @param string $number
     * @return DocumentAbstract
     */
    public function make(string $countryCode, string $number): DocumentAbstract;
}