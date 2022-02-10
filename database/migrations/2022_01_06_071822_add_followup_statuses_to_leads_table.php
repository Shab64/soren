<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFollowupStatusesToLeadsTable extends Migration
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
            $table->text('followup_statuses')->default(json_encode(array("Order Notes"=>"Order Notes","Schedule Intake Call"=>"Schedule Intake Call","Welcome Email"=>"Welcome Email","Intake"=>"Intake","Build"=>"Build","Upload"=>"Upload","Web Access"=>"Web Access","GTM"=>"GTM","Conversation Action"=>"Conversation Action","Display Campaign"=>"Display Campaign","Introduction Email"=>"Introduction Email","Launch Call"=>"Launch Call","Notify Billing"=>"Notify Billing","Set Rebill Date"=>"Set Rebill Date","Full Review"=>"Full Review")));
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
            $table->dropColumn('followup_statuses');
        });
    }
}
