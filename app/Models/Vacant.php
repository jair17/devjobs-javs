<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacant extends Model
{
    use HasFactory;

    protected $dates = ['last_day'];
    protected $fillable = [
        'title', 'salary_id', 'category_id', 'company', 'last_day', 'description', 'image', 'published', 'user_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function salary(): BelongsTo{
        return $this->belongsTo(Salary::class);
    }
    public function applicants(): HasMany{
        return $this->hasMany(Applicant::class)->orderBy('created_at', 'DESC');
    }

    public function recluiter(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
}
