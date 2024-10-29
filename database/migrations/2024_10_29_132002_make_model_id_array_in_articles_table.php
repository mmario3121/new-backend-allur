<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('model_ids')->nullable();
        });
        Schema::table('articles', function (Blueprint $table) {
            $articles = DB::table('articles')->get();
            foreach ($articles as $article) {
                $modelIds = [];
                if ($article->model_id != null) {
                    $modelIds[] = $article->model_id;
                }
                DB::table('articles')->where('id', $article->id)->update(['model_ids' => json_encode($modelIds)]);
            }
            $table->dropColumn('model_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //drop column model_ids, add column model_id, transfer data from model_ids to model_id
            $articles = DB::table('articles')->get();
            $table->integer('model_id')->nullable();
            foreach ($articles as $article) {
                $modelId = null;
                if ($article->model_ids != null) {
                    $modelId = $article->model_ids[0];
                }
                DB::table('articles')->where('id', $article->id)->update(['model_id' => $modelId]);
            }
            $table->dropColumn('model_ids');
        });
    }
};
