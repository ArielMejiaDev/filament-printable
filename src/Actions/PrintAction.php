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
            ->tooltip('Generate a printer-friendly version of this view. (Ctrl+P / Cmd+P)')
            ->icon('heroicon-s-printer')
            ->action(function ($livewire) {
                $livewire->js('
                    window.scrollTo(0, 0);
                    setTimeout(() => {
                        window.print();
                    }, 100);
                ');
            })->keyBindings(['mod+p']);
    }
}
