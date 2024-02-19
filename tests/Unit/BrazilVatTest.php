<?php

namespace Unit;

use Jbohme\VatValidator\Exceptions\CodeNotFoundException;
use Jbohme\VatValidator\Exceptions\DocumentInvalidException;
use PHPUnit\Framework\TestCase;

class BrazilVatTest extends TestCase implements CountryVatTestInterface
{
    /**
     * @return void
     * @throws CodeNotFoundException
     */
    public function testLegalPerson(): void
    {
        $cnpj = legal_person_document('BR', "48.300.733/0001-78");
        $this->assertTrue($cnpj->isValid());
    }

    /**
     * @return void
     * @throws CodeNotFoundException
     */
    public function testExceptionLegalPerson(): void
    {
        $expectException = new DocumentInvalidException('The document is not valid');
        $this->expectExceptionObject($expectException);
        legal_person_document('BR', "any_cnpj");
    }

    /**
     * @return void
     * @throws CodeNotFoundException
     */
    public function testNaturalPerson(): void
    {
        $cpf = natural_person_document('BR', "550.371.510-15");
        $this->assertTrue($cpf->isValid());
    }

    /**
     * @return void
     * @throws CodeNotFoundException
     */
    public function testExceptionNaturalPerson(): void
    {
        $expectException = new DocumentInvalidException('The document is not valid');
        $this->expectExceptionObject($expectException);
        natural_person_document('BR', "any_cpf");
    }
}
