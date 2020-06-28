<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function(){

    /**
     * Router Tables
     */
    Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
    Route::resource('tenants', 'TenantController');

    /**
     * Router Tables
     */
    Route::any('tables/search', 'TableController@search')->name('tables.search');
    Route::resource('tables', 'TableController');

    /**
     * Category x Product
     */
    Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detach');
    Route::post('products/{id}/categories/attach', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
    Route::get('products/{id}/categories/add', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
    Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
    Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');

    /**
     * Router Products
     */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

        
    /**
     * Router Categories
     */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

        
    /**
     * Router Users
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');
    
    /**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles/attach', 'ACL\PlanProfileController@attachProfilePlan')->name('plans.profiles.attach');
    Route::get('plans/{id}/profiles/add', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');
    
    
    /**
     * Permission x Profile
     */
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
    Route::post('profiles/{id}/permissions/attach', 'ACL\PermissionProfileController@attachPermissionProfile')->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permissions/add', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');
    
    /**
     * Routers Permission
     */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');
    
    /**
     * Router Profile with Resources
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');
    
    /**
     * Router Details
     */
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

    
    /**
     * Routes Plan
     */
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    
    /**
     * Router Home DashBoard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');

});

/**
 * Routes Site
 */

    Route::namespace('Site')->group(function(){
        Route::get('/plano/{url}', 'SiteController@plan')->name('plan.subscription');
        Route::get('/', 'SiteController@index')->name('site.home');
    });

/**
 * Auth Routes
 */

Auth::routes();
