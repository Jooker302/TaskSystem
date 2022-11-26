<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function add_user(){
        return view('add-user');
    }

    public function store_user(Request $request){
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();
        return redirect()->back();
    }

    public function view(){
        $users = User::where('status','user')->get();
        return view('view-users')->with(['users' => $users]);
    }

    public function assign_task(){
        $users = User::where('status','user')->get();
        return view('assign-task')->with(['users' => $users]);
    }

    public function store_assign_task(Request $request){
        // dd(implode(' , ',$request->inspection_items));
        $task = new Task;
        $task->title = $request->title;
        $task->user_id = $request->user_id;
        $task->description = $request->description;
        $task->client_name = $request->client_name;
        $task->inspection_items = implode(' , ',$request->inspection_items);
        $task->status = $request->status;
        $task->save();
        return redirect()->back();
    }


    public function view_task(){
        // $tasks = [];
        $i = 0;
        $task = Task::all();
        foreach($task as $t){
            $tasks[$i]['title'] = $t->title;
            $user_name = User::find($t->user_id);
            $tasks[$i]['username'] = $user_name->name;
            $tasks[$i]['description'] = $t->description;
            $tasks[$i]['client_name'] = $t->client_name;
            if($t->status!=0){
                $tasks[$i]['status'] = 'Completed';
            }else{
                $tasks[$i]['status'] = 'Not Completed';
            }
            $tasks[$i]['inspection_items'] = explode(' , ',$t->inspection_items);
            $i++;
        }

        // dd($tasks);
        // foreach($tasks as $y){
        //     dd($y);
        // }

        return view('view-tasks')->with(['tasks'=>$tasks]);
    }
}
