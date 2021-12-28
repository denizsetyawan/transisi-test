@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <a href="../company" class="btn btn-primary btn-sm rounded shadow mb-3">Back</a>

        <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <div class="custom-file">
                        <input value="{{ old('logo') }}" name="logo" type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="customFile">
                        @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input name="website" value="{{ old('website') }}" type="text" class="form-control @error('website') is-invalid @enderror" placeholder="Website">
                    @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-outline-dark btn-block">Add</button>
        </form>
    </div>
</div>
<script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endsection
