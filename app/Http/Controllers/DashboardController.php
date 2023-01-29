<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Presence;
use App\Models\Classroom;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $now = date('Y-m-d');
        $student = Student::where('nis', $request->student_nis)->first();
        $presence = Presence::where('tanggal', $now)->get();

        foreach($presence as $pre) {
            if($pre->student_nis === $request->student_nis) {
                return response()->json([
                    'message' => 'Siswa sudah melakukan absensi.'
                ]);
            }
        }

        if(!$student) {
            return response()->json([
                'message' => 'Data siswa tidak ditemukan.'
            ]);
        }

        $validatedData = $request->validate([
            'student_nis' => 'required|min:5|max:10',
            'tanggal' => 'required',
            'status' => 'required',
            'keterangan' => '',
        ]);

        $presence = Presence::create($validatedData);
        $student = Student::where('nis', $presence->student_nis)->first();
        $classroom = Classroom::where('id', $student->classroom_id)->first();

        return response()->json([
            'nis' => $student->nis,
            'nama' => $student->nama,
            'kelas' => $classroom->nama_kelas
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
