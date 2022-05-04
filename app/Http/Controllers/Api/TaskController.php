<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function index(Request $request)
    {

        $tasks = Task::where('user_id', Auth::user());

        if (count($tasks) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No tasks were found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $tasks->toArray()
        ], 200);
    }
    */

    public function postIndex(Request $request)
    {
        //dd($request->getContent());
        $tasks = DB::table('tasks')->where('user_id', $request->getContent())->get();
        /*
        dd($tasks);
        //$c = new collect();
        foreach($tasks as $task){
            if($task->user_id == $request->getContent()){

            }
        }
        dd($tasks);
        $tasks = Task::where('user_id', $request->getContent());
        dd($tasks);
        */

        if (count($tasks) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No tasks were found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $tasks->toArray()
        ], 200);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$user = Auth::user();

        $validated = $request->validate([
            'title' => 'required|max:50',
            'desc' => 'required|max:255',
            'category' => 'required|max:50',
            'user_id' => 'required',
            'datetask' => 'required'
        ]);

        $user = User::where('id', $validated['user_id'])->get();

        if (count($user) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'User id not found'
            ], 200);
        }

        $task = Task::create([
            'title' => $validated['title'],
            'desc' => $validated['desc'],
            'category' => $validated['category'],
            //'user_id' => $user->id,
            'user_id' => $validated['user_id'],
            'datetask' => $validated['datetask'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($task->save()) {
            return response()->json([
                'success' => true,
                'data' => 'Task saved'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task = Task::where('id', $id)->get();

        //si no hay atributos quiere decir que el registro no existe en la BBDD
        if (count($task) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Task with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $task->toArray()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Task with id ' . $id . ' not found'
            ], 200);
        }

        $validated = $request->validate([
            'title' => 'required|max:50',
            'desc' => 'required|max:255',
            'category' => 'required|max:50',
            'datetask' => 'required'
        ]);

        $task->title = $validated['title'];
        $task->desc = $validated['desc'];
        $task->category = $validated['category'];
        $task->datetask = $validated['datetask'];

        if (!$task->update($validated)) {
            return response()->json([
                'success' => false,
                'message' => 'Task with id ' . $id . ' can not be updated'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'Task updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::where('id', $id)->delete();

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Task with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => 'Task deleted'
        ], 200);
    }
}
