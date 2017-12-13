<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','Auth\LoginController@showLoginForm');
Route::get('/login',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);
Route::post('/login',['as'=>'login.verify','uses'=>'Auth\LoginController@login']);
Route::get('/logout',['as'=>'logout','uses'=>'Auth\LoginController@logout']);

Route::group(['prefix' => 'home','middleware' => 'auth'],function(){

    /* Home ----------------------------------------------------------------------------------------------------------------- */
    /* Dashboard -------------------------------------------------------------------------------------------------------- */
    Route::get('/dashboard',['as'=>'home','uses'=>'Home\HomeController@getIndex','middleware'=>'permission:read-dashboard']);
    /* Notifications ---------------------------------------------------------------------------------------------------- */
    Route::get('/notifications', ['as'=>'notifications','uses'=>'Home\NotificationController@getIndex','middleware'=>'permission:read-notifications']);
    Route::get('/notifications/list', ['as'=>'notifications.list','uses'=>'Home\NotificationController@getList','middleware'=>'permission:read-notifications']);
    /* Activities ------------------------------------------------------------------------------------------------------- */
    Route::get('/activities', ['as'=>'activities','uses'=>'Home\ActivityController@getIndex','middleware'=>'permission:read-activities']);
    Route::get('/activities/list', ['as'=>'activities.list','uses'=>'Home\ActivityController@getList','middleware'=>'permission:read-activities']);
});

Route::group(['prefix' => 'master','middleware' => 'auth'],function(){
    /* Master ------------------------------------------------------------------------------------------------------------- */
    /* Organizations -------------------------------------------------------------------------------------------------- */
    Route::get('/organizations', ['as'=>'organization','uses'=>'\Bantenprov\LaravelOpd\Http\Controllers\LaravelOpdController@index','middleware'=>'permission:read-organizations']);
    Route::get('/organizations/list', ['as'=>'organization.list','uses'=>'\Bantenprov\LaravelOpd\Http\Controllers\LaravelOpdController@getList','middleware'=>'permission:read-organizations']);
    Route::get('/organizations/create', ['as'=>'organization.create','uses'=>'\Bantenprov\LaravelOpd\Http\Controllers\LaravelOpdController@createRoot','middleware'=>'permission:create-organizations']);
    Route::post('/organizations/create', ['as'=>'organization.create.save','uses'=>'\Bantenprov\LaravelOpd\Http\Controllers\LaravelOpdController@storeRoot','middleware'=>'permission:create-organizations']);
    Route::get('/organizations/add/child/{id}', ['as'=>'organization.child.add','uses'=>'\Bantenprov\LaravelOpd\Http\Controllers\LaravelOpdController@addChild','middleware'=>'permission:update-organizations']);
    Route::post('/organizations/add/child/{id}', ['as'=>'organization.child.add.save','uses'=>'\Bantenprov\LaravelOpd\Http\Controllers\LaravelOpdController@storeChild','middleware'=>'permission:update-organizations']);
    /* Groups -------------------------------------------------------------------------------------------------- */
    Route::get('/groups', ['as'=>'group','uses'=>'Group\GroupController@getIndex','middleware'=>'permission:read-groups']);
    Route::get('/groups/list', ['as'=>'group.list','uses'=>'Group\GroupController@getList','middleware'=>'permission:read-groups']);
    Route::get('/groups/detail/{id}', ['as'=>'group.detail','uses'=>'Group\GroupController@detailGroup','middleware'=>'permission:read-groups']);
    Route::get('/groups/create', ['as'=>'group.create','uses'=>'Group\GroupController@createGroup','middleware'=>'permission:create-groups']);
    Route::post('/groups/create', ['as'=>'group.create.save','uses'=>'Group\GroupController@getIndex','middleware'=>'permission:create-groups']);
    Route::get('/groups/update/{id}', ['as'=>'group.update','uses'=>'Group\GroupController@updateGroup','middleware'=>'permission:update-groups']);
    Route::post('/groups/update/{id}', ['as'=>'group.update.save','uses'=>'Group\GroupController@getIndex','middleware'=>'permission:update-groups']);
    Route::post('/groups/delete/{id}', ['as'=>'group.delete','uses'=>'Group\GroupController@getIndex','middleware'=>'permission:delete-groups']);
    Route::post('/groups/activate/{id}', ['as'=>'group.activate','uses'=>'Group\GroupController@getIndex','middleware'=>'permission:update-groups']);
    Route::post('/groups/unactivate/{id}', ['as'=>'group.unactivate','uses'=>'Group\GroupController@getIndex','middleware'=>'permission:delete-groups']);
});

