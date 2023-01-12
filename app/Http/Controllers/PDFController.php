<?php

namespace App\Http\Controllers;

use App\Models\InspectionItem;
use App\Models\Question;
use PDF;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskFile;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {

        $i = 0;
        $task = Task::all();

        // dd($task);
        foreach($task as $t){
            $tasks[$i]['id'] = $t->id;
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
        $taskfile=TaskFile::all();

        $data = [
            'tasks' => $tasks,
            'taskfiles' => $taskfile,
        ];

        $pdf = PDF::loadView('pdfview', $data);
        return $pdf->download('Tasks.pdf');
        // return back();
    }

    public function generatePDFSpecific($id)
    {

        $i = 0;
        $task = Task::where('id',$id)->get();

        $tasks = Task::find($id);
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
        return $pdf->download('Tasks.pdf');
        // return back();
    }

    public function test(){
        $i = 0;
        $tasks = Task::find(46);
        $ins = InspectionItem::where('task_id',$tasks->id)->get();
        foreach($ins as $i){
            $ins_id[] = $i->id;
        }
        $question = Question::whereIn('inspection_item_id',$ins_id)->get();

        // dd($question);

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
        $taskfile=TaskFile::where('task_id',$tasks->id)->get();

        // $data = [
        //     'tasks' => $tasks,
        //     'taskfiles' => $taskfile,
        // ];

        // $pdf = PDF::loadView('pdfview', $data);
        // $pdf->download('Tasks.pdf');

        return view('pdfview')->with([
            'tasks'=>$tasks,
            'taskfiles'=>$taskfile ,
            'inspectionitem' => $ins,
            'question' => $question,
        ]);
    }
}
