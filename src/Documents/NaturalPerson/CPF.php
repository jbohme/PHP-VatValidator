<?php

namespace Jbohme\VatValidator\Documents\NaturalPerson;

use Jbohme\VatValidator\Documents\DocumentAbstract;

class CPF extends DocumentAbstract
{
    /** @var string $localName */
    protected string $localName = "Cadastro de Pessoa Física";

    /** @var string $abbreviation */
    protected string $abbreviation = "CPF";

    /**
     * Validate CPF
     * @return bool
     */
    public function isValid(): bool
    {
        $cpf = preg_replace('/[^0-9]/', '', $this->number);
        if (strlen($cpf) != 11) {
            return false;
        }
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}