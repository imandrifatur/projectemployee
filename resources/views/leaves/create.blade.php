<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
         #addForm {
        width: 50%; /* Atur lebar formulir sesuai kebutuhan */
        margin: auto; /* Agar formulir berada di tengah halaman */
        padding: 20px; /* Berikan padding agar tampilan lebih nyaman */
    }

    #addForm legend {
        font-weight: bold;
        color: #333;
    }

    #addForm label {
        display: block;
        margin-bottom: 1px;
    }

    #addForm input,
    #addForm select,
    #addForm textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    #addForm button {
        padding: 10px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #cancelButton {
        padding: 10px;
        background-color: #ccc;
        color: #000;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
    }
    </style>
</head>
<body>


<form action="{{ route('leaves.store') }}" method="POST" id="addForm">
    @csrf
    <fieldset>
        <legend>Add Leave</legend>


            <label for="employee_nip">Employee NIP</label>
            <input type="text" id="employee_nip" name="employee_nip" readonly>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal">Search</button>


        <label for="leave_date">Leave Date</label>
        <input type="date" id="leave_date" name="leave_date">

        <label for="duration">Duration</label>
        <input type="text" id="duration" name="duration">

        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>

        <button type="submit">Save</button>
        <button type="button" id="cancelButton" onclick="cancelAdd()">Cancel</button>
    </fieldset>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    function cancelAdd() {
        window.location.href = "{{ route('leaves.index') }}";
    }
</script>
<script>
    // Menggunakan jQuery untuk memudahkan manipulasi DOM
    $(document).ready(function() {
        // Menangani pemilihan karyawan dari modal
        $('#employeeList').on('click', 'li', function() {
            var selectedNIP = $(this).data('nip');
            var selectedName = $(this).data('name');

            // Mengisi NIP dan menutup modal
            $('#employee_nip').val(selectedNIP);
            $('#employeeModal').modal('hide');
        });
    });
</script>

</body>
</html>
<!-- Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Select Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Daftar Karyawan akan ditampilkan di sini -->
                <ul id="employeeList" class="list-group">
                    @foreach ($employees as $employee)
                        <li class="list-group-item" data-nip="{{ $employee->nip }}" data-name="{{ $employee->employee_name }}">
                            {{ $employee->employee_name }} (NIP: {{ $employee->nip }})
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
