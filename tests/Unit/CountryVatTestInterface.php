<?php

namespace Unit;

interface CountryVatTestInterface
{
    public function testLegalPerson(): void;
    public function testExceptionLegalPerson(): void;
    public function testNaturalPerson(): void;
    public function testExceptionNaturalPerson(): void;
}