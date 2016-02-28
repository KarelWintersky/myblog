<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{   $breadcrumbs->push('Главная', route('home'));
});

// Home > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{   $breadcrumbs->parent('home');
    $breadcrumbs->push($category->name, route('category', $category->name));
});

// Home > [Category] > [Article]
Breadcrumbs::register('article', function($breadcrumbs, $article)
{   $breadcrumbs->parent('category', $article->category);
    $breadcrumbs->push($article->title, route('article', $article->curl));
});

// Home > [Tag]
Breadcrumbs::register('tag', function($breadcrumbs, $tag)
{   $breadcrumbs->parent('home');
    $breadcrumbs->push($tag->name, route('tag', $tag->name));
});