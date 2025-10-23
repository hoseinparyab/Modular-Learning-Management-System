<?php

return [
    App\Providers\AppServiceProvider::class,
    Modules\Auth\Providers\AuthServiceProvider::class,
    Modules\Panel\Providers\PanelServiceProvider::class,
    Livewire\LivewireServiceProvider::class,
    Modules\RolePermissions\Providers\RolePermissionsServiceProvider::class,
    Modules\User\Providers\UserServiceProvider::class,
    Modules\Course\Providers\CourseServiceProvider::class,

];
