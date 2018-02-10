<?php
/*****************单位管理*****************/
Route::group(['prefix' => 'department','middleware'=>'web'], function () {
    Route::get('/', 'DepCrudController@getIndex')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.index');
    Route::get('indexJson', 'DepCrudController@indexJson')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.indexJson');
    Route::get('add', 'DepCrudController@getAdd')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.add');
    Route::post('add', 'DepCrudController@postAdd')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.add.post');
    Route::get('edit/{id}', 'DepCrudController@getEdit')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.edit');
    Route::post('edit', 'DepCrudController@postEdit')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.edit.post');
    Route::post('sort/save', 'DepCrudController@doSaveSortId')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.saveSort');
    Route::post('del/{id}', 'DepCrudController@del')->name(config('ddvue.depcrud.route_name_prefix', 'Crud.Dep') . '.del');
});