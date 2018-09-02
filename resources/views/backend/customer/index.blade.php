@extends('backend.layouts.main')

@section('page-title')
    ข้อมูลลูกค้า
@endsection
@section('content')
<script>
    $(function () {
        $('#table-customer').DataTable()
    })
</script>
<!-- Content Header (Page header) -->

<div class="box">
    <div class="box-body">
        <table id="table-customer" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Company</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    <th>Tool</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->customer_name }}</td>
                        <td>{{ $item->location }}</td>
                        <td class="text-center">
                            <form action="{{ route('customer.customer.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection
