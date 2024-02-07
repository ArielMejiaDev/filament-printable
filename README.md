# Package to get your Filament Resources Printable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/arielmejiadev/filament-printable.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/filament-printable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/arielmejiadev/filament-printable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/arielmejiadev/filament-printable/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/arielmejiadev/filament-printable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/arielmejiadev/filament-printable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/arielmejiadev/filament-printable.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/filament-printable)


This package adds a quick and simple way to print and print-as-pdf your Filament resource tables or forms, 
pretty handy to add basic reports (a lot of times it would be enough), it works with a any kind of sort, search, filter or paginated or all data.

## Installation

You can install the package via composer:

```bash
composer require arielmejiadev/filament-printable --dev
```

You can publish and run the stubs:

```bash
php artisan filament-printable:install

// or

php artisan vendor:publish --tag="filament-printable-stubs"
```

## Usage

```php
// Add print button in a filament list header

class ListUsers extends ListRecords
{
    protected function getHeaderActions(): array
    {
        return [
            // ...
            PrintAction::make(),
        ];
    }
}


// Add print button in Filament CreateRecord or EditRecord class

class EditUser extends EditRecord
{
    protected function getHeaderActions(): array
    {
        return [
            // ...
            PrintAction::make(),
        ];
    }
} 


// Add print button as a bulk action

->bulkActions([
    Tables\Actions\BulkActionGroup::make([
        Tables\Actions\DeleteBulkAction::make(),
        PrintBulkAction::make(),
    ]),
]);

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ArielMejiaDev](https://github.com/ArielMejiaDev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
