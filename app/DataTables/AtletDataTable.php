<?php

namespace App\DataTables;

use App\Models\Atlet;
use DataTables;

class AtletDataTable
{
    public function data()
    {
        $data = Atlet::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn =
                    '<div class="row"><a href="javascript:void(0)" id="' .
                    $row->id .
                    '" class="btn btn-primary btn-sm ml-2 btn-edit">Edit</a>';
                $btn .=
                    '<a href="/cetaknama" class="btn btn-warning btn-sm ml-2">Cetak</a>';
                $btn .=
                    '<a href="javascript:void(0)" id="' .
                    $row->id .
                    '" class="btn btn-danger btn-sm ml-2 btn-delete">Delete</a></div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}