@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <a href="../employee" class="btn btn-primary btn-sm rounded shadow mb-3">Back</a>

        <form action="{{route('employee.store')}}" method="POST">
            @csrf

            <div class="col-md">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <select class="form-control" id="company" name="company">
                        @foreach ($company as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-dark btn-block">Add</button>
        </form>
    </div>
</div>
@endsection
