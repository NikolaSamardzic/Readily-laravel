<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends StandardController
{
    public function index()
    {
        $totalVisits = Visit::totalVisits();
        $last24hoursVisits = Visit::last24hours();

        $result = [];
        $result24 = [];
        $sum = 0;
        $sum24 =0;

        foreach ($totalVisits as $visit){
            $result[$visit['name']] = $visit['count'];
            $sum += $visit['count'];
        }

        foreach ($last24hoursVisits as $visit){
            $result24[$visit['name']] = $visit['count'];
            $sum24 += $visit['count'];
        }

        //dd($last24hoursVisits);


        return view('pages.admin.logged.visits',['allVisits'=>$result, 'last24' => $result24, 'allSum' => $sum,'sum24'=>$sum24]);
    }
}
