<?php

namespace App\Http\Controllers;
use App\Models\CoreBranch;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Session;

class CoreBranchController extends Controller
{
    public function index()
    {
        $core_branch = CoreBranch::all();
        return view('kore.index', compact('core_branch'));
    }
    public function create()
    {
        return view('kore.add');
    }
    public function submit(Request $request)
    {
        $core_branc = new CoreBranch();
        $core_branc->branch_code = $request->branch_code;
        $core_branc->branch_name = $request->branch_name;
        $core_branc->branch_address = $request->branch_address;
        $core_branc->branch_city = $request->branch_city;
        $core_branc->branch_contact_person = $request->branch_contact_person;
        $core_branc->branch_email = $request->branch_email;
        $core_branc->branch_phone1 = $request->branch_phone1;
        $core_branc->branch_phone2 = $request->branch_phone2;
        $core_branc->save();

        Session::flash('success', 'Berhasil menambah Core Branch!');
        return redirect()->route('core_branch.index');
    }
    public function update($id)
    {
        $core_branch = CoreBranch::find($id);
        return view('kore.edit', compact('core_branch'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $core_branc = CoreBranch::find($id);
        $core_branc->branch_code = $request->branch_code;
        $core_branc->branch_name = $request->branch_name;
        $core_branc->branch_address = $request->branch_address;
        $core_branc->branch_city = $request->branch_city;
        $core_branc->branch_contact_person = $request->branch_contact_person;
        $core_branc->branch_email = $request->branch_email;
        $core_branc->branch_phone1 = $request->branch_phone1;
        $core_branc->branch_phone2 = $request->branch_phone2;
        $core_branc->update();

        Session::flash('warning', 'Berhasil Mengubah Core Branch!');
        return redirect()->route('core_branch.index');
    }
    public function delete($id)
    {
        $core_branch = CoreBranch::find($id);
        $core_branch->delete();

        Session::flash('danger', 'Berhasil Menghapus Core Branch!');
        return redirect()->route('core_branch.index');
    }
}
