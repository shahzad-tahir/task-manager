<x-layout>
    <x-slot:title>
        New Project
        </x-slot>
        <div class="p-5 mb-4 bg-light rounded-3">
            <h5 class="text-left mb-3">New Project</h5>
            <hr>
            <div class="container-fluid py-3">
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter project name" required>
                        @error('name')
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
