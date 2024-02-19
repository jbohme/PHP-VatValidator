# PHP - VAT Validator
A PHP package to validate VAT numbers for all countries.

Support for:

| Country | Code(ISO 3166-1 alpha-2) | Natural Person | Legal Person |
|---------|--------------------------|----------------|--------------|
| Brazil  | BR                       | CPF            | CNPJ         |

## Installation
Run in your project:

```bash
composer require jbohme/vat-validator
```

## Usage

Simply use the helper functions for natural or legal persons. Pass the desired country code as the first parameter and then the document string.

```php
<?php

$cnpj = legal_person_document('BR', "48.300.733/0001-78");
// or
$cpf = natural_person_document('BR', "550.371.510-15");
```

If the document is invalid, the DocumentInvalidException exception will be thrown; otherwise, the object is created.

## Contribution

If you want to contribute with a document, pay attention to:
- Create the class in _src/Documents/LegalPerson_ and/or _src/Documents/NaturalPerson_;
- Extend **DocumentAbstract**;
- Implement the logic in the **isValid** function;
- Map the class in **country_mapping.php**;
- Create the test following the pattern **{CountryName}VatTest.php** and implement the **CountryVatTestInterface** interface.

After making the changes, do the following:
1. Fork the project;
2. Create a branch for your modification (`git checkout -b feature/new-feature`);
3. Commit your changes (`git commit -am 'Add new feature'`);
4. Push to the branch (`git push origin feature/new-feature`);
5. Open a pull request.

## License

The Vat Validator is open-source software licensed under the MIT license.
