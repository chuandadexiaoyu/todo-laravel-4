<?php

class Todo extends Eloquent {

	/**
	 * Accessors and Mutators docs
	 * http://four.laravel.com/docs/eloquent#accessors-and-mutators
	 */

	/**
	 * Title accessor
	 * @param  string $value Todo title
	 * @return string        Htmlentities($value)
	 */
	public function getTitleAttribute($value)
    {
        return nl2br(e(Tools::br2nl($value)));
    }

    /**
     * Checked mutator, force 'checked' to be an int
     * @param int $value Checked value 0|1
     */
    public function setCheckedAttribute($value)
    {
        $this->attributes['checked'] = (int)$value;
    }

}