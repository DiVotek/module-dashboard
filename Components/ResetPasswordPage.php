<?php

namespace Modules\Dashboard\Components;

use App\Models\StaticPage;
use App\View\Components\PageComponent;

class ResetPasswordPage extends PageComponent
{
    public function __construct(StaticPage $entity)
    {
        if (empty($entity->template)) {
            $entity->template = setting(config('settings.reset_password.template'), []);
        }
        $component = setting(config('settings.reset_password.design'), 'Base');
        $component = 'template.' . strtolower(template()) . '.pages.reset_password.' . strtolower($component);

        parent::__construct($entity, $component);
    }
}
