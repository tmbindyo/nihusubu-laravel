<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Tier;
use App\Agent;
use App\UserAccount;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{

    use UserTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agents()
    {
        // User
        $user = $this->getUser();
        // Get agents
        $agents = Agent::get();
        // tiers
        $tiers = Tier::get();

        return view('admin.agents', compact('agents', 'user', 'tiers'));
    }

    public function agentCreate()
    {
        // User
        $user = $this->getUser();

        return view('admin.agent_create', compact( 'user'));
    }

    public function agentStore(Request $request)
    {

        // // validation
        // $request->validate([
        //     'name' => 'required|unique:agents|max:255',
        // ]);

        // User
        $user = $this->getUser();

        // check if user exists
        $userReg = User::where('email',$request->email)->first();

        // get last agent code
        $agent_count = Agent::count();
        $new_code = $agent_count + 1;

        if($userReg){
            // get role
            $role = Role::where('name', 'agent')->with('permissions')->first();
            // assign role
            $userReg->assignRole($role);
            // check if user has an account
            $userAccount = UserAccount::where('user_id',$userReg->id)->where('is_agent', true)->first();
            if ($userAccount){
                return back()->withWarning(__('This user already has an account!'));
            }
        }
        else{
            // create user
            $userReg = new User();
            $userReg->name = $request->first_name.' '.$request->last_name;
            $userReg->email = $request->email;
            $userReg->phone_number = $request->phone_number;
            $userReg->password = Hash::make('pending');
            $userReg->save();
        }

        //  check if user is agent
        // create user account
        $newUserAccount = new UserAccount();
        $newUserAccount->is_user = false;
        $newUserAccount->is_admin = false;
        $newUserAccount->is_active = false;
        $newUserAccount->is_institution = false;
        $newUserAccount->is_agent = true;
        $newUserAccount->user_type_id = '4be20a9a-aee3-414c-b8ba-dcacf859cc9c';
        $newUserAccount->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $newUserAccount->user_id = $userReg->id;
        $newUserAccount->registerer_id = $user->id;
        $newUserAccount->save();
        $userAccount = UserAccount::where('id',$newUserAccount->id)->with('user','institution')->first();

        // Create agent
        $agent = new Agent();
        $agent->code = $new_code;
        $agent->id_number = $request->id_number;
        $agent->kra_pin = $request->kra_pin;
        $agent->phone_number = $request->phone_number;
        $agent->url = 'www.nihusubu.com/agent/signup/NIHU'.$new_code;

        $agent->tier_id = $request->tier;
        $agent->is_approved = False;
        $agent->is_disabled = False;

        $agent->user_id = $userReg->id;
        $agent->registered_by = $user->id;
        $agent->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';

        $agent->save();

        return redirect()->route('admin.agent.show',$agent->id)->withSuccess(__('Agent '.$agent->name.' successfully created!'));
    }

    public function agentShow($agent_id)
    {
        // Check if agent exists
        $depositExists = Agent::findOrFail($agent_id);
        // User
        $user = $this->getUser();
        // agent
        $agent = Agent::where('id', $agent_id)->with('approvedBy','user','status','registeredBy','disabledBy','tier','agentCommissions','agentPayments','agentInstitutions','agentTierChanges','agentUsers')->first();
        return view('admin.agent_show', compact('agent', 'user'));
    }

    public function agentUpdate(Request $request, $agent_id)
    {
        // User
        $user = $this->getUser();
        // check if agent exists
        $agentNameExists = Agent::where('name',$request->name)->first();
        if ($agentNameExists){
            return back()->withWarning('Agent '.$request->name.' exists!');
        }else{
            // update agent
            $agent = Agent::where('id',$agent_id)->first();
            $agent->name = $request->name;
            $agent->save();
        }

        return redirect()->route('admin.agent.show',$agent->id)->withSuccess('Agent '.$agent->name.' successfully created!');
    }

    public function agentDelete($agent_id)
    {

        $agent = Agent::findOrFail($agent_id);
        $agent->status_id = "d35b4cee-5594-4cfd-ad85-e489c9dcdeff";
        $agent->save();
        // Users
        $agent = Agent::where('id',$agent->id)->with('user')->get();

        return back()->withSuccess(__('User '.$agent->user->name.' successfully deleted.'));
    }

    public function agentRestore($agent_id)
    {

        $agent = Agent::findOrFail($agent_id);
        $agent->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $agent->restore();
        // Users
        $agent = Agent::where('id',$agent->id)->with('user')->get();

        return back()->withSuccess(__('Brand '.$agent->user->name.' successfully restored.'));
    }

}
