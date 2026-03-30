<?php

namespace App\Filament\Resources\ContactMessageResource\Pages;

use App\Filament\Resources\ContactMessageResource;
use Filament\Resources\Pages\ViewRecord;

class ViewContactMessage extends ViewRecord
{
    protected static string $resource = ContactMessageResource::class;

    /* Auto mark as read when admin opens the message */
    protected function afterFill(): void
    {
        if (! $this->record->is_read) {
            $this->record->markAsRead();
        }
    }
}
