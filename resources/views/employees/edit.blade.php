<style>
    #editForm {
        width: 50%; /* Atur lebar formulir sesuai kebutuhan */
        margin: auto; /* Agar formulir berada di tengah halaman */
        padding: 20px; /* Berikan padding agar tampilan lebih nyaman */
    }

    #editForm legend {
        font-weight: bold;
        color: #333;
    }

    #editForm label {
        display: block;
        margin-bottom: 5px;
    }

    #editForm input,
    #editForm select,
    #editForm textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    #editForm button {
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

    .button-container {
        display: flex;
        justify-content: flex-end;
    }
</style>

<form action="{{ route('employees.update', $employee->id) }}" method="POST" id="editForm">
    @csrf
    @method('PUT')
    <fieldset>
        <legend>Edit Karyawan</legend>

        <label for="nipInput">NIP:</label>
        <input type="text" id="nipInput" name="nip" value="{{ $employee->nip }}" required>

        <label for="nameInput">Name:</label>
        <input type="text" id="nameInput" name="employee_name" value="{{ $employee->employee_name }}" required>

        <label for="genderInput">Gender:</label>
        <select id="genderInput" name="gender" required>
            <option value="male" {{ $employee->gender === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $employee->gender === 'female' ? 'selected' : '' }}>Female</option>
        </select>

        <label for="phoneInput">Phone Number:</label>
        <input type="tel" id="phoneInput" name="phone_number" value="{{ $employee->phone_number }}" required>

        <label for="addressInput">Address:</label>
        <textarea id="addressInput" name="address" rows="4" required>{{ $employee->address }}</textarea>

        <label for="dobInput">Date of Birth:</label>
        <input type="date" id="dobInput" name="date_of_birth" value="{{ $employee->date_of_birth }}" required>

        <div class="button-container">
            <button type="submit">Update Employee</button>
            <button type="button" id="cancelButton" onclick="cancelEdit()">Cancel</button>
        </div>
    </fieldset>
</form>

<script>
    function cancelEdit() {
        // Redirect or perform any other action on cancel
        window.location.href = "{{ route('employees.index') }}";
    }
</script>
