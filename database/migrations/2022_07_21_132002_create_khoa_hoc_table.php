<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoa_hoc', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khoahoc');
            $table->string('hinh_anh');
            $table->string('mo_ta');
            $table->date('ngay_dang');
            $table->integer('so_luot_xem')->nullable()->default(0);
            $table->integer('id_danhmuc');
            $table->integer('id_giangvien');
            $table->decimal('gia_khoahoc');
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khoa_hoc');
    }
};
