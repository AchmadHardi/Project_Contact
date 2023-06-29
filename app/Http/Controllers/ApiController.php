<?php
namespace App\Http\Controllers;
use App\Models\Contact;

class ApiController extends Controller
{
    public function getContact() {
        $searchTerm = request()->input('search');

        if ($searchTerm) {
            $contacts = Contact::where('name', 'LIKE', "%$searchTerm%")
                ->orWhere('email', 'LIKE', "%$searchTerm%")
                ->get();
        } else {
            $contacts = Contact::all();
        }
        // $array = $contacts->toArray();
        // echo json_encode($array);
        // exit;
        return response()->json($contacts);
    }
    public function getContactById($id) {
        $contacts = Contact::find($id);
        return response()->json($contacts);
        
    }
}
