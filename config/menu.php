<?php

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'bi bi-speedometer',
        'route' => 'dashboard',
        'permission' => null,
    ],
    [
        'title' => 'Country',
        'icon'  => 'bi bi-flag',
        'route' => 'country.index',
        'permission' => 'country.view',
    ],
    [
        'title' => 'Visa',
        'icon'  => 'bi bi-card-checklist',
        'route' => 'visa.index',
        'permission' => 'visa.view',
    ],
    [
        'title' => 'Program Types',
        'icon'  => 'bi bi-easel',
        'route' => 'program-types.index',
        'permission' => 'program-type.view',
    ],
    [
        'title' => 'Partner Schools',
        'icon'  => 'bi bi-building',
        'route' => 'partner-school.index',
        'permission' => 'partner-school.view',
    ],
    [
        'title' => 'News',
        'icon'  => 'bi bi-newspaper',
        'route' => 'news.index',
        'permission' => 'news.view',
    ],
    [
        'title' => 'Event',
        'icon'  => 'bi bi-calendar-event',
        'route' => 'event.index',
        'permission' => 'event.view',
    ],
    [
        'title' => 'Req. Partner',
        'icon'  => 'bi bi-database',
        'route' => 'data-partner',
        'permission' => 'data-partner',
    ],
    [
        'title' => 'Req. Journey',
        'icon'  => 'bi bi-database',
        'route' => 'data-journey',
        'permission' => 'data-journey',
    ],
    [
        'title' => 'Sysadmin',
        'icon'  => 'bi bi-gear',
        'permission' => null,
        'submenu' => [
            [
                'title' => 'Category',
                'icon'  => 'bi bi-speedometer',
                'route' => 'categories.index',
                'permission' => 'categories-news-event.view',
            ],
            [
                'title' => 'Tag',
                'icon'  => 'bi bi-speedometer',
                'route' => 'tags.index',
                'permission' => 'tag-news-event.view',
            ],
            [
                'title' => 'Permission',
                'icon'  => 'bi bi-speedometer',
                'route' => 'permissions.index',
                'permission' => 'manage-permission',
            ],
            [
                'title' => 'Roles',
                'icon'  => 'bi bi-gear',
                'route' => 'roles.index',
                'permission' => 'manage-roles',
            ],
            [
                'title' => 'Users',
                'icon'  => 'bi bi-people',
                'route' => 'users.index',
                'permission' => 'users.view',
            ],
        ],
    ],
];
