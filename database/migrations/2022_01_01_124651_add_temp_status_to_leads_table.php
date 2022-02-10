<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTempStatusToLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            //
            $table->text('temp_status')->default(json_encode(array("New" => "New", "Contacted" => "Contacted", "Identified DM" => "Identified DM", "Contacted DM" => "Contacted DM","Pitched Review"=>"Pitched Review","Linked"=>"Linked","Audit / Meeting Schedule"=>"Audit / Meeting Schedule","Presentation"=>"Presentation","Follow Up"=>"Follow Up","Contract Sent"=>"Contract Sent","Converted"=>"Converted")));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            //
            $table->dropColumn('temp_status');
        });
    }
}
