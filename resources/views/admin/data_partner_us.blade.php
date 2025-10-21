@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Partner</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped datatables">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Organization Name</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $dt)
                <tr>
                    <td>{{ $dt->name }}</td>
                    <td>{{ $dt->email }}</td>
                    <td>{{ $dt->phone }}</td>
                    <td>{{ $dt->organization_name }}</td>
                    <td>{{ $dt->message }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
