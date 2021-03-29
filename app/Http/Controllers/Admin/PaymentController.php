<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\SubscriptionPayment;
use App\Http\Controllers\Controller;
use App\Institution;
use App\Subscription;

class PaymentController extends Controller
{
    use UserTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function payments()
    {
        // User
        $user = $this->getUser();
        // institutions
        $subscriptionPayments = SubscriptionPayment::with('subscriptionType', 'subscription.institution', 'status', 'user')->get();
        // institutions
        $institutions = Institution::with('subscriptions.subscriptionModules', 'user', 'status', 'institutionModules', 'compositeProducts', 'productGroups.productGroupProducts', 'items', 'products', 'warehouses', 'transferOrders', 'inventoryAdjustments', 'campaigns', 'contacts', 'organizations', 'estimates', 'invoices', 'sales', 'orders', 'expenses', 'loans', 'payments', 'refunds', 'transfers', 'units')->get();
        return view('admin.payments', compact('user', 'subscriptionPayments', 'institutions'));
    }

    public function recordInstitutionSubscriptionPayment(Request $request)
    {
        // User
        $user = $this->getUser();
        $institution_id = $request->institution;
        // institutions
        $institution = Institution::where('id',$institution_id)->with('subscriptions.subscriptionModules', 'user', 'status', 'institutionModules', 'compositeProducts', 'productGroups.productGroupProducts', 'items', 'products', 'warehouses', 'transferOrders', 'inventoryAdjustments', 'campaigns', 'contacts', 'organizations', 'estimates', 'invoices', 'sales', 'orders', 'expenses', 'loans', 'payments', 'refunds', 'transfers', 'units')->first();
        return view('admin.record_institution_subscription_payment', compact('user', 'institution'));
    }

    public function recordInstitutionSubscriptionPaymentStore(Request $request)
    {

        return $request;
        // User
        $user = $this->getUser();
        // check institution
        // check institution subscriptions
        $amount_paid = $request->amount;
        $institution = Institution::where('institution_id',$request->institution)->first();

        // get all institution subscription
        $unpaid_institution_subscriptions_count = Subscription::where('institution_id',$institution->id)->where('is_fully_paid',False)->count();
        if ($unpaid_institution_subscriptions_count > 1)
        {

        }elseif($unpaid_institution_subscriptions_count == 1){

        }else{

        }
        $unpaid_institution_subscriptions = Subscription::where('institution_id',$institution->id)->get();
        // record payment
        $payment = new SubscriptionPayment();
        $payment->user_id = $user->id;
        $payment->save();



        // if account was inactive, activate
        if (!$institution->is_active){
            $institution->is_active = True;
            $institution->save();

            // notify user or admin
        }

        // notify admin on payment acceptance

        return redirect()->route('admin.payments',$payment->id)->withSuccess('Payment of '.$amount_paid.' successfully recorded for'.$institution->name.' by '.$user->name.'!');
    }

    public function paymentShow($payment_id)
    {
        // User
        $user = $this->getUser();
        // institutions
        $subscriptionPayments = SubscriptionPayment::with('subscriptionType', 'subscription.institution', 'status', 'user')->get();
        return view('admin.payment_show', compact('user', 'subscriptionPayments'));
    }

}
