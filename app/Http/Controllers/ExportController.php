<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;
use App\User;
use Excel;

class ExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $orders = User::all();
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->name,
                '2' => $row->email,
                '3' => $row->level,
                '4' => $row->password,
                '5' => $row->created_at,
                '6' => $row->updated_at,
            );
        }

        return (collect($order));
    }
    public function headings(): array
    {
        return [
            'id',
            'Tên',
            'Email',
            'Cấp',
            'Mật khẩu',
            'Ngày tạo',
            'Ngày sửa',
        ];
    }
    public function export(){
        return Excel::download(new ExportController, 'users.xlsx');
    }

}
