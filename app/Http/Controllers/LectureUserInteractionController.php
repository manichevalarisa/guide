<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\LectureUserInteraction;
use Illuminate\Http\Request;

class LectureUserInteractionController extends Controller
{
    /**
     * Save the action.
     *
     * @param Lecture $lecture
     * @param string $action
     * @return mixed
     * @throws \Exception
     */
    public function saveAction(Lecture $lecture, string $action)
    {
        $userID = auth()->user()->id;
        if(!auth()->user()->checkForPaidProduct($lecture->product_id)) return abort(404);
        $model = $lecture->userInteractions()->where('user_id', $userID)->where('action', $action)->first();
        if($model) $model->delete();
        else $lecture->userInteractions()->create([
            'user_id' => auth()->user()->id,
            'action' => $action
        ]);
        $progress = $lecture->getProgress();
        return response()->json(['progress' => $progress]);
    }
}
