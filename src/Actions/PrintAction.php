<?php

namespace ArielMejiaDev\FilamentPrintable\Actions;

use Filament\Actions\Action;

class PrintAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'print';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->button()
            ->color('primary')
            ->outlined()
            ->label('Print')
            ->icon('heroicon-s-printer')
            ->action(function ($livewire) {
                $livewire->js('window.print()');
            });
    }
}
