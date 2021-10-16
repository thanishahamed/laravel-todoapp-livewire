<div>
    <h1> Todos </h1>

    <style>
        .completed {
            text-decoration: line-through;
        }
    </style>
    <div class="mb-4">
        <input type="text" name="addTodo" class="form-control form-control-lg" id="addTodo" placeholder="add to do" wire:model="title" wire:keydown.enter="addTodo">
        <!-- <button class="btn btn-primary" wire:click="addTodo" type="submit">Add</button> -->
        @if ($errors->has('title'))
        <div style="color:red;">{{ $errors->first('title') }}</div>
        @endif
    </div>

    <ul class="list-group">
        @foreach ($todos as $todo)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <input type="checkbox" wire:change="toggleTodo({{$todo->id}})" class="mr-4" {{$todo->completed ? 'checked' : ''}}>
                <!-- <a href="#" class="{{ $todo->completed ? 'completed' : ''}}" onclick="updateTodoPrompt('{{$todo->title}}') || event.stopImmediatePropagation()" wire:click="updateTodo({{$todo->id}}, todoUpdated)">
                    {{ $todo->title }}
                </a> -->
                <span class="{{ $todo->completed ? 'completed' : ''}}"> {{$todo->title}} </span>
            </div>
            <div>

                <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="deleteTodo({{ $todo->id }})">
                    &times;</button>

            </div>
        </li>
        @endforeach


    </ul>
    <div wire:loading.delay wire:target="addTodo" class="alert alert-warninf"> Saving </div>
    <div class="alert alert-warning" wire:loading.delay wire:target="toggleTodo"> Toggeling Todo Item </div>
    <div class="alert alert-warning" wire:loading.delay wire:target="deleteTodo"> Deleting </div>


</div>