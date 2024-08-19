<?php

namespace Modules\Dashboard\Admin\UserResource\Pages;

use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Modules\Dashboard\Admin\UserResource;

class ViewUsers extends ViewRecord
{
    protected static string $resource = UserResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        $general = KeyValueEntry::make('general')
            ->columnSpanFull()
            ->hiddenLabel()
            ->keyLabel(__('General'))
            ->valueLabel(false)
            ->getStateUsing(function ($record) {
                return [
                    __('First name') => $record->firstname,
                    __('Last name') => $record->lastname,
                    __('Email') => $record->email,
                    __('Email verified at') => $record->email_verified_at->format('d.m.Y H:i:s'),
                    __('Created at') => $record->created_at->format('d.m.Y H:i:s'),
                    __('Updated at') => $record->updated_at->format('d.m.Y H:i:s'),
                ];
            });

        $data = [$general];

        if ($infolist->record->details) {
            $details = [];
            foreach ($infolist->record->details as $key => $detail) {
                $details[__($key)] = $detail;
            }
            $details = KeyValueEntry::make('details')
                ->columnSpanFull()
                ->hiddenLabel()
                ->keyLabel(__('Details'))
                ->valueLabel(false)
                ->getStateUsing(function ($details) {
                    return $details;
                });
            $data = array_merge($details, $data);
        }

        if ($infolist->record->details) {
            $socialite = [];
            foreach ($infolist->record->socialite as $key => $social) {
                $socialite[__($key)] = $social;
            }
            $socialite = KeyValueEntry::make('socialite')
                ->columnSpanFull()
                ->hiddenLabel()
                ->keyLabel(__('Socialite'))
                ->valueLabel(false)
                ->getStateUsing(function ($socialite) {
                    return $socialite;
                });
            $data = array_merge($socialite, $data);
        }

        return $infolist
            ->schema([
                Section::make(__('User') . ' ID:' . $infolist->record->id)
                    ->schema($data)->collapsible(),
            ]);
    }
}
