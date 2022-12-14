<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use SoftDeletes;
    use Notifiable;

    // Parents
    public function userType()
    {
        return $this->belongsTo('App\UserType');
    }

    // Children

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }
    public function accountTypes()
    {
        return $this->hasMany('App\AccountType');
    }
    public function address()
    {
        return $this->hasMany('App\Address');
    }
    public function agents()
    {
        return $this->hasMany('App\Agent');
    }
    public function agentCommissions()
    {
        return $this->hasMany('App\AgentCommission');
    }
    public function agentCommissionsNullifiedBy()
    {
        return $this->hasMany('App\AgentCommission', 'id', 'nullified_by');
    }
    public function agentUsers()
    {
        return $this->hasMany('App\User');
    }
    public function agentPayments()
    {
        return $this->hasMany('App\AgentPayment');
    }
    public function agentTierChanges()
    {
        return $this->hasMany('App\AgentTierChange');
    }
    public function approvedAgents()
    {
        return $this->hasMany('App\Agent', 'id', 'approved_by');
    }
    public function registeredAgents()
    {
        return $this->hasMany('App\Agent', 'id', 'registered_by');
    }
    public function assigneeToDos()
    {
        return $this->hasMany('App\ToDo', 'id', 'assignee_id');
    }
    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
    public function compositeProducts()
    {
        return $this->hasMany('App\CompositeProduct');
    }
    public function compositeProductProducts()
    {
        return $this->hasMany('App\CompositeProductProduct');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
    public function contactTypes()
    {
        return $this->hasMany('App\ContactType');
    }
    public function currencies()
    {
        return $this->hasMany('App\Currency');
    }
    public function departments()
    {
        return $this->hasMany('App\Department');
    }
    public function disabled_by()
    {
        return $this->hasMany('App\Agent');
    }
    public function estimates()
    {
        return $this->hasMany('App\Estimate');
    }
    public function estimateProducts()
    {
        return $this->hasMany('App\EstimateProduct');
    }
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function expenseItems()
    {
        return $this->hasMany('App\ExpenseItem');
    }
    public function features()
    {
        return $this->hasMany('App\Feature');
    }
    public function fiscalYears()
    {
        return $this->hasMany('App\FiscalYear');
    }
    public function forums()
    {
        return $this->hasMany('App\Forum');
    }
    public function forumPosts()
    {
        return $this->hasMany('App\ForumPost');
    }
    public function forumPostUploads()
    {
        return $this->hasMany('App\ForumPostUpload');
    }
    public function forumUploads()
    {
        return $this->hasMany('App\ForumUpload');
    }
    public function industries()
    {
        return $this->hasMany('App\Industry');
    }
    public function industryGroups()
    {
        return $this->hasMany('App\IndustryGroup');
    }
    public function institutions()
    {
        return $this->hasMany('App\Institution');
    }
    public function institutionRelationships()
    {
        return $this->hasMany('App\InstitutionRelationship');
    }
    public function institutionServices()
    {
        return $this->hasMany('App\InstitutionService');
    }
    public function institutionSubIndustries()
    {
        return $this->hasMany('App\InstitutionSubIndustry');
    }
    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }
    public function inventoryAdjustments()
    {
        return $this->hasMany('App\InventoryAdjustment');
    }
    public function inventoryAdjustmentProducts()
    {
        return $this->hasMany('App\InventoryAdjustmentProduct');
    }
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }
    public function invoiceProducts()
    {
        return $this->hasMany('App\InvoiceProduct');
    }
    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
    public function issueUploads()
    {
        return $this->hasMany('App\IssueUpload');
    }
    public function languages()
    {
        return $this->hasMany('App\Language');
    }
    public function manualJournals()
    {
        return $this->hasMany('App\ManualJournal');
    }
    public function manualJournalAccounts()
    {
        return $this->hasMany('App\ManualJournalAccount');
    }
    public function manufacturers()
    {
        return $this->hasMany('App\Manufacturer');
    }
    public function menus()
    {
        return $this->hasMany('App\Menu');
    }
    public function milestones()
    {
        return $this->hasMany('App\Milestone');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }
    public function paymentsMade()
    {
        return $this->hasMany('App\PaymentMade');
    }
    public function paymentsReceived()
    {
        return $this->hasMany('App\PaymentReceived');
    }
    public function paymentTerms()
    {
        return $this->hasMany('App\PaymentTerm');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
    public function productGroups()
    {
        return $this->hasMany('App\ProductGroup');
    }
    public function productGroupImages()
    {
        return $this->hasMany('App\ProductGroupImage');
    }
    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }
    public function productReturns()
    {
        return $this->hasMany('App\ProductReturn');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function projectMembers()
    {
        return $this->hasMany('App\ProjectMember');
    }
    public function projectRoles()
    {
        return $this->hasMany('App\ProjectRole');
    }
    public function purchaseOrders()
    {
        return $this->hasMany('App\PurchaseOrder');
    }
    public function purchaseOrderApprovals()
    {
        return $this->hasMany('App\PurchaseOrderApproval');
    }
    public function purchaseOrderItems()
    {
        return $this->hasMany('App\PurchaseOrderItem');
    }
    public function purchaseOrderSettings()
    {
        return $this->hasMany('App\PurchaseOrderSetting');
    }
    public function reasons()
    {
        return $this->hasMany('App\Reason');
    }
    public function restocks()
    {
        return $this->hasMany('App\Restock');
    }
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
    public function saleProducts()
    {
        return $this->hasMany('App\SaleProduct');
    }
    public function sections()
    {
        return $this->hasMany('App\Section');
    }
    public function sectors()
    {
        return $this->hasMany('App\Sector');
    }
    public function services()
    {
        return $this->hasMany('App\Service');
    }
    public function servicePricings()
    {
        return $this->hasMany('App\ServicePricing');
    }
    public function serviceTypes()
    {
        return $this->hasMany('App\ServiceType');
    }
    public function serviceTypePricings()
    {
        return $this->hasMany('App\ServiceTypePricing');
    }
    public function statuses()
    {
        return $this->hasMany('App\Status');
    }
    public function subIndustries()
    {
        return $this->hasMany('App\SubIndustry');
    }
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    public function taskLists()
    {
        return $this->hasMany('App\TaskList');
    }
    public function taskUploads()
    {
        return $this->hasMany('App\TaskUpload');
    }
    public function taxes()
    {
        return $this->hasMany('App\Tax');
    }
    public function tier()
    {
        return $this->belongsTo('App\Tier');
    }
    public function timesheets()
    {
        return $this->hasMany('App\Timesheet');
    }
    public function timezones()
    {
        return $this->hasMany('App\Timezone');
    }
    public function toDos()
    {
        return $this->hasMany('App\ToDo');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    public function transferOrders()
    {
        return $this->hasMany('App\TransferOrder');
    }
    public function transferOrderProducts()
    {
        return $this->hasMany('App\TransferOrderProduct');
    }
    public function units()
    {
        return $this->hasMany('App\Unit');
    }
    public function userAccounts()
    {
        return $this->hasMany('App\UserAccount');
    }
    public function currentUserAccounts()
    {
        return $this->hasMany('App\UserAccount')->where('status_id', 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e');
    }
    public function activeUserAccount()
    {
        return $this->hasOne('App\UserAccount')->where('is_active', true);
    }
    public function inactiveUserAccount()
    {
        return $this->hasMany('App\UserAccount')->where('is_active', false);
    }
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
    public function uploadTypes()
    {
        return $this->hasMany('App\UploadType');
    }
    public function userDetail()
    {
        return $this->hasOne('App\UserDetail');
    }
    public function userTypes()
    {
        return $this->hasMany('App\UserType');
    }
    public function userTypeFeatures()
    {
        return $this->hasMany('App\UserTypeFeature');
    }
    public function userTypeMenus()
    {
        return $this->hasMany('App\UserTypeMenu');
    }
    public function userTypeSections()
    {
        return $this->hasMany('App\UserTypeSection');
    }
    public function warehouses()
    {
        return $this->hasMany('App\Warehouse');
    }

    public function approvedTimesheets()
    {
        return $this->hasMany('App\Timesheet', 'approved_by', 'id');
    }
    public function projectsOwned()
    {
        return $this->hasMany('App\Project', 'project_owner', 'id');
    }
    public function tasksAssigned()
    {
        return $this->hasMany('App\Task', 'assignee_id', 'id');
    }
    public function issuesAssigned()
    {
        return $this->hasMany('App\Issue', 'assignee_id', 'id');
    }
    public function issuesReported()
    {
        return $this->hasMany('App\Issue', 'reporter_id', 'id');
    }
    public function milestonesAssigned()
    {
        return $this->hasMany('App\Milestone', 'assignee_id', 'id');
    }




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'phone_number', 'email', 'password', 'user_type', 'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
