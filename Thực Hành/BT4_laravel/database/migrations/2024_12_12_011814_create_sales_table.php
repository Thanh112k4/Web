<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->unsignedBigInteger('medicine_id'); // Khóa ngoại liên kết đến bảng medicines
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone', 16)->nullable(); // Số điện thoại khách hàng (có thể null)
            $table->timestamps(); // Cột created_at và updated_at để theo dõi thời gian tạo và cập nhật
        });

        // Tạo mối quan hệ giữa bảng sales và medicines
        Schema::table('sales', function (Blueprint $table) {
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}