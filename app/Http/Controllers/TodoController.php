<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Todo;
use Auth;
use DB;
use Validator;
class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //Function : To list all todo list based on login user
    public function listTask()
    {
        $user_id = Auth::id();
        $data = Todo::listTask('todo',$user_id);
        return view('home',compact('data'));
    }
    //Function : Add new todo list
    public function addTask(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'task_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }else {


            $user_id = Auth::id();
            $task_name = $request->task_name;

            $list = array('user_id' => $user_id,
                'task_name' => $task_name);

            $data = Todo::insertData('todo', $list);

            return redirect('/home');
        }

    }

    //Function  : Edit todo
    //Parameter : id
    public function editTask($id)
    {
        $list = DB::table('todo')->where('task_id','=', $id)->get();
        return view('edit', compact('list'));
    }

    //Function  : Update todo list and save to db
    public function updateTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('edit-task/'.$request->task_id)
                ->withErrors($validator)
                ->withInput();
        }else {

            $id = $request->task_id;
            $array = $request->task_name;
            $task = DB::table('todo')->where('task_id', '=', $id)->update(['task_name' => $array]);
            return redirect('/home');
        }
    }

    //Function  : Delete todo list
    //Parameter : id (ie,task_id)
    public function destroy($id)
    {
        DB::table('todo')->where('task_id','=', $id)->delete();

        return redirect('home');
    }
    public function completeTodo($id)
    {

        DB::table('todo')->where('task_id','=', $id)->update(['completed'=>1]);
        return redirect('home');
    }
}
