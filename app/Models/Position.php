<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\PositionResource;

class Position extends Model
{
    use Filterable,
        Searchable;

    /**
     * The default key for the order.
     *
     * @var string
     */
    protected $defaultOrder = 'id';

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

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
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
            $model->slug = str($request->name)->slug();
            $model->save();

            DB::commit();

            return new PositionResource($model);
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
            $model->slug = str($request->name)->slug();
            $model->save();

            DB::commit();

            return new PositionResource($model);
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
