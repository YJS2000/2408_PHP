<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 마이그레이션 파일 생성 : php artisan make:migration 파일명
    // 마이그레이션 실행 : php artisan migrate
    // 마이그레이션 롤백(직전의 마이그레이션 작업 되돌리기) : php artisan migrate:rollback
    // 마이그레이션 리셋(모든 마이그레이션 작업 되돌리기) : php artisan migrate:reset



    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards_test', function (Blueprint $table) {
            $table->id('b_id');
            $table->bigInteger('u_id')->unsigned();
            $table->char('bc_type',1);
            $table->string('b_title', 50);
            $table->string('b_content', 200);
            $table->string('b_img', 100);
            $table->timestamps(); // updated_at deleted_at 자동으로 만들어준다
            // 기본이 널허용인데 모델에서 관리해줌으로서 널값이 들어갈일은 없다.
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards_test');
    }
};
