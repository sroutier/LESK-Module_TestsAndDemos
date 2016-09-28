<?php
namespace App\Modules\TestsAndDemos\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;
use App\Repositories\AuditRepository as Audit;
use Auth;

class TestsAndDemosController extends Controller
{

    public function test_acl_home()
    {
        $page_title = "ACL test Home";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This is the home page of all ACL tests.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_do_not_load()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route should not be loaded into the list of application routes.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_no_perm()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route does not have any permission assigned to it.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_basic_authenticated()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires basic-authenticated perms.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_guest_only()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires guest-only perms.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_open_to_all()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires open-to-all perms.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_admins()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires admins perms.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_acl_power_users()
    {
        $page_title = "ACL test";
        $page_description = "Testing the ACL mechanism.";
        $page_message = "This route requires power-users perms.";

        return view('tests-and-demos::test_acl_xxx', compact('page_title', 'page_description', 'page_message'));
    }

    public function test_flash_home()
    {
        $page_title = "Test Flash";
        $page_description = "Home for the flash test pages.";

        return view('tests-and-demos::test_flash_home', compact('page_title', 'page_description'));
    }

    public function test_flash_success()
    {
        Audit::log(Auth::user()->id, "flash_test", "Testing audit with flash success.");

        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with a success level";

        Flash::success('This is a success message!');

        return view('tests-and-demos::test_flash_xxx', compact('page_title', 'page_description'));
    }

    public function test_flash_info()
    {
        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with an info level";

        Flash::info('This is an info message!');

        return view('tests-and-demos::test_flash_xxx', compact('page_title', 'page_description'));
    }

    public function test_flash_warning()
    {
        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with a warning level";

        Flash::warning('This is a warning message!');

        return view('tests-and-demos::test_flash_xxx', compact('page_title', 'page_description'));
    }

    public function test_flash_error()
    {
        $page_title = "Flash test";
        $page_description = "Testing the flash mechanism with a error level";

        Flash::error('This is an error message!');
        Flash::important();

        return view('tests-and-demos::test_flash_xxx', compact('page_title', 'page_description'));
    }

    public function test_menu_home()
    {
        $page_title = "Test Menus";
        $page_description = "Home for the menus test pages.";

        return view('tests-and-demos::test_menus', compact('page_title', 'page_description'));
    }

    public function test_menu_one()
    {
        $page_title = "Menu One";
        $page_description = "Test menu one page.";

        return view('tests-and-demos::test_menus', compact('page_title', 'page_description'));
    }

    public function test_menu_two()
    {
        $page_title = "Menu Two";
        $page_description = "Test menu two page.";

        return view('tests-and-demos::test_menus', compact('page_title', 'page_description'));
    }

    public function test_menu_two_a()
    {
        $page_title = "Menu Two A";
        $page_description = "Test menu two A page.";

        return view('tests-and-demos::test_menus', compact('page_title', 'page_description'));
    }

    public function test_menu_two_b()
    {
        $page_title = "Menu Two B";
        $page_description = "Test menu two B page.";

        return view('tests-and-demos::test_menus', compact('page_title', 'page_description'));
    }

    public function test_menu_three()
    {
        $page_title = "Menu Three";
        $page_description = "Test menu Three page.";

        return view('tests-and-demos::test_menus', compact('page_title', 'page_description'));
    }


}
