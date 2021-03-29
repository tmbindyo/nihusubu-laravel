<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Institution;
use App\UserAccount;
use App\Traits\UserTrait;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
use Spatie\Permission\Models\Role;

class InstitutionController extends Controller
{

    use UserTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function institutions()
    {
        // User
        $user = $this->getUser();
        // institutions
        $institutions = Institution::with('plan', 'user', 'status')->get();
        return view('admin.institutions', compact('user', 'institutions'));
    }

    public function institutionShow($institution_id)
    {
        // User
        $user = $this->getUser();
        // institutions
        $institution = Institution::where('id',$institution_id)->with('subscriptions.subscriptionModules', 'user', 'status', 'institutionModules', 'compositeProducts', 'productGroups.productGroupProducts', 'items', 'products', 'warehouses', 'transferOrders', 'inventoryAdjustments', 'campaigns', 'contacts', 'organizations', 'estimates', 'invoices', 'sales', 'orders', 'expenses', 'loans', 'payments', 'refunds', 'transfers', 'units')->first();
        // get currencies
        $currencies = Currency::all();
        // users
        $users = UserAccount::where('status_id', "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")->where('institution_id',$institution->id)->with('user.roles')->get();
        // deleted users
        $deletedUsers = UserAccount::where('status_id', "d35b4cee-5594-4cfd-ad85-e489c9dcdeff")->where('institution_id',$institution->id)->with('user')->get();
        // Get roles
        $roles = Role::where('institution_id', $institution->id)->with('permissions')->get();
        $roleNames = Role::where('institution_id', $institution->id)->pluck('name')->toArray();

        return view('admin.institution_show', compact('user', 'institution', 'currencies', 'users', 'deletedUsers', 'roles', 'roleNames'));
    }

}
