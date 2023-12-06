<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit cuti</title>
    <style>
        .leave-form {
            max-width: 600px;
            margin: auto;
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

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>

</head>
<body>



    <form action="{{ route('leaves.update', $leave) }}" method="POST" class="leave-form">
        @csrf
        @method('PATCH')

        <fieldset>
            <legend><h2>Edit Leave Employee Information</h2></legend>
            <div class="form-group">
                <label for="employee_nip">Employee NIP</label>
                <input type="text" id="employee_nip" name="employee_nip" value="{{ $leave->employee_nip }}" readonly>
            </div>
        </fieldset>

        <fieldset>
            <legend><h2>Edit Leave Details</h2></legend>
            <div class="form-group">
                <label for="leave_date">Leave Date</label>
                <input type="date" id="leave_date" name="leave_date" value="{{ $leave->leave_date }}">
            </div>

            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" id="duration" name="duration" value="{{ $leave->duration }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ $leave->description }}</textarea>
            </div>
        </fieldset>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" id="cancelButton" onclick="cancelEdit()">Cancel</button>
        </div>
    </form>

    <script>
        function cancelEdit() {
            // Redirect or perform any other action on cancel
            window.location.href = "{{ route('leaves.index') }}";
        }
    </script>

</body>
</html>
