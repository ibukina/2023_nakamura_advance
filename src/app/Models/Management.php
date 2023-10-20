<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Management extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function scopeFullnameSearch($query, $fullname)
    {
        if(!empty($fullname)){
            $query->where('fullname', 'like', '%' . $fullname . "%");
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if(!empty($gender)){
            $query->where('gender', 'like', "%" . $gender . "%");
        }
    }

    public function scopeCreated_atSearch(Request $request)
    {
        $from_time=$request->from_time;
        $to_time=$request->to_time;

        if(!empty($request->from_time) || !empty($request->to_time)){
            $query->whereTime('created_at','>=',$from_time.':00')->whereTime('created_at','<=',$until_time.':59');
            // $results=$query->get()->softByDesc('created_at');
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if(!empty($email)){
            $query->where('email', "like", "%" . $email . "%");
        }
    }
}
