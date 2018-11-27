<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Todo extends Model
{
    public static function insertData($table, $records) {
        $res = DB::table($table)->insert($records);
        $lastid = DB::select('SELECT LAST_INSERT_ID() as lastid');
        return $lastid;
    }
    public static function listTask($table,$user_id){
        $res = DB::table($table)
                ->select('task_id','task_name','completed')
                ->where('user_id',$user_id)
                ->paginate(5);
        return $res;
    }
}
