<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InspectionItem;
use App\Models\Question;
use App\Models\Task;
use App\Models\TaskFile;
use Illuminate\Http\Request;
use File;

class TaskController extends Controller
{
    public function all_task(Request $request){
        // dd($request->all());
        $tasks = Task::where('user_id',$request->user_id)->first();
        // $tasks = Task::all()->inspection_items;
        return response()->json([
            'tasks' => $tasks,
            'code' => 200,
        ]);

    }

    public function all_complete_task(Request $request){
        // dd($request->all());
        $tasks = Task::where('user_id',$request->user_id)->where('status',1)->get();
        return response()->json([
            'tasks' => $tasks,
            'code' => 200,
        ]);

    }

    public function all_pending_task(Request $request){
        // dd($request->all());
        $tasks = Task::where('user_id',$request->user_id)->where('status',0)->get();
        return response()->json([
            'tasks' => $tasks,
            'code' => 200,
        ]);

    }

    public function store_complete_task(Request $request){
        $task = Task::where('id', $request->task_id)->where('user_id', $request->user_id)->first();
        $task->status = 1;
        $task->update();
        return response()->json([
            'message' => 'Task Completed',
            'code' => 200,
        ]);
    }

    public function upload_task_file(Request $request){


        // $response = array();
        // if (!$request->has('imageData')) {
        //     return ApiController::result([], 'imageData not found', 201);
        // }
        $imageData = $request->get('file');
        // $userId = Auth::user()->id;
        $filename = time().'.jpg';
        $userPublicPath = 'assets/taskfiles';
        $path = $userPublicPath . $filename;
        File::put($path, base64_decode($imageData));


        $taskfile = new TaskFile;
        // $file = $request->file('file');
        // $filename = time().'.'.$file->getClientOriginalExtension();
        // $request->file('file')->move('assets/taskfiles',$filename);
        $taskfile->task_id = $request->task_id;
        $taskfile->user_id = $request->user_id;
        $taskfile->file = $filename;
        $taskfile->save();
        return response()->json([
            'message' => 'File Uploaded',
            'code' => 200,
        ]);

    }

    public function search_task(Request $request){
        $tasks = Task::where('user_id', $request->user_id)->where('title', 'LIKE', '%' . $request->title . '%')->get();
        return response()->json([
            'tasks' => $tasks,
            'code' => 200,
        ]);
    }

    public function inspection_items(Request $request){
        $inspection_items = InspectionItem::where('task_id', $request->task_id)->get();
        return response()->json([
            'inspection_items' => $inspection_items,
            'code' => 200,
        ]);
    }

    public function questions(Request $request){
        $questions = Question::where('inspection_item_id', $request->inspection_items_id)->get();
        return response()->json([
            'questions' => $questions,
            'code' => 200,
        ]);
    }

    public function inspection_items_status(Request $request){
        $inspection_items = InspectionItem::find($request->inspection_item_id);
        $inspection_items->status = $request->status;
        $inspection_items->save();
        return response()->json([
            'message' => 'Updated',
            'code' => 200,
        ]);
    }

    public function questions_status(Request $request){
        $questions = Question::find($request->question_id);
        $questions->q_status = $request->status;
        $questions->save();
        return response()->json([
            'message' => 'Updated',
            'code' => 200,
        ]);
    }

}
