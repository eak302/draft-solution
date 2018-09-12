@extends('backend.layouts.main')

@section('page-title')
ข้อมูลผู้ใช้
@endsection
@section('content')
<script>
    $(function () {
        $('#table-user').DataTable()
    })
</script>
<!-- Content Header (Page header) -->

<div class="table-responsive">
    <table id="table-user" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>name</th>
                <th>email</th>
                <th>role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($video as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td class="text-center">
                    <form action="{{ route('user.user.destroy', $item->id) }}" method="POST">
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
@endsection