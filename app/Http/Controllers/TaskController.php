<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;
use App\Person;

class TaskController extends Controller
{
	private function taskToJsonString($tasks)
	{
		$result = "[";
		
		$i = 0;
		foreach ($tasks as $task)
		{
			if( $i != 0 )
			{
				$result = $result.",";
			}
			$result = $result."{";
			$result = $result."'title':"."'".($task->title)."',";
			$result = $result."'id':"."'".($task->id)."',";
			$result = $result."'due_date':"."'".($task->due_date)."',";
			$result = $result."'assignment':"."'".($task->assignment)."',";
			$result = $result."'priority':"."'".($task->priority)."'";
			$result = $result."}";
			
			$i++;
		}
				
		$result = $result."]";
		return $result;
	}

	/**
	 * Display a list of all of the user's task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	 
	public function index(Request $request)
	{		
		$tasks = Task::all();

		return $this->taskToJsonString($tasks);
	}
	
	/**
	 * Create a new task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'due_date' => 'required|max:255',
			'priority' => 'required|max:255',
			'assignment' => 'required|max:255',			
		]);
		
		$task = new Task;
        $task->title = $request->title;
        $task->due_date = $request->due_date;
        $task->priority = $request->priority;
        $task->assignment = $request->assignment;
        $task->save();

		return redirect('/tasks');
	}
	
	
}
