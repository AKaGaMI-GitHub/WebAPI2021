<?php

namespace App\Http\Controllers\API;

use App\Models\DataPemilik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pemiliks = DataPemilik::latest()->get();

        return response()->json([
            'success'=> true,
            'message'=> 'List Data Pemilik',
            'data'=> $data_pemiliks
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemilik' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tgl_daftar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data_pemilik = DataPemilik::create([
            'nama_pemilik' => $request->nama_pemilik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_daftar' => $request->tgl_daftar
        ]);

        if($data_pemilik) {
            return response()->json([
                'success' => true,
                'message' => 'Data Pemilik Created',
                'data' => $data_pemilik
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Pemilik Gagal di Simpan',
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_pemilik = DataPemilik::findOrfail($id);

        return response()->json([
            'success'=> true,
            'message'=> 'Detail Data Pemilik',
            'data'=> $data_pemilik
        ], 200);
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
    public function update(Request $request, DataPemilik $data_pemilik)
    {
        $validator = Validator::make($request->all(), [
            'nama_pemilik' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tgl_daftar' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data_pemilik = DataPemilik::findOrFail($data_pemilik->id_pemilik);

        if($data_pemilik) {
            $data_pemilik->update([
                'nama_pemilik' => $request->nama_pemilik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'tgl_daftar' => $request->tgl_daftar
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Pemilik Diupdate',
            'data' => $data_pemilik
        ], 200);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pemilik = DataPemilik::findOrfail($id);

        if($data_pemilik) {
            $data_pemilik->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data Pemilik dihapus',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Pemilik Tidak diketahui',
        ], 404);
    }
}
