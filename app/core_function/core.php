<?php

class databaseGet{
    function getYears($table,$type){
        $query = DB::table($table)->orderBy($type,'desc')->get();
        $year = "";
        $i=0;
        foreach ($query as $querys) {
            if($year != $querys->year){
                $year = $querys->year; 
                $yearout[$i] = $querys->year; 
                $i++;}
         }
         return $yearout;
        
    }

    function convertDate($date){
        $date = new DateTime($date);
        $dateY = $date->format('Y')+543;
        $dateOut = $date->format('d/m/').$dateY." เวลา ".$date->format('h:m:s'); 
        return $dateOut; 
    }
}

?>