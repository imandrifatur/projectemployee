<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('nip')->unique(); // Kolom NIP sebagai string unik
            $table->string('employee_name'); // Kolom nama karyawan
            $table->string('gender'); // Kolom jenis kelamin
            $table->string('phone_number'); // Kolom nomor telepon
            $table->text('address'); // Kolom alamat sebagai teks
            $table->date('date_of_birth'); // Kolom tanggal lahir
            $table->timestamps(); // Kolom waktu pembuatan dan pembaruan otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
