<?php

namespace App\Http\Controllers;

use App\Models\InspectionItem;
use App\Models\Question;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use View;

class AdminController extends Controller
{
    public function add_user(){
        return view('add-user');
    }

    public function store_user(Request $request){
        $user = new User;
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file('image')->move('assets/users',$imagename);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->trade = $request->trade;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->image = 'https://etradeverse.com/test/TaskSystem/public/assets/users/'.$imagename;
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
        // dd($request->all());
        // dd(implode(' , ',$request->inspection_items));
        $task = new Task;
        $task->title = $request->title;
        $task->user_id = $request->user_id;
        $task->description = $request->description;
        $task->client_name = $request->client_name;
        // $task->inspection_items = implode(' , ',$request->inspection_items);
        $task->status = $request->status;
        $task->save();

        foreach($request->inspection_image as $key => $image){
            // $image = $request->file('vedio');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/inspectionItems',$imagename);
            $inspection_itmes = new InspectionItem;
            $inspection_itmes->task_id = $task->id;
            $inspection_itmes->title = $request->inspection_items[$key];
            $inspection_itmes->image = 'https://etradeverse.com/test/TaskSystem/public/assets/inspectionItems/'.$imagename;
            $inspection_itmes->save();

        }

        return redirect()->back();
    }


    public function view_task(){
        // $tasks = [];
        // $i = 0;
        $tasks = Task::all();

        // dd($task);
        // foreach($task as $t){
        //     $tasks[$i]['id'] = $t->id;
        //     $tasks[$i]['title'] = $t->title;
        //     $user_name = User::find($t->user_id);
        //     // $tasks[$i]['username'] = $user_name->name;
        //     $tasks[$i]['description'] = $t->description;
        //     $tasks[$i]['client_name'] = $t->client_name;
        //     if($t->status!=0){
        //         $tasks[$i]['status'] = 'Completed';
        //     }else{
        //         $tasks[$i]['status'] = 'Not Completed';
        //     }
        //     $tasks[$i]['inspection_items'] = explode(' , ',$t->inspection_items);
        //     $i++;
        // }
        $taskfile=TaskFile::all();
        // dd($tasks);
        // foreach($tasks as $y){
        //     dd($y);
        // }

        return view('view-tasks')->with(['tasks'=>$tasks, 'taskfiles'=>$taskfile]);
    }


    public function user_status_deact($id){
        $user = User::find($id);
        $user->user_status = 'blocked';
        $user->update();
        return redirect()->back();
    }

    public function user_status_act($id){
        $user = User::find($id);
        $user->user_status = null;
        $user->update();
        return redirect()->back();
    }

    public function user_delete($id){
        User::find($id)->delete();
        return redirect()->back();
    }

    public function edit_user($id){
        $user = User::find($id);
        return view('update-user')->with(['user'=>$user]);
    }

