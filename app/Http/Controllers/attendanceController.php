<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class attendanceController extends Controller
{  
    public function store(request $request)

    {

       Attendance::create([
           "name"=> $request->input("name"),
           "date"=> $request->input("date"),
           "time_in"=> $request->input("time_in"),
           "description"=> $request->input("description"),
       ]);
       return back();
    }

    // Method untuk menampilkan form edit
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('edit', compact('attendance'));
    }

    // Method untuk mengupdate data
    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('home')->with('success', 'Data berhasil diperbarui');
    }

    // Method untuk menghapus data
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('home')->with('success', 'Data berhasil dihapus');
    }
    
}
