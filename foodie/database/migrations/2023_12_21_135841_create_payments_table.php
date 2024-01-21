<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('order_id')->constrained()->onDelete("cascade");

            $table->foreignId("user_id")->constrained()->onDelete("cascade");

            $table->string("BANKNAME")->nullable();
            $table->string("BANKTXNID")->nullable();
            $table->string("CURRENCY")->nullable();
            $table->string("GATEWAYNAME")->nullable();
            $table->string("MERC_UNQ_REF")->nullable();
            $table->string("ORDERID")->nullable();
            $table->string("PAYMENTMODE")->nullable();
            $table->string("RESPCODE")->nullable();
            $table->string("RESPMSG")->nullable();
            $table->string("STATUS")->nullable();
            $table->string("TXNAMOUNT")->nullable();
            $table->string("TXNDATE")->nullable();
            $table->string("TXNID")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
