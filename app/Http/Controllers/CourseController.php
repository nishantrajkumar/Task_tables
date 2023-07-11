<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\SemBatch;
use App\Models\Department;
use App\Models\Programme;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Subject;

class CourseController extends Controller
{
    public function showForm()
    {
        $batches = SemBatch::all();
        //print_r($batches);
        //$batches= array();
        $batches_null=array("NO value returned");

        if ($batches == null)
        {
            $batches = $batches_null;
        }
       
        //dd($batches);

        return view('form', compact('batches'));
    }
    

    public function processForm(Request $request)
    {

        $batchName = $request->input('batches');


        $batches = SemBatch::where('batch_name', $batchName)->firstOrFail();
        //print_r($batches);
        $department = Department::findOrFail($batches->dept_id);
        $program = Programme::findOrFail($batches->prog_id);
        $course = Course::findOrFail($batches->course_id);
        $semester = Semester::findOrFail($batches->sem_id);

        $subdept = \App\Models\Subject::pluck('dept');
        //print_r($subdept);
        //$subject =array(array());

        $subject = \App\Models\Subject::where('properties->program_name', $program->name)
        ->where('properties->course_name', $course->name)
        ->where('properties->sem_name', $semester->name)
        //->where('dept', $department->dept_code)
        ->get();
            

        

        if ($subject) {
            //print_r($subject);
        } else {
           print_r("No matching subject found");
        }


        $coreSubjects = array(array());
        $electiveSubjects = array(array());
        $i=0;
        $j=0;

        // array_push($coreSubjects[$j],"nis");
        // array_push($coreSubjects[$j],"raj");
        //print_r($coreSubjects);
       
        foreach ($subject as $subjectItem) {
            // print_r($subjectItem);
            // echo"<br>";
            //print_r($subjectItem->sub_name);
            $properties=array();
            array_push($properties,json_decode($subjectItem->properties, true) ) ;
            //print_r($properties);
            foreach ($properties as $p) {
                //print_r($p[0]['type']);
                if ($p[0]['type']=='elective') {
                    // array_push($electiveSubjects[$i],$subjectItem->sub_code);
                    // array_push($electiveSubjects[$i],$subjectItem->sub_name);

                    $electiveSubjects[$i][$subjectItem->sub_code] = $subjectItem->sub_name;
                    //print_r($electiveSubjects);
                    $i++;
                } 
                else {
                    $coreSubjects[$j] = [];
                    // array_push($coreSubjects[$j],$subjectItem->sub_code);
                    // array_push($coreSubjects[$j],$subjectItem->sub_name);
                    //print_r($coreSubjects);
                    $coreSubjects[$j][$subjectItem->sub_code] = $subjectItem->sub_name;
                    $j++;
                }
            }
            
        }

        return view('process', compact('coreSubjects', 'electiveSubjects', 'subject'));

    }
}

