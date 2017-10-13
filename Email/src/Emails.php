<?php

namespace smartdata\Email;

Use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $fillable = ['id','name','subject', 'message'];
}
