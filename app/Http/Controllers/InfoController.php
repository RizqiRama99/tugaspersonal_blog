<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $data = Info::get();
        return view('admin.info.index', compact('data'));
    }

    public function create()
    {
        $info = Info::get();
        return view('admin.info.create', compact('info'));
    }

    public function insert(Request $request)
    {
        $request->validate(Info::$rules);
        $requests = $request->all();

        $info = Info::create($requests);
        if ($info) {
            return redirect('admin/info')->with('status', 'Berhasil menambah Info !');
        }

        return redirect('admin/info')->with('status', 'Gagal menambah Info !');
    }

    public function edit($id)
    {
        $data       = Info::find($id);
        return view('admin.info.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $d = Info::find($id);
        if ($d == null) {
            return redirect('admin/info')->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all();
        $data = Info::find($id)->update($req);
        if ($data) {
            return redirect('admin/info')->with('status', 'Info berhasil diedit !');
        }
        return redirect('admin/info')->with('status', 'Gagal edit Info !');
    }

    public function delete($id)
    {
        $data = Info::find($id);
        if ($data == null) {
            return redirect('admin/info')->with('status', 'Data tidak ditemukan !');
        }

        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/info')->with('status', 'Berhasil hapus info !');
        }
        return redirect('admin/info')->with('status', 'Gagal hapus info !');
    }
}
