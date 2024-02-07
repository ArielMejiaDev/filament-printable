<?php

namespace ArielMejiaDev\FilamentPrintable\Actions;

use Filament\Tables\Actions\BulkAction;

class PrintBulkAction extends BulkAction
{
    public static function getDefaultName(): ?string
    {
        return 'print';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->color('primary')
            ->label('Print')
            ->icon('heroicon-s-printer')
            ->action(function ($livewire) {
                $livewire->js('window.print()');
            });
    }
}
