<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\LectureResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Lecture extends Model
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
            'name' => 'name',
            'nik' => 'nik',
            'nidn' => 'nidn',
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
            'faculty' => 'faculty_id',
            'study' => 'study_id'
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
            'faculty' => [
                'title' => 'Fakultas',
                'data' => Faculty::fetchCombo(),
                'used' => false,
                'operators' => ['=', '<=', '>='],
                'operator' => null,
                'value' => null,
            ],

            'study' => [
                'title' => 'Prodi',
                'data' => Study::fetchCombo(),
                'used' => false,
                'operators' => ['=', '<=', '>='],
                'operator' => null,
                'value' => null,
            ],
        ];
    }

    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['degree_fr'] . ($attributes['degree_fr'] ? ' ' : '') . $attributes['name'] . ($attributes['degree_bc'] ? ', ' : '') . $attributes['degree_bc'],
        );
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /**
     * The model store method
     *
     * @param Request $request
     * @return void
     */
    public static function storeRecord(Request $request, $parent)
    {
        DB::beginTransaction();

        try {
            $model = new static;
            $model->nik = $request->nik;
            $model->name = $request->name;
            $model->slug = $request->nidn;
            $model->degree_fr = $request->degree_fr;
            $model->degree_bc = $request->degree_bc;
            $model->gender = $request->gender;
            $model->born_place = $request->born_place;
            $model->born_date = $request->born_date;
            $model->position_id = $request->position_id;
            $model->faculty_id = $parent->faculty_id;
            $model->education_lv = $request->education_lv;
            $model->education_cp = $request->education_cp;
            $model->sk_number = $request->sk_number;
            $model->sk_date = $request->sk_date;
            $model->scholarship_id = $request->scholarship_id;
            $model->scholarship_st = $request->scholarship_st;
            $model->scholarship_fn = $request->scholarship_fn;
            $model->certi_regist = $request->certi_regist;
            $model->certi_number = $request->certi_number;
            $model->certi_date = $request->certi_date;
            $model->functional_date = $request->functional_date;
            $model->inffasing_date = $request->inffasing_date;

            $parent->lectures()->save($model);

            DB::commit();

            return new LectureResource($model);
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

            return new LectureResource($model);
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
