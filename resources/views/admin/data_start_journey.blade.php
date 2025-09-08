@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Journey</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Academic Plan</th>
                    <th>Last Education</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $dt)
                <tr>
                    <td>{{ $dt->name }}</td>
                    <td>{{ $dt->email }}</td>
                    <td>{{ $dt->phone }}</td>
                    <td>{{ $dt->country }}</td>
                    <td>{{ $dt->academic_year_plan }}</td>
                    <td>{{ $dt->last_education }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
</div>
@endsection