Route::group(['middleware' => 'auth'],function(){
    /* Dataset ----------------------------------------------------------------------------------------------------------- */
    Route::get('/dataset', ['as'=>'dataset','uses'=>'Dataset\DatasetController@getIndex','middleware'=>'permission:read-datasets']);
    Route::get('/dataset/list/public', ['as'=>'dataset.list.public','uses'=>'Dataset\DatasetController@getListPublic','middleware'=>'permission:read-datasets']);
    Route::get('/dataset/list/private', ['as'=>'dataset.list.private','uses'=>'Dataset\DatasetController@getListPrivate','middleware'=>'permission:read-datasets']);
    Route::get('/dataset/detail/{id}', ['as'=>'dataset.detail','uses'=>'Dataset\DatasetController@detailDataset','middleware'=>'permission:read-datasets']);
    Route::get('/dataset/create', ['as'=>'dataset.create','uses'=>'Dataset\DatasetController@createDataset','middleware'=>'permission:create-datasets']);
    Route::post('/dataset/create', ['as'=>'dataset.create.save','uses'=>'Dataset\DatasetController@getIndex','middleware'=>'permission:create-datasets']);
    Route::get('/dataset/update/{id}', ['as'=>'dataset.update','uses'=>'Dataset\DatasetController@updateDataset','middleware'=>'permission:update-datasets']);
    Route::post('/dataset/update/{id}', ['as'=>'dataset.update.save','uses'=>'Dataset\DatasetController@getIndex','middleware'=>'permission:update-datasets']);
    Route::post('/dataset/activate/{id}', ['as'=>'dataset.activate','uses'=>'Dataset\DatasetController@getIndex','middleware'=>'permission:update-datasets']);
    Route::post('/dataset/unactivate/{id}', ['as'=>'dataset.unactivate','uses'=>'Dataset\DatasetController@getIndex','middleware'=>'permission:delete-datasets']);
});

