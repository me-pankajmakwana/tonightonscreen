<?php

namespace App\Filament\Resources\ProductionCompanies;

use App\Filament\Resources\ProductionCompanies\Pages\CreateProductionCompany;
use App\Filament\Resources\ProductionCompanies\Pages\EditProductionCompany;
use App\Filament\Resources\ProductionCompanies\Pages\ListProductionCompanies;
use App\Filament\Resources\ProductionCompanies\Schemas\ProductionCompanyForm;
use App\Filament\Resources\ProductionCompanies\Tables\ProductionCompaniesTable;
use App\Models\ProductionCompany;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProductionCompanyResource extends Resource
{
    protected static ?string $model = ProductionCompany::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static string|UnitEnum|null $navigationGroup = 'Taxonomies & Meta';

    protected static ?string $navigationLabel = 'Studios & Companies';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ProductionCompanyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductionCompaniesTable::configure($table);
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
            'index' => ListProductionCompanies::route('/'),
            'create' => CreateProductionCompany::route('/create'),
            'edit' => EditProductionCompany::route('/{record}/edit'),
        ];
    }
}
