<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('employee_nip'); // Kolom NIP karyawan sebagai string
            $table->date('leave_date'); // Kolom tanggal cuti
            $table->integer('duration'); // Kolom lama cuti dalam hari
            $table->text('description'); // Kolom keterangan cuti sebagai teks
            $table->timestamps(); // Kolom waktu pembuatan dan pembaruan otomatis

            // Menambahkan foreign key untuk menghubungkan dengan tabel employees
            $table->foreign('employee_nip')->references('nip')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
