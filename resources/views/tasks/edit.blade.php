@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Task
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Task Form -->
					<form action="{{url('task/' . $task->id)}}" method="POST" class="form-horizontal">
						{{ csrf_field() }}
                        {{ method_field('PATCH') }}
                                                
						<!-- Task Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">Task</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') ? old('task') : $task->name }}">
							</div>
						</div>

						<!-- Task Description -->
                        <div class="form-group">
                            <label for="task-desc" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="desc" id="task-desc" class="form-control" value="{{ old('task') ? old('task') : $task->desc }}">
                            </div>
                        </div>

                        <!-- Task List -->
                        <div class="form-group">
                            <label for="task-list" class="col-sm-3 control-label">List</label>

                            <div class="col-sm-6">
								

								<input type="radio" name="list" id="task-list1" value=0><label for="TODO"> TODO</label><br>
                                <input type="radio" name="list" id="task-list2" value=1><label for="DOING"> DOING</label><br>
                                <input type="radio" name="list" id="task-list3" value=2><label for="DONE"> DONE</label>
								
								<script type="text/javascript" defer="defer">
									if(document.getElementById){
									// if (<%=option1%> != ""){
									// if ($task->list == 10){
									document.getElementById('task-list1').checked = true;
									document.getElementById('task-list2').checked = false;
									document.getElementById('task-list3').checked = false;
									// }
									}
									</script>

                            </div>
                        </div>

						<!-- Add Task Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-save"></i>Save Task
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection