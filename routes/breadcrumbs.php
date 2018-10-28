<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Inicio', route('home'));
});

Breadcrumbs::for('add-tramite', function ($trail) {
    $trail->parent('home');
    $trail->push('Nuevo trámite', route('categories.create'));
});

Breadcrumbs::for('edit-tramite', function ($trail, $e) {
    $trail->parent('home');
    $trail->push('Editar trámite', route('categories.edit', $e));
});

Breadcrumbs::for('add-contenido', function ($trail, $e) {
    $trail->parent('home');
    $trail->push('Agregar contenido: '.$e->name, route('article.create', $e->id));
});

Breadcrumbs::for('show-contenido', function ($trail, $e) {
    $trail->parent('home');
    $trail->push('Mostrar contenido: '.$e->Category->name, route('article.show', $e->id));
});

Breadcrumbs::for('edit-contenido', function ($trail, $e) {
    $trail->parent('home');
    $trail->push('Editar contenido: '.$e->Category->name, route('article.show', $e->id));
});

Breadcrumbs::for('admin', function ($trail) {
    $trail->push('Administradores', route('admin.index'));
});

Breadcrumbs::for('add-admin', function ($trail) {
    $trail->parent('admin');
    $trail->push('Nuevo administrador', route('admin.create'));
});
Breadcrumbs::for('edit-admin', function ($trail, $e) {
    $trail->parent('admin');
    $trail->push('Editar administrador: '.$e->email, route('admin.edit', $e->id));
});