# Package to Print Filament Resources

[![Latest Version on Packagist](https://img.shields.io/packagist/v/arielmejiadev/filament-printable.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/filament-printable)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/arielmejiadev/filament-printable/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/arielmejiadev/filament-printable/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/arielmejiadev/filament-printable/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/arielmejiadev/filament-printable/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/arielmejiadev/filament-printable.svg?style=flat-square)](https://packagist.org/packages/arielmejiadev/filament-printable)


This package adds a quick and simple way to print and print-as-pdf your Filament resource tables or forms, 
pretty handy to add basic reports (a lot of times it would be enough), it works with a any kind of sort, search, filter or paginated or all data.

## Installation

You can install the package via composer:

```bash
composer require arielmejiadev/filament-printable
```

## Stubs

You can publish (not necessary) and run the stubs:

```bash
php artisan filament-printable:install
```

Or

```bash
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
            \ArielMejiaDev\FilamentPrintable\Actions\PrintAction::make(),
        ];
    }
} 


// Add print button as a bulk action

->bulkActions([
    Tables\Actions\BulkActionGroup::make([
        Tables\Actions\DeleteBulkAction::make(),
        \ArielMejiaDev\FilamentPrintable\Actions\PrintBulkAction::make(),
    ]),
]);

```

## Print Filament Tables

By default, `filament-printable` set print styles to make tables look good no matter if table has been:

- Sorted
- Show Search Results
- Show Filter Results
- Show Paginated Results
- Show all results

The styles are easily to customize in `public/css/filament-printable/filament-printable-styles.css`

## Print Filament Forms

By default, Filament adds some flexible grids to form elements, 
if you want to set explicitly specific distribution for elements to print documents.

You can use Filament `Grid` and `Section` elements to distribute elements inside a form:

```php
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make()->schema([
                    Forms\Components\TextInput::make('name'),
                    Forms\Components\TextInput::make('email'),
                ])->columns([
                        'xs' => 1,
                        'sm' => 2,
                    ]),

                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('name'),
                    Forms\Components\TextInput::make('email'),
                    Forms\Components\TextInput::make('second_email'),
                ])->columns([
                        'xs' => 1,
                        'sm' => 3,
                    ]),
            ]);
    }
```

> [!IMPORTANT]
> For Letter and Legal paper sizes the Filament columns `sm` size distribution would be the one used.  

## Customization

Filament Printable includes a css file that you can publish:

```
php artisan vendor:publish --tag="filament-printable-styles"
```

Some css styles to print your resources that most of the time looks awesome, but you can customize your print css to match your requirements, in `resources/css/filament-printable.css`

Here an example to remove some section styles to print:

```css
.fi-section {
    background-color: transparent !important;
    box-shadow: none !important;
}
```

To show the changes in your css file you can run:

```bash
composer update ArielMejiaDev/filament-printable
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
