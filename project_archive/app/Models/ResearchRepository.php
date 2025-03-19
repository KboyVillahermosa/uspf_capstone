<?php
namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchRepository extends Model {
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['project_name', 'members', 'department', 'abstract', 'banner_image', 'file', 'approved'];
}
