<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','age','gender_id','nationality_id','origin_id','cast_id','native_language_id',
        'second_language_id','country_id','province_id','city_id','nearest_location','number','religion_id','sect_id','martial_status_id','accept_polygamy',
        'seeking_for','partner_age_limit','living_situation_id','sibling_brothers','sibling_sisters','sibling_brothers_married','sibling_sisters_married','diet_id','smoking','drinking',
        'willing_to_relocate','hafiz_guran','edducation_id','profession_id','income','height','weight',
        'body_type_id','disability_id','complexion_id','about_yourself','about_partner','status','block',
        'premium_member','featured_member'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    ////////////////////////RELATIONS///////////////////////////////////////////
    
    public function bodyType()
    {
        return $this->belongsTo('App\BodyType');
    }
    
    public function cast()
    {
        return $this->belongsTo('App\Cast');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function complexion()
    {
        return $this->belongsTo('App\Complexion');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function origin()
    {
        return $this->belongsTo('App\Country','origin_id');
    }
    public function nationality()
    {
        return $this->belongsTo('App\Country','nationality_id');
    }
    public function diet()
    {
        return $this->belongsTo('App\Diet');
    }
    public function disability()
    {
        return $this->belongsTo('App\Disability');
    }
    public function education()
    {
        return $this->belongsTo('App\Education','education_id');
    }
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }
    public function nativeLanguage()
    {
        return $this->belongsTo('App\Language','native_language_id');
    }
    public function secondLanguage()
    {
        return $this->belongsTo('App\Language','second_language_id');
    }
    public function livingSituation()
    {
        return $this->belongsTo('App\LivingSituation');
    }
    public function martialStatus()
    {
        return $this->belongsTo('App\MartialStatus');
    }
    public function profession()
    {
        return $this->belongsTo('App\Profession');
    }
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function religion()
    {
        return $this->belongsTo('App\Religion');
    }
    public function sect()
    {
        return $this->belongsTo('App\Sect');
    }
  
    
}
