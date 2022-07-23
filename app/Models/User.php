<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Filterable, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
            $model->email = $request->email;
            $model->password = Hash::make($request->password ?: env('DB_DEFAULTPASS'));
            $model->theme = $request->theme;
            $model->secured = true;
            $model->save();

            DB::commit();

            return new UserResource($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Undocumented function
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
            $model->email = $request->email;
            $model->theme = $request->theme;
            $model->save();

            DB::commit();

            return new UserResource($model);
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

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $model
     * @return void
     */
    public static function resetPassword(Request $request, $model)
    {
        DB::beginTransaction();

        try {
            $model->password = Hash::make($request->password ?: env('DB_DEFAULTPASS'));
            $model->save();

            DB::commit();

            return new UserResource($model);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
