<?php

namespace ArielMejiaDev\FilamentPrintable;

use ArielMejiaDev\FilamentPrintable\Testing\TestsFilamentPrintable;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentPrintableServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-printable';

    public static string $viewNamespace = 'filament-printable';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Filament Resource & Resource List Page Stubs added!');
                    })
                    ->publish('stubs')
                    ->askToStarRepoOnGitHub('arielmejiadev/filament-printable');
            });
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament/{$file->getFilename()}"),
                ], 'filament-printable-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFilamentPrintable());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'filament-printable';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            Css::make('filament-printable-styles', __DIR__ . '/../resources/dist/filament-printable.css'),
        ];
    }
}
