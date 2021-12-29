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
                    <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                        placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="company">Company</label>
                    <select class="form-control" id="company" name="company">
                        @foreach ($company as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label for="company">Company</label>
                <select class="form-control" id="company" name="company" required>
                </select>
            </div>

    </div>
    <button class="btn btn-outline-dark btn-block">Add</button>
    </form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<!-- Script -->
<script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function () {

        $("#company").select2({
            ajax: {
                url: "{{route('employees.getCompany')}}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });

    });

</script>
@endsection
