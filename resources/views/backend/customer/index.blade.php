@extends('backend.layouts.main')
@section('content')
<script>
    $(function () {
        $('#example1').DataTable()
    })
</script>
<!-- Content Header (Page header) -->

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Company</th>
                    <th>Customer Name</th>
                    <th>Location</th>
                    <th>Create Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $item)
                    <tr>
                        <td>{{ $loop->iteration or $item->id }}</td>
                        <td>{{ $item->company_name }}</td>
                        <td>{{ $item->customer_name }}</td>
                        <td>{{ $item->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection
