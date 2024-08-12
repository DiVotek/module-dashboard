<?php

namespace Modules\Dashboard\Components;

use App\Models\StaticPage;
use App\View\Components\PageComponent;

class RegisterPage extends PageComponent
{
    public function __construct(StaticPage $entity)
    {
        if (empty($entity->template)) {
            $entity->template = setting(config('settings.register.template'), []);
        }
        $component = setting(config('settings.register.design'), 'Base');
        $component = 'template.' . strtolower(template()) . '.pages.register.' . strtolower($component);

        parent::__construct($entity, $component);
    }
}
