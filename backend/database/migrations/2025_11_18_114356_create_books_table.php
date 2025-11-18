<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id(); // ID (auto increment)
        $table->string('judul');
        $table->string('pengarang');
        $table->string('penerbit');
        $table->integer('tahun_terbit');
        $table->integer('jumlah_halaman');
        $table->string('kategori'); // Fiksi, Non-Fiksi, dll
        $table->string('isbn');
        $table->enum('status', ['Tersedia', 'Dipinjam']);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
