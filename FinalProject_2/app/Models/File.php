<?php

namespace App\Models;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv("DB_ADMIN"),
    'password'  => getenv('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

class File extends Model
{
    protected $guarded = ['id'];
    protected $table = 'userfiles';
    public $timestamps = false;
    protected $primaryKey = 'id';

    static public function ShowAll() {
        $files = self::all();
        $files_list = [];
        foreach ($files as $file) {
            $files_list[] = array(
                'id' => $file->id,
                'user_id' => $file->user_id,
                'filename' => $file->filename
            );
        }
        return $files_list;
    }

    static public function Store($user_id, $filename) {
        $data = [
            'user_id' => $user_id,
            'filename' => $filename
        ];
        $file = self::create($data);
        return $file->id;
    }

}
