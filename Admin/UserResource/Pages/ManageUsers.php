<?php

namespace Modules\Dashboard\Admin\UserResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Modules\Dashboard\Admin\UserResource;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;
}
