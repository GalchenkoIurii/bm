<?php

use App\Models\Application;
use App\Models\Post;
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
Breadcrumbs::for('application', function (BreadcrumbTrail $trail, Application $application) {
    $trail->parent('applications');
    $trail->push($application->id, route('applications.show', $application));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Блог', route('blog.index'));
});

// Home > Blog > Create
Breadcrumbs::for('blog.create', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Создание поста', route('blog.create'));
});

// Home > Blog > [Post]
Breadcrumbs::for('post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('blog');
    $trail->push($post->title, route('blog.show', $post));
});