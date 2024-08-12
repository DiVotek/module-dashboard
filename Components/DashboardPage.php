<?php

namespace Modules\Dashboard\Components;

use App\Models\StaticPage;
use App\View\Components\PageComponent;

class DashboardPage extends PageComponent
{
    public function __construct(StaticPage $entity)
    {
        if (empty($entity->template)) {
            $entity->template = setting(config('settings.dashboard.template'), []);
        }
        $component = setting(config('settings.dashboard.design'), 'Base');
        $component = 'template.' . strtolower(template()) . '.pages.dashboard.' . strtolower($component);

        parent::__construct($entity, $component);
    }
}
