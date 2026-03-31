<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Infolists;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-envelope';
    protected static string|\UnitEnum|null $navigationGroup = 'Inbox';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Messages';

    public static function getNavigationBadge(): ?string
    {
        $count = ContactMessage::unread()->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\TextInput::make('name')->disabled(),
                Forms\Components\TextInput::make('email')->disabled(),
                Forms\Components\TextInput::make('subject')->disabled()->columnSpanFull(),
                Forms\Components\Textarea::make('message')->disabled()->rows(8)->columnSpanFull(),
            ])->columns(2),
        ]);
    }

    public static function infolist(Schema $infolist): Schema
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Sender')
                ->columns(2)
                ->schema([
                    Infolists\Components\TextEntry::make('name'),
                    Infolists\Components\TextEntry::make('email')
                        ->copyable()
                        ->url(fn ($record) => 'mailto:' . $record->email),
                    Infolists\Components\TextEntry::make('subject')
                        ->columnSpanFull()->placeholder('No subject'),
                    Infolists\Components\TextEntry::make('message')
                        ->columnSpanFull()->prose(),
                ]),
            Infolists\Components\Section::make('Meta')
                ->columns(3)
                ->schema([
                    Infolists\Components\IconEntry::make('is_read')
                        ->label('Status')->boolean()
                        ->trueIcon('heroicon-o-envelope-open')
                        ->falseIcon('heroicon-o-envelope'),
                    Infolists\Components\TextEntry::make('ip_address')->label('IP'),
                    Infolists\Components\TextEntry::make('created_at')->since()->label('Received'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_read')
                    ->label('')->boolean()
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
                    ->trueColor('gray')->falseColor('warning'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('subject')->limit(40)->placeholder('No subject'),
                Tables\Columns\TextColumn::make('message')->limit(60)->color('gray'),
                Tables\Columns\TextColumn::make('created_at')->since()->sortable()->label('Received'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')
                    ->label('Read status')
                    ->trueLabel('Read')->falseLabel('Unread'),
            ])
            ->actions([
                Action::make('mark_read')
                    ->label('Mark read')
                    ->icon('heroicon-o-envelope-open')
                    ->color('success')
                    ->hidden(fn ($record) => $record->is_read)
                    ->action(function ($record) {
                        $record->markAsRead();
                        Notification::make()->title('Marked as read')->success()->send();
                    }),
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('mark_all_read')
                        ->label('Mark as read')
                        ->icon('heroicon-o-envelope-open')
                        ->action(fn ($records) => $records->each->markAsRead())
                        ->deselectRecordsAfterCompletion(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'view'  => Pages\ViewContactMessage::route('/{record}'),
        ];
    }
}