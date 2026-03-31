<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';
    protected static string|\UnitEnum|null $navigationGroup = 'Portfolio';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Forms\Components\Section::make('Job Details')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('job_title')
                        ->required()->maxLength(200)->columnSpanFull(),
                    Forms\Components\TextInput::make('company')
                        ->required()->maxLength(200),
                    Forms\Components\TextInput::make('period')
                        ->required()->maxLength(100)->placeholder('March 2026 — Present'),
                    Forms\Components\Toggle::make('is_current')
                        ->label('Currently working here')->default(false),
                    Forms\Components\TextInput::make('sort_order')
                        ->numeric()->default(0)->helperText('Lower = appears first'),
                    Forms\Components\Toggle::make('is_active')->default(true),
                ]),
            Forms\Components\Section::make('Description')
                ->schema([
                    Forms\Components\Textarea::make('description')
                        ->required()->rows(4)->columnSpanFull(),
                    Forms\Components\Repeater::make('highlights')
                        ->label('Bullet Points')
                        ->schema([
                            Forms\Components\TextInput::make('item')
                                ->required()->placeholder('Architected inventory management module...'),
                        ])
                        ->addActionLabel('Add bullet point')
                        ->reorderable()->collapsible()->columnSpanFull(),
                    Forms\Components\TagsInput::make('badges')
                        ->label('Tech Badges')
                        ->placeholder('Add technology...')
                        ->helperText('Press Enter after each tag — e.g. Laravel 12, Redis, MariaDB')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job_title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('company')->searchable()->badge()->color('success'),
                Tables\Columns\TextColumn::make('period')->color('gray'),
                Tables\Columns\IconColumn::make('is_current')->label('Current')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->label('Order')->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Active'),
                Tables\Columns\TextColumn::make('updated_at')->since()->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit'   => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}