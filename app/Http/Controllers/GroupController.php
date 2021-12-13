<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Training;
class GroupController extends Controller
{
    public function abonements(Group $group){
        return $group->abonements()->with('workout')->get();
    }
    public function trainings(Request $request, Group $group){
        $trainings = Training::with('group')
        ->withCount('children')
        ->withCount('temp_users')
        ->where('group_id', $group->id);
        if($request->start) $trainings = $trainings->whereBetween('start', [$request->start, $request->end]);
        $trainings = $trainings->get();
        $data = [];
        foreach($trainings as $item){
            $group = $item->group->age_start . ' - ' . $item->group->age_end;
            $data[] = [
                'id'        => $item->id,
                'groupId'   => $group,
                'start'     => $item->start,
                'view'      => $item->start->format('H:i') . ' Группа ' . $group . '('.$item->children_count.')' . ($item->trainer_id ? '<br><span class="uk-badge uk-badge-success">'.$item->trainer->name.'</span>' : ''),
            ];
        }
        return $data;
    }
}
