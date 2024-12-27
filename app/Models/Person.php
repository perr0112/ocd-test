<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{
    /**
     * https://laravel.com/docs/11.x/eloquent
     * • Une personne peut avoir plusieurs enfants.
     * • Une personne peut avoir plusieurs parents.
     * • Une personne a un utilisateur-créateur.
     */

    /**
     * @var string $table
     */
    protected $table = 'people';

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'created_by',
        'first_name',
        'last_name',
        'birth_name',
        'middle_names',
        'date_of_birth',
    ];

    /**
     * Relation : une personne peut avoir plusieurs enfants
     * @return BelongsToMany
     */
    public function children(): BelongsToMany
    {
        return $this->belongsToMany(
            Person::class,
            'relationships', 'parent_id', 'child_id'
        )->where('parent_id', '!=', $this->id);
    }

    /**
     * Relation : une personne peut avoir plusieurs parents
     * @return BelongsToMany
     */
    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(
            Person::class,
            'relationships', 'child_id', 'parent_id'
        )->where('child_id', '!=', $this->id);
    }

    /**
     * Relation : une personne a un utilisateur-créateur
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'created_by');
    }
}
