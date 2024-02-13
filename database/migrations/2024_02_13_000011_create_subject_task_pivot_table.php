<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTaskPivotTable extends Migration
{
    public function up()
    {
        Schema::create('subject_task', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_9424637')->references('id')->on('subjects')->onDelete('cascade');
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id', 'task_id_fk_9424637')->references('id')->on('tasks')->onDelete('cascade');
        });
    }
}
