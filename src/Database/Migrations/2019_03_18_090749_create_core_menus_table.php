<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('menubar')->comment('The menu bar that this item belongs to IE: core, sales, etc');
            $table->string('namespace')->unique();
            $table->string('type');
            $table->string('text')->nullable()->default(null)->comment('Display text to show on the menu');
            $table->string('route')->nullable()->default(null)->comment('Route name or full url');
            $table->string('classes')->nullable()->default(null)->comment('Pipe separated list of css classes');
            $table->string('styles')->nullable()->default(null)->comment('Each style is pipe separated. Attribute and value separated by colon eg padding:1rem|margin:2rem');
            $table->integer('priority')->nullable()->default(null)->comment('Order the items will be displayed in the menu. 1 being first (at the top)');
            $table->string('allow_roles')->nullable()->default(null);
            $table->string('allow_permissions')->nullable()->default(null);
            $table->string('deny_roles')->nullable()->default(null);
            $table->string('deny_permissions')->nullable()->default(null);
            $table->boolean('disabled')->default(false);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('core_menus');
    }
}