Route::group(['prefix' => 'setting','middleware' => 'auth'],function(){
    /* Setting ------------------------------------------------------------------------------------------------------------ */
    /* Applications ----------------------------------------------------------------------------------------------------- */
    /* READ ---------------------------------------------------------------------------------------------------- */
    Route::get('/applications',['as'=>'application','uses'=>'Setting\ApplicationController@getIndex','middleware'=>'permission:read-applications']);
    Route::get('/applications/list', ['as'=>'application.list','uses'=>'Setting\ApplicationController@getList','middleware'=>'permission:read-applications']);
    Route::get('/applications/detail/{id}',['as'=>'application.detail','uses'=>'Setting\ApplicationController@detailApplication','middleware'=>'permission:read-applications']);
    /* CREATE -------------------------------------------------------------------------------------------------- */
    Route::get('/applications/create',['as'=>'application.create','uses'=>'Setting\ApplicationController@createApplication','middleware'=>'permission:create-applications']);
    Route::post('/applications/create',['as'=>'application.create.save','uses'=>'Setting\ApplicationController@createApplicationSave','middleware'=>'permission:create-applications']);
    /* UPDATE -------------------------------------------------------------------------------------------------- */
    Route::get('/applications/update/{id}',['as'=>'application.update','uses'=>'Setting\ApplicationController@updateApplication','middleware'=>'permission:update-applications']);
    Route::post('/applications/update/{id}',['as'=>'application.update.save','uses'=>'Setting\ApplicationController@updateApplicationSave','middleware'=>'permission:update-applications']);
    /* DELETE -------------------------------------------------------------------------------------------------- */
    Route::get('/applications/activate/{id}',['as'=>'application.activate','uses'=>'Setting\ApplicationController@activateApplication','middleware'=>'permission:update-applications']);
    Route::get('/applications/unactivate/{id}',['as'=>'application.unactivate','uses'=>'Setting\ApplicationController@unactivateApplication','middleware'=>'permission:delete-applications']);
    # ------------------------------------------------------------------------------------------------------------------------------------
    /* Permissions ----------------------------------------------------------------------------------------------------- */
    /* READ ---------------------------------------------------------------------------------------------------- */
    Route::get('/accesses',['as'=>'access','uses'=>'Setting\AccessController@getIndex','middleware'=>'permission:read-accesses']);
    Route::get('/accesses/list', ['as'=>'access.list','uses'=>'Setting\AccessController@getList','middleware'=>'permission:read-accesses']);
    Route::get('/accesses/detail/{id}',['as'=>'access.detail','uses'=>'Setting\AccessController@detailAccess','middleware'=>'permission:read-accesses']);
    /* CREATE -------------------------------------------------------------------------------------------------- */
    Route::get('/accesses/create',['as'=>'access.create','uses'=>'Setting\AccessController@createAccess','middleware'=>'permission:create-accesses']);
    Route::post('/accesses/create',['as'=>'access.create.save','uses'=>'Setting\AccessController@createAccessSave','middleware'=>'permission:create-accesses']);
    /* UPDATE -------------------------------------------------------------------------------------------------- */
    Route::get('/accesses/update/{id}',['as'=>'access.update','uses'=>'Setting\AccessController@updateAccess','middleware'=>'permission:update-accesses']);
    Route::post('/accesses/update/{id}',['as'=>'access.update.save','uses'=>'Setting\AccessController@updateAccessSave','middleware'=>'permission:update-accesses']);
    /* DELETE -------------------------------------------------------------------------------------------------- */
    Route::get('/accesses/activate/{id}',['as'=>'access.activate','uses'=>'Setting\AccessController@activateAccess','middleware'=>'permission:update-accesses']);
    Route::get('/accesses/unactivate/{id}',['as'=>'access.unactivate','uses'=>'Setting\AccessController@unactivateAccess','middleware'=>'permission:delete-accesses']);
    # ------------------------------------------------------------------------------------------------------------------------------------------------------------
    /* Users */
    Route::get('/users',['as'=>'user','uses'=>'Setting\UserController@getIndex','middleware'=>'permission:read-users']);
    Route::get('/users/list', ['as'=>'user.list','uses'=>'Setting\UserController@getList','middleware'=>'permission:read-users']);
    Route::get('/users/detail/{id}',['as'=>'user.detail','uses'=>'Setting\UserController@detailUser','middleware'=>'permission:create-users']);
    Route::get('/users/create',['as'=>'user.create','uses'=>'Setting\UserController@createUser','middleware'=>'permission:create-users']);
    Route::post('/users/create',['as'=>'user.create.save','uses'=>'Setting\UserController@createUserSave','middleware'=>'permission:create-users']);
    Route::get('/users/update/{id}',['as'=>'user.update','uses'=>'Setting\UserController@updateUser','middleware'=>'permission:update-users']);
    Route::post('/users/update/{id}',['as'=>'user.update.save','uses'=>'Setting\UserController@updateUserSave','middleware'=>'permission:update-users']);
    Route::get('/users/delete/{id}',['as'=>'user.delete','uses'=>'Setting\UserController@getIndex','middleware'=>'permission:delete-users']);
    Route::get('/users/activate/{id}',['as'=>'user.activate','uses'=>'Setting\UserController@activateUser','middleware'=>'permission:update-users']);
    Route::get('/users/unactivate/{id}',['as'=>'user.unactivate','uses'=>'Setting\UserController@unactivateUser','middleware'=>'permission:delete-users']);
    # ---------------------------------------------------------------------------------------------------------------------------------------------------------
    /* Abouts */
    Route::get('/about',['as'=>'about','uses'=>'Setting\AboutController@getIndex','middleware'=>'permission:read-about']);
    Route::get('/about/update/{id}',['as'=>'about.update','uses'=>'Setting\AboutController@updateAbout','middleware'=>'permission:update-about']);
    Route::post('/about/update/{id}',['as'=>'about.update.save','uses'=>'Setting\AboutController@updateAboutSave','middleware'=>'permission:update-about']);
    # ---------------------------------------------------------------------------------------------------------------------------------------------------------

});
