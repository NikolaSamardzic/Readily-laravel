<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public static function logPage($name)
    {
        self::query()->create([
            'name' => $name
        ])->save();
    }

    public static function totalVisits()
    {
        return self::query()
            ->select('name',DB::raw('COUNT(id) as count'))
            ->groupBy('name')
            ->get();
    }

    public static function last24hours()
    {
        {
            return self::query()
                ->select('name', DB::raw('COUNT(id) as count'))
                ->groupBy('name')
                ->where('created_at', '>', now()->subDay())
                ->get();
        }
    }
}
