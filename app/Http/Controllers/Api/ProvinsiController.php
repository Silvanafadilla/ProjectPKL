<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\provinsi;
use App\Http\Controllers\DB;
use Validator;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        $res = [
            'success'=>true,
            'data'=>$provinsi,
            'message'=>'berhasil'
        ];
        return response()->json($res);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'kode_prov' => 'required',
            'nama_prov' => 'required',
        ],
            [
            'kode_prov.required' => 'Masukan Kode Provinsi',
            'nama_prov.required' => 'Masukan nama Provinsi',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahakan isi bidang yang kosong',
                'data'    =>  $validator->errors()
            ],400);
        } else {
            $provinsi = Provinsi::create([
                'kode_prov' => $request->input('kode_prov'),
                'nama_prov' => $request->input('nama_prov')
            ]);

            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil disimpan',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi gagal disimpan!',
                ], 400);
            }
        }
    }

    public function show($id)
    {
        $provinsi = Provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Provinsi',
                'data'    => $provinsi,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi tidak ditemukan',
                'data'    => ''
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_prov' => 'required',
            'nama_prov' => 'required',
        ],
            [
                'kode_prov.required' => 'Masukan Kode Provinsi',
                'nama_prov.required' => 'Masukan nama Provinsi',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silhkan isi bidang yang kosong',
                'data'    => $validator->errors()
            ], 400);
        } else {
            $post = Post::whereId($request->input('id'))->update([
                'kode_prov' => $request->input('kode_prov'),
                'nama_prov' => $request->input('nama_prov'),
            ]);

            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi berhasil di update',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi gagal diupdate',
                ], 500);
            }
        }

    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Provinsi berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi gagal dihapus',
            ], 500);
        }
    }
}
