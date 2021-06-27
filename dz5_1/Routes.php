<?php

Route::get('index.php', function () {
    IndexController::CreateView('IndexView');
});

Route::get('departments', [DepartmentController::class, 'index']);
Route::get('departments_create', [DepartmentController::class, 'create']);
Route::get('departments_edit', [DepartmentController::class, 'edit']);

Route::post('departments', [DepartmentController::class, 'store']);

Route::put('departments_update', [DepartmentController::class, 'update']);

Route::delete('departments_delete', [DepartmentController::class, 'delete']);

Route::get('titles', [TitleController::class, 'index']);
Route::get('titles_create', [TitleController::class, 'create']);
Route::get('titles_edit', [TitleController::class, 'edit']);

Route::post('titles', [TitleController::class, 'store']);

Route::put('titles_update', [TitleController::class, 'update']);

Route::delete('titles_delete', [TitleController::class, 'delete']);

Route::get('professors', [ProfessorController::class, 'index']);
Route::get('professors_create', [ProfessorController::class, 'create']);
Route::get('professors_edit', [ProfessorController::class, 'edit']);

Route::post('professors', [ProfessorController::class, 'store']);

Route::put('professors_update', [ProfessorController::class, 'update']);

Route::delete('professors_delete', [ProfessorController::class, 'delete']);


