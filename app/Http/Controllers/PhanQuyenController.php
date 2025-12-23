<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanQuyen;
use App\Models\PhanQuyen;
use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhanQuyenController extends Controller
{
    //Lấy danh sách quyền
    public function getData()
    {
        $id_chuc_nang = 31;
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $data = PhanQuyen::get();
        return response()->json([
            'data' => $data
        ]);
    }
    //Thêm mới quyền
    public function themQuyen(Request $request)
    {
        $id_chuc_nang = 32;
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }

        PhanQuyen::create([
            'ten_quyen'         => $request->ten_quyen,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Thêm mới tên quyền thành công!'
        ]);
    }
    //Xóa quyền
    public function xoaQuyen(Request $request)
    {
        $id_chuc_nang = 33; //Xóa quyền
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        PhanQuyen::where('id', $request->id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Xóa tên quyền thành công!'
        ]);
    }
    //Cập nhật quyền
    public function updateQuyen(Request $request)
    {
        $id_chuc_nang = 34;
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        PhanQuyen::where('id', $request->id)->update([
            'ten_quyen'         => $request->ten_quyen,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật tên quyền thành công!'
        ]);
    }
    //Tìm kiếm quyền
    public function search(Request $request)
    {
        $id_chuc_nang = 45;
        $id_quyen     = Auth::guard('sanctum')->user()->id_quyen;
        $check        = ChiTietPhanQuyen::where('id_quyen', $id_quyen)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = PhanQuyen::where('ten_quyen', 'like', $noi_dung)->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
