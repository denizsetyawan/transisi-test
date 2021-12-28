@extends('layouts.app')

@section('content')
<div class="container">

    <a href="employee/create" class="btn btn-primary btn-sm rounded shadow mb-3">Add</a>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Email</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @forelse ($employee as $item)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->company->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('employee.edit', [$item->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                        <form action="{{route('employee.destroy', [$item->id])}}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger delete-confirm" type="submit" title="Hapus" onclick="return confirm('Are you sure?')">Delete</button>
                            <input type="hidden" name="_method" value="delete">
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Empty Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $employee->links() }}

</div>
@endsection

<style>
    td[colspan="5"] {
        text-align: center;
    }

    form{
        display: contents;
    }

    .pagination {
        justify-content: center;
    }

</style>
