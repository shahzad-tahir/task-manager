<x-layout>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-left mb-5">Projects</h3>
                </div>
                <div class="col-md-4">
                    <div class="text-right mb-5">
                        <a class="btn btn-success" href="{{ route('projects.create') }}">New Project</a>
                    </div>
                </div>
            </div>
            @include('projects.table')
        </div>
    </div>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-left mb-5">Tasks</h3>
                </div>
                <div class="col-md-4">
                    <div class="text-right mb-5">
                        <a class="btn btn-success" href="{{ route('tasks.create') }}">New Task</a>
                    </div>
                </div>
            </div>
            @include('tasks.table')
        </div>
    </div>
</x-layout>
