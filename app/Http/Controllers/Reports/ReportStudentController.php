<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportStudentController extends Controller
{
    public function index(Request $request)
    {
        $students = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('alumnos', 'users.id', '=', 'alumnos.id_user')
            ->where('users.status', 1)
            ->select('alumnos.id as id', DB::raw('CONCAT(users.name, " ", users.last_name) AS name'))
            ->get();
        if ($request->combo_student) {
            $ratings = Rating::where('id_student', $request->combo_student)->get();
            $idStudent = $request->combo_student;
            // Calcula el promedio de Ratings
            $totalRating = $ratings->sum('rating');
            $promedioRating = $totalRating / $ratings->count();
        } else {
            $ratings = [];
            $idStudent = '';
            $promedioRating = '';
        }


        return view('reports.students', compact('students', 'ratings', 'idStudent', 'promedioRating'));
    }

    public function generatePdf(Request $request, $id)
    {
        // Recuperar el usuario de la base de datos
        $data = Rating::where('id_student', $id)->get();

        // Si el usuario no existe, mostrar un mensaje de error
        if (!$data) {
            return abort(404);
        }
        // Load Blade template
        $html = view('pdf.rating', ['data' => $data]);
        // Generate PDF using Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html->render());
        $dompdf->setPaper('A4', 'portrait'); // Set paper size and orientation
        $dompdf->render();

        $response = Response::make($dompdf->output(), 200);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename=Alumno-' . $data[0]->student->name . '_' . $data[0]->student->last_name . '.pdf');

        return $response;
    }
}