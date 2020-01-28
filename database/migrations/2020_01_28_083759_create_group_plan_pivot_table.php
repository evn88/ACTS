<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupPlanPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_plan', function (Blueprint $table) {
            $table->bigInteger('group_id')->unsigned()->index();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->bigInteger('plan_id')->unsigned()->index();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->primary(['group_id','plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_plan');
    }
}
