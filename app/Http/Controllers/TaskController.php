<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::where('tasks.user_id','=',1)
        ->where('tasks.state','=',0)
        ->get();
        echo $tasks;
    }

    public function getMyTask($id,$token){

        if($token == csrf_token()){

            $tasks = Task::where('tasks.user_id','=',$id)
            ->orderByDesc('id')
            ->get();
            return $tasks;
        }else{
            return ['error' => "no tienes acesso"];
        }
              
    }


    public function getMyFinishedTasks($id,$token){

        if($token == csrf_token()){

        $tasks = Task::where('tasks.user_id','=',Auth::id())
                    ->where('tasks.state','=',1)
                    ->get();

                    return $tasks;
                }else{
                    return ['error' => "no tienes acesso"];
                }
    }
   

    public function getMyPendingTasks($id,$token){
        if($token == csrf_token()){

            $tasks = Task::where('tasks.user_id','=',Auth::id())
                    ->where('tasks.state','=',0)
                    ->get();

                    return $tasks;
                }else{
                    return ['error' => "no tienes acesso"];
                }
    }

    public function getMyTasksByDue($id,$token){

        if($token == csrf_token()){

        $tasks = Task::where('tasks.user_id','=',Auth::id())
        ->orderBy('due_date', 'asc')                    
                    ->get();

                    return $tasks;
                }else{
                    return ['error' => "no tienes acesso"];
                }
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
        try{
            
            $start_date = date('Y-m-d');
       
            $task = new Task(array(
                'description' =>$request->get('description'),
                'start_date' => $start_date,
                'due_date' =>$request->get('due_date'),
                'state' =>0,
                'user_id'=>$request->get('user_id')
            ));

            $task->save();
            echo "Guardado con exito";

        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    public function completTask(Request $request){

        try{

            $id = $request->get('id');
            $task = Task::find($id);

            $today = date('Y-m-d');

            $task->state = 1;
            $task->due_date = $today; 
            $task->save();

            echo "Tarea Actuilizada con exito";

        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
        

    }

    public function deletTask(Request $request){

        try{

            $id = $request->get('id');
            $task = Task::find($id);
    
            
            $task->delete(); 
            echo "Tarea Borrada con exito";

        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        try{
            $task = Task::find($request->get('id'));

            $due_date = $request->get('due_date');
            $description = $request->get('description');
    
            $task->state = 0;
            $task->description = $description;
            $task->due_date = $due_date; 
            $task->save();

            echo "Tarea Actualizada con exito";
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
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
        //
    }
}
