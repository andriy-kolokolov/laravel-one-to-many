<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    public function programmingLanguages(): BelongsToMany {
        return $this->belongsToMany(ProjectsProgrammingLanguage::class, 'project_language', 'project_id', 'language_id');
    }

    public function index() {
        $projects = Project::with('languages', 'frameworks')->get();
        return view('projects.index', compact('projects'));
    }

    // Define the relationship with languages
//    public function languages()
//    {
//        return $this->belongsToMany(ProjectsProgrammingLanguage::class, 'projects_programming_languages');
////        return $this->belongsToMany(ProjectsProgrammingLanguage::class, 'project_language', 'project_id', 'language_id');
//    }

    // Define the relationship with frameworks
    public function frameworks()
    {
        return $this->hasMany(ProjectFramework::class);
    }
}
