<?php

namespace App\Http\Controllers;

use App\Models\Runningtext;
use Illuminate\Http\Request;

class RunningtextController extends Controller
{
    public function index()
    {
        $data = Runningtext::get();
        return view('admin.runningtext.index', compact('data'));
    }

    public function create()
    {
        $running = Runningtext::get();
        return view('admin.runningtext.create', compact('running'));
    }

    public function insert(Request $request)
    {
        $request->validate(Runningtext::$rules);
        $requests = $request->all();

        $running = Runningtext::create($requests);
        if ($running) {
            return redirect('admin/runningtext')->with('status', 'Berhasil menambah Running !');
        }

        return redirect('admin/runningtext')->with('status', 'Gagal menambah Running !');
    }

    public function edit($id)
    {
        $data       = Runningtext::find($id);
        return view('admin.runningtext.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $d = Runningtext::find($id);
        if ($d == null) {
            return redirect('admin/runningtext')->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all();
        $data = Runningtext::find($id)->update($req);
        if ($data) {
            return redirect('admin/runningtext')->with('status', 'RunningText berhasil diedit !');
        }
        return redirect('admin/runningtext')->with('status', 'Gagal edit RunningText !');
    }

    public function delete($id)
    {
        $data = Runningtext::find($id);
        if ($data == null) {
            return redirect('admin/runningtext')->with('status', 'Data tidak ditemukan !');
        }

        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/runningtext')->with('status', 'Berhasil hapus runningtext !');
        }
        return redirect('admin/runningtext')->with('status', 'Gagal hapus runningtext !');
    }
}
