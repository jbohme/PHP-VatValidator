<?php
namespace Jbohme\VatValidator\Documents;

interface DocumentInterface
{
    public function isValid(): bool;
    public function getDocumentName(): string;
    public function getDocumentAbbreviation(): string;
}