<?php

namespace App\Models\Jokes;

use Illuminate\Database\Eloquent\Model;

class JokesBapak extends Model
{
    protected $table = 'jokes_bapak';
    protected $primaryKey = 'jokes_bapak_id';
    public $timestamps = false;

    public function scopeData($query)
    {
        return $query
            ->whereNull($query->qualifyColumn('dihapus_pada'))
            ->inRandomOrder()
            ->limit(1);
        // ->selectRaw('*, ROW_NUMBER() over(ORDER BY jokes_bapak_id DESC) no_urut')
    }
}
