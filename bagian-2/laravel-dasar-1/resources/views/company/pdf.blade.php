<!DOCTYPE html>
<html>
<head>
	<title>Employee Data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

    <h4 class="text-center mb-4">Employee Data</h4>

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

</body>
</html>