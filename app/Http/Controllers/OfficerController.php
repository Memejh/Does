<?php
namespace App\Http\Controllers;

use App\Officer;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OfficerController extends Controller
{

  public function view()
  {
     return view('officer.index');
  }
  public function showPeople()
  {
    $oid = '0';
    if(isset($_GET["oid"])){
    $oid = $_GET["oid"];
    }
    $peoples = DB::table('officer_cat')->join('officer', 'officer_cat.oid', '=', 'officer.oid')
            ->where('officer.oid', '=', $oid)->get();
     return view('officer.people',['peoples' => $peoples , 'oid' => $oid]);
    // return view('officer.people');
  }
  public function insertOfficer()
  {

  }

  public function deleteOfficer()
  {
     return view('officer.index');
  }

  public function editOfficer()
  {
     return view('officer.index');
  }

  public function editOfficer_cat(Request $req)
  {try {

    \DB::table('officer_cat')
            ->where('oid', $req->input('oid'))
            ->update([
            'o_name_th' => $req->input('o_name_th'),
            'o_name_en' => $req->input('o_name_en'),
            'o_sort' => $req->input('o_sort')
            ]);
            return redirect('officerM?mes=UpadteOK');
  } catch (\Exception $e) {
  return redirect('officerM?mes=UpadteError');
  }


}


}
 ?>
