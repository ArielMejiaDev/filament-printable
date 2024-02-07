<?php

it('can test print action', function () {

    $action = \ArielMejiaDev\FilamentPrintable\Actions\PrintAction::make();

    $listRecord = new \Filament\Resources\Pages\ListRecords();

    $result = call_user_func($action->getActionFunction(), $listRecord);

    expect($action->getName() === 'print')->toBeTrue()
        ->and($action->getLivewireClickHandler() === "mountAction('print')")->toBeTrue()
        ->and($action->getActionFunction() instanceof Closure)->toBeTrue()
        ->and($result === null)->toBeTrue();
});

it('can test print bulk action', function () {

    $action = \ArielMejiaDev\FilamentPrintable\Actions\PrintBulkAction::make();

    $listRecord = new \Filament\Resources\Pages\ListRecords();

    $result = call_user_func($action->getActionFunction(), $listRecord);

    expect($action->getName() === 'print')->toBeTrue()
        ->and($action->getActionFunction() instanceof Closure)->toBeTrue()
        ->and($result === null)->toBeTrue();
});
