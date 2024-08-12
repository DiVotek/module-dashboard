<?php

namespace Modules\Dashboard\Components;

use App\Models\StaticPage;
use App\View\Components\PageComponent;

class LoginPage extends PageComponent
{
    public function __construct(StaticPage $entity)
    {
        if (empty($entity->template)) {
            $entity->template = setting(config('settings.login.template'), []);
        }
        $component = setting(config('settings.login.design'), 'Base');
        $component = 'template.' . strtolower(template()) . '.pages.login.' . strtolower($component);

        parent::__construct($entity, $component);
    }
}
