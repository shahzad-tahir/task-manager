<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'priority',
        'project_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * A task belongs to a project
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * Reorder updated task based on given priority
     *
     * @param $taskId
     * @param $newTaskPriority
     */
    public static function reorderTasks($taskId, $newTaskPriority): void
    {
        $task = self::find($taskId);

        $currentTaskPriority = $task->priority;

        if($newTaskPriority< $currentTaskPriority){
            self::where('priority','>=',$newTaskPriority)
                ->where('priority','<',$currentTaskPriority)
                ->update([
                    'priority' => DB::Raw('priority + 1')
                ]);
        } else {
            self::where('priority','<=',$newTaskPriority)
                ->where('priority','>',$currentTaskPriority)
                ->update([
                    'priority' => DB::Raw('priority - 1')
                ]);
        }

        self::find($taskId)->update([
            'priority' => $newTaskPriority
        ]);
    }
}