    public function update_user(Request $request){
        $user = User::find($request->id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        if($request->has('image')){
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file('image')->move('assets/users',$imagename);
            $user->image = 'https://etradeverse.com/test/TaskSystem/public/assets/users/'.$imagename;
        }

        $user->save();
        return redirect('view-users');
    }

    public function ajax_task(Request $request){
        // dd($request->all());
        $task = new Task;
        $task->title = $request->title;
        $task->user_id = $request->user_id;
        $task->description = $request->description;
        $task->client_name = $request->client_name;
        // $task->inspection_items = implode(' , ',$request->inspection_items);
        $task->status = $request->status;
        $task->save();
        $task_id = $task->id;

        $inspection_items = View::make('ajax-inspection-items', compact('task_id'))->render();

        return $inspection_items;
    }

    public function ajax_items(Request $request){
        $image = $request->file('inspection_image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/inspectionItems',$imagename);
            $inspection_itmes = new InspectionItem;
            $inspection_itmes->task_id = $request->task_id;
            $inspection_itmes->i_title = $request->inspection_items;
            $inspection_itmes->start_date = $request->start_date;
            $inspection_itmes->end_date = $request->end_date;
            $inspection_itmes->image = 'https://etradeverse.com/test/TaskSystem/public/assets/inspectionItems/'.$imagename;
            $inspection_itmes->save();
            // $success = true;
            $task_id = $request->task_id;
            $inspection_items = InspectionItem::where('task_id',$task_id)->get();
            $question = View::make('ajax-questions', compact('task_id','inspection_items'))->render();

        return $question;
    }

    public function ajax_more_items(Request $request){
        // dd($request->all());
            $image = $request->file('inspection_image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/inspectionItems',$imagename);
            $inspection_itmes = new InspectionItem;
            $inspection_itmes->task_id = $request->task_id;
            $inspection_itmes->i_title = $request->inspection_items;
            $inspection_itmes->start_date = $request->start_date;
            $inspection_itmes->end_date = $request->end_date;
            $inspection_itmes->image = 'https://etradeverse.com/test/TaskSystem/public/assets/inspectionItems/'.$imagename;
            $inspection_itmes->save();
            $success = true;
            $task_id = $request->task_id;
            $inspection_items = View::make('ajax-inspection-items', compact('task_id','success'))->render();

        return $inspection_items;
    }

    public function ajax_question(Request $request){
        // dd($request->all());
        $question = new Question;
        $question->inspection_item_id = $request->inspection_item_id;
        $question->question = $request->question;
        $question->save();

        return redirect('home');
    }

    public function ajax_more_question(Request $request){
        // dd($request->all());
        $question = new Question;
        $question->inspection_item_id = $request->inspection_item_id;
        $question->question = $request->question;
        $question->save();

        // return redirect('home');
        $task_id = $request->task_id;
        $inspection_items = InspectionItem::where('task_id',$task_id)->get();
        $success = true;
        $inspection_items = View::make('ajax-questions', compact('task_id','success','inspection_items'))->render();

        return $inspection_items;
    }


    public function test(){
        $task = Task::with('inspection_items')->where('id',5)->get();
        // dd($task);
        return  $task;
        return response()->json([
            'tasks' => $task,
            'code' => 200,
        ]);
        // dd($task);
    }


    public function view_inspection_items($id){
        $items = InspectionItem::where('task_id',$id)->get();
        // dd($items);
        return view('view-items')->with(['items'=>$items]);
    }

    public function view_questions($id){
        $question = Question::where('inspection_item_id',$id)->get();
        // dd($items);
        return view('view-questions')->with(['questions'=>$question]);
    }

    public function delete_task($id){
        $inspection_items = InspectionItem::where('task_id',$id)->get();
        foreach($inspection_items as $items){
            $ids[] = $items->id;
        }
        $questions = Question::whereIn('inspection_item_id',$ids)->delete();
        // $questions->delete();
        $inspection_items = InspectionItem::where('task_id',$id)->delete();
        Task::find($id)->delete();



        return redirect()->back();
    }


    public function edit_task($id){
        $users = User::all();
        $task = Task::find($id);
        return view('edit-task')->with(['users' => $users, 'task' =>$task]);
    }

    public function update_task(Request $request){
        // dd($request->all());
        $task = Task::find($request->task_id);
        $task->title = $request->title;
        $task->user_id = $request->user_id;
        $task->description = $request->description;
        $task->client_name = $request->client_name;
        // $task->inspection_items = implode(' , ',$request->inspection_items);
        $task->status = $request->status;
        $task->save();

        return redirect('view-task');
    }

    public function edit_inspection_items($id){
        $inspection_item = InspectionItem::find($id);

        return view('edit-inspection-items')->with(['inspection_item' => $inspection_item]);
    }

    public function update_inspection_items(Request $request){
        // dd($request->all());
        $inspection_itmes = InspectionItem::find($request->inspection_item_id);
        if(isset($request->inspection_image)){
            dd('here');
            $image = $request->file('inspection_image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('assets/inspectionItems',$imagename);
            $inspection_itmes->image = 'https://etradeverse.com/test/TaskSystem/public/assets/inspectionItems/'.$imagename;
        }

            $inspection_itmes->task_id = $request->task_id;
            $inspection_itmes->i_title = $request->inspection_items;
            $inspection_itmes->start_date = $request->start_date;
            $inspection_itmes->end_date = $request->end_date;

            $inspection_itmes->save();


            return redirect('view-inspection-items/'.$request->task_id);

    }


    public function final_approve($id){
        $task = Task::find($id);
        $task -> status = 1;
        $task->save();
        return redirect()->back();
    }
}
