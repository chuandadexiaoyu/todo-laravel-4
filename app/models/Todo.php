<?php

class Todo extends Eloquent {


	public function getTitleAttribute($value)
    {
        return e($value);
    }

    public function setCheckedAttribute($value)
    {
        $this->attributes['checked'] = (int)$value;
    }

}