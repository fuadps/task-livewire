<div>
    <div class="row justify-content-center ">
        <div class="col-md-4 mt-5">
            <h3 class="text-center py-2">Create Task</h3>
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-8">
                            <label for="title">Title</label>
                            <input wire:model="title" id="title" type="text" name="title" class="form-control">
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="due">Due</label>
                            <input wire:model="due" id="due" type="datetime-local" name="due" class="form-control">
                            @error('due') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <textarea wire:model="description" name="description" id="description" rows="5" class="form-control"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12">
                            <button wire:click="store" class="btn btn-block btn-success mt-3">
                                Save
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center ">
        <div class="col-md-4 mt-5">
            <h3 class="text-center py-2">Task List</h3>
            <div class="card">
                <div class="card-body">
                    @forelse($this->tasks as $task)
                        <div class="float-right">Due : {{ date('h:i A / d M Y', strtotime($task->due_at)) }}</div>
                        <h5>{{ $task->title }}&nbsp;<small><span class="badge badge-danger">{{ $task->type }}</span></small></h5><br>
                        <p>{{ $task->description }}</p>
                        <hr>
                    @empty
                        <p class="text-center">No Task Yet!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>
