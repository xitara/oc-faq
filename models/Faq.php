<?php namespace Xitara\Faq\Models;

use Model;

/**
 * Faq Model
 */
class Faq extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_faq_faqs';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'question' => 'required',
    ];

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
    public $belongsTo = [
        'group' => [
            'Xitara\Faq\Models\Groups',
        ],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [
        'images' => [
            'System\Models\File',
            'delete' => true,
            'public' => true,
        ],
    ];
}
