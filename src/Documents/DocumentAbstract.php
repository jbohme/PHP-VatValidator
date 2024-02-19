<?php

namespace Jbohme\VatValidator\Documents;

use Jbohme\VatValidator\Exceptions\DocumentInvalidException;

abstract class DocumentAbstract implements DocumentInterface {
    /** @var string $number */
    protected string $number;

    /** @var string $localName */
    protected string $localName;

    /** @var string $abbreviation */
    protected string $abbreviation;

    /**
     * @throws DocumentInvalidException
     */
    public function __construct(
        string $number,
    )
    {
        $this->number = $number;
        if (!$this->isValid()) {
            throw new DocumentInvalidException("The document is not valid");
        }
    }

    /**
     * @return bool
     */
    abstract public function isValid(): bool;

    /**
     * @return string
     */
    public function getDocumentName(): string
    {
        return $this->localName;
    }

    /**
     * @return string
     */
    public function getDocumentAbbreviation(): string
    {
        return $this->abbreviation;
    }
}