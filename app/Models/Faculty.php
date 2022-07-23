<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\FacultyResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Faculty extends Model
{
    use Filterable,
        Searchable;

    /**
     * The default key for the order.
     *
     * @var string
     */
    protected $defaultOrder = 'name';

    /**
     * scout indexable data array for model
     * #[SearchUsingPrefix(['id', 'email'])]
     * #[SearchUsingFullText(['bio'])]
     * @return void
     */
    protected function toSearchableArray()
    {
        return [
            // 'id' => 'id',
            // 'name' => 'name',
        ];
    }

    /**
     * Undocumented function
     * #[FilterUsingAge(['age'])]
     *
     * @return array
     */
    protected function toFilterableArray(): array
    {
        return [
            // 'age' => 'born_date'
        ];
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public static function toFilterableParams(): array
    {
        return [
            // 'age' => [
            //     'title' => 'Filter Age',
            //     'data' => null,
            //     'used' => false,
            //     'operators' => ['=', '<=', '>='],
            //     'operator' => null,
            //     'value' => null,
            // ],
        ];
    }

    /**
     * scope for model-combo
     *
     * @param Builder $query
     * @return void
     */
    public function scopeFetchCombo(Builder $query)
    {
        return $query
            ->select('name AS text', 'id AS value')
            ->get();
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function studies()
    {
        return $this->hasMany(Study::class);
    }

    /**
     * The model store method
     *
     * @param Request $request
     * @return void
     */
    public static function storeRecord(Request $request)
    {
        DB::beginTransaction();

        try {
            $model = new static;
            $model->name = $request->name;
            $model->slug = $request->slug;
            $model->save();

            DB::commit();

            return new FacultyResource($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * The model update method
     *
     * @param Request $request
     * @param [type] $model
     * @return void
     */
    public static function updateRecord(Request $request, $model)
    {
        DB::beginTransaction();

        try {
            $model->name = $request->name;
            $model->slug = $request->slug;
            $model->save();

            DB::commit();

            return new FacultyResource($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * The model delete method
     *
     * @param [type] $model
     * @return void
     */
    public static function destroyRecord($model)
    {
        DB::beginTransaction();

        try {
            $model->delete();

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
