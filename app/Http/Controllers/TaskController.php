<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $taskList = Task::all();
            return response()->json([
                'success'=>true,
                'data' => $taskList, 
                'message' => 'Get all tasks successfully'
            ], 200); 
        } catch (\Throwable $th) {
            return response()->json([
                'success'=>false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        try {
            $request->validated();
            $taskCreated = Task::create([
                "title" => $request->title,
                "description" => $request->description,
                "due_date" => $request->due_date,
                'user_id' => 1 /*auth()->user()->id*/,
            ]);
            return response()->json([
                'success'=>true,
                'data' => $taskCreated, 
                'message' => 'Task Created successfully'
            ], 200);  
        } catch (\Throwable $th) {
            return response()->json([
                'success'=>false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        try {
            if (!$task) {
                return response()->json([
                    'success'=>true,
                    'data' => [], 
                    'message' => "Task doesn't exist"
                ], 400);    
            }
            return response()->json([
                'success'=>true,
                'data' => $task, 
                'message' => 'Get Task successfully'
            ], 200); 
        } catch (\Throwable $th) {
            return response()->json([
                'success'=>false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {
        try {
            $taskUpdated = $task->update($request->all());
            return response()->json([
                'success'=>true,
                'data' => $taskUpdated, 
                'message' => 'Task Updated successfully'
            ], 200); 
        } catch (\Throwable $th) {
            return response()->json([
                'success'=>false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            return response()->json([
                'success'=>true,
                'data' => [], 
                'message' => 'Task Deleted successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=>false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function coched(Task $task)
    {
        try {
            if($task->coched == 0){
                $task->coched == 1;
            }else {
                $task->coched == 0;
            }
            $task->save();
            return response()->json([
                'success'=>true,
                'data' => $task, 
                'message' => 'Executed successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success'=>false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
