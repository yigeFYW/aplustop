<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatAccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_accs', function (Blueprint $table) {
            $table->increments('aid')->unsigned();
            $table->integer('uid')->unsigned()->index('uid');
            $table->string('acc_name')->default('');
            $table->string('acc_id')->default('');
            $table->string('acc_wechat')->default('');
            $table->string('acc_appid')->default('');
            $table->string('acc_secret')->default('');
            $table->string('acc_aeskey')->default('');
            $table->string('acc_token')->default('');
            $table->string('rep')->default('');
            $table->string('merchant_id')->default('');
            $table->string('merchant_key')->default('');
            $table->string('cert_path')->default('');
            $table->string('key_path')->default('');
            $table->tinyInteger('acc_cat')->default(0)->unsigned();
            $table->tinyInteger('is_pay')->default(0)->unsigned();
            $table->tinyInteger('rep_status')->default(0)->unsigned();
            $table->integer('regtime')->default(0)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wechat_accs');
    }
}
