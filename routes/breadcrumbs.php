<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Home > Applications
Breadcrumbs::for('applications', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Заявки', route('applications.index'));
});

// Home > Applications > [Application]
Breadcrumbs::for('application', function (BreadcrumbTrail $trail, $application) {
    $trail->parent('applications');
    $trail->push($application->id, route('applications.show', $application));
});