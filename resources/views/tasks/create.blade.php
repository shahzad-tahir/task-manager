<x-layout>
    <x-slot:title>
        New Task
        </x-slot>
        <div class="p-5 mb-4 bg-light rounded-3">
            <h5 class="text-left mb-2">New Task</h5>
            <hr>
            <div class="container-fluid py-3">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="project_name">Project</label>
                        <select name="project_id" class="form-control" id="project_id">
                            <option disabled selected>Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                        @error('project_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Task Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter task name" required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="number" class="form-control" name="priority" required>
                        @error('priority')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
        </div>
</x-layout>
