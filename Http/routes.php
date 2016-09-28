<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Routes in this group must be authorized.
Route::group(['middleware' => 'authorize'], function () {

    // TEST-ACL routes
    Route::group(['prefix' => 'test-acl'], function () {
        Route::get('home',                  ['as' => 'test-acl.home',                'uses' => 'TestsAndDemosController@test_acl_home']);
        Route::get('do-not-pre-load',       ['as' => 'test-acl.do-not-pre-load',     'uses' => 'TestsAndDemosController@test_acl_do_not_load']);
        Route::get('no-perm',               ['as' => 'test-acl.no-perm',             'uses' => 'TestsAndDemosController@test_acl_no_perm']);
        Route::get('basic-authenticated',   ['as' => 'test-acl.basic-authenticated', 'uses' => 'TestsAndDemosController@test_acl_basic_authenticated']);
        Route::get('guest-only',            ['as' => 'test-acl.guest-only',          'uses' => 'TestsAndDemosController@test_acl_guest_only']);
        Route::get('open-to-all',           ['as' => 'test-acl.open-to-all',         'uses' => 'TestsAndDemosController@test_acl_open_to_all']);
        Route::get('admins',                ['as' => 'test-acl.admins',              'uses' => 'TestsAndDemosController@test_acl_admins']);
//            Route::get('power-users',           ['as' => 'test-acl.power-users',         'uses' => 'TestsAndDemosController@test_acl_power_users']);
    }); // End of TEST-ACL group
    // TEST-FLASH routes
    Route::group(['prefix' => 'test-flash'], function () {
        Route::get('home',    ['as' => 'test-flash.home',     'uses' => 'TestsAndDemosController@test_flash_home']);
        Route::get('success', ['as' => 'test-flash.success',  'uses' => 'TestsAndDemosController@test_flash_success']);
        Route::get('info',    ['as' => 'test-flash.info',     'uses' => 'TestsAndDemosController@test_flash_info']);
        Route::get('warning', ['as' => 'test-flash.warning',  'uses' => 'TestsAndDemosController@test_flash_warning']);
        Route::get('error',   ['as' => 'test-flash.error',    'uses' => 'TestsAndDemosController@test_flash_error']);
    }); // End of TEST-FLASH group
    // TEST-MENU routes
    Route::group(['prefix' => 'test-menus'], function () {
        Route::get('home',     ['as' => 'test-menus.home',  'uses' => 'TestsAndDemosController@test_menu_home']);
        Route::get('one',      ['as' => 'test-menus.one',   'uses' => 'TestsAndDemosController@test_menu_one']);
        Route::get('two',      ['as' => 'test-menus.two',   'uses' => 'TestsAndDemosController@test_menu_two']);
        Route::get('two-a',    ['as' => 'test-menus.two-a', 'uses' => 'TestsAndDemosController@test_menu_two_a']);
        Route::get('two-b',    ['as' => 'test-menus.two-b', 'uses' => 'TestsAndDemosController@test_menu_two_b']);
        Route::get('three',    ['as' => 'test-menus.three', 'uses' => 'TestsAndDemosController@test_menu_three']);
    }); // End of TEST-MENU group

}); // end of AUTHORIZE middleware group
