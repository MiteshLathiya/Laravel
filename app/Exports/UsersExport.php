<?php

namespace App\Exports;

use App\Models\Frontend\OrderModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromView, ShouldAutoSize
{

    use Exportable;

    public function __construct($search, $limit)
    {
        $this->search = $search;
        $this->limit = $limit;
    }

                        //    public function query()
                        //    {
                        //      return  $data= OrderModel::query()->select('orders.*')
                        //        ->join('registers', 'registers.id', '=', 'user_id')
                        //        ->join('books', 'books.id', '=', 'product_id')
                        //        ->where('user_id',$this->user);

                            
                            
                                
                        //       }

    //   public function map($data): array
    //   {
    //     return [
    //         $data->user_id,
    //         $data->order_id,
    //         // Date::dateTimeToExcel($user->created_at),
    //     ];
    //   }
       
     
        //  $this->sheetarray;

    //  return  foreach ($data as $data1) {
    //        $data1->firstname;
    //    }
   
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        // $this->search=;
        // $this->limit=;

        return view('layouts.admin.historyview', [

            'data'=>OrderModel::join('registers', 'registers.id', '=', 'user_id')
                  ->join('books', 'books.id', '=', 'product_id')
                  -> where('name', 'LIKE', '%'.$this->search.'%')
                                            ->orWhere('firstname', 'LIKE', '%'.$this->search.'%')
                                            ->orWhere('ISBN_number', 'LIKE', '%'.$this->search.'%')
                                            ->orWhere('grandtotal', 'LIKE', '%'.$this->search.'%')
                                            ->orWhere('payment', 'LIKE', '%'.$this->search.'%')
                                            ->orWhere('order_date', 'LIKE', '%'.$this->search.'%')
                                            ->orWhere('status', 'LIKE', '%'.$this->search.'%')
                                            ->paginate($this->limit)

        ]);
    }
    // {
       
    //     $search='hii';
    //     $limit=5;
    //  return   $data= OrderModel
     
    //     ::join('registers', 'registers.id', '=', 'user_id')
    //       ->join('books', 'books.id', '=', 'product_id')
    //       -> where('name', 'LIKE', '%'.$search.'%')
    //                                 ->orWhere('firstname', 'LIKE', '%'.$search.'%')
    //                                 ->orWhere('ISBN_number', 'LIKE', '%'.$search.'%')
    //                                 ->orWhere('grandtotal', 'LIKE', '%'.$search.'%')
    //                                 ->orWhere('payment', 'LIKE', '%'.$search.'%')
    //                                 ->orWhere('order_date', 'LIKE', '%'.$search.'%')
    //                                 ->orWhere('status', 'LIKE', '%'.$search.'%')
    //                                 ->paginate($limit);
    //     // return OrderModel::all();
    // }

    //  public function headings(): array
    // {
    //     return [
    //         'Order_id',
    //         'User_id',
    //         'Product_id',
    //         'Address',
    //         'Postcode',
    //         'City',
    //         'State',
    //         'Quantity',
    //         'Total',
    //         'Payment',
    //         'Return',
    //         'Issue_Date',
    //         'Updated_Date'
    //     ];
    // }
}
