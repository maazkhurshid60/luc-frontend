<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteationForm extends Model
{
    protected $table = 'quotation_form';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'contact_no',
        'service',
        'message',
        'type',
    ];
}
