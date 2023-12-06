<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        legend {
            font-weight: bold;
            color: #333;
        }



        input[type="text"] {
            width: 20%;
            padding: 3px;
            box-sizing: border-box;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
        .add-button {
            position: absolute;
        bottom: 10;
        right: 80px;
        margin: 10px; /* Memberikan margin ke tombol untuk memberikan ruang */
        display: inline-block;
        padding: 8px 16px;
        background-color: #4caf50;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }
    </style>
</head>
<body>

   <!-- Formulir Pencarian -->
<form action="{{ route('employees.index') }}" method="GET">
    <fieldset>
        <legend>Search </legend>


            <label for="searchNip">NIP</label>
            <input type="text" id="searchNip" name="searchNip" value="{{ $searchNip }}">



            <label for="searchName">Nama</label>
            <input type="text" id="searchName" name="searchName" value="{{ $searchName }}">


        <button type="submit">Search</button>
    </fieldset>
</form>


            <br>
            <br>
            <fieldset>
                <legend>Karyawan List</legend>

                <div class="table-container">
                    @if($employees->count() > 0)
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>NIP</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $index => $employee)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        <td>
                                            <a href="{{ route('employees.edit', $employee) }}">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                        <td>{{ $employee->nip }}</td>
                                        <td>{{ $employee->employee_name }}</td>
                                        <td>{{ $employee->gender }}</td>
                                        <td>{{ $employee->phone_number }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No matching records found.</p>
                    @endif
                </div>
            </fieldset>

            <div>
                <a class="add-button" href="{{ route('employees.create') }}">Add New</a>
            </div>

</body>
</html>


