<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class BaseModel extends Model
{
    use \Spatie\Activitylog\Traits\LogsActivity;

    /**
     * Get the options for activity logging.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->getLogName())
            ->logOnly($this->getLogAttributes())
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    /**
     * Get the log name (override this in child models if needed).
     */
    protected function getLogName(): string
    {
        return 'default'; // Default log name
    }

    /**
     * Get the attributes to log (override this in child models if needed).
     */
    protected function getLogAttributes(): array
    {
        return ['*']; // Log all attributes by default
    }
}
