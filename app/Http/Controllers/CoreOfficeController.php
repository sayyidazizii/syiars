<?php

namespace App\Http\Controllers;
use App\Models\CoreBranch;
use App\Models\CoreOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoreOfficeController extends Controller
{
    public function index()
    {
        $core_office = CoreOffice::all();
        return view('content.CoreOffice.index', compact('core_office'));
    }
    public function create()
    {
        $core_branch = CoreBranch::all();
        return view('content.CoreOffice.add', compact('core_branch'));
    }
    public function store(Request $request)
    {
        $core_offic = new CoreOffice();
        $core_offic->office_code = $request->office_code;
        $core_offic->office_name = $request->office_name;
        $core_offic->branch_id = $request->branch_id;
        $core_offic->save();

        Session::flash('success', 'Berhasil Menambah Business Office!');
        return redirect()->route('core_office.index');
    }
    public function update($id)
    {
        $core_office = CoreOffice::find($id);
        $core_branch = CoreBranch::all();
        return view('content.CoreOffice.edit', compact('core_office', 'core_branch'));
    }
    public function prosesupdate(Request $request, $id)
    {
        $core_branc = CoreOffice::find($id);
        $core_branc->office_code = $request->office_code;
        $core_branc->office_name = $request->office_name;
        $core_branc->branch_id = $request->branch_id;
        $core_branc->update();

        Session::flash('warning', 'Berhasil Mengubah Business Office!');
        return redirect()->route('core_office.index');
    }
    public function delete($id)
    {
        $core_office = CoreOffice::find($id);
        $core_office->delete();

        Session::flash('danger', 'Berhasil Menghapus Business Office!');
        return redirect()->route('core_office.index');
    }
}
