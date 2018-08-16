<?php namespace Xitara\PMFaq\Models;

use Model;

/**
 * Groups Model
 */
class Groups extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_pmfaq_groups';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
