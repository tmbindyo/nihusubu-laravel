<?php

namespace App\Http\Controllers\Business;

use App\ToDo;
use App\Traits\UserTrait;
use App\Traits\InstitutionTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ToDoController extends Controller
{

    use UserTrait;
    use institutionTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Getting all the to dos
    public function toDos($portal)
    {
        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        // Pending to dos
        $pendingToDos = ToDo::with('account', 'accountAdjustment', 'assignee', 'campaign', 'contact', 'deposit', 'expense', 'institution', 'liability', 'loan', 'organization', 'payment', 'product', 'productGroup', 'sale', 'status', 'transaction', 'transfer', 'user', 'warehouse', 'withdrawal')->where('status_id', 'f3df38e3-c854-4a06-be26-43dff410a3bc')->where('institution_id', $institution->id)->where('is_institution', true)->where('user_id', $user->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('account', 'accountAdjustment', 'assignee', 'campaign', 'contact', 'deposit', 'expense', 'institution', 'liability', 'loan', 'organization', 'payment', 'product', 'productGroup', 'sale', 'status', 'transaction', 'transfer', 'user', 'warehouse', 'withdrawal')->where('status_id', '2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('institution_id', $institution->id)->where('is_institution', true)->where('user_id', $user->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('account', 'accountAdjustment', 'assignee', 'campaign', 'contact', 'deposit', 'expense', 'institution', 'liability', 'loan', 'organization', 'payment', 'product', 'productGroup', 'sale', 'status', 'transaction', 'transfer', 'user', 'warehouse', 'withdrawal')->where('status_id', 'facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('institution_id', $institution->id)->where('is_institution', true)->where('user_id', $user->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('account', 'accountAdjustment', 'assignee', 'campaign', 'contact', 'deposit', 'expense', 'institution', 'liability', 'loan', 'organization', 'payment', 'product', 'productGroup', 'sale', 'status', 'transaction', 'transfer', 'user', 'warehouse', 'withdrawal')->where('status_id', '99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('institution_id', $institution->id)->where('is_institution', true)->where('user_id', $user->id)->get();

        return view('business.to_dos', compact('pendingToDos', 'inProgressToDos', 'completedToDos', 'overdueToDos', 'user', 'institution'));
    }

    // Store to do
    public function toDoStore(Request $request, $portal)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        // parse due date to mysql format
        $due_date = date('Y-m-d', strtotime($request->start_date));
        // date today
        $date_today = date('Y-m-d');

        $todo = new ToDo();
        $todo->name = $request->name;
        $todo->notes = $request->notes;
        $todo->is_completed = false;

        $todo->start_date = date('Y-m-d', strtotime($request->start_date));
        $todo->start_year = date('Y', strtotime($request->start_date));
        $todo->start_month = date('m', strtotime($request->start_date));
        $todo->start_day = date('d', strtotime($request->start_date));
        $todo->start_time = date('H:i:s', strtotime($request->start_time));
        $todo->start_hour = date('H', strtotime($request->start_time));
        $todo->start_minute = date('i', strtotime($request->start_time));
        // if has end date
        if($request->is_end_date == "on"){
            $todo->is_end_date = true;
            $todo->end_date = date('Y-m-d', strtotime($request->end_date));
            $todo->end_year = date('Y', strtotime($request->end_date));
            $todo->end_month = date('m', strtotime($request->end_date));
            $todo->end_day = date('d', strtotime($request->end_date));
        }else{
            $todo->is_end_date = false;
        }
        // if has end time
        if($request->is_end_time == "on"){
            $todo->is_end_time = true;
            $todo->end_time = date('H:i:s', strtotime($request->end_time));
            $todo->end_hour = date('H', strtotime($request->end_time));
            $todo->end_minute = date('i', strtotime($request->end_time));
        }else{
            $todo->is_end_time = false;
        }

        // assignee
        if($request->is_assignee){
            $todo->is_assignee = true;
            $todo->assignee_id = $request->assignee;
        }else{
            $todo->is_assignee = false;
        }
        // product
        if($request->is_product){
            $todo->is_product = true;
            $todo->product_id = $request->product;
        }else{
            $todo->is_product = false;
        }
        // product group
        if($request->is_product_group){
            $todo->is_product_group = true;
            $todo->product_group_id = $request->product_group;
        }else{
            $todo->is_product_group = false;
        }
        // warehouse
        if($request->is_warehouse){
            $todo->is_warehouse = true;
            $todo->warehouse_id = $request->warehouse;
        }else{
            $todo->is_warehouse = false;
        }
        // sale
        if($request->is_sale){
            $todo->is_sale = true;
            $todo->sale_id = $request->sale;
        }else{
            $todo->is_sale = false;
        }
        // contact
        if($request->is_contact){
            $todo->is_contact = true;
            $todo->contact_id = $request->contact;
        }else{
            $todo->is_contact = false;
        }
        // organization
        if($request->is_organization){
            $todo->is_organization = true;
            $todo->organization_id = $request->organization;
        }else{
            $todo->is_organization = false;
        }
        // campaign
        if($request->is_campaign){
            $todo->is_campaign = true;
            $todo->campaign_id = $request->campaign;
        }else{
            $todo->is_campaign = false;
        }

        // account
        if($request->is_account){
            $todo->is_account = true;
            $todo->account_id = $request->account;
        }else{
            $todo->is_account = false;
        }
        // account_adjustment
        if($request->is_account_adjustment){
            $todo->is_account_adjustment = true;
            $todo->account_adjustment_id = $request->account_adjustment;
        }else{
            $todo->is_account_adjustment = false;
        }
        // deposit
        if($request->is_deposit){
            $todo->is_deposit = true;
            $todo->deposit_id = $request->deposit;
        }else{
            $todo->is_deposit = false;
        }
        // liability
        if($request->is_liability){
            $todo->is_liability = true;
            $todo->liability_id = $request->liability;
        }else{
            $todo->is_liability = false;
        }
        // loan
        if($request->is_loan){
            $todo->is_loan = true;
            $todo->loan_id = $request->loan;
        }else{
            $todo->is_loan = false;
        }
        // withdrawal
        if($request->is_withdrawal){
            $todo->is_withdrawal = true;
            $todo->withdrawal_id = $request->withdrawal;
        }else{
            $todo->is_withdrawal = false;
        }
        // expense
        if($request->is_expense){
            $todo->is_expense = true;
            $todo->expense_id = $request->expense;
        }else{
            $todo->is_expense = false;
        }
        // payment
        if($request->is_payment){
            $todo->is_payment = true;
            $todo->payment_id = $request->payment;
        }else{
            $todo->is_payment = false;
        }
        // refund
        if($request->is_refund){
            $todo->is_refund = true;
            $todo->refund_id = $request->refund;
        }else{
            $todo->is_refund = false;
        }
        // transaction
        if($request->is_transaction){
            $todo->is_transaction = true;
            $todo->transaction_id = $request->transaction;
        }else{
            $todo->is_transaction = false;
        }
        // transfer
        if($request->is_transfer){
            $todo->is_transfer = true;
            $todo->transfer_id = $request->transfer;
        }else{
            $todo->is_transfer = false;
        }


        // chama
        if($request->is_chama){
            $todo->is_chama = true;
            $todo->chama_id = $request->chama;
        }else{
            $todo->is_chama = false;
        }
        // chama_member
        if($request->is_chama_member){
            $todo->is_chama_member = true;
            $todo->chama_member_id = $request->chama_member;
        }else{
            $todo->is_chama_member = false;
        }
        // chama_meeting
        if($request->is_chama_meeting){
            $todo->is_chama_meeting = true;
            $todo->chama_meeting_id = $request->chama_meeting;
        }else{
            $todo->is_chama_meeting = false;
        }
        // chama_meeting_minutes
        if($request->is_chama_meeting_minutes){
            $todo->is_chama_meeting_minutes = true;
            $todo->chama_meeting_minutes_id = $request->chama_meeting_minutes;
        }else{
            $todo->is_chama_meeting_minutes = false;
        }


        // budget
        if($request->is_budget){
            $todo->is_budget = true;
            $todo->budget_id = $request->budget;
        }else{
            $todo->is_budget = false;
        }

        // Check if date is overdue to make the status overdue
        // Check and compare if the task is overdue to set the relevant
        if($due_date < $date_today) {
            // overdue status
            $todo->status_id = "99372fdc-9ca0-4bca-b483-3a6c95a73782";
        }else{
            $todo->status_id = "f3df38e3-c854-4a06-be26-43dff410a3bc";
        }

        $todo->user_id = $user->id;
        $todo->is_institution = true;
        $todo->institution_id = $institution->id;
        $todo->is_user = false;
        $todo->save();
        return back()->withSuccess(__('To do successfully stored.'));
    }

    // Update to do
    public function toDoUpdate(Request $request, $portal, $to_do_id)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        $todo = ToDo::findOrFail($to_do_id);
        $todo->name = $request->name;
        $todo->notes = $request->notes;
        // TODO update todo database to from due to due_date
        $todo->due_date = date('Y-m-d', strtotime($request->due_date));
        $todo->user_id = $user->id;
        $todo->save();
        return back()->withSuccess('To do '.$todo->task.' updated!');

    }

    // Update to do status, set to in progress
    public function toDoSetInProgress($portal, $to_do_id)
    {

        $todo = ToDo::findOrFail($to_do_id);
        $todo->status_id = '2a2d7a53-0abd-4624-b7a1-a123bfe6e568';
        $todo->save();

        return back()->withSuccess('To do '.$todo->task.' set to in progress');
    }

    // Update to do status, mark as completed
    public function toDoSetCompleted($portal, $to_do_id)
    {

        $todo = ToDo::findOrFail($to_do_id);
        $todo->status_id = 'facb3c47-1e2c-46e9-9709-ca479cc6e77f';
        $todo->date_completed = date('Y-m-d');;
        $todo->save();

        return back()->withSuccess('To do '.$todo->task.' status updated to complete.');
    }

    // Delete to do
    public function toDoDelete($portal, $to_do_id)
    {

        $todo = ToDo::findOrFail($to_do_id);
        $todo->delete();

        return back()->withSuccess(__('To do '.$todo->task.' successfully deleted.'));
    }
}
