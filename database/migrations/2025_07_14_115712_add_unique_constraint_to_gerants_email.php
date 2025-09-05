<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueConstraintToGerantsEmail extends Migration
{
   public function up()
    {
        Schema::table('gerants', function (Blueprint $table) {
            $table->unique('email');
        });
    }

    public function down()
    {
        Schema::table('gerants', function (Blueprint $table) {
            $table->dropUnique(['email']);
        });
    }
    
}
