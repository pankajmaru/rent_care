@extends('layouts.front-layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">    
        <a class="btn btn-primary btn-md float-right" href="{{ url('dynamicpdf/pdf') }}">Convert into PDF</a>
        <table>
            <tbody>
                <th>room id</th>
                <th>invoice number</th>
                <th>elceunit</th>
                <th>water unit</th>
                <th>net amount</th>
                <th>total paid</th>
                <th>total dues</th>
            </tbody>
            <tbody>
                @foreach ($bills as $bill)
                <tr>
                    <td>{{ $bill->room_id   }}</td>
                    <td>{{ $bill->invoice_number   }}</td>
                    <td>{{ $bill->electricity_unit   }}</td>
                    <td>{{ $bill->water_unit   }}</td>
                    <td>{{ $bill->net_amount  }}</td>
                    <td>{{ $bill->total_paid   }}</td>
                    <td>{{ $bill->total_dues  }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <!-- /.content -->
</div>


@endsection
