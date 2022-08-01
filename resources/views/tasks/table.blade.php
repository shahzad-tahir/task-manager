<div class="col-md-12 fs-4">
    <table class="table" id="table-1">
        <thead>
        <tr>
            <th scope="col">Project</th>
            <th scope="col">Name</th>
            <th scope="col">Priority</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr id="{{ $task->id }}">
                <td>{{ $task?->project?->name }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->created_at->diffForHumans() }}</td>
                <td>{{ $task->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form style="display: inline" method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" id="delete" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/0.9.1/jquery.tablednd.js" integrity="sha256-d3rtug+Hg1GZPB7Y/yTcRixO/wlI78+2m08tosoRn7A=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#table-1").tableDnD({
            onDrop: function(table, row) {

                $.ajax({
                    data: {
                        updated_priority:$(row).index()?$(row).index() + 1: 1,
                        task_id:row.id
                    },
                    type: 'GET',
                    url: '{{ route("tasks.update-priority") }}',
                    success: function(data)
                    {
                        setTimeout(function()
                        {
                            location.reload();
                            },2000);
                    }
                });
            },
        });
    });
</script>
