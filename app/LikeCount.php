<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LikeCount extends Model
{
    protected $table = 'likeable_counts';

    public $timestamps = false;

    protected $fillable = ['likeable_id', 'likeable_type', 'count'];

    public function likeable()
    {
        return $this->morphTo();
    }

    /**
     * Delete all counts of the given model, and recount them and insert new counts
     *
     * @param $modelClass
     * @throws \Exception
     * @internal param string $model (should match Model::$morphClass)
     */
    public static function rebuild($modelClass)
    {
        if(empty($modelClass)) {
            throw new \Exception('$modelClass cannot be empty/null. 
                Be sure to set the $morphClass variable on the model.');
        }

        $builder = Like::query()
            ->select(\DB::raw('count(*) as count, likeable_type, likeable_id'))
            ->where('likeable_type', $modelClass)
            ->groupBy('likeable_id');

        $results = $builder->get();

        $inserts = $results->toArray();

        DB::table((new static)->table)->insert($inserts);
    }
}
