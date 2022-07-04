<?php
//database/migrations/...create_table_products.php
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
        Schema::create('products', function (Blueprint $table) {
            // Khai báo các trường cho bảng products
            //id, name, price, avatar, created_at, updated_at
            $table->increments('id');
            $table->string('name', 150);
            $table->integer('price');
            $table->string('avatar', 150);
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
        Schema::dropIfExists('products');
    }
};
