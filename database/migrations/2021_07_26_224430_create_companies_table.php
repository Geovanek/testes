<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->foreignId('plan_id')->constrained();
            $table->string('name')->unique();
            $table->string('document_number');
            $table->string('company_type');
            $table->string('email');
            $table->string('phone');
            $table->enum('whatsapp', ['Y','N'])->default('N');
            $table->enum('privacy_policy', ['Y','N'])->default('N');
            $table->enum('terms_of_use', ['Y','N'])->default('N');
            $table->string('slug')->unique();
            $table->string('logo')->nullable();

            // Status tenant (se inativar 'N' ele perde o acesso ao sistema)
            $table->enum('active', ['Y','N'])->default('N');

            // Subscription
            $table->date('subscription')->nullable(); // Data que se inscreveu
            $table->date('expires_at')->nullable(); // Data que expira o acesso
            $table->string('subscription_id', 255)->nullable(); // Identificação do Gateway de pagamento
            $table->boolean('subscription_active')->default(false); // Assinatura ativa
            $table->boolean('subscription_suspended')->default(false); // Assinatura cancelada
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
        Schema::dropIfExists('companies');
    }
}
