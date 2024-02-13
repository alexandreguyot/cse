<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySubjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_subject', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_9428597')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id', 'subject_id_fk_9428597')->references('id')->on('subjects')->onDelete('cascade');
        });
    }
}
