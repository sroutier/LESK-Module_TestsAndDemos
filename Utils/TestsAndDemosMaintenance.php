<?php namespace App\Modules\TestsAndDemos\Utils;

use App\Models\Menu;
use App\Models\Permission;
use App\User;
use DB;
use Sroutier\LESKModules\Contracts\ModuleMaintenanceInterface;
use Sroutier\LESKModules\Traits\MaintenanceTrait;

class TestsAndDemosMaintenance implements ModuleMaintenanceInterface
{

    use MaintenanceTrait;


    static public function initialize()
    {
        DB::transaction(function () {

            /////////////////
            // PREPARATION //
            /////////////////
            //----- Find some system permissions.
            $permBasicAuthenticated = Permission::where('name', 'basic-authenticated')->first();
            $permGuestOnly          = Permission::where('name', 'guest-only')->first();
            $permOpenToAll          = Permission::where('name', 'open-to-all')->first();
            $permAdminSettings      = Permission::where('name', 'admin-settings')->first();
            //----- Find home menu.
            $menuHome = Menu::where('name', 'home')->first();

            ///////////
            // USERS //
            ///////////
            // ----- Create test users.
            $testUserOne = User::create([
                'username'              => 'user1',
                'first_name'            => 'User',
                'last_name'             => 'One',
                'email'                 => 'user1@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserTwo = User::create([
                'username'              => 'user2',
                'first_name'            => 'User',
                'last_name'             => 'Two',
                'email'                 => 'user2@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserThree = User::create([
                'username'              => 'user3',
                'first_name'            => 'User',
                'last_name'             => 'Three',
                'email'                 => 'user3@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserFour = User::create([
                'username'              => 'user4',
                'first_name'            => 'User',
                'last_name'             => 'Four',
                'email'                 => 'user4@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserFive = User::create([
                'username'              => 'user5',
                'first_name'            => 'User',
                'last_name'             => 'Five',
                'email'                 => 'user5@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserSix = User::create([
                'username'              => 'user6',
                'first_name'            => 'User',
                'last_name'             => 'Six',
                'email'                 => 'user6@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserSeven = User::create([
                'username'              => 'user7',
                'first_name'            => 'User',
                'last_name'             => 'Seven',
                'email'                 => 'user7@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserEight = User::create([
                'username'              => 'user8',
                'first_name'            => 'User',
                'last_name'             => 'Eight',
                'email'                 => 'user8@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserNine = User::create([
                'username'              => 'user9',
                'first_name'            => 'User',
                'last_name'             => 'Nine',
                'email'                 => 'user9@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserTen = User::create([
                'username'              => 'user10',
                'first_name'            => 'User',
                'last_name'             => 'Ten',
                'email'                 => 'user10@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserEleven = User::create([
                'username'              => 'user11',
                'first_name'            => 'User',
                'last_name'             => 'Eleven',
                'email'                 => 'user11@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserTwelve = User::create([
                'username'              => 'user12',
                'first_name'            => 'User',
                'last_name'             => 'Twelve',
                'email'                 => 'user12@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserThirteen = User::create([
                'username'              => 'user13',
                'first_name'            => 'User',
                'last_name'             => 'Thirteen',
                'email'                 => 'user13@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserFourteen = User::create([
                'username'              => 'user14',
                'first_name'            => 'User',
                'last_name'             => 'Fourteen',
                'email'                 => 'user14@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);
            $testUserFifteen = User::create([
                'username'              => 'user15',
                'first_name'            => 'User',
                'last_name'             => 'Fifteen',
                'email'                 => 'user15@email.com',
                "password"              => "Password1",
                "auth_type"             => "internal",
                "enabled"               => true
            ]);

            ///////////////
            // ACL Tests //
            ///////////////
            // ----- Create routes and associate some permission
            $routeTestACLHome = self::createRoute( 'test-acl.home',
                'test-acl/home',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_acl_home',
                $permOpenToAll );
            $routeTestACLAdmins = self::createRoute( 'test-acl.admins',
                'test-acl/admins',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_acl_admins',
                $permAdminSettings );
            $routeTestACLBasicAuthenticated = self::createRoute( 'test-acl.basic-authenticated',
                'test-acl/basic-authenticated',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_acl_basic_authenticated',
                $permAdminSettings );
            $routeTestACLGuestOnly = self::createRoute( 'test-acl.guest-only',
                'test-acl/guest-only',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_acl_guest_only',
                $permAdminSettings );
            $routeTestACLOpenToAll = self::createRoute( 'test-acl.open-to-all',
                'test-acl/open-to-all',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_acl_open_to_all',
                $permOpenToAll );
            $routeTestACLNoPerm = self::createRoute( 'test-acl.no-perm',
                'test-acl/no-perm',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_acl_no_perm' );
            // ----- Create menu structure
            // createMenu($name, $label, $position = 999, $icon = 'fa fa-file', $parent = 'root', $enabled = false,
            //            $route = null, $permission = null, $url = null, $separator = false)
            $menuTestACL            = self::createMenu( 'test-acl.home', 'Test ACLs', 20, 'fa fa-bolt', $menuHome, false, null, $permOpenToAll, '/test-acl/home' );
            $menuDoNotPreLoad       = self::createMenu( 'test-acl.do-not-pre-load', 'Do not pre-load', 0, 'fa fa-file', $menuTestACL, true, null, null, '/test-acl/do-not-pre-load' );
            $menuNoPerm             = self::createMenu( 'test-acl.no-perm', 'No perm', 0, 'fa fa-file', $menuTestACL, true, null, null, '/test-acl/no-perm' );
            $menuGuestOnly          = self::createMenu( 'test-acl.guest-only', 'Guest Only', 0, 'fa fa-file', $menuTestACL, true, $routeTestACLGuestOnly );
            $menuOpenToAll          = self::createMenu( 'test-acl.open-to-all', 'Open to all', 0, 'fa fa-file', $menuTestACL, true, $routeTestACLOpenToAll );
            $menuBasicAuthenticated = self::createMenu( 'test-acl.basic-authenticated', 'Basic authenticated', 0, 'fa fa-file', $menuTestACL, true, $routeTestACLBasicAuthenticated );
            $menuAdmins             = self::createMenu( 'test-acl.admins', 'Admins', 0, 'fa fa-file', $menuTestACL, true, $routeTestACLAdmins );

            /////////////////
            // FLASH Tests //
            /////////////////
            // ----- Create permissions.
            $permTestLevelSuccess = self::createPermission( 'test-level-success',
                'Test level success',
                'Testing level success');
            $permTestLevelInfo = self::createPermission('test-level-info',
                'Test level info',
                'Testing level info');
            $permTestLevelWarning = self::createPermission('test-level-warning',
                'Test level warning',
                'Testing level warning');
            $permTestLevelError = self::createPermission('test-level-error',
                'Test level error',
                'Testing level error');
            // ----- Create roles and assign permissions.
            $roleFlashSuccessViewer = self::createRole("flash-success-viewer",
                "Flash success viewer",
                "Can see the success flash test page.",
                [$permTestLevelSuccess->id]);
            $roleFlashInfoViewer = self::createRole("flash-info-viewer",
                "Flash info viewer",
                "Can see the info flash test page.",
                [$permTestLevelInfo->id, $permTestLevelSuccess->id]);
            $roleFlashWarningViewer = self::createRole("flash-warning-viewer",
                "Flash warning viewer",
                "Can see the warning flash test page.",
                [$permTestLevelWarning->id, $permTestLevelInfo->id, $permTestLevelSuccess->id]);
            $roleFlashErrorViewer = self::createRole("flash-error-viewer",
                "Flash error viewer",
                "Can see the error flash test page.",
                [ $permTestLevelError->id, $permTestLevelWarning->id,
                    $permTestLevelInfo->id,  $permTestLevelSuccess->id  ]);
            // -- Assign users to roles.
            $roleFlashSuccessViewer->users()->attach($testUserTwo->id);
            $roleFlashInfoViewer->users()->attach($testUserThree->id);
            $roleFlashWarningViewer->users()->attach($testUserFour->id);
            $roleFlashErrorViewer->users()->attach($testUserFive->id);
            // ----- Create routes and associate some permission
            $routeFlashHome = self::createRoute( 'test-flash.home',
                'test-flash/home',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_flash_home',
                $permOpenToAll );
            $routeFlashSuccess = self::createRoute( 'test-flash.success',
                'test-flash/success',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_flash_success',
                $permTestLevelSuccess );
            $routeFlashInfo = self::createRoute( 'test-flash.info',
                'test-flash/info',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_flash_info',
                $permTestLevelInfo );
            $routeFlashWarning = self::createRoute( 'test-flash.warning',
                'test-flash/warning',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_flash_warning',
                $permTestLevelWarning );
            $routeFlashError = self::createRoute( 'test-flash.error',
                'test-flash/error',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_flash_error',
                $permTestLevelError );
            // ----- Create menu structure
            $menuTestFlashHome = self::createMenu( 'test-flash.home', 'Test Flash', 20, 'fa fa-bolt', $menuHome, false, null, $permBasicAuthenticated, '/test-flash/home' );
            $menuFlashSuccess  = self::createMenu( 'test-flash.success', 'Flash success', 0, 'fa fa-check fa-colour-green', $menuTestFlashHome, true, $routeFlashSuccess );
            $menuFlashInfo     = self::createMenu( 'test-flash.info', 'Flash info', 10, 'fa fa-info fa-colour-blue', $menuTestFlashHome, true, $routeFlashInfo );
            $menuFlashWarning  = self::createMenu( 'test-flash.warning', 'Flash warning', 20, 'fa fa-warning fa-colour-orange', $menuTestFlashHome, true, $routeFlashWarning );
            $menuFlashError    = self::createMenu( 'test-flash.error', 'Flash error', 30, 'fa fa-ban fa-colour-red', $menuTestFlashHome, true, $routeFlashError );

            ////////////////
            // MENU Tests //
            ////////////////
            // ----- Create routes and associate some permission
            $routeTestMenusHome = self::createRoute( 'test-menus.home',
                'test-menus/home',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_menus_home',
                $permOpenToAll );
            $routeTestMenusOne = self::createRoute( 'test-menus.one',
                'test-menus/one',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_menus_one',
                $permOpenToAll );
            $routeTestMenusTwo = self::createRoute( 'test-menus.two',
                'test-menus/two',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_menus_two',
                $permBasicAuthenticated );
            $routeTestMenusTwoA = self::createRoute( 'test-menus.two-a',
                'test-menus/two-a',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_menus_two_a',
                $permTestLevelSuccess );
            $routeTestMenusTwoB = self::createRoute( 'test-menus.two-b',
                'test-menus/two-b',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_menus_two_b',
                $permTestLevelInfo );
            $routeTestMenusThree = self::createRoute( 'test-menus.three',
                'test-menus/three',
                'App\Modules\TestsAndDemos\Http\Controllers\TestsAndDemosController@test_menus_three',
                $permTestLevelWarning );
            // ----- Create menu structure
            $menuTestMenusHome      = self::createMenu( 'test-menus.home', 'Test Menus', 30, 'fa fa-bolt', $menuHome, false, null, $permOpenToAll, '/test-menus/home' );
            $menuTestMenusOne       = self::createMenu( 'test-menus.one', 'Menu One', 0, 'fa fa-bars', $menuTestMenusHome, true, $routeTestMenusOne );
            $menuTestMenusTwo       = self::createMenu( 'test-menus.two', 'Menu Two', 10, 'fa fa-bars', $menuTestMenusHome, true, $routeTestMenusTwo );
            $menuTestMenusTwoA      = self::createMenu( 'test-menus.two-a', 'Menu Two A', 0, 'fa fa-bars', $menuTestMenusTwo, true, $routeTestMenusTwoA );
            $menuTestMenusTwoB      = self::createMenu( 'test-menus.two-b', 'Menu Two B', 0, 'fa fa-bars', $menuTestMenusTwo, true, $routeTestMenusTwoB );
            $menuTestMenusTwoAUrl   = self::createMenu( 'test-menus.two-a-alias-url', 'Menu Two A alias by URL', 0, 'fa fa-bars', $menuTestMenusTwo, true, null, $permBasicAuthenticated, '/test-menus/two-a' );
            $menuTestMenusTwoARoute = self::createMenu( 'test-menus.two-a-alias-route', 'Menu Two A alias by route', 0, 'fa fa-bars', $menuTestMenusTwo, true, $routeTestMenusTwoA );
            $menuTestMenusThree     = self::createMenu( 'test-menus.three', 'Menu Three', 20, 'fa fa-bars', $menuTestMenusHome, true, $routeTestMenusThree );

        }); // End of DB::transaction(....)
    }


    static public function unInitialize()
    {
        DB::transaction(function () {

            ////////////////
            // MENU Tests //
            ////////////////
            // ----- Delete menu structure
            self::destroyMenu('test-menus.three');
            self::destroyMenu('test-menus.two-a-alias-route');
            self::destroyMenu('test-menus.two-a-alias-url');
            self::destroyMenu('test-menus.two-b');
            self::destroyMenu('test-menus.two-a');
            self::destroyMenu('test-menus.two');
            self::destroyMenu('test-menus.one');
            self::destroyMenu('test-menus.home');
            // ----- Delete route
            self::destroyRoute('test-menus.three');
            self::destroyRoute('test-menus.two-b');
            self::destroyRoute('test-menus.two-a');
            self::destroyRoute('test-menus.two');
            self::destroyRoute('test-menus.one');
            self::destroyRoute('test-menus.home');

            /////////////////
            // FLASH Tests //
            /////////////////
            // ----- Delete menu structure
            self::destroyMenu('test-flash.error');
            self::destroyMenu('test-flash.warning');
            self::destroyMenu('test-flash.info');
            self::destroyMenu('test-flash.success');
            self::destroyMenu('test-flash.home');
            // ----- Delete routes
            self::destroyRoute('test-flash.error');
            self::destroyRoute('test-flash.warning');
            self::destroyRoute('test-flash.info');
            self::destroyRoute('test-flash.success');
            self::destroyRoute('test-flash.home');
            // ----- Delete roles
            self::destroyRole('flash-error-viewer');
            self::destroyRole('flash-warning-viewer');
            self::destroyRole('flash-info-viewer');
            self::destroyRole('flash-success-viewer');
            // ----- Delete permissions
            self::destroyPermission('test-level-error');
            self::destroyPermission('test-level-warning');
            self::destroyPermission('test-level-info');
            self::destroyPermission('test-level-success');

            ///////////////
            // ACL Tests //
            ///////////////
            // ----- Delete menu structure
            self::destroyMenu('test-acl.admins');
            self::destroyMenu('test-acl.basic-authenticated');
            self::destroyMenu('test-acl.open-to-all');
            self::destroyMenu('test-acl.guest-only');
            self::destroyMenu('test-acl.no-perm');
            self::destroyMenu('test-acl.do-not-pre-load');
            self::destroyMenu('test-acl.home');
            // ----- Delete routes
            self::destroyRoute('test-acl.no-perm');
            self::destroyRoute('test-acl.open-to-all');
            self::destroyRoute('test-acl.guest-only');
            self::destroyRoute('test-acl.basic-authenticated');
            self::destroyRoute('test-acl.admins');
            self::destroyRoute('test-acl.home');
            ///////////
            // USERS //
            ///////////
            // ----- Delete test users.
            User::where('username', 'user1')->delete();
            User::where('username', 'user2')->delete();
            User::where('username', 'user3')->delete();
            User::where('username', 'user4')->delete();
            User::where('username', 'user5')->delete();
            User::where('username', 'user6')->delete();
            User::where('username', 'user7')->delete();
            User::where('username', 'user8')->delete();
            User::where('username', 'user9')->delete();
            User::where('username', 'user10')->delete();
            User::where('username', 'user11')->delete();
            User::where('username', 'user12')->delete();
            User::where('username', 'user13')->delete();
            User::where('username', 'user14')->delete();
            User::where('username', 'user15')->delete();

        }); // End of DB::transaction(....)
    }


    static public function enable()
    {
        DB::transaction(function () {
            // ----- Enable main menu for each test area
            self::enableMenu('test-acl.home');
            self::enableMenu('test-flash.home');
            self::enableMenu('test-menus.home');
        });
    }


    static public function disable()
    {
        DB::transaction(function () {
            // ----- Disable main menu for each test area
            self::disableMenu('test-acl.home');
            self::disableMenu('test-flash.home');
            self::disableMenu('test-menus.home');
        });
    }

}
