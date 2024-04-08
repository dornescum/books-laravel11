<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


interface BookInterface
{
    public function user();
    public function category();
    public function getBooksRelationship();
    public function getUserRelationship();
    public static function findBookByID(int $id);
    public function getSameCategoryBooks();
}

class Book extends Model implements  BookInterface
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id'); // Fully qualified namespace for Category model
    }

    /**
     * Get the relationship for books
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getBooksRelationship()
    {
        return $this->hasMany(Book::class);
    }

    /**
     * Get the user relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUserRelationship()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Find a book by ID
     *
     * @param int $id The ID of the book
     * @return \Illuminate\Database\Eloquent\Model|null The found book or null if not found
     */
    public static function findBookByID(int $id)
    {
        return static::find($id);
    }

    /**
     * Get all books in the same category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSameCategoryBooks()
    {
        return static::where('category_id', $this->category_id)->get();
    }
}
