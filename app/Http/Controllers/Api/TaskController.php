<?php

namespace App\Http\Controllers\Api;

use File;
use App\Models\Task;
use App\Models\Question;
use App\Models\TaskFile;
use Illuminate\Http\Request;
use App\Models\InspectionItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use PDF;

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

    public function pdf_generate(Request $request){

        // $task = Task::where('id',$request->task_id)->get();

        $tasks = Task::find($request->task_id);
        $ins = InspectionItem::where('task_id',$tasks->id)->get();
        foreach($ins as $i){
            $ins_id[] = $i->id;
        }
        $question = Question::whereIn('inspection_item_id',$ins_id)->get();

        $taskfile=TaskFile::where('task_id',$tasks->id)->get();
        // dd($task);
        // foreach($task as $t){
        //     $tasks[$i]['id'] = $t->id;
        //     $tasks[$i]['title'] = $t->title;
        //     $user_name = User::find($t->user_id);
        //     $tasks[$i]['username'] = $user_name->name;
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
        // $taskfile=TaskFile::all();

        $data = [
            'tasks'=>$tasks,
            'taskfiles'=>$taskfile ,
            'inspectionitem' => $ins,
            'question' => $question,
        ];

        $pdf = PDF::loadView('pdfview', $data);
        // return $pdf->download('Tasks.pdf');

        // $pdf = PDF::loadView('pdfview', $data)->save('public/assets/pdf/tasks.pdf');
        // return PDF::loadHTML('<h1>Test</h1> ')->save('/path//my_stored_file.pdf');



        // Storage::put('assets/pdf/task.pdf', $pdf->output());

        // $path = public_path('');
    $fileName =  'tasks.pdf' ;
    $pdf->save( 'assets/'. $fileName);
    // return $pdf->download($fileName);

        return response()->json([
            'message' => 'Saved',
            'data' => 'https://etradeverse.com/test/TaskSystem/public/assets/tasks.pdf',
            'code' => 200,
        ]);
    }


    public function check_inspection_items_status(Request $request){
        $passed = Question::where('inspection_item_id',$request->inspection_items_id)->where('q_status','pass')->count();
        $failed = Question::where('inspection_item_id',$request->inspection_items_id)->where('q_status','fail')->count();
        $na = Question::where('inspection_item_id',$request->inspection_items_id)->where('q_status',null)->count();
        return response()->json([
            // 'message' => 'Saved',
            'Passed' => $passed,
            'Failed' => $failed,
            'N.A' => $na,
            'code' => 200,
        ]);
    }

}
