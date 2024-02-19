<?php

namespace Jbohme\VatValidator\Documents\LegalPerson;

use Jbohme\VatValidator\Documents\DocumentAbstract;

class CNPJ extends DocumentAbstract
{
    /** @var string $localName */
    protected string $localName = "Cadastro Nacional da Pessoa Jurídica";

    /** @var string $abbreviation */
    protected string $abbreviation = "CNPJ";

    /**
     * Validate CNPJ
     * @return bool
     */
    public function isValid(): bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', $this->number);
        if (strlen($cnpj) != 14) {
            return false;
        }
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }
        for ($t = 12; $t < 14; $t++) {
            $d = 0;
            $c = 0;
            $pos = $t - 7;
            for ($i = $t; $i >= 1; $i--) {
                $d += $cnpj[$c] * $pos--;
                if ($pos < 2) {
                    $pos = 9;
                }
                $c++;
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cnpj[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}