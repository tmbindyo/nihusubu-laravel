<?php

namespace App\Http\Controllers\Business;

use App\LoanType;
use Auth;
use App\Loan;
use App\Status;
use App\Contact;
use App\Deposit;
use App\Expense;
use App\Account;
use App\Transfer;
use App\Liability;
use App\Withdrawal;
use App\Transaction;
use App\ExpenseAccount;
use App\Traits\UserTrait;
use App\AccountAdjustment;
use App\Campaign;
use App\Frequency;
use Illuminate\Http\Request;
use App\Traits\InstitutionTrait;
use App\Traits\ReferenceNumberTrait;
use App\Http\Controllers\Controller;
use App\Sale;
use App\ToDo;

class AccountController extends Controller
{

    use UserTrait;
    use institutionTrait;
    use ReferenceNumberTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function accounts($portal)
    {

        // User
        $user = $this->getUser();
        // return $user;
        // return $user;
        // Get the navbar values
        $institution = $this->getInstitution($portal);

        // Get accounts
        $accounts = Account::with('user', 'status')->where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // Get accounts
        $deletedAccounts = Account::with('user', 'status')->where('status_id', 'd35b4cee-5594-4cfd-ad85-e489c9dcdeff')->where('institution_id', $institution->id)->where('is_institution', true)->get();

        return view('business.accounts', compact('accounts', 'user', 'institution', 'deletedAccounts'));
    }

    public function accountStore(Request $request, $portal)
    {
//        return $request;
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        // select account type
        $account = new Account();
        $account->reference = $reference;
        $account->name = $request->name;
        $account->balance = $request->balance;
        $account->notes = $request->notes;
        $account->is_user = false;
        $account->is_institution = true;
        $account->is_chama = false;
        $account->user_id = $user->id;
        $account->institution_id = $institution->id;
        $account->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $account->save();
        return redirect()->route('business.account.show',['portal'=>$institution->portal, 'id'=>$account->id])->withSuccess('Account '.$account->reference.' successfully created!');
    }

    public function accountShow($portal, $account_id)
    {
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get account
        $account = Account::where('id', $account_id)->where('is_institution', true)->where('institution_id', $institution->id)->with('status', 'user', 'loans.loanType', 'accountAdjustments', 'destinationAccount.sourceAccount', 'transactions.account', 'transactions.expense', 'payments', 'sourceAccount.destinationAccount', 'deposits', 'withdrawals', 'liabilities.contact', 'refunds', 'transactions')->first();
        $goal = $account->goal;
        $balance = $account->balance;
        if ($balance == 0){
            $percentage = 0;
        }else{
            $percentage = doubleval($goal)/$balance/100;
        }

        // Pending to dos
        $pendingToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'account')->where('status_id', 'f3df38e3-c854-4a06-be26-43dff410a3bc')->where('account_id', $account->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'account')->where('status_id', '2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('account_id', $account->id)->get();
        // Completed to dos
        $completedToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'account')->where('status_id', 'facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('account_id', $account->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'account')->where('status_id', '99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('account_id', $account->id)->get();

        return view('business.account_show', compact('overdueToDos', 'completedToDos', 'inProgressToDos', 'pendingToDos', 'account', 'user', 'institution', 'percentage'));
    }

    public function accountDepositCreate($portal, $account_id)
    {
        // get account
        $accountExists = Account::findOrFail($account_id);
        if($accountExists->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Account '.$accountExists->name.' is deleted.'));
        }

        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();

        return view('business.deposit_create', compact('accounts', 'accountExists', 'user', 'institution'));
    }

    public function accountLiabilityCreate($portal, $account_id)
    {
        // get account
        $accountExists = Account::findOrFail($account_id);
        if($accountExists->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Account '.$accountExists->name.' is deleted.'));
        }
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get contacts
        $contacts = Contact::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('organization')->where('is_institution', true)->where('institution_id', $institution->id)->get();
        return view('business.liability_create', compact('user', 'institution', 'accountExists', 'contacts', 'accounts'));
    }

    public function accountLoanCreate($portal, $account_id)
    {
        // get account
        $accountExists = Account::findOrFail($account_id);
        if($accountExists->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Account '.$accountExists->name.' is deleted.'));
        }

        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // loan types
        $loanTypes = LoanType::all();
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get contacts
        $contacts = Contact::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('organization')->where('is_institution', true)->where('institution_id', $institution->id)->get();
        return view('business.loan_create', compact('user', 'institution', 'accountExists', 'contacts', 'accounts', 'loanTypes'));
    }

    public function accountWithdrawalCreate($portal, $account_id)
    {
        $accountExists = Account::findOrFail($account_id);
        if($accountExists->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Account '.$accountExists->name.' is deleted.'));
        }

        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();

        return view('business.withdrawal_create', compact('accounts', 'accountExists', 'user', 'institution'));
    }

    public function accountUpdate(Request $request, $portal, $account_id)
    {
        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);
        // select account type
        $accountExists = Account::findOrFail($account_id);
        $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $account_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        $account->name = $request->name;
        $account->goal = $request->goal;
        $account->notes = $request->notes;
        $account->user_id = $user->id;
        $account->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $account->save();

        return redirect()->route('business.account.show',['portal'=>$institution->portal, 'id'=>$account->id])->withSuccess('Account '.$account->reference.' successfully updated!');
    }

    public function accountDelete($portal, $account_id)
    {
        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);
        // delete account
        $account = Account::findOrFail($account_id);
        $account->status_id = 'd35b4cee-5594-4cfd-ad85-e489c9dcdeff';
        $account->save();

        return back()->withSuccess(__('Account '.$account->name.' successfully restored.'));
    }

    public function accountRestore($portal, $account_id)
    {
        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        $account = Account::findOrFail($account_id);
        $account->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $account->save();

        return back()->withSuccess(__('Account '.$account->name.' successfully restored.'));
    }

    public function accountAdjustmentCreate($portal, $account_id)
    {

        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get account
        $accountExists = Account::findOrFail($account_id);
        $account = Account::where('id', $account_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        if($account->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Account '.$account->name.' is deleted.'));
        }
        return view('business.account_adjustment_create', compact('accountExists', 'account', 'user', 'institution', 'accounts'));

    }

    public function accountAdjustmentStore(Request $request, $portal)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);
        // new transaction
        $size = 5;
        $reference = $this->getRandomString($size);

        // get account
        $account = Account::where('id', $request->account)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        if($account->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Account '.$account->name.' is deleted.'));
        }
        $accountAdjustment = new AccountAdjustment();

        if($request->is_deposit == "on"){
            $accountAdjustment->is_deposit = true;
            $accountAdjustment->deposit_id = $request->deposit;

            // TODO update deposit
            $deposit = Deposit::findOrFail($request->deposit);
            $deposit->initial_amount = doubleval($deposit->initial_amount)+doubleval($request->amount);
            $deposit->amount = doubleval($deposit->amount)+doubleval($request->amount);
            $deposit->subsequent_amount = doubleval($deposit->subsequent_amount)+doubleval($request->amount);
            $deposit->save();

        }else{
            $accountAdjustment->is_deposit = false;
        }

        if($request->is_withdrawal == "on"){
            $accountAdjustment->is_withdrawal = true;
            $accountAdjustment->withdrawal_id = $request->withdrawal;

            // TODO update withdrawal
            $withdrawal = Withdrawal::findOrFail($request->withdrawal);
            $withdrawal->initial_amount = doubleval($withdrawal->initial_amount)+doubleval($request->amount);
            $withdrawal->amount = doubleval($withdrawal->amount)+doubleval($request->amount);
            $withdrawal->subsequent_amount = doubleval($withdrawal->subsequent_amount)+doubleval($request->amount);
            $withdrawal->save();

        }else{
            $accountAdjustment->is_withdrawal = false;
        }

        $accountAdjustment->reference = $reference;
        $accountAdjustment->notes = $request->notes;
        $accountAdjustment->amount = $request->amount;
        $accountAdjustment->initial_account_amount = $account->balance;
        $accountAdjustment->subsequent_account_amount = doubleval($account->balance)+doubleval($request->amount);
        $accountAdjustment->date = date('Y-m-d', strtotime($request->date));

        $accountAdjustment->user_id = $user->id;
        $accountAdjustment->institution_id = $institution->id;
        $accountAdjustment->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $accountAdjustment->account_id = $request->account;
        $accountAdjustment->is_user = false;
        $accountAdjustment->is_institution = true;
        $accountAdjustment->save();



        // update account
        $account = Account::where('id', $request->account)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        $account->balance = doubleval($account->balance)+doubleval($request->amount);
        $account->user_id = $user->id;
        $account->save();

        return redirect()->route('business.account.show',['portal'=>$institution->portal, 'id'=>$account->id])->withSuccess('Account Adjustment successfully created!');

    }

    public function accountAdjustmentEdit($portal)
    {

        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // Get transactions
        $transactions = Transaction::with('user', 'status', 'sourceAccount', 'destinationAccount', 'account', 'expense')->where('is_institution', true)->where('institution_id', $institution->id)->get();
        return view('business.account_adjustment_create', compact('transactions', 'user', 'institution', 'transactions', 'accounts'));

    }

    public function accountAdjustmentUpdate(Request $request, $portal)
    {

        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // new transaction
        $size = 5;
        $reference = $this->getRandomString($size);
        $transaction = new Transaction();
        if ($request->is_expense == "on")
        {
            $transaction->is_expense = true;
            $transaction->is_transfer = false;
            $transaction->expense_id = $request->expense;
        }
        $transaction->account_id = $request->account;
        $transaction->amount = $request->amount;
        $transaction->reference = $reference;
        $transaction->date = date('Y-m-d', strtotime($request->date));
        $transaction->notes = $request->notes;
        if ($request->is_transfer == "on")
        {
            $transaction->is_transfer = true;
            $transaction->is_expense = false;
            $transaction->source_account_id = $request->source_account;
            $transaction->destination_account_id = $request->destination_account;
        }
        $transaction->user_id = $user->id;
        $transaction->status_id = $request->status;
        $transaction->save();

        if ($request->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2')
        {
            if ($request->is_expense == "on")
            {
                $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $request->account)->where('is_institution', true)->where('institution_id', $institution->id)->first();
                $account->balance = doubleval($account->balance)-doubleval($request->amount);
                $account->user_id = $user->id;
                $account->save();
            } elseif ($request->is_transfer == "on")
            {

                // credit source
                $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $request->sourceAccount)->where('is_institution', true)->where('institution_id', $institution->id)->first();
                $account->balance = doubleval($account->balance)-doubleval($request->amount);
                $account->user_id = $user->id;
                $account->save();


                // debit destination
                $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $request->destination_account)->where('is_institution', true)->where('institution_id', $institution->id)->first();
                $account->balance = doubleval($account->balance)+doubleval($request->amount);
                $account->user_id = $user->id;
                $account->save();

            }
        }
        // account subtraction

        return redirect()->route('business.transaction.show',['portal'=>$institution->portal, 'id'=>$transaction->id])->withSuccess('Transaction '.$transaction->reference.' successfully updated!');

    }

    public function accountAdjustmentDelete($portal, $account_adjustment_id)
    {
        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);
        // Check if exists
        $accountAdjustmentExists = AccountAdjustment::findOrFail($account_adjustment_id);
        // get adjustment account
        $accountAdjustment = AccountAdjustment::where('id', $account_adjustment_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        $accountAdjustment->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $accountAdjustment->user_id = $user->id;
        $accountAdjustment->save();

        // reinburse
        $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $accountAdjustment->account_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        $account->balance = doubleval($account->balance)-doubleval($accountAdjustment->amount);
        $account->user_id = $user->id;
        $account->save();
        return back()->withSuccess(__('Account adjustment '.$accountAdjustment->reference.' successfully deleted.'));
    }

    public function accountAdjustmentRestore($portal, $account_adjustment_id)
    {
        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);
        // Check if exists
        $accountAdjustmentExists = AccountAdjustment::findOrFail($account_adjustment_id);
        // get adjustment account
        $accountAdjustment = AccountAdjustment::where('id', $account_adjustment_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        $accountAdjustment->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $accountAdjustment->user_id = $user->id;
        $accountAdjustment->save();

        // reinburse account
        $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $accountAdjustment->account_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();
        $account->balance = doubleval($account->balance)+doubleval($accountAdjustment->amount);
        $account->user_id = $user->id;
        $account->save();

        return back()->withSuccess(__('Account adjustment '.$accountAdjustment->reference.' successfully restored.'));
    }


    // deposits
    public function depositStore(Request $request, $portal)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        $size = 5;
        $reference = $this->getRandomString($size);

        // update account
        $account = Account::findOrFail($request->account);
        $initial_amount = $account->balance;
        $new = doubleval($account->balance) + doubleval($request->amount);
        $account->balance = $new;
        $account->user_id = $user->id;
        $account->save();

        $deposit = new Deposit();
        $deposit->reference = $reference;
        $deposit->about = $request->about;
        $deposit->date = date('Y-m-d', strtotime($request->date));
        $deposit->initial_amount = $initial_amount;
        $deposit->amount = $request->amount;
        $deposit->subsequent_amount = doubleval($account->balance) + doubleval($request->amount);
        $deposit->account_id = $account->id;
        $deposit->institution_id = $institution->id;
        $deposit->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $deposit->user_id = $user->id;
        $deposit->is_user = false;
        $deposit->is_institution = true;
        $deposit->is_income = true;
        $deposit->is_chama = true;
        $deposit->save();

        return redirect()->route('business.deposit.show',['portal'=>$institution->portal, 'id'=>$deposit->id])->withSuccess('Deposit updated!');
    }

    public function depositShow($portal, $deposit_id)
    {
        // Check if action type exists
        $depositExists = Deposit::findOrFail($deposit_id);
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get deposit
        $deposit = Deposit::with('user', 'status', 'account', 'accountAdjustments')->where('institution_id', $institution->id)->where('is_institution', true)->where('id', $deposit_id)->first();
        // Pending to dos
        $pendingToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'deposit')->where('status_id', 'f3df38e3-c854-4a06-be26-43dff410a3bc')->where('deposit_id', $deposit->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'deposit')->where('status_id', '2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('deposit_id', $deposit->id)->get();
        // Completed to dos
        $completedToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'deposit')->where('status_id', 'facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('deposit_id', $deposit->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'deposit')->where('status_id', '99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('deposit_id', $deposit->id)->get();

        return view('business.deposit_show', compact('overdueToDos', 'completedToDos', 'inProgressToDos', 'pendingToDos', 'deposit', 'user', 'institution'));
    }

    public function depositAccountAdjustmentCreate($portal, $deposit_id)
    {
        // Check if deposit exists
        $depositExists = Deposit::findOrFail($deposit_id);
        if($depositExists->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Deposit '.$depositExists->name.' is deleted.'));
        }
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get deposit
        $deposit = Deposit::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('user', 'status', 'account', 'accountAdjustments')->where('is_institution', true)->where('institution_id', $institution->id)->where('id', $deposit_id)->first();
        // get account
        $accountExists = Account::findOrFail($deposit->account_id);
        $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $deposit->account_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();

        return view('business.account_adjustment_create', compact('depositExists', 'deposit', 'account', 'user', 'institution', 'accounts'));

    }

    public function depositUpdate(Request $request, $portal, $deposit_id)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        $deposit = Deposit::findOrFail($deposit_id);
        $deposit->about = $request->about;
        $deposit->amount = $request->amount;
        $deposit->user_id = $user->id;
        $deposit->save();

        $size = 5;
        $reference = $this->getRandomString($size);
        // create adjustment
        $accountAdjustment = new AccountAdjustment();
        $accountAdjustment->reference = $reference;
        $notes = 'Account adjustment for correction of deposit of '.$deposit->reference;
        $accountAdjustment->reference = $notes;
        $accountAdjustment->amount = $request->amount;

        // TODO figuring out initial amount for this
        $accountAdjustment->initial_account_amount = $deposit->initial_amount;
        $accountAdjustment->subsequent_account_amount = $deposit->subsequent_amount;

        $accountAdjustment->date = date('Y-m-d', strtotime($request->date));

        $accountAdjustment->account_id = $deposit->account_id;
        $accountAdjustment->is_deposit = true;
        $accountAdjustment->deposit_id = $deposit->id;

        $accountAdjustment->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $accountAdjustment->user_id = $user->id;
        $accountAdjustment->save();

        return redirect()->route('business.deposit.show',['portal'=>$institution->portal, 'id'=>$deposit_id])->withSuccess('Deposit '. $deposit->name .' updated!');
    }


    public function depositDelete($portal, $deposit_id)
    {

        $deposit = Deposit::findOrFail($deposit_id);
        $deposit->delete();

        return back()->withSuccess(__('Deposit '.$deposit->name.' successfully deleted.'));
    }

    public function depositRestore($portal, $deposit_id)
    {

        $deposit = Deposit::withTrashed()->findOrFail($deposit_id);
        $deposit->restore();

        return back()->withSuccess(__('Deposit '.$deposit->name.' successfully restored.'));
    }


    // withdrawals
    public function withdrawalStore(Request $request, $portal)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        $size = 5;
        $reference = $this->getRandomString($size);

        // update account
        $account = Account::findOrFail($request->account);
        $initial_amount = $account->balance;
        $new = doubleval($account->balance) - doubleval($request->amount);
        $account->balance = $new;
        $account->user_id = $user->id;
        $account->save();

        $withdrawal = new Withdrawal();
        $withdrawal->reference = $reference;
        $withdrawal->about = $request->about;
        $withdrawal->date = date('Y-m-d', strtotime($request->date));
        $withdrawal->initial_amount = $initial_amount;
        $withdrawal->amount = $request->amount;
        $withdrawal->subsequent_amount = doubleval($account->balance) + doubleval($request->amount);
        $withdrawal->account_id = $account->id;
        $withdrawal->institution_id = $institution->id;
        $withdrawal->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $withdrawal->user_id = $user->id;
        $withdrawal->is_user = false;
        $withdrawal->is_chama = false;
        $withdrawal->is_institution = true;
        $withdrawal->save();

        return redirect()->route('business.withdrawal.show',['portal'=>$institution->portal, 'id'=>$withdrawal->id])->withSuccess('Withdrawal updated!');
    }

    public function withdrawalShow($portal, $withdrawal_id)
    {
        // Check if action type exists
        $withdrawalExists = Withdrawal::findOrFail($withdrawal_id);
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get withdrawal
        $withdrawal = Withdrawal::with('user', 'status', 'account', 'accountAdjustments')->where('institution_id', $institution->id)->where('is_institution', true)->where('id', $withdrawal_id)->first();
        // Pending to dos
        $pendingToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'withdrawal')->where('status_id', 'f3df38e3-c854-4a06-be26-43dff410a3bc')->where('withdrawal_id', $withdrawal->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'withdrawal')->where('status_id', '2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('withdrawal_id', $withdrawal->id)->get();
        // Completed to dos
        $completedToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'withdrawal')->where('status_id', 'facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('withdrawal_id', $withdrawal->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'withdrawal')->where('status_id', '99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('withdrawal_id', $withdrawal->id)->get();

        return view('business.withdrawal_show', compact('overdueToDos', 'completedToDos', 'inProgressToDos', 'pendingToDos', 'withdrawal', 'user', 'institution'));
    }

    public function withdrawalAccountAdjustmentCreate($portal, $withdrawal_id)
    {

        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get withdrawal
        $withdrawalExists = Withdrawal::findOrFail($withdrawal_id);
        $withdrawal = Withdrawal::with('user', 'status', 'account', 'accountAdjustments')->where('is_institution', true)->where('institution_id', $institution->id)->where('id', $withdrawal_id)->first();
        // get account
        $accountExists = Account::findOrFail($withdrawal->account_id);
        $account = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('id', $withdrawal->account_id)->where('is_institution', true)->where('institution_id', $institution->id)->first();

        return view('business.withdrawal_account_adjustment_create', compact('withdrawal', 'account', 'user', 'institution', 'accounts'));

    }

    public function withdrawalUpdate(Request $request, $portal, $withdrawal_id)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        $withdrawal = Withdrawal::findOrFail($withdrawal_id);
        $withdrawal->about = $request->about;
        $withdrawal->amount = $request->amount;
        $withdrawal->user_id = $user->id;
        $withdrawal->save();

        $size = 5;
        $reference = $this->getRandomString($size);
        // create adjustment
        $accountAdjustment = new AccountAdjustment();
        $accountAdjustment->reference = $reference;
        $notes = 'Account adjustment for correction of withdrawal of '.$withdrawal->reference;
        $accountAdjustment->reference = $notes;
        $accountAdjustment->amount = $request->amount;

        // TODO figuring out initial amount for this
        $accountAdjustment->initial_account_amount = $withdrawal->initial_amount;
        $accountAdjustment->subsequent_account_amount = $withdrawal->subsequent_amount;

        $accountAdjustment->date = date('Y-m-d', strtotime($request->date));

        $accountAdjustment->account_id = $withdrawal->account_id;
        $accountAdjustment->is_withdrawal = true;
        $accountAdjustment->withdrawal_id = $withdrawal->id;

        $accountAdjustment->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $accountAdjustment->user_id = $user->id;
        $accountAdjustment->save();

        return redirect()->route('business.withdrawal.show',['portal'=>$institution->portal, 'id'=>$withdrawal_id])->withSuccess('Withdrawal '. $withdrawal->name .' updated!');
    }

    public function withdrawalDelete($portal, $withdrawal_id)
    {

        $withdrawal = Withdrawal::findOrFail($withdrawal_id);
        $withdrawal->delete();

        return back()->withSuccess(__('Withdrawal '.$withdrawal->name.' successfully deleted.'));
    }

    public function withdrawalRestore($portal, $withdrawal_id)
    {

        $withdrawal = Withdrawal::withTrashed()->findOrFail($withdrawal_id);
        $withdrawal->restore();

        return back()->withSuccess(__('Withdrawal '.$withdrawal->name.' successfully restored.'));
    }


    // loans
    public function loans($portal)
    {
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        $loans = Loan::with('user', 'status', 'account', 'loanType')->where('is_institution', true)->where('institution_id', $institution->id)->where('is_institution', true)->get();
        return view('business.loans', compact('loans', 'user', 'institution'));
    }

    public function loanCreate($portal)
    {
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // loan types
        $loanTypes = LoanType::all();
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get contacts
        $contacts = Contact::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('organization')->where('is_institution', true)->where('institution_id', $institution->id)->get();
        return view('business.loan_create', compact('user', 'institution', 'accounts', 'contacts', 'loanTypes'));
    }

    public function loanStore(Request $request, $portal)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);
        // generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        // calculations
        $account = Account::findOrFail($request->account);
        // if i am the loaner
        $loanType = LoanType::findOrFail($request->loan_type);
        if ($loanType->name == 'Loaner')
        {
            // check if this is an overdraft
            if($request->total > $account->balance){
                return back()->withWarning(__('This loan will overdraft the account.'));
            }
            $accountBalance = doubleval($account->balance) - doubleval($request->total);
        } elseif ($loanType->name == 'Lonee'){
            $accountBalance = doubleval($account->balance) + doubleval($request->total);
        }

        // store loan record
        $loan = new Loan();
        $loan->reference = $reference;
        $loan->about = $request->about;

        $loan->total = $request->total;
        $loan->principal = $request->principal;
        $loan->interest = $request->interest;
        $loan->interest_amount = $request->interest_amount;
        $loan->balance = $request->total;
        $loan->paid = 0;

        $loan->date = date('Y-m-d', strtotime($request->date));
        $loan->due_date = date('Y-m-d', strtotime($request->due_date));

        $loan->contact_id = $request->contact;
        $loan->account_id = $request->account;
        $loan->loan_type_id = $request->loan_type;

        $loan->is_user = false;
        $loan->is_institution = true;
        $loan->is_chama = false;
        $loan->institution_id = $institution->id;

        $loan->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $loan->user_id = $user->id;
        $loan->save();

        // update accounts balance
        $account->balance = $accountBalance;
        $account->user_id = $user->id;
        $account->save();

        return redirect()->route('business.loan.show',['portal'=>$institution->portal, 'id'=>$loan->id])->withSuccess('Loan created!');
    }

    public function loanShow($portal, $loan_id)
    {
        // Check if contact type exists
        $loanExists = Loan::findOrFail($loan_id);
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // loan types
        $loanTypes = LoanType::all();
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get contacts
        $contacts = Contact::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('organization')->where('is_institution', true)->where('institution_id', $institution->id)->get();
        // Get contact type
        $loan = Loan::with('user', 'status', 'account', 'contact.organization', 'payments', 'loanType')->where('is_institution', true)->where('id', $loan_id)->where('institution_id', $institution->id)->first();
        // Pending to dos
        $pendingToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'loan')->where('status_id', 'f3df38e3-c854-4a06-be26-43dff410a3bc')->where('loan_id', $loan->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'loan')->where('status_id', '2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('loan_id', $loan->id)->get();
        // Completed to dos
        $completedToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'loan')->where('status_id', 'facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('loan_id', $loan->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'loan')->where('status_id', '99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('loan_id', $loan->id)->get();
        return view('business.loan_show', compact('overdueToDos', 'completedToDos', 'inProgressToDos', 'pendingToDos', 'accounts', 'contacts', 'loan', 'user', 'institution', 'loanTypes'));
    }

    public function loanPaymentCreate($portal, $loan_id)
    {
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // loans
        $loan = Loan::findOrFail($loan_id);
        return view('business.loan_payment_create', compact('user', 'institution', 'accounts', 'loan'));
    }

    public function loanUpdate(Request $request, $portal, $loan_id)
    {

        $loan = Loan::findOrFail($loan_id);
        return $loan;

        $loan->about = $request->about;

        $loan->date = date('Y-m-d', strtotime($request->date));
        $loan->due_date = date('Y-m-d', strtotime($request->due_date));

        return back();

    }

    public function loanDelete($portal, $loan_id)
    {

        $loan = Loan::findOrFail($loan_id);
        $loan->delete();

        return back()->withSuccess(__('Loan '.$loan->name.' successfully deleted.'));
    }
    public function loanRestore($portal, $loan_id)
    {

        $loan = Loan::withTrashed()->findOrFail($loan_id);
        $loan->restore();

        return back()->withSuccess(__('Loan '.$loan->name.' successfully restored.'));
    }


    //transfers
    public function transfers($portal)
    {
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        $transfers = Transfer::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('user', 'status', 'sourceAccount', 'destinationAccount')->where('is_institution', true)->where('institution_id', $institution->id)->where('is_institution', true)->get();
        return view('business.transfers', compact('transfers', 'user', 'institution'));
    }

    public function transferCreate($portal)
    {
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // get accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        return view('business.transfer_create', compact('user', 'institution', 'accounts'));
    }

    public function transferStore(Request $request, $portal)
    {

        // User
        $user = $this->getUser();
        // Institution
        $institution = $this->getInstitution($portal);

        // generate reference
        $size = 5;
        $reference = $this->getRandomString($size);
        // calculations
        $sourceAccount = Account::findOrFail($request->source_account);
        $sourceAccountInitialAmount = $sourceAccount->balance;
        $sourceAccountSubsequentAmount = doubleval($sourceAccount->balance) - doubleval($request->amount);
        $destinationAccount = Account::findOrFail($request->destination_account);
        $destinationAccountInitialAmount = $destinationAccount->balance;
        $destinationAccountSubsequentAmount = doubleval($destinationAccount->balance) + doubleval($request->amount);

        // store transfer record
        $transfer = new Transfer();
        $transfer->reference = $reference;
        $transfer->notes = $request->notes;
        $transfer->amount = $request->amount;
        $transfer->date = date('Y-m-d', strtotime($request->date));

        $transfer->source_initial_amount = $sourceAccountInitialAmount;
        $transfer->source_subsequent_amount = $sourceAccountSubsequentAmount;
        $transfer->destination_initial_amount = $destinationAccountInitialAmount;
        $transfer->destination_subsequent_amount = $destinationAccountSubsequentAmount;

        $transfer->source_account_id = $request->source_account;
        $transfer->destination_account_id = $request->destination_account;

        $transfer->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $transfer->user_id = $user->id;
        $transfer->is_user = false;
        $transfer->is_institution = true;
        $transfer->institution_id = $institution->id;
        $transfer->save();

        // update accounts balance
        $sourceAccount->balance = $sourceAccountSubsequentAmount;
        $sourceAccount->user_id = $user->id;
        $sourceAccount->is_user = false;
        $sourceAccount->is_institution = true;
        $sourceAccount->save();
        $destinationAccount->balance = $destinationAccountSubsequentAmount;
        $destinationAccount->user_id = $user->id;
        $destinationAccount->save();

        return redirect()->route('business.transfer.show',['portal'=>$institution->portal, 'id'=>$transfer->id])->withSuccess('Transfer created!');
    }

    public function transferShow($portal, $transfer_id)
    {
        // Check if contact type exists
        $transferExists = Transfer::findOrFail($transfer_id);
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // Get transfer
        $transfer = Transfer::with('user', 'status', 'sourceAccount', 'destinationAccount', 'expenses')->where('is_institution', true)->where('institution_id', $institution->id)->where('id', $transfer_id)->first();
        // Pending to dos
        $pendingToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'transfer')->where('status_id', 'f3df38e3-c854-4a06-be26-43dff410a3bc')->where('transfer_id', $transfer->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'transfer')->where('status_id', '2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('transfer_id', $transfer->id)->get();
        // Completed to dos
        $completedToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'transfer')->where('status_id', 'facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('transfer_id', $transfer->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::where('institution_id', $institution->id)->where('is_institution', true)->with('user', 'status', 'transfer')->where('status_id', '99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('transfer_id', $transfer->id)->get();

        return view('business.transfer_show', compact('overdueToDos', 'completedToDos', 'inProgressToDos', 'pendingToDos', 'transfer', 'user', 'institution'));
    }

    public function transferExpenseCreate($portal, $transfer_id)
    {
        // get transfer
        $transferExists = Transfer::findOrFail($transfer_id);
        if($transferExists->status_id == "d35b4cee-5594-4cfd-ad85-e489c9dcdeff"){
            return back()->withWarning(__('Transfer '.$transferExists->name.' is deleted.'));
        }
        // User
        $user = $this->getUser();
        // Get the navbar values
        $institution = $this->getInstitution($portal);
        // expense statuses
        $expenseStatuses = Status::where('status_type_id', '7805a9f3-c7ca-4a09-b021-cc9b253e2810')->get();
        // expense accounts
        $expenseAccounts = ExpenseAccount::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // accounts
        $accounts = Account::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get sales
        $sales = Sale::where('institution_id', $institution->id)->with('status')->get();
        // Get transfer
        $transfer = Transfer::with('user', 'status', 'sourceAccount', 'destinationAccount', 'expenses')->where('is_institution', true)->where('institution_id', $institution->id)->where('id', $transfer_id)->first();
        // get transfers
        $transfers = Transfer::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->where('is_institution', true)->get();
        // get campaign
        $campaigns = Campaign::where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->where('institution_id', $institution->id)->get();
        // get frequencies
        $frequencies = Frequency::where("status_id", "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")->where('institution_id', $institution->id)->where('is_institution', true)->get();

        return view('business.expense_create', compact('transferExists', 'accounts', 'frequencies', 'campaigns', 'transfers', 'sales', 'transfer', 'user', 'institution', 'expenseStatuses', 'expenseAccounts', 'transfer'));
    }

    public function transferUpdate(Request $request, $portal, $transfer_id)
    {

        $transfer = Transfer::findOrFail($transfer_id);
        // $transfer->name = $request->name;
        // $transfer->save();

        return back();
    }

    public function transferDelete($portal, $transfer_id)
    {

        $transfer = Transfer::findOrFail($transfer_id);
        $transfer->delete();

        return back()->withSuccess(__('Transfer '.$transfer->name.' successfully deleted.'));
    }
    public function transferRestore($portal, $transfer_id)
    {

        $transfer = Transfer::withTrashed()->findOrFail($transfer_id);
        $transfer->restore();

        return back()->withSuccess(__('Transfer '.$transfer->name.' successfully restored.'));
    }
}
