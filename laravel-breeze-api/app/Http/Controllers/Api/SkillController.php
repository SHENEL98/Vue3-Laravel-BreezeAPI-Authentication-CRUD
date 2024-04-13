<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\SkillResourcce;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        return SkillResourcce::collection(Skill::all());
    }
    public function show(Skill $skill){
        //return $skill;
        return new SkillResourcce($skill);
    }
    public function store(StoreSkillRequest $request){
        Skill::create($request->validated());
        return response()->json("Skill Created");
    }
    public function update(StoreSkillRequest $request, Skill $skill){ 
        $skill->update($request->validated());
        return response()->json("Skill Updated");
    }
    public function destroy(Skill $skill){
        $skill->delete();
        return response()->json("Skill deleted");
    }
}
