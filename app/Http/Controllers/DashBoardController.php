<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
class DashBoardController extends Controller{
     public function index(){
         return view("admin.dashboard");
     }

     public function dasboard_report(){
         return view("admin.report");
     }
}
