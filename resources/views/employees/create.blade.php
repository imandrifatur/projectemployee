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
        margin-bottom: 5px;
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

    .button-container {
        display: flex;
        justify-content: flex-end;
    }
</style>

<form action="{{ route('employees.store') }}" method="POST" id="addForm">
    @csrf
    <fieldset>
        <legend>Add Employee</legend>


        <label for="nipInput">NIP:</label>
        <input type="text" id="nipInput" name="nip" readonly>


        <label for="nameInput">Employee Name:</label>
        <input type="text" id="nameInput" name="employee_name" required>

        <label for="genderInput">Gender:</label>
        <select id="genderInput" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="phoneInput">Phone Number:</label>
        <input type="tel" id="phoneInput" name="phone_number" required>

        <label for="addressInput">Address:</label>
        <textarea id="addressInput" name="address" rows="4" required></textarea>

        <label for="dobInput">Date of Birth:</label>
        <input type="date" id="dobInput" name="date_of_birth" required>

        <div class="button-container">
            <button type="button" id="cancelButton" onclick="cancelAdd()">Cancel</button>
            <button type="submit">Save</button>
        </div>
    </fieldset>
</form>

<script>
    function cancelAdd() {
        // Redirect or perform any other action on cancel
        window.location.href = "{{ route('employees.index') }}";
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Logika untuk mengisi otomatis NIP
        generateNIP();
    });

    function generateNIP() {
        // Contoh logika untuk mengisi otomatis NIP, sesuaikan dengan kebutuhan Anda
        var generatedNIP = "EMP" + Date.now();
        document.getElementById('nipInput').value = generatedNIP;
    }

    function cancelAdd() {
        // Redirect or perform any other action on cancel
        window.location.href = "{{ route('employees.index') }}";
    }
</script>
