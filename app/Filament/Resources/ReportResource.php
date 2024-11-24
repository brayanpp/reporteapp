<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            TextInput::make('title')->required(),
            Textarea::make('description')->required(),
            TextInput::make('location')->required(),
            TextInput::make('latitude')->numeric()->required(),
            TextInput::make('longitude')->numeric()->required(),
            Select::make('priority')
                ->options([
                    'low' => 'Baja',
                    'medium' => 'Media',
                    'high' => 'Alta',
                ])->required(),
            TextInput::make('type')->required(),
            FileUpload::make('photo_path'),
            Select::make('status')
                ->options([
                    'pending' => 'Pendiente',
                    'in_progress' => 'En progreso',
                    'resolved' => 'Resuelto',
                ])->default('pending'),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Título')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('location')->label('Ubicación')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('priority')
                    ->label('Prioridad')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'low' => 'Baja',
                            'medium' => 'Media',
                            'high' => 'Alta',
                            default => $state,
                        };
                    }),
                Tables\Columns\TextColumn::make('type')->label('Tipo')->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'pending' => 'Pendiente',
                            'in_progress' => 'En progreso',
                            'resolved' => 'Resuelto',
                            default => $state,
                        };
                    }),
            ])
            ->filters([])
            ->actions([
                // Acción para cambiar de "Pendiente" a "En progreso"
                Tables\Actions\Action::make('markInProgress')
                    ->label('En progreso')
                    ->icon('heroicon-o-arrow-right')
                    ->color('warning')
                    ->visible(fn ($record) => $record->status === 'pending') // Mostrar solo si está pendiente
                    ->action(function ($record) {
                        $record->update(['status' => 'in_progress']);
                    }),

                // Acción para cambiar de "En progreso" a "Resuelto"
                Tables\Actions\Action::make('markResolved')
                    ->label('Resuelto')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'in_progress') // Mostrar solo si está en progreso
                    ->action(function ($record) {
                        $record->update(['status' => 'resolved']);
                    }),

                // Otras acciones, como la de ver detalles
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
        ];
    }
}
