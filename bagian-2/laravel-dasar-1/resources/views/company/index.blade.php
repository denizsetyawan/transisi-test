@extends('layouts.app')

@section('content')
<div class="container">

    <a href="company/create" class="btn btn-primary btn-sm rounded shadow mb-3">Add</a>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @if (session('fail'))
    <div class="alert alert-danger" role="alert">
        {{ session('fail') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @forelse ($company as $item)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>
                        <img src="../../storage/app/company/{{ $item->logo }}" alt="{{ $item->logo }}" width="70">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->website }}</td>
                    <td>
                        <a href="{{ route('company.edit', [$item->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                        <form action="{{route('company.destroy', [$item->id])}}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger delete-confirm" type="submit" title="Hapus" onclick="return confirm('Are you sure?')">Delete</button>
                            <input type="hidden" name="_method" value="delete">
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Empty Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $company->links() }}

</div>
@endsection

<style>
    td[colspan="6"] {
        text-align: center;
    }

    form{
        display: contents;
    }

    .pagination{
        justify-content: center;
    }

</style>
