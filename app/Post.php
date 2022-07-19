<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{   
    use Sluggable;
    
    protected $fillable = ['title','content','thumbnail','slug','user_id'];
	protected $dates = ['created_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
    	//if($this->thumbnail){
    	//	return $this->thumbnail;
    	//}else {
    	//	return asset('no-thumbnail.jpg');
    	//}

    	return !$this->thumbnail ? asset('no-thumbnail.jpg') : $this->thumbnail;
    }
}
