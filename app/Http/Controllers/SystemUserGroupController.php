<?php

namespace App\Http\Controllers;
use Request;
use App\Models\SystemMenu;
use App\Models\SystemUserGroup;
use Illuminate\Support\Facades\DB;

class SystemUserGroupController extends Controller
{
    public function index(){
        $systemmenu         = SystemMenu::get();
        return view('content.SystemUserGroup.index',compact('systemmenu'));
    }
    public function create(){
        $systemmenu         = SystemMenu::get();
        return view('content.SystemUserGroup.FormAddSystemUserGroup',compact('systemmenu'));
    }

    public function store(Request $request){
        $fields = $request->validate([
            'user_group_name'           => 'required',
        ]);
        // * get sistem menu
        $systemmenu = SystemMenu::get();
        try {
        DB::beginTransaction();
        $acctSavings = AcctSavings::create([
            'savings_code'           => $fields['savings_code'],
            'savings_name'           => $fields['savings_name'],
            'account_id'             => $fields['account_id'],
            'account_basil_id'       => $fields['account_basil_id'],
            'savings_number'         => $fields['savings_number'],
            'savings_last_balance'   => $fields['savings_last_balance'],
            'savings_profit_sharing' => $fields['savings_profit_sharing'],
            'savings_nisbah'         => $fields['savings_nisbah'],
            'savings_basil'          => $fields['savings_basil'],
            'savings_status'         => $fields['savings_status'],
            'branch_id'              => auth()->user()->branch_id,
            'company_id'             => auth()->user()->company_id,
        ]);
        
        foreach ($systemmenu as $key => $val) {
            // Memeriksa apakah checkbox untuk menu ini di-check
            if (isset($request['checkbox_' . $val['id_menu']])) {
                // Menambahkan pemetaan untuk simpanan
                $acctSavings->maping()->create([
                    'user_group_level' => $fields['user_group_level'],
                    'id_menu'          => $val['id_menu'],
                    'company_id'       => auth()->user()->company_id,
                ]);
            }
        }        
        DB::commit();
        return redirect()->route('system-user-group')->success('Tambah System User Group Berhasil');
        } catch (\Exception $e) {
        DB::rollBack();
        report($e);
        return redirect()->route('system-user-group')->danger('Tambah System User Group Gagal');
        }
    }

    public function update(Request $request){
        $fields = $request->validate([
            'user_group_id'             => 'required',
            'user_group_name'           => 'required',
            'user_group_level'          => 'required'
        ]);
        try {
            DB::beginTransaction();
            $systemmenu = SystemMenu::get();
            $usergroup                   = SystemUserGroup::findOrFail($fields['user_group_id']);
            $usergroup->user_group_name  = $fields['user_group_name'];
            $usergroup->user_group_level = $fields['user_group_level'];
            $usergroup->maping()->delete();
            foreach($systemmenu as $key => $val){
                if(isset($request['checkbox_'.$val['id_menu']])){
                    $usergroup->maping()->create( [
                        'id_menu'          => $val['id_menu'],
                        'company_id'       => auth()->user()->company_id
                    ]);
                }
            }
            $usergroup->save();
            DB::commit();
            return redirect()->route('system-user-group')->success('Edit System User Group Berhasil');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect()->route('system-user-group')->danger('Edit System User Group Gagal');
        }

    }
}
