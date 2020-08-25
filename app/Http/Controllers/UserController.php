<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Result;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Result::all()->last();
        return view('result')->with('result',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'age'=>'required',
            'sex'=>'required',
            'temperature'=>'required'
        ],[
            'age.required'=>'Age field is required'
            
        ]);
        $user = new User;
        $user->age = $request->age;
        $user->sex = $request->sex;
        $user->temperature = $request->temperature;
        $user->more_symptoms = json_encode($request->more_symptoms);
        $user->additional_symptoms = json_encode($request->additional_symptoms);
        $user->save();

        $this->show($user);
        return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $result = new Result;
        $temp = (float)($user->temperature);
        $add_symp = json_decode($user->additional_symptoms);
        $more_symp = json_decode($user->more_symptoms);
        $score = 0;

        if($temp>99.5){
            $score =+ 2;
        }
        if ($add_symp==null) {
            $score = $score;
        } else {
            if (count($add_symp)>1) {
                $score = $score+ (3+count($add_symp)-1);
            }
            if (count($add_symp)==1) {
                $score = $score+3;
            }
        }
        if ($more_symp==null) {
            $score=$score;
        } else {
            $score = $score+(count($more_symp)*2);
        }

        if ($score<5) {
            $result->assesment_score = $score;
            $result->result = "Negative";
        }
        elseif ($score==5) {
            $result->assesment_score = $score;
            $result->result = "Positive";
        }
        elseif ($score>5 && $score<7) {
            $result->assesment_score = $score;
            $result->result = "Positive";
        }
        elseif ($score>7) {
            $result->assesment_score = $score;
            $result->result = "Positive";
        }
        $user->result()->save($result);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
