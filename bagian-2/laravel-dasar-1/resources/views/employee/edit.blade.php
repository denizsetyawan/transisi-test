@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8">
        <a href="../../employee" class="btn btn-primary btn-sm rounded shadow mb-3">Back</a>

        @foreach ($employee as $item)
        <form action="{{route('employee.update', $item->id)}}" method="POST">
            @csrf
            {{ method_field('PUT') }}

            <div class="col-md">
                <div class="form-group">
                    <label for="caption">Name</label>
                    <input name="name" value="{{ $item->name }}" type="text"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="caption">Email</label>
                    <input name="email" value="{{ $item->email }}" type="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="company">Company</label>
                    <select class="form-control @error('company_id') is-invalid @enderror" id="company" name="company">
                        @foreach ($company as $com)
                        <option value="{{ $com->id }}" @if($item->company_id == $com->id)
                selected
                @endif>{{ $com->name }}</option>
                @endforeach
                </select>
                @error('company_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

                <div class="form-group">
                    <label for="company">Company</label>
                    <select class="form-control" id="company" name="company" required>
                        @foreach ($company as $com)
                        <option value="{{ $com->id }}" @if($item->company_id == $com->id)
                            selected
                            @endif>{{ $com->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-outline-dark btn-block">Add</button>
        </form>
    @endforeach

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
