<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuti</title>
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
<form action="{{ route('leaves.index') }}" method="GET">
    <fieldset>
        <legend>Search</legend>


            <label for="search">Nip:</label>
            <input type="text" id="search" name="search" value="{{ $search }}" placeholder="Masukan....NIP">


            <label for="search_name">Nama Karyawan:</label>
            <input type="text" id="search_name" name="search_name" value="{{ $search_name }}" placeholder="Masukan....Name">


            <label for="search_date">Tanggal Cuti</label>
            <input type="date" id="search_date" name="search_date" value="{{ $search_date }}">

        <button type="submit">Search</button>
    </fieldset>
</form>

    <fieldset>
        <legend><h1>Cuti List</h1></legend>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Nip</th>
                    <th>Nama Karywan</th>
                    <th>Tanggal Cuti</th>
                    <th>Lama Cuti</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($leaves as $key => $leave)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <a href="{{ route('leaves.edit', $leave) }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('leaves.destroy', $leave) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                        <td>{{ $leave->employee->nip }}</td>
                        <td>{{ $leave->employee->employee_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->leave_date)->format('d-m-Y') }}</td>

                        <td>{{ $leave->duration }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </fieldset>
    <div>
        <a class="add-button" href="{{ route('leaves.create') }}">Add New</a>
    </div>

</body>
</html>

