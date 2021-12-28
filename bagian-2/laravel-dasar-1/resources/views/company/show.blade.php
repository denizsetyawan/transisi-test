@extends('layouts.app')

@section('content')
<div class="container">

    <a href="../print-pdf/{{ $company->id }}" class="btn btn-primary btn-sm rounded shadow mb-3">Print PDF</a>

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
                </tr>
                @empty
                <tr>
                    <td colspan="5">Empty Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
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
