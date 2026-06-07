<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lead_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_lead_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', ['inbound', 'reply', 'note'])->default('inbound');
            $table->text('body');
            $table->timestamps();
        });

        // Migrate legacy status values before changing the enum
        Schema::table('contact_leads', function (Blueprint $table) {
            // Temporarily add the new column
        });
        DB::statement("UPDATE contact_leads SET status = 'new' WHERE status = 'unread'");
        DB::statement("UPDATE contact_leads SET status = 'closed' WHERE status = 'read'");

        // Now safely change the enum and add assigned_to
        Schema::table('contact_leads', function (Blueprint $table) {
            $table->enum('status', ['new', 'in_progress', 'replied', 'closed'])
                  ->default('new')
                  ->change();
            $table->unsignedBigInteger('assigned_to')->nullable()->after('status');
            $table->foreign('assigned_to')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lead_replies');
        Schema::table('contact_leads', function (Blueprint $table) {
            $table->dropForeign(['assigned_to']);
            $table->dropColumn('assigned_to');
            $table->enum('status', ['unread', 'read'])->default('unread')->change();
        });
    }
};
