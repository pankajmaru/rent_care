<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Requests\StoreUsers;
use App\User;
use App\Room;
use App\Admin;
use Bill;
use App\UserImage;
use PDF;


class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('pdf-view')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
      $customer_data = DB::table('invoice')->limit(10)->get();
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '<h3 align="center">Customer Data</h3>
      <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
      <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
      <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
      <th style="border: 1px solid; padding:12px;" width="15%">City</th>
      <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
      <th style="border: 1px solid; padding:12px;" width="20%">Country</th>
      </tr>';  

     foreach($customer_data as $customer)
     {
      $output .= '<tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->invoice_number.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->net_amount.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->net_amount.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->net_amount.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->net_amount.'</td>
      </tr>';
     }
     $output .= '</table>';
     return $output;
    }
}