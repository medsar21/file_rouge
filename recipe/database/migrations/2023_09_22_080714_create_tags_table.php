use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertTagsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tags')->insert([
            ['name' => 'Beef'],
            ['name' => 'Breakfast'],
            ['name' => 'Chicken'],
            ['name' => 'Food'],
            ['name' => 'Potato'],
            ['name' => 'Rice'],
            ['name' => 'Stew'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('tags')->truncate();
    }
}
