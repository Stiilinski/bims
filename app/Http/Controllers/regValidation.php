<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\employee_tbl;
use App\Models\resident_tbl;
use Carbon\Carbon;
use App\Models\brgyCertificate_tbl;
use App\Models\businessBrgyClearance_tbl;
use App\Models\BrgyClearance_tbl;
use App\Models\transaction_tbl;
use App\Models\blotter_tbl;
use App\Models\revenue_tbl;
use App\Models\brgyOfficials_tbl;
use App\Models\medicine_tbl;
use App\Models\opt_tbl;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class regValidation extends Controller
{
    //for employees ni dapit!    
    public function reg()
    {
        return view('registration');
    }

    public function log()
    {
        return view('login');
    }

    function logout() 
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }

    public function archiveResident(Request $request)
    {
        $resident = resident_tbl::find($request->res_id);
        if ($resident) {
            $resident->res_status = 'archive';
            $resident->save();
            return redirect()->back()->with('success', 'Resident archived successfully');
        }

        return redirect()->back()->with('error', 'Resident not found');
    }


    public function dashboard()
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

        // Fetch the required counts
        $totalPopulation = resident_tbl::count();
        $totalMale = resident_tbl::where('res_sex', 'Male')->count();
        $totalFemale = resident_tbl::where('res_sex', 'Female')->count();
        $totalVoters = resident_tbl::where('res_voters', 'Yes')->count();
        $totalNonVoters = resident_tbl::where('res_voters', 'No')->count();
        $totalBlotters = blotter_tbl::count();
        $totalCertificates = brgyCertificate_tbl::count();
        $totalBusinessPermits = businessBrgyClearance_tbl::count();
        $totalClearances = BrgyClearance_tbl::count();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'totalPopulation' => $totalPopulation,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale,
            'totalVoters' => $totalVoters,
            'totalNonVoters' => $totalNonVoters,
            'totalBlotters' => $totalBlotters,
            'totalCertificates' => $totalCertificates,
            'totalBusinessPermits' => $totalBusinessPermits,
            'totalClearances' => $totalClearances,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/dbSecretary', $data);
    }


    //FOR RESIDENT MANAGEMENT VIEW NI SIYA DAPIT!
    public function residentsRec()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'residents' => resident_tbl::all(),
        ];
        
        // Pass the data array to the view
        return view('dashboards/secretariesDb/residentRec', $data);
    }
    
    public function dbviewResident(Request $request) 
    {
        // Retrieve resident data based on the provided res_id
        $resident = resident_tbl::find($request->input('res_id'));
    
        // Calculate age
        $age = $this->calculateAges($resident->res_bdate);
    
        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id','=', session('LoggedUser'))->first();
    
        // Construct the data array
        $data = [
            'resident' => $resident,
            'age' => $age,
            'LoggedUserInfo' => $loggedUserInfo
        ];
    
        // Pass the data to the view
        return view('/dashboards/secretariesDb/dbviewResident')->with($data);
    }

    public function viewResidentDetails(Request $request) 
    {
        // Retrieve resident data based on the provided res_id
        $resident = resident_tbl::find($request->input('res_id'));
    
        // Calculate age
        $age = $this->calculateAges($resident->res_bdate);
    
        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id','=', session('LoggedUser'))->first();
    
        // Construct the data array
        $data = [
            'resident' => $resident,
            'age' => $age,
            'LoggedUserInfo' => $loggedUserInfo
        ];
    
        // Pass the data to the view
        return view('/dashboards/captainDb/viewResidentDetails')->with($data);
    }
    
    //END OF FOR RESIDENT MANAGEMENT VIEW!

    function dashboardPur()
    {
        $data = ['LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first()];
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0'); 
        return view('dashboards/secretariesDb/purokList', $data);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:employee_tbls,em_email', 
            'address' => 'required|string',
            'profile' => 'required|image', 
            'position' => 'required|string',
            'contact' => 'required|numeric|digits:11',
            'employeeId' => ['required', 'string', 'unique:employee_tbls,em_id', 'regex:/^W2-\d{8}-\d{2}$/'],
            'passwords' => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*\d).+$/'],
        ], [
            'employeeId.regex' => 'The employee ID must be in this format: W2-******78-two numbers',
            'passwords.regex' => 'Password must be: 8 or more characters, at least 1 uppercase letter, and at least 1 number.',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } 
        else 
        {
            $profilePath = $request->file('profile')->store('/profilePictures', 'public');

            $employee = new employee_tbl;
            $employee->em_id = $request->employeeId;
            $employee->em_fname = $request->fname;
            $employee->em_lname = $request->lname;
            $employee->em_email = $request->email;
            $employee->em_password = Hash::make($request->passwords);
            $employee->em_address = $request->address;
            $employee->em_contact = $request->contact;
            $employee->em_position = $request->position;
            $employee->em_status = 'pending';
            $employee->em_picture = $profilePath;
            
            if ($employee->save()) 
            {
                return response()->json(['status' => 1, 'msg' => 'New Employee Has Been Added']);
            } 
            else 
            {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new employee'], 500);
            }
        }
    }

    public function check(Request $request)
{
    $request->validate([
        'employeeId' => 'required|string',
        'passwords' => 'required|min:8',
    ]);

    // Retrieve employee information based on the provided employeeId
    $employeeInfo = employee_tbl::where('em_id', $request->employeeId)->first();

    if (!$employeeInfo) {
        return back()->withErrors(['fail' => 'Incorrect ID or Password!'])->withInput();
    } 

    // Check if the employee's status is 'active'
    if ($employeeInfo->em_status !== 'active') {
        return back()->withErrors(['fail' => 'Your account is not active. Please contact admin.'])->withInput();
    }

    // Verify the password using Hash::check
    if (Hash::check($request->passwords, $employeeInfo->em_password)) {
        // Set the LoggedUser session variable
        $request->session()->put('LoggedUser', $employeeInfo->em_id);
        
        // Redirect based on the user's position
        switch ($employeeInfo->em_position) {
            case 'Secretary':
                return redirect('dashboards/dbSecretary');
                break;
            case 'Barangay Captain':
                return redirect('dashboards/dbBrgyCap');
                break;
            case 'Treasurer':
                return redirect('dashboards/dbTreasurer');
                break;
            case 'System Admin':
                return redirect('dashboards/systemAdmin');
                break;
            case 'Barangay Health Worker':
                return redirect('dashboards/dbHealthWorker');
                break;
            default:
                return redirect('/'); // Default redirection if position is not recognized
        }
    } else {
        return back()->withErrors(['fail' => 'Incorrect ID or Password!'])->withInput();
    }
}
     //for residents ni dapit!
    public function saveResidents(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile' => 'required|image|max:2048',
            'household' => 'required',
            'dateRegister' => 'required|date',
            'suffix' => 'required',

            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            
            'birthPlace' => 'required|string',
            'birthDate' => 'required|date',

            
            'civilStatus' => 'required',
            'sex' => 'required',
            'purok' => 'required',

            'person' => 'required',
            'living' => 'required',
            'sitio' => 'required',
            
            'voters' => 'required',
            'email' => 'required|email|unique:resident_tbls,res_email', 
            'contact' => 'required|numeric|digits:11',

            'citizens' => 'required|string',
            'address' => 'required|string',
            'occupation' => 'required|string'
            ]);

        if ($validator->fails()) 
        {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } 
        else 
        {
            $profilePath = $request->file('profile')->store('/profilePictures', 'public');

            $resident = new resident_tbl;
            $resident->res_picture = $profilePath;
            $resident->res_household = $request->household;
            $resident->res_dateReg = $request->dateRegister;
            $resident->res_suffix = $request->suffix;

            $resident->res_fname = $request->firstName;
            $resident->res_mname = $request->middleName;
            $resident->res_lname = $request->lastName;

            $resident->res_bplace = $request->birthPlace;
            $resident->res_bdate = $request->birthDate;

            $resident->res_civil = $request->civilStatus;
            $resident->res_sex = $request->sex;
            $resident->res_purok = $request->purok;

            $resident->res_voters = $request->voters;
            $resident->res_email = $request->email;
            $resident->res_contact = $request->contact;

            $resident->res_personStatus = $request->person;
            $resident->res_status = $request->living;
            $resident->res_sitio = $request->sitio;

            $resident->res_citizen = $request->citizens;
            $resident->res_address = $request->address;
            $resident->res_occupation = $request->occupation;
            
            
            if ($resident->save()) 
            {
                return response()->json(['status' => 1, 'msg' => 'New Resident Has Been Added']);
            } 
            else 
            {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new Resident'], 500);
            }
        }
    }

    public function editResident($id)
    {
        $resident = resident_tbl::find($id);
        if($resident)
        {
            return response()->json([
                'status'=>200,
                'resident'=>$resident,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Resident Not Found',
            ]);
        }
    }


    public function updateResident(Request $request, $id)
    {
        // Find the resident by ID
        $resident = resident_tbl::find($id);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'picture' => 'sometimes|nullable',
            'household' => 'sometimes|required',
            'dateRegister' => 'sometimes|required',
            'suffix' => 'sometimes|required',
            'fname' => 'sometimes|required|string',
            'mname' => 'sometimes|required|string',
            'lname' => 'sometimes|required|string',
            'bplace' => 'sometimes|required|string',
            'bdate' => 'sometimes|required|date',
            'civil' => 'sometimes|required|string',
            'sex' => 'sometimes|required',
            'purok' => 'sometimes|required',
            'voters' => 'sometimes|required',
            'person' => 'sometimes|required',
            'living' => 'sometimes|required',
            'sitio' => 'sometimes|required',
            'email' => 'sometimes|required|email',
            'contact' => 'sometimes|required|numeric|digits:11',
            'citizen' => 'sometimes|required|string',
            'address' => 'sometimes|required|string',
            'occupation' => 'sometimes|required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
        }

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profilePictures', $filename); // Store file in storage/profilePictures
            $resident->res_picture = 'profilePictures/' . $filename; // Save the full file path in the database
        }

        $resident->res_household = $request->input('household');
        $resident->res_dateReg = $request->input('dateReg');
        $resident->res_fname = $request->input('fname');
        $resident->res_mname = $request->input('mname');
        $resident->res_lname = $request->input('lname');
        $resident->res_suffix = $request->input('suffix');
        $resident->res_bplace = $request->input('bplace');
        $resident->res_bdate = $request->input('bdate');
        $resident->res_civil = $request->input('civil');
        $resident->res_sex = $request->input('sex');
        $resident->res_purok = $request->input('purok');
        $resident->res_voters = $request->input('voters');
        $resident->res_personStatus= $request->input('person');
        $resident->res_status = $request->input('living');
        $resident->res_sitio = $request->input('sitio');
        $resident->res_email = $request->input('email');
        $resident->res_contact = $request->input('contact');
        $resident->res_citizen = $request->input('citizen');
        $resident->res_address = $request->input('address');
        $resident->res_occupation = $request->input('occupation');

        $resident->save();

        return response()->json(['status' => 200, 'resident' => $resident, 'msg' => 'Resident has been updated successfully']);
    }


    public function dbResidents()
    {
        return view('dashboards/dbResidents');
    }

    public function blogs()
    {
        return view('dashboards/resdidentsDb/blogs');
    }

    public function traceResidents()
    {
        return view('dashboards/dbResidents');
    }



    public function calculateAges($birthDate)
    {
        return Carbon::parse($birthDate)->age;
    }


    // FOR CERTIFICATION INPUT
    public function saveCertificate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fName3' => 'required|string|exists:resident_tbls,res_fname',
                'mName3' => 'required|string|exists:resident_tbls,res_mname',
                'lName3' => 'required|string|exists:resident_tbls,res_lname',
                'suffix3' => 'nullable|string|exists:resident_tbls,res_suffix',
                'bDate3' => 'required|date|exists:resident_tbls,res_bdate',
                'tcode3' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        // Check if tcode2 already exists in any of the relevant tables
                        if (BrgyClearance_tbl::where('bcl_transactionCode', $value)->exists() ||
                            businessBrgyClearance_tbl::where('bc_transactionCode', $value)->exists() ||
                            brgyCertificate_tbl::where('cert_transactionCode', $value)->exists() ||
                            blotter_tbl::where('blotter_transactionCode', $value)->exists()) {
                            $fail('Transaction Code Already Exists');
                        }
                    }
                ],
                'purposeCertificate3' => 'required|string',
                'dateIssued3' => 'required|date',
                'pickUp3' => 'required|date'
            ], [
                'fName3.exists' => 'First Name Not Found',
                'mName3.exists' => 'Middle Name Not Found',
                'lName3.exists' => 'Last Name Not Found',
                'suffix3.exists' => 'Suffix Not Found',
                'bDate3.exists' => 'BirthDate Not Same As Your Registered BirthDate',
                
                'bDate3.required' => 'Birthdate Field Required',
                'fName3.required' => 'First Name Field Required',
                'mName3.required' => 'Middle Name Field Required',
                'lName3.required' => 'Last Name Field Required',
                'purposeCertificate3.required' => 'Certificate Purpose Field Required',
                'pickUp3.required' => 'Pick Up Date Field Required'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }

            // Build the search criteria
            $searchCriteria = [
                'res_fname' => $request->input('fName3'),
                'res_mname' => $request->input('mName3'),
                'res_lname' => $request->input('lName3'),
                'res_bdate' => $request->input('bDate3'),
            ];

            // Add the suffix to the search criteria if it's provided
            if ($request->filled('suffix3')) {
                $searchCriteria['res_suffix'] = $request->input('suffix3');
            }

            // Retrieve the resident ID based on the provided name and suffix (if applicable)
            $resident = resident_tbl::where($searchCriteria)->first();

            if (!$resident) {
                // If resident not found, return error response
                return response()->json(['status' => 0, 'msg' => 'Resident not found'], 404);
            }

            // Get the resident ID
            $residentID = $resident->res_id;

            // Create and save the certificate
            $certificate = new brgyCertificate_tbl;
            $certificate->res_id = $residentID;
            $certificate->cert_transactionCode = $request->input('tcode3');
            $certificate->cert_purpose = $request->input('purposeCertificate3');
            $certificate->cert_dateIssued = $request->input('dateIssued3');
            $certificate->cert_pickUpDate = $request->input('pickUp3');
            $certificate->certStatus = 'pending'; // Automatically set to 'pending'

            if ($certificate->save()) {
                return response()->json(['status' => 1, 'msg' => 'Input Submitted Successfully!']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
        }
    }

    // FOR BARANGAY CLEARANCE/BUSINESS INPUT
    public function saveBusinessClearance(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
            'fName2' => 'required|string|exists:resident_tbls,res_fname',
            'mName2' => 'required|string|exists:resident_tbls,res_mname',
            'lName2' => 'required|string|exists:resident_tbls,res_lname',
            'suffix2' => 'nullable|string|exists:resident_tbls,res_suffix',
            'bDate2' => 'required|date|exists:resident_tbls,res_bdate',
            'tcode2' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Check if tcode2 already exists in any of the relevant tables
                    if (BrgyClearance_tbl::where('bcl_transactionCode', $value)->exists() ||
                        businessBrgyClearance_tbl::where('bc_transactionCode', $value)->exists() ||
                        brgyCertificate_tbl::where('cert_transactionCode', $value)->exists() ||
                        blotter_tbl::where('blotter_transactionCode', $value)->exists()) {
                        $fail('Transaction Code Already Exists');
                    }
                }
            ],
            'businessName' => 'required|string',
            'businessAddress' => 'required|string',
            'businessType' => 'required|string',
            'businessNature' => 'required|string',
            'dateIssued2' => 'required|date',
            'pickUp2' => 'required|date'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }

            // Build the search criteria
            $searchCriteria = [
                'res_fname' => $request->input('fName2'),
                'res_mname' => $request->input('mName2'),
                'res_lname' => $request->input('lName2'),
                'res_bdate' => $request->input('bDate2'),
            ];

            // Add the suffix to the search criteria if it's provided
            if ($request->filled('suffix2')) {
                $searchCriteria['res_suffix'] = $request->input('suffix2');
            }

            // Retrieve the resident ID based on the provided name, suffix (if applicable), and birthdate
            $resident = resident_tbl::where($searchCriteria)->first();

            if (!$resident) {
                // If resident not found, return error response
                return response()->json(['status' => 0, 'msg' => 'Resident not found'], 404);
            }

            // Get the resident ID
            $residentID = $resident->res_id;

            // Create and save the certificate
            $brgyBusinessClearance = new businessBrgyClearance_tbl;
            $brgyBusinessClearance->res_id = $residentID;
            $brgyBusinessClearance->bc_transactionCode = $request->input('tcode2');
            $brgyBusinessClearance->bc_businessName = $request->input('businessName');
            $brgyBusinessClearance->bc_businessAddress = $request->input('businessAddress');
            $brgyBusinessClearance->bc_businessType = $request->input('businessType');
            $brgyBusinessClearance->bc_businessNature = $request->input('businessNature');
            $brgyBusinessClearance->bc_dateIssued = $request->input('dateIssued2');
            $brgyBusinessClearance->bc_pickUpDate = $request->input('pickUp2');
            $brgyBusinessClearance->bc_status = 'pending'; // Automatically set to 'pending'

            if ($brgyBusinessClearance->save()) {
                return response()->json(['status' => 1, 'msg' => 'Input Submitted Successfully!']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
        }
    }



    //MULTI PURPOSE BARANGAY CLEARANCE
    public function saveBrgyClearance(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fName1' => 'required|string|exists:resident_tbls,res_fname',
                'mName1' => 'required|string|exists:resident_tbls,res_mname',
                'lName1' => 'required|string|exists:resident_tbls,res_lname',
                'suffix1' => 'nullable|string|exists:resident_tbls,res_suffix',
                'bDate1' => 'required|date|exists:resident_tbls,res_bdate',

                'tcode1' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        // Check if tcode2 already exists in any of the relevant tables
                        if (BrgyClearance_tbl::where('bcl_transactionCode', $value)->exists() ||
                            businessBrgyClearance_tbl::where('bc_transactionCode', $value)->exists() ||
                            brgyCertificate_tbl::where('cert_transactionCode', $value)->exists() ||
                            blotter_tbl::where('blotter_transactionCode', $value)->exists()) {
                            $fail('Transaction Code Already Exists');
                        }
                    }
                ],
                'clearancePurpose' => 'required|string',
                'dateIssued1' => 'required|date',
                'pickUp1' => 'required|date'
            ], [
                'fName1.exists' => 'First Name Not Found',
                'mName1.exists' => 'Middle Name Not Found',
                'lName1.exists' => 'Last Name Not Found',
                'suffix1.exists' => 'Suffix Not Found',
                'bDate1.exists' => 'BirthDate Not Same As Your Registered BirthDate',
                
                'bDate1.required' => 'Birthdate Field Required',
                'fName1.required' => 'First Name Field Required',
                'mName1.required' => 'Middle Name Field Required',
                'lName1.required' => 'Last Name Field Required',
                'clearancePurpose.required' => 'Last Name Field Required',
                'pickUp1.required' => 'Pick Up Date Field Required'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }

            // Build the search criteria
            $searchCriteria = [
                'res_fname' => $request->input('fName1'),
                'res_mname' => $request->input('mName1'),
                'res_lname' => $request->input('lName1'),
                'res_bdate' => $request->input('bDate1'),
            ];

            // Add the suffix to the search criteria if it's provided
            if ($request->filled('suffix1')) {
                $searchCriteria['res_suffix'] = $request->input('suffix1');
            }

            // Retrieve the resident ID based on the provided name and suffix (if applicable)
            $resident = resident_tbl::where($searchCriteria)->first();

            if (!$resident) {
                // If resident not found, return error response
                return response()->json(['status' => 0, 'msg' => 'Resident not found'], 404);
            }

            // Get the resident ID
            $residentID = $resident->res_id;

            // Create and save the certificate
            $brgyClearance = new BrgyClearance_tbl;
            $brgyClearance->res_id = $residentID;
            $brgyClearance->bcl_transactionCode = $request->input('tcode1');
            $brgyClearance->bcl_purpose = $request->input('clearancePurpose');
            $brgyClearance->bcl_dateIssued = $request->input('dateIssued1');
            $brgyClearance->bcl_pickUpDate = $request->input('pickUp1');
            $brgyClearance->bcl_status = 'pending'; // Automatically set to 'pending'

            if ($brgyClearance->save()) {
                return response()->json(['status' => 1, 'msg' => 'Input Submitted Successfully!']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
        }
    }

    //DISPLAY CERTIFICATES AND CERTIFICATE ISSUANCE
    public function barangayCert()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'certificates' => brgyCertificate_tbl::join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'brgy_certificate_tbls.id',
                    'brgy_certificate_tbls.cert_transactionCode',
                    'brgy_certificate_tbls.cert_purpose',
                    'brgy_certificate_tbls.cert_dateIssued',
                    'brgy_certificate_tbls.cert_pickUpDate',
                    'brgy_certificate_tbls.certStatus',
                    'brgy_certificate_tbls.certReason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_email',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/secretariesDb/dbCert', $data);
    }

    public function getResidentData($id)
    {
        $resident = resident_tbl::find($id);

        if ($resident) {
            return response()->json($resident);
        } else {
            return response()->json(['error' => 'Resident not found'], 404);
        }
    }


    public function barangayClearance()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'clearance' => BrgyClearance_tbl::join('resident_tbls', 'brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'brgy_clearance_tbls.bcl_id',
                    'brgy_clearance_tbls.bcl_transactionCode',
                    'brgy_clearance_tbls.bcl_purpose',
                    'brgy_clearance_tbls.bcl_dateIssued',
                    'brgy_clearance_tbls.bcl_pickUpDate',
                    'brgy_clearance_tbls.bcl_status',
                    'brgy_clearance_tbls.bcl_reason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_email',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/secretariesDb/dbBrgyClearance', $data);
    }

    public function businessPermit()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'permits' => businessBrgyClearance_tbl::join('resident_tbls', 'business_brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'business_brgy_clearance_tbls.id',
                    'business_brgy_clearance_tbls.bc_transactionCode',
                    'business_brgy_clearance_tbls.bc_businessName',
                    'business_brgy_clearance_tbls.bc_businessAddress',
                    'business_brgy_clearance_tbls.bc_businessType',
                    'business_brgy_clearance_tbls.bc_businessNature',
                    'business_brgy_clearance_tbls.bc_dateIssued',
                    'business_brgy_clearance_tbls.bc_pickUpDate',
                    'business_brgy_clearance_tbls.bc_status',
                    'business_brgy_clearance_tbls.bc_reason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_email',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/secretariesDb/dbBusinessPermit', $data);
    }


    public function viewCertIndigency(Request $request)
    {
        $id = $request->query('id');

        // Retrieve certificate data based on the provided id
        $certificate = brgyCertificate_tbl::find($id);
        // Retrieve certificate data along with resident and transaction data using joins
        $certificate = DB::table('brgy_certificate_tbls')
            ->join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
            ->leftJoin('transaction_tbls', 'brgy_certificate_tbls.id', '=', 'transaction_tbls.cert_id')
            ->where('brgy_certificate_tbls.id', $id)
            ->select('brgy_certificate_tbls.*', 'resident_tbls.*', 'transaction_tbls.*')
            ->first();

        if (!$certificate) {
            return redirect()->back()->withErrors(['message' => 'Certificate not found']);
        }

        // Check if the id exists in the transaction_tbls
        $transactionExists = transaction_tbl::where('cert_id', $id)->exists();

        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id', session('LoggedUser'))->first();

        $data = [
            'certificate' => $certificate,
            'LoggedUserInfo' => $loggedUserInfo,
            'transactionExists' => $transactionExists
        ];

        return view('/dashboards/secretariesDb/certIndigency')->with($data);
    }


    public function insertCertTransaction(Request $request)
    {
        try {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'certNum' => 'required|string',
                'puOr' => 'required|string',
                'amountPaid' => 'required|numeric',
                'dates' => 'required|date'
            ], [
                'certNum.required' => 'Certificate Number is Required',
                'puOr.required' => 'O.R. Number is Required',
                'amountPaid.required' => 'Amount Paid is Required',
                'amountPaid.numeric' => 'Amount Paid Must Be a Number',
                'dates.required' => 'Date Field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }

            // Retrieve the certificate ID from the URL
            $certId = $request->query('id');

            // Start a transaction
            DB::beginTransaction();

            try {
                // Create and save the transaction
                $transaction = new transaction_tbl;
                $transaction->cert_id = $certId;
                $transaction->bcl_id = null;
                $transaction->business_id = null;
                $transaction->blotter_id = null;
                $transaction->tr_residenceCertNum = $request->input('certNum');
                $transaction->tr_orNum = $request->input('puOr');
                $transaction->tr_amountPaid = $request->input('amountPaid');
                $transaction->tr_date = $request->input('dates');

                if (!$transaction->save()) {
                    throw new \Exception('Failed to save transaction');
                }

                // Retrieve the certificate and update its status
                $certificate = brgyCertificate_tbl::find($certId);
                if (!$certificate) {
                    throw new \Exception('Certificate not found');
                }

                $certificate->certStatus = 'processed';

                if (!$certificate->save()) {
                    throw new \Exception('Failed to update certificate status');
                }

                // Commit the transaction
                DB::commit();

                return response()->json(['status' => 1, 'msg' => 'Transaction Submitted Successfully!']);
            } catch (\Exception $e) {
                // Rollback the transaction in case of an error
                DB::rollBack();
                Log::error($e->getMessage());
                return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
        }
    }

    public function updateTransaction(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'rephrasePurpose' => 'nullable|string',
            'certificateNum' => 'nullable|string',
            'orNum' => 'nullable|string',
            'amountPaids' => 'nullable|numeric',
            'updateDates' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
        }

        // Find the certificate by ID
        $certificate = brgyCertificate_tbl::find($id);
        if (!$certificate) {
            return response()->json(['status' => 404, 'msg' => 'Certificate not found']);
        }

        // Update certificate purpose if provided
        if ($request->filled('rephrasePurpose')) {
            $certificate->cert_purpose = $request->input('rephrasePurpose');
        }

        // Find the related transaction using cert_id
        $transaction = transaction_tbl::where('cert_id', $id)->first();
        if (!$transaction) {
            return response()->json(['status' => 404, 'msg' => 'Transaction not found']);
        }

        // Update transaction details if provided
        if ($request->filled('certificateNum')) {
            $transaction->tr_residenceCertNum = $request->input('certificateNum');
        }

        if ($request->filled('orNum')) {
            $transaction->tr_orNum = $request->input('orNum');
        }

        if ($request->filled('amountPaids')) {
            $transaction->tr_amountPaid = $request->input('amountPaids');
        }

        if ($request->filled('updateDates')) {
            $transaction->tr_date = $request->input('updateDates');
        }

        // Save both models within a transaction to ensure atomicity
        DB::transaction(function () use ($certificate, $transaction) {
            $certificate->save();
            $transaction->save();
        });

        return response()->json(['status' => 200, 'msg' => 'Certificate and Transaction have been updated successfully']);
    }

    public function updateStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:brgy_certificate_tbls,id',
            'status' => 'required|string'
        ]);

        // Find the certificate and update its status
        $certificate = brgyCertificate_tbl::find($request->id);
        $certificate->certStatus = $request->status;
        $certificate->cert_pickUpDate = now(); // Optionally update the pickup date
        $certificate->save();

        return response()->json(['success' => true]);
    }


    public function rejectCertificate(Request $request) {
        $certificate = brgyCertificate_tbl::find($request->id);
        if ($certificate) {
            $certificate->certStatus = $request->status;
            $certificate->certReason = $request->reason;
            $certificate->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }


    public function viewCertification(Request $request)
    {
        $id = $request->query('id');

        // Retrieve certificate data based on the provided id
        $certificate = brgyCertificate_tbl::find($id);
        // Retrieve certificate data along with resident and transaction data using joins
        $certificate = DB::table('brgy_certificate_tbls')
            ->join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
            ->leftJoin('transaction_tbls', 'brgy_certificate_tbls.id', '=', 'transaction_tbls.cert_id')
            ->where('brgy_certificate_tbls.id', $id)
            ->select('brgy_certificate_tbls.*', 'resident_tbls.*', 'transaction_tbls.*')
            ->first();

        if (!$certificate) {
            return redirect()->back()->withErrors(['message' => 'Certificate not found']);
        }

        // Check if the id exists in the transaction_tbls
        $transactionExists = transaction_tbl::where('cert_id', $id)->exists();

        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id', session('LoggedUser'))->first();

        $data = [
            'certificate' => $certificate,
            'LoggedUserInfo' => $loggedUserInfo,
            'transactionExists' => $transactionExists
        ];

        return view('/dashboards/secretariesDb/certification')->with($data);
    }

    public function viewBrgyCertification(Request $request)
    {
        $id = $request->query('id');

        // Retrieve certificate data based on the provided id
        $certificate = brgyCertificate_tbl::find($id);
        // Retrieve certificate data along with resident and transaction data using joins
        $certificate = DB::table('brgy_certificate_tbls')
            ->join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
            ->leftJoin('transaction_tbls', 'brgy_certificate_tbls.id', '=', 'transaction_tbls.cert_id')
            ->where('brgy_certificate_tbls.id', $id)
            ->select('brgy_certificate_tbls.*', 'resident_tbls.*', 'transaction_tbls.*')
            ->first();

        if (!$certificate) {
            return redirect()->back()->withErrors(['message' => 'Certificate not found']);
        }

        // Check if the id exists in the transaction_tbls
        $transactionExists = transaction_tbl::where('cert_id', $id)->exists();

        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id', session('LoggedUser'))->first();

        $data = [
            'certificate' => $certificate,
            'LoggedUserInfo' => $loggedUserInfo,
            'transactionExists' => $transactionExists
        ];

        return view('/dashboards/secretariesDb/brgyCertification')->with($data);
    }

    public function viewGoodMoral(Request $request)
    {
        $id = $request->query('id');

        // Retrieve certificate data based on the provided id
        $certificate = brgyCertificate_tbl::find($id);
        // Retrieve certificate data along with resident and transaction data using joins
        $certificate = DB::table('brgy_certificate_tbls')
            ->join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
            ->leftJoin('transaction_tbls', 'brgy_certificate_tbls.id', '=', 'transaction_tbls.cert_id')
            ->where('brgy_certificate_tbls.id', $id)
            ->select('brgy_certificate_tbls.*', 'resident_tbls.*', 'transaction_tbls.*')
            ->first();

        if (!$certificate) {
            return redirect()->back()->withErrors(['message' => 'Certificate not found']);
        }

        // Check if the id exists in the transaction_tbls
        $transactionExists = transaction_tbl::where('cert_id', $id)->exists();

        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id', session('LoggedUser'))->first();

        $data = [
            'certificate' => $certificate,
            'LoggedUserInfo' => $loggedUserInfo,
            'transactionExists' => $transactionExists
        ];

        return view('/dashboards/secretariesDb/goodMoral')->with($data);
    }

    public function insertBusiTransaction(Request $request)
    {
        try {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'certNum' => 'required|string',
                'puOr' => 'required|string',
                'amountPaid' => 'required|numeric',
                'dates' => 'required|date'
            ], [
                'certNum.required' => 'Certificate Number is Required',
                'puOr.required' => 'O.R. Number is Required',
                'amountPaid.required' => 'Amount Paid is Required',
                'amountPaid.numeric' => 'Amount Paid Must Be a Number',
                'dates.required' => 'Date Field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }

            // Retrieve the certificate ID from the URL
            $busiId = $request->query('id');

            // Start a transaction
            DB::beginTransaction();

            try {
                // Create and save the transaction
                $transaction = new transaction_tbl;
                $transaction->cert_id = null;
                $transaction->bcl_id = null;
                $transaction->business_id = $busiId;
                $transaction->blotter_id = null;
                $transaction->tr_residenceCertNum = $request->input('certNum');
                $transaction->tr_orNum = $request->input('puOr');
                $transaction->tr_amountPaid = $request->input('amountPaid');
                $transaction->tr_date = $request->input('dates');

                if (!$transaction->save()) {
                    throw new \Exception('Failed to save transaction');
                }

                // Retrieve the certificate and update its status
                $certificate = businessBrgyClearance_tbl::find($busiId);
                if (!$certificate) {
                    throw new \Exception('Certificate not found');
                }

                $certificate->bc_status = 'processed';

                if (!$certificate->save()) {
                    throw new \Exception('Failed to update certificate status');
                }

                // Commit the transaction
                DB::commit();

                return response()->json(['status' => 1, 'msg' => 'Transaction Submitted Successfully!']);
            } catch (\Exception $e) {
                // Rollback the transaction in case of an error
                DB::rollBack();
                Log::error($e->getMessage());
                return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
        }
    }

    public function viewBusinessClearance(Request $request)
    {
        $id = $request->query('id');

        // Retrieve certificate data based on the provided id
        $certificate = businessBrgyClearance_tbl::find($id);
        // Retrieve certificate data along with resident and transaction data using joins
        $certificate = DB::table('business_brgy_clearance_tbls')
            ->join('resident_tbls', 'business_brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
            ->leftJoin('transaction_tbls', 'business_brgy_clearance_tbls.id', '=', 'transaction_tbls.business_id')
            ->where('business_brgy_clearance_tbls.id', $id)
            ->select('business_brgy_clearance_tbls.*', 'resident_tbls.*', 'transaction_tbls.*')
            ->first();

        if (!$certificate) {
            return redirect()->back()->withErrors(['message' => 'Certificate not found']);
        }

        // Check if the id exists in the transaction_tbls
        $transactionExists = transaction_tbl::where('business_id', $id)->exists();

        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id', session('LoggedUser'))->first();

        $data = [
            'certificate' => $certificate,
            'LoggedUserInfo' => $loggedUserInfo,
            'transactionExists' => $transactionExists
        ];

        return view('/dashboards/secretariesDb/businessClearance')->with($data);
    }


    public function updateBusinessTransaction(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'rephrasePurpose' => 'nullable|string',
            'certificateNum' => 'nullable|string',
            'orNum' => 'nullable|string',
            'amountPaids' => 'nullable|numeric',
            'updateDates' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
        }

        Log::info('Updating certificate with ID: ' . $id);

        // Find the certificate by ID
        $certificate = businessBrgyClearance_tbl::find($id);
        if (!$certificate) {
            return response()->json(['status' => 404, 'msg' => 'Certificate not found with ID: ' . $id]);
        }

        // Update certificate purpose if provided
        if ($request->filled('rephrasePurpose')) {
            $certificate->bc_businessName = $request->input('rephrasePurpose');
        }

        // Find the related transaction using cert_id
        $transaction = transaction_tbl::where('business_id', $id)->first();
        if (!$transaction) {
            return response()->json(['status' => 404, 'msg' => 'Transaction not found']);
        }

        // Update transaction details if provided
        if ($request->filled('certificateNum')) {
            $transaction->tr_residenceCertNum = $request->input('certificateNum');
        }

        if ($request->filled('orNum')) {
            $transaction->tr_orNum = $request->input('orNum');
        }

        if ($request->filled('amountPaids')) {
            $transaction->tr_amountPaid = $request->input('amountPaids');
        }

        if ($request->filled('updateDates')) {
            $transaction->tr_date = $request->input('updateDates');
        }

        // Save both models within a transaction to ensure atomicity
        DB::transaction(function () use ($certificate, $transaction) {
            $certificate->save();
            $transaction->save();
        });

        return response()->json(['status' => 200, 'msg' => 'Certificate and Transaction have been updated successfully']);
    }


    public function rejectBusiness(Request $request) {
        $certificate = businessBrgyClearance_tbl::find($request->id);
        if ($certificate) {
            $certificate->bc_status = $request->status;
            $certificate->bc_reason = $request->reason;
            $certificate->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function viewBrgyClearance(Request $request)
    {
        $id = $request->query('id');

        // Retrieve certificate data based on the provided id
        $certificate = BrgyClearance_tbl::find($id);
        // Retrieve certificate data along with resident and transaction data using joins
        $certificate = DB::table('brgy_clearance_tbls')
            ->join('resident_tbls', 'brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
            ->leftJoin('transaction_tbls', 'brgy_clearance_tbls.bcl_id', '=', 'transaction_tbls.bcl_id')
            ->where('brgy_clearance_tbls.bcl_id', $id)
            ->select(
                'brgy_clearance_tbls.bcl_id as clearance_bcl_id', 
                'brgy_clearance_tbls.bcl_purpose', 
                'brgy_clearance_tbls.bcl_transactionCode',
                'brgy_clearance_tbls.bcl_dateIssued', 
                'brgy_clearance_tbls.bcl_pickUpDate', 
                'brgy_clearance_tbls.bcl_status', 
                'brgy_clearance_tbls.bcl_reason',
                'resident_tbls.*', 
                'transaction_tbls.bcl_id as transaction_bcl_id', 
                'transaction_tbls.*'
            )
            ->first();

        if (!$certificate) {
            return redirect()->back()->withErrors(['message' => 'Certificate not found']);
        }

        // Check if the id exists in the transaction_tbls
        $transactionExists = transaction_tbl::where('bcl_id', $id)->exists();

        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id', session('LoggedUser'))->first();

        $data = [
            'certificate' => $certificate,
            'LoggedUserInfo' => $loggedUserInfo,
            'transactionExists' => $transactionExists
        ];

        return view('/dashboards/secretariesDb/brgyClearance')->with($data);
    }


    public function updateBrgyClearance(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'rephrasePurpose' => 'nullable|string',
            'certificateNum' => 'nullable|string',
            'orNum' => 'nullable|string',
            'amountPaids' => 'nullable|numeric',
            'updateDates' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
        }

        Log::info('Updating certificate with ID: ' . $id);

        // Find the certificate by ID
        $certificate = BrgyClearance_tbl::find($id);
        if (!$certificate) {
            return response()->json(['status' => 404, 'msg' => 'Certificate not found with ID: ' . $id]);
        }

        // Update certificate purpose if provided
        if ($request->filled('rephrasePurpose')) {
            $certificate->bcl_purpose = $request->input('rephrasePurpose');
        }

        // Find the related transaction using cert_id
        $transaction = transaction_tbl::where('bcl_id', $id)->first();
        if (!$transaction) {
            return response()->json(['status' => 404, 'msg' => 'Transaction not found']);
        }

        // Update transaction details if provided
        if ($request->filled('certificateNum')) {
            $transaction->tr_residenceCertNum = $request->input('certificateNum');
        }

        if ($request->filled('orNum')) {
            $transaction->tr_orNum = $request->input('orNum');
        }

        if ($request->filled('amountPaids')) {
            $transaction->tr_amountPaid = $request->input('amountPaids');
        }

        if ($request->filled('updateDates')) {
            $transaction->tr_date = $request->input('updateDates');
        }

        // Save both models within a transaction to ensure atomicity
        DB::transaction(function () use ($certificate, $transaction) {
            $certificate->save();
            $transaction->save();
        });

        return response()->json(['status' => 200, 'msg' => 'Certificate and Transaction have been updated successfully']);
    }

    public function insertBrgyClearanceransaction(Request $request)
    {
        try {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'certNum' => 'required|string',
                'puOr' => 'required|string',
                'amountPaid' => 'required|numeric',
                'dates' => 'required|date'
            ], [
                'certNum.required' => 'Certificate Number is Required',
                'puOr.required' => 'O.R. Number is Required',
                'amountPaid.required' => 'Amount Paid is Required',
                'amountPaid.numeric' => 'Amount Paid Must Be a Number',
                'dates.required' => 'Date Field is Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }

            // Retrieve the certificate ID from the URL
            $bclId = $request->query('id');

            // Start a transaction
            DB::beginTransaction();

            try {
                // Create and save the transaction
                $transaction = new transaction_tbl;
                $transaction->cert_id = null;
                $transaction->bcl_id = $bclId;
                $transaction->business_id = null;
                $transaction->blotter_id = null;
                $transaction->tr_residenceCertNum = $request->input('certNum');
                $transaction->tr_orNum = $request->input('puOr');
                $transaction->tr_amountPaid = $request->input('amountPaid');
                $transaction->tr_date = $request->input('dates');

                if (!$transaction->save()) {
                    throw new \Exception('Failed to save transaction');
                }

                // Retrieve the certificate and update its status
                $certificate = BrgyClearance_tbl::find($bclId);
                if (!$certificate) {
                    throw new \Exception('Certificate not found');
                }

                $certificate->bcl_status = 'processed';

                if (!$certificate->save()) {
                    throw new \Exception('Failed to update certificate status');
                }

                // Commit the transaction
                DB::commit();

                return response()->json(['status' => 1, 'msg' => 'Transaction Submitted Successfully!']);
            } catch (\Exception $e) {
                // Rollback the transaction in case of an error
                DB::rollBack();
                Log::error($e->getMessage());
                return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error($e->getMessage());
            // Return error response
            return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
        }
    }

    public function rejectClearance(Request $request) {
        $certificate = BrgyClearance_tbl::find($request->id);
        if ($certificate) {
            $certificate->bcl_status = $request->status;
            $certificate->bcl_reason = $request->reason;
            $certificate->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function updateBclStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:brgy_clearance_tbls,bcl_id',
            'status' => 'required|string'
        ]);

        // Find the certificate and update its status
        $certificate = BrgyClearance_tbl::find($request->id);
        $certificate->bcl_status = $request->status;
        $certificate->bcl_pickUpDate = now(); // Optionally update the pickup date
        $certificate->save();

        return response()->json(['success' => true]);
    }

    public function updateBcStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:business_brgy_clearance_tbls,id',
            'status' => 'required|string'
        ]);

        // Find the certificate and update its status
        $certificate = businessBrgyClearance_tbl::find($request->id);
        $certificate->bc_status = $request->status;
        $certificate->bc_pickUpDate = now(); // Optionally update the pickup date
        $certificate->save();

        return response()->json(['success' => true]);
    }

    //for complaint
    public function saveComplaints(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fName4' => 'required|string|exists:resident_tbls,res_fname',
                'mName4' => 'required|string|exists:resident_tbls,res_mname',
                'lName4' => 'required|string|exists:resident_tbls,res_lname',
                'suffix4' => 'nullable|string|exists:resident_tbls,res_suffix',
                'bDate4' => 'required|date|exists:resident_tbls,res_bdate',
                'tcode4' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        // Check if tcode2 already exists in any of the relevant tables
                        if (BrgyClearance_tbl::where('bcl_transactionCode', $value)->exists() ||
                            businessBrgyClearance_tbl::where('bc_transactionCode', $value)->exists() ||
                            brgyCertificate_tbl::where('cert_transactionCode', $value)->exists() ||
                            blotter_tbl::where('blotter_transactionCode', $value)->exists()) {
                            $fail('Transaction Code Already Exists');
                        }
                    }
                ],
                'respondents' => 'required|string',
                'complaint' => 'required|string',
                'resolution' => 'required|string',
                'dateIssued4' => 'required|date',
            ], [
                'fName4.exists' => 'First Name Not Found',
                'mName4.exists' => 'Middle Name Not Found',
                'lName4.exists' => 'Last Name Not Found',
                'suffix4.exists' => 'Suffix Not Found',
                'bDate4.exists' => 'BirthDate Not Same As Your Registered BirthDate',
                
                'bDate4.required' => 'Birthdate Field Required',
                'fName4.required' => 'First Name Field Required',
                'mName4.required' => 'Middle Name Field Required',
                'lName4.required' => 'Last Name Field Required',
                'respondents.required' => 'Respondents Field Required',
                'complaint.required' => 'Complaints Field Required',
                'resolution.required' => 'Resolution Field Required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }
            
            // Build the search criteria
            $searchCriteria = [
                'res_fname' => $request->input('fName4'),
                'res_mname' => $request->input('mName4'),
                'res_lname' => $request->input('lName4'),
                'res_bdate' => $request->input('bDate4'),
            ];

            // Add the suffix to the search criteria if it's provided
            if ($request->filled('suffix4')) {
                $searchCriteria['res_suffix'] = $request->input('suffix4');
            }

            // Retrieve the resident ID based on the provided name and suffix (if applicable)
            $resident = resident_tbl::where($searchCriteria)->first();

            if (!$resident) {
                // If resident not found, return error response
                return response()->json(['status' => 0, 'msg' => 'Resident not found'], 404);
            }

            // Get the resident ID
            $residentID = $resident->res_id;

            // Create and save the certificate
            $complaint = new blotter_tbl;
            $complaint->res_id = $residentID;
            $complaint->blotter_transactionCode = $request->input('tcode4');
            $complaint->blotter_respondents = $request->input('respondents');
            $complaint->blotter_complaint = $request->input('complaint');
            $complaint->blotter_resolution = $request->input('resolution');
            $complaint->blotter_complaintMade = $request->input('dateIssued4');
            $complaint->blotter_status = 'pending';

            if ($complaint->save()) {
                return response()->json(['status' => 1, 'msg' => 'Input Submitted Successfully!']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Error in saveComplaints: ' . $e->getMessage());
            // Return error response
            return response()->json(['status' => 0, 'msg' => 'Failed To Submit'], 500);
        }
    }

    public function dbBlotter()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'complaint' => blotter_tbl::join('resident_tbls', 'blotter_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'blotter_tbls.*',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_email',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/secretariesDb/dbBlotter', $data);
    }

    public function getResidentComplaint($id)
    {
        try {
            $resident = resident_tbl::find($id);
            // Fetch resident with related blotter complaints using a join
            $resident = DB::table('resident_tbls')
                ->leftJoin('blotter_tbls', 'resident_tbls.res_id', '=', 'blotter_tbls.res_id')
                ->where('resident_tbls.res_id', $id)
                ->select(
                    'resident_tbls.*', 
                    'blotter_tbls.*' // Add other blotter columns if needed
                )
                ->first();

            if (!$resident) {
                return response()->json(['message' => 'Resident not found'], 404);
            }

            return response()->json($resident);
        } catch (\Exception $e) {
            Log::error('Error fetching resident data: ' . $e->getMessage());
            return response()->json(['message' => 'Error fetching resident data'], 500);
        }
    }

    public function viewBrgyBlotter(Request $request)
    {
        $id = $request->query('id');

        // Retrieve certificate data based on the provided id
        $complaint = blotter_tbl::find($id);
        // Retrieve certificate data along with resident and transaction data using joins
        $complaint = DB::table('blotter_tbls')
            ->join('resident_tbls', 'blotter_tbls.res_id', '=', 'resident_tbls.res_id')
            ->leftJoin('transaction_tbls', 'blotter_tbls.blotter_id', '=', 'transaction_tbls.blotter_id')
            ->where('blotter_tbls.blotter_id', $id)
            ->select(
                'blotter_tbls.*',
                'blotter_tbls.blotter_id as blotter_com_id', 
                'resident_tbls.*', 
                'transaction_tbls.blotter_id as transaction_com_id', 
                'transaction_tbls.*'
            )
            ->first();

        if (!$complaint) {
            return redirect()->back()->withErrors(['message' => 'Certificate not found']);
        }

        // Check if the id exists in the transaction_tbls
        $transactionExists = transaction_tbl::where('blotter_id', $id)->exists();

        // Retrieve logged-in user info
        $loggedUserInfo = employee_tbl::where('em_id', session('LoggedUser'))->first();

        $data = [
            'complaint' => $complaint,
            'LoggedUserInfo' => $loggedUserInfo,
            'transactionExists' => $transactionExists
        ];

        return view('/dashboards/secretariesDb/brgyBlotter')->with($data);
    }

    public function updateBlotter(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'caseNum' => 'nullable|string',
            'caseFor' => 'nullable|string',
            'caseDates' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
        }

        Log::info('Updating blotter with ID: ' . $id);

        // Use DB transaction to ensure atomicity
        DB::beginTransaction();
        try {
            // Find the blotter by ID
            $complaint = blotter_tbl::find($id);
            if (!$complaint) {
                return response()->json(['status' => 404, 'msg' => 'Blotter not found with ID: ' . $id]);
            }

            // Update blotter fields if provided
            if ($request->filled('caseNum')) {
                $complaint->blotter_brgyCaseNum = $request->input('caseNum');
            }

            if ($request->filled('caseFor')) {
                $complaint->blotter_for = $request->input('caseFor');
            }

            if ($request->filled('caseDates')) {
                $complaint->blotter_filedDate = $request->input('caseDates');
            }

            // Update blotter status to 'processed'
            $complaint->blotter_status = 'processed';

            // Save the blotter
            $complaint->save();

            // Insert into transaction_tbl
            $transaction = new transaction_tbl;
            $transaction->blotter_id = $complaint->blotter_id;
            $transaction->tr_date = now();
            $transaction->save();

            // Commit the transaction
            DB::commit();

            return response()->json(['status' => 200, 'msg' => 'Blotter has been updated successfully']);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            Log::error('Error updating blotter: ' . $e->getMessage());
            return response()->json(['status' => 500, 'msg' => 'Failed to update blotter'], 500);
        }
    }


    public function updateBlotterStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer|exists:blotter_tbls,blotter_id',
            'status' => 'required|string'
        ]);

        // Find the certificate and update its status
        $certificate = blotter_tbl::find($request->id);
        $certificate->blotter_status = $request->status;
        $certificate->save();

        return response()->json(['success' => true]);
    }

    public function rejectBlotter(Request $request) {
        $certificate = blotter_tbl::find($request->id);
        if ($certificate) {
            $certificate->blotter_status = $request->status;
            $certificate->blotter_reason = $request->reason;
            $certificate->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }


    // display transactions!
    public function requestedDoc()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id', '=', session('LoggedUser'))->first(),
            'certificates' => brgyCertificate_tbl::join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'brgy_certificate_tbls.id',
                    'brgy_certificate_tbls.cert_transactionCode',
                    'brgy_certificate_tbls.cert_purpose',
                    'brgy_certificate_tbls.cert_dateIssued',
                    'brgy_certificate_tbls.cert_pickUpDate',
                    'brgy_certificate_tbls.certStatus',
                    'brgy_certificate_tbls.certReason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
            'transactions' => transaction_tbl::leftJoin('brgy_certificate_tbls', 'transaction_tbls.cert_id', '=', 'brgy_certificate_tbls.id')
                ->leftJoin('brgy_clearance_tbls', 'transaction_tbls.bcl_id', '=', 'brgy_clearance_tbls.bcl_id')
                ->leftJoin('business_brgy_clearance_tbls', 'transaction_tbls.business_id', '=', 'business_brgy_clearance_tbls.id')
                ->leftJoin('blotter_tbls', 'transaction_tbls.blotter_id', '=', 'blotter_tbls.blotter_id')
                ->leftJoin('resident_tbls', function($join) {
                    $join->on('brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                         ->orOn('brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                         ->orOn('business_brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                         ->orOn('blotter_tbls.res_id', '=', 'resident_tbls.res_id');
                })
                ->select(
                    'transaction_tbls.tr_id',
                    'transaction_tbls.cert_id',
                    'transaction_tbls.bcl_id',
                    'transaction_tbls.business_id',
                    'transaction_tbls.blotter_id',
                    'transaction_tbls.tr_residenceCertNum',
                    'transaction_tbls.tr_orNum',
                    'transaction_tbls.tr_amountPaid',
                    'transaction_tbls.tr_date',
                    'brgy_certificate_tbls.cert_transactionCode',
                    'brgy_certificate_tbls.cert_purpose',
                    'brgy_certificate_tbls.cert_dateIssued',
                    'brgy_certificate_tbls.cert_pickUpDate',
                    'brgy_certificate_tbls.certStatus',
                    'brgy_clearance_tbls.bcl_transactionCode',
                    'brgy_clearance_tbls.bcl_purpose',
                    'brgy_clearance_tbls.bcl_dateIssued',
                    'brgy_clearance_tbls.bcl_pickUpDate',
                    'brgy_clearance_tbls.bcl_status',
                    'business_brgy_clearance_tbls.bc_transactionCode',
                    'business_brgy_clearance_tbls.bc_businessName',
                    'business_brgy_clearance_tbls.bc_businessAddress',
                    'business_brgy_clearance_tbls.bc_businessType',
                    'business_brgy_clearance_tbls.bc_businessNature',
                    'business_brgy_clearance_tbls.bc_dateIssued',
                    'business_brgy_clearance_tbls.bc_pickUpDate',
                    'business_brgy_clearance_tbls.bc_status',
                    'blotter_tbls.blotter_transactionCode',
                    'blotter_tbls.blotter_respondents',
                    'blotter_tbls.blotter_brgyCaseNum',
                    'blotter_tbls.blotter_for',
                    'blotter_tbls.blotter_complaint',
                    'blotter_tbls.blotter_resolution',
                    'blotter_tbls.blotter_complaintMade',
                    'blotter_tbls.blotter_filedDate',
                    'blotter_tbls.blotter_status',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->get()
        ];
    
        // Pass the data array to the view
        return view('dashboards/secretariesDb/requestedDocs', $data);
    }    

    // for purok list
    public function fetchPurokResidents(Request $request)
    {
        $purok = $request->query('purok');
        $residents = resident_tbl::where('res_purok', $purok)->get();
        
        // Format the residents data as needed
        $formattedResidents = $residents->map(function ($resident) {
            $age = \Carbon\Carbon::parse($resident->res_bdate)->age;
    
            return [
                'fullName' => $resident->res_fname . ' ' . $resident->res_lname,
                'age' => $age,
                'birthDate' => $resident->res_bdate,
                'sex' => $resident->res_sex,
                'voterStatus' => $resident->res_voters,
                'purok' => $resident->res_purok
            ];
        });
    
        return response()->json($formattedResidents);
    }

//FOR CAPTAIN
public function dashboardCap(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

    // Fetch the required counts
    $totalPopulation = resident_tbl::count();
    $totalMale = resident_tbl::where('res_sex', 'Male')->count();
    $totalFemale = resident_tbl::where('res_sex', 'Female')->count();
    $totalVoters = resident_tbl::where('res_voters', 'Yes')->count();
    $totalNonVoters = resident_tbl::where('res_voters', 'No')->count();
    $totalBlotters = blotter_tbl::count();
    $totalCertificates = brgyCertificate_tbl::count();
    $totalBusinessPermits = businessBrgyClearance_tbl::count();
    $totalClearances = brgyClearance_tbl::count();

    // Determine the filter type
    $filter = $request->query('filter', 'today');

    // Initialize data arrays
    $todayBlotters = [];
    $todayCertificates = [];
    $todayClearances = [];
    $todayBusinessPermits = [];
    $monthlyBlotters = [];
    $monthlyCertificates = [];
    $monthlyClearances = [];
    $monthlyBusinessPermits = [];
    $yearlyData = [];

    // Get the current date and time in Manila time zone
    $manilaTime = new \DateTimeZone('Asia/Manila');
    $currentDate = new \DateTime('now', $manilaTime);
    $currentYear = $currentDate->format('Y');

    if ($filter === 'today') {
        for ($hour = 8; $hour <= 19; $hour++) {
            $startHour = $currentDate->format('Y-m-d') . ' ' . $hour . ':00:00';
            $endHour = $currentDate->format('Y-m-d') . ' ' . ($hour + 1) . ':00:00';

            $todayBlotters[] = blotter_tbl::whereBetween('created_at', [$startHour, $endHour])->count();
            $todayCertificates[] = brgyCertificate_tbl::whereBetween('created_at', [$startHour, $endHour])->count();
            $todayClearances[] = brgyClearance_tbl::whereBetween('created_at', [$startHour, $endHour])->count();
            $todayBusinessPermits[] = businessBrgyClearance_tbl::whereBetween('created_at', [$startHour, $endHour])->count();
        }
    } elseif ($filter === 'monthly') {
        for ($month = 1; $month <= 12; $month++) {
            $monthlyBlotters[] = blotter_tbl::whereYear('blotter_complaintMade', $currentYear)
                ->whereMonth('blotter_complaintMade', $month)->count();
            $monthlyCertificates[] = brgyCertificate_tbl::whereYear('cert_dateIssued', $currentYear)
                ->whereMonth('cert_dateIssued', $month)->count();
            $monthlyClearances[] = brgyClearance_tbl::whereYear('bcl_dateIssued', $currentYear)
                ->whereMonth('bcl_dateIssued', $month)->count();
            $monthlyBusinessPermits[] = businessBrgyClearance_tbl::whereYear('bc_dateIssued', $currentYear)
                ->whereMonth('bc_dateIssued', $month)->count();
        }
    } elseif ($filter === 'yearly') {
        // Fetch data for each year from current year back to 10 years ago
        for ($year = $currentYear - 10; $year <= $currentYear; $year++) {
            $yearlyData[] = [
                'year' => $year,
                'blotters' => blotter_tbl::whereYear('blotter_complaintMade', $year)->count(),
                'certificates' => brgyCertificate_tbl::whereYear('cert_dateIssued', $year)->count(),
                'clearances' => brgyClearance_tbl::whereYear('bcl_dateIssued', $year)->count(),
                'businessPermits' => businessBrgyClearance_tbl::whereYear('bc_dateIssued', $year)->count(),
            ];
        }
    }

    // Calculate age ranges
    $ageGroups = [
        '0-59_months' => ['min' => 0, 'max' => 4], // 0-4 years
        '5-12_years' => ['min' => 5, 'max' => 12], // 5-12 years
        '13-17_years' => ['min' => 13, 'max' => 17], // 13-17 years
        '18-30_years' => ['min' => 18, 'max' => 30], // 18-30 years
        '31-45_years' => ['min' => 31, 'max' => 45], // 31-45 years
        '45-65_years' => ['min' => 46, 'max' => 65], // 46-65 years
        '66_above' => ['min' => 66, 'max' => null] // 66 and above
    ];

    $ageGroupData = [];

    foreach ($ageGroups as $key => $ageRange) {
        $query = resident_tbl::whereNotNull('res_bdate');

        if ($ageRange['min'] !== null) {
            $query->whereRaw('TIMESTAMPDIFF(YEAR, res_bdate, CURDATE()) >= ?', [$ageRange['min']]);
        }
        if ($ageRange['max'] !== null) {
            $query->whereRaw('TIMESTAMPDIFF(YEAR, res_bdate, CURDATE()) <= ?', [$ageRange['max']]);
        }

        $total = $query->count();  // Total count

        // Create a fresh query builder instance for male count
        $maleQuery = clone $query;
        $male = $maleQuery->where('res_sex', 'male')->count();  // Count of males
        
        // Create another fresh query builder instance for female count
        $femaleQuery = clone $query;
        $female = $femaleQuery->where('res_sex', 'female')->count();  // Count of females
        
        
        $ageGroupData[$key] = [
            'total' => $total,
            'male' => $male,
            'female' => $female
        ];

        // Debug output for age group data
        echo "Total for $key: $total\n";
    }


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
        'totalPopulation' => $totalPopulation,
        'totalMale' => $totalMale,
        'totalFemale' => $totalFemale,
        'totalVoters' => $totalVoters,
        'totalNonVoters' => $totalNonVoters,
        'totalBlotters' => $totalBlotters,
        'totalCertificates' => $totalCertificates,
        'totalBusinessPermits' => $totalBusinessPermits,
        'totalClearances' => $totalClearances,
        'todayBlotters' => $todayBlotters,
        'todayCertificates' => $todayCertificates,
        'todayClearances' => $todayClearances,
        'todayBusinessPermits' => $todayBusinessPermits,
        'monthlyBlotters' => $monthlyBlotters,
        'monthlyCertificates' => $monthlyCertificates,
        'monthlyClearances' => $monthlyClearances,
        'monthlyBusinessPermits' => $monthlyBusinessPermits,
        'yearlyData' => $yearlyData,
        'ageGroupData' => $ageGroupData, // Include age group data
        'filter' => $filter
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/dbBrgyCap', $data);
}




    public function getYearlyGraphData($type)
    {
        $lastYear = Carbon::now()->subYear()->year;
        $currentYear = Carbon::now()->year;

        switch ($type) {
            case 'population':
                $lastYearData = resident_tbl::whereYear('created_at', $lastYear)->count();
                $currentYearData = resident_tbl::whereYear('created_at', $currentYear)->count();
                break;
            case 'male':
                $lastYearData = resident_tbl::whereYear('created_at', $lastYear)->where('res_sex', 'Male')->count();
                $currentYearData = resident_tbl::whereYear('created_at', $currentYear)->where('res_sex', 'Male')->count();
                break;
            case 'female':
                $lastYearData = resident_tbl::whereYear('created_at', $lastYear)->where('res_sex', 'Female')->count();
                $currentYearData = resident_tbl::whereYear('created_at', $currentYear)->where('res_sex', 'Female')->count();
                break;
            case 'voters':
                $lastYearData = resident_tbl::whereYear('created_at', $lastYear)->where('res_voters', 'Yes')->count();
                $currentYearData = resident_tbl::whereYear('created_at', $currentYear)->where('res_voters', 'Yes')->count();
                break;
            case 'nonvoters':
                $lastYearData = resident_tbl::whereYear('created_at', $lastYear)->where('res_voters', 'No')->count();
                $currentYearData = resident_tbl::whereYear('created_at', $currentYear)->where('res_voters', 'No')->count();
                break;
            default:
                $lastYearData = 0;
                $currentYearData = 0;
                break;
        }

        return response()->json([
            'lastYear' => [$lastYearData],
            'currentYear' => [$currentYearData]
        ]);
    }

    public function getMonthlyGraphData($type)
    {
        $currentYear = Carbon::now()->year;
        $monthlyData = [];

        switch ($type) {
            case 'blotter':
                for ($month = 1; $month <= 12; $month++) {
                    $monthlyData[] = blotter_tbl::whereMonth('blotter_complaintMade', $month)->whereYear('blotter_complaintMade', $currentYear)->count();
                }
                break;
            case 'certificate':
                for ($month = 1; $month <= 12; $month++) {
                    $monthlyData[] = brgyCertificate_tbl::whereMonth('cert_dateIssued', $month)->whereYear('cert_dateIssued', $currentYear)->count();
                }
                break;
            case 'business':
                for ($month = 1; $month <= 12; $month++) {
                    $monthlyData[] = businessBrgyClearance_tbl::whereMonth('bc_dateIssued', $month)->whereYear('bc_dateIssued', $currentYear)->count();
                }
                break;
            case 'clearance':
                for ($month = 1; $month <= 12; $month++) {
                    $monthlyData[] = BrgyClearance_tbl::whereMonth('bcl_dateIssued', $month)->whereYear('bcl_dateIssued', $currentYear)->count();
                }
                break;
            default:
                for ($month = 1; $month <= 12; $month++) {
                    $monthlyData[] = 0; // Default to zero if no valid type is specified
                }
                break;
        }

        return response()->json([
            'labels' => $this->getMonthlyLabels(),
            'currentYear' => $monthlyData
        ]);
    }

    // Function to get monthly labels (e.g., Jan, Feb, Mar, ...)
    private function getMonthlyLabels()
    {
        return [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
    }

    public function residentsRecCap()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'residents' => resident_tbl::all(),
        ];
        
        // Pass the data array to the view
        return view('dashboards/captainDb/residentRecCap', $data);
    }
    
    public function dashboardCapCert()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'certificates' => brgyCertificate_tbl::join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'brgy_certificate_tbls.id',
                    'brgy_certificate_tbls.cert_transactionCode',
                    'brgy_certificate_tbls.cert_purpose',
                    'brgy_certificate_tbls.cert_dateIssued',
                    'brgy_certificate_tbls.cert_pickUpDate',
                    'brgy_certificate_tbls.certStatus',
                    'brgy_certificate_tbls.certReason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/captainDb/dashboardCapCert', $data);
    }

    public function dashboardCapClearance()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'clearance' => BrgyClearance_tbl::join('resident_tbls', 'brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'brgy_clearance_tbls.bcl_id',
                    'brgy_clearance_tbls.bcl_transactionCode',
                    'brgy_clearance_tbls.bcl_purpose',
                    'brgy_clearance_tbls.bcl_dateIssued',
                    'brgy_clearance_tbls.bcl_pickUpDate',
                    'brgy_clearance_tbls.bcl_status',
                    'brgy_clearance_tbls.bcl_reason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/captainDb/dashboardCapClearance', $data);
    }

    public function dashboardCapBusiness()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'permits' => businessBrgyClearance_tbl::join('resident_tbls', 'business_brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'business_brgy_clearance_tbls.id',
                    'business_brgy_clearance_tbls.bc_transactionCode',
                    'business_brgy_clearance_tbls.bc_businessName',
                    'business_brgy_clearance_tbls.bc_businessAddress',
                    'business_brgy_clearance_tbls.bc_businessType',
                    'business_brgy_clearance_tbls.bc_businessNature',
                    'business_brgy_clearance_tbls.bc_dateIssued',
                    'business_brgy_clearance_tbls.bc_pickUpDate',
                    'business_brgy_clearance_tbls.bc_status',
                    'business_brgy_clearance_tbls.bc_reason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/captainDb/dashboardCapBusiness', $data);
    }

    public function getResidentBusiness($id)
    {
        try {
            $business = DB::table('business_brgy_clearance_tbls')
                ->leftJoin('resident_tbls', 'business_brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                ->where('business_brgy_clearance_tbls.id', $id)
                ->select('resident_tbls.*', 'business_brgy_clearance_tbls.*')
                ->first();

            if (!$business) {
                return response()->json(['message' => 'Business permit not found'], 404);
            }

            return response()->json($business);
        } catch (\Exception $e) {
            Log::error('Error fetching business data: ' . $e->getMessage());
            return response()->json(['message' => 'Error fetching business data'], 500);
        }
    }
    
    public function getResidentBlotter($id)
    {
        try {
            $blotter = DB::table('blotter_tbls')
                ->leftJoin('resident_tbls', 'blotter_tbls.res_id', '=', 'resident_tbls.res_id')
                ->where('blotter_tbls.blotter_id', $id)
                ->select('resident_tbls.*', 'blotter_tbls.*')
                ->first();

            if (!$blotter) {
                return response()->json(['message' => 'Blotter not found'], 404);
            }

            return response()->json($blotter);
        } catch (\Exception $e) {
            Log::error('Error fetching blotter data: ' . $e->getMessage());
            return response()->json(['message' => 'Error fetching blotter data'], 500);
        }
    }

    public function getResidentClearance($id)
    {
        try {
            $clearance = DB::table('brgy_clearance_tbls')
                ->leftJoin('resident_tbls', 'brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                ->where('brgy_clearance_tbls.bcl_id', $id)
                ->select('resident_tbls.*', 'brgy_clearance_tbls.*')
                ->first();

            if (!$clearance) {
                return response()->json(['message' => 'Clearance not found'], 404);
            }

            return response()->json($clearance);
        } catch (\Exception $e) {
            Log::error('Error fetching clearance data: ' . $e->getMessage());
            return response()->json(['message' => 'Error fetching clearance data'], 500);
        }
    }

    public function getResidentCertificate($id)
    {
        try {
            $certificate = DB::table('brgy_certificate_tbls')
                ->leftJoin('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                ->where('brgy_certificate_tbls.id', $id)
                ->select('resident_tbls.*', 'brgy_certificate_tbls.*')
                ->first();
    
            if (!$certificate) {
                return response()->json(['message' => 'Certificate not found'], 404);
            }
    
            return response()->json($certificate);
        } catch (\Exception $e) {
            Log::error('Error fetching certificate data: ' . $e->getMessage());
            return response()->json(['message' => 'Error fetching certificate data'], 500);
        }
    }
    

    public function dashboardCapBlotter()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first(),
            'complaint' => blotter_tbl::join('resident_tbls', 'blotter_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'blotter_tbls.*',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards/captainDb/dashboardCapBlotter', $data);
    }
    
    function dashboardCapPur()
    {
        $data = ['LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first()];
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0'); 
        return view('dashboards/captainDb/dashboardCapPur', $data);
    }

    public function dashboardCapRevenue()
    {
        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id', session('LoggedUser'))->first(),
            'revenue' => revenue_tbl::all(),
        ];

        // Pass the data array to the view
        return view('dashboards.captainDb.dashboardCapRevenue', $data);
    }

    public function employeeProfile()
    {
        $data = ['LoggedUserInfo' => employee_tbl::where('em_id','=', session('LoggedUser'))->first()];
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0'); 
        return view('dashboards/employeeProfile', $data);
    }

    //FOR TREASURER
    public function dbTreasurer()
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

        // Fetch the required counts
        $totalPopulation = resident_tbl::count();
        $totalMale = resident_tbl::where('res_sex', 'Male')->count();
        $totalFemale = resident_tbl::where('res_sex', 'Female')->count();
        $totalVoters = resident_tbl::where('res_voters', 'Yes')->count();
        $totalNonVoters = resident_tbl::where('res_voters', 'No')->count();
        $totalBlotters = blotter_tbl::count();
        $totalCertificates = brgyCertificate_tbl::count();
        $totalBusinessPermits = businessBrgyClearance_tbl::count();
        $totalClearances = BrgyClearance_tbl::count();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'totalPopulation' => $totalPopulation,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale,
            'totalVoters' => $totalVoters,
            'totalNonVoters' => $totalNonVoters,
            'totalBlotters' => $totalBlotters,
            'totalCertificates' => $totalCertificates,
            'totalBusinessPermits' => $totalBusinessPermits,
            'totalClearances' => $totalClearances,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/dbTreasurer', $data);
    }

    public function transactionTreasurer()
    {
        $currentDate = \Carbon\Carbon::now('Asia/Manila')->toDateString(); // Get current date in 'YYYY-MM-DD' format

        $data = [
            'LoggedUserInfo' => employee_tbl::where('em_id', '=', session('LoggedUser'))->first(),
            'certificates' => brgyCertificate_tbl::join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                ->select(
                    'brgy_certificate_tbls.id',
                    'brgy_certificate_tbls.cert_transactionCode',
                    'brgy_certificate_tbls.cert_purpose',
                    'brgy_certificate_tbls.cert_dateIssued',
                    'brgy_certificate_tbls.cert_pickUpDate',
                    'brgy_certificate_tbls.certStatus',
                    'brgy_certificate_tbls.certReason',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->get(),
            'residents' => resident_tbl::all(),
            'transactions' => transaction_tbl::leftJoin('brgy_certificate_tbls', 'transaction_tbls.cert_id', '=', 'brgy_certificate_tbls.id')
                ->leftJoin('brgy_clearance_tbls', 'transaction_tbls.bcl_id', '=', 'brgy_clearance_tbls.bcl_id')
                ->leftJoin('business_brgy_clearance_tbls', 'transaction_tbls.business_id', '=', 'business_brgy_clearance_tbls.id')
                ->leftJoin('resident_tbls', function($join) {
                    $join->on('brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                        ->orOn('brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                        ->orOn('business_brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id');
                })
                ->select(
                    'transaction_tbls.tr_id',
                    'transaction_tbls.cert_id',
                    'transaction_tbls.bcl_id',
                    'transaction_tbls.business_id',
                    'transaction_tbls.blotter_id',
                    'transaction_tbls.tr_residenceCertNum',
                    'transaction_tbls.tr_orNum',
                    'transaction_tbls.tr_amountPaid',
                    'transaction_tbls.tr_date',
                    'brgy_certificate_tbls.cert_transactionCode',
                    'brgy_certificate_tbls.cert_purpose',
                    'brgy_certificate_tbls.cert_dateIssued',
                    'brgy_certificate_tbls.cert_pickUpDate',
                    'brgy_certificate_tbls.certStatus',
                    'brgy_clearance_tbls.bcl_transactionCode',
                    'brgy_clearance_tbls.bcl_purpose',
                    'brgy_clearance_tbls.bcl_dateIssued',
                    'brgy_clearance_tbls.bcl_pickUpDate',
                    'brgy_clearance_tbls.bcl_status',
                    'business_brgy_clearance_tbls.bc_transactionCode',
                    'business_brgy_clearance_tbls.bc_businessName',
                    'business_brgy_clearance_tbls.bc_businessAddress',
                    'business_brgy_clearance_tbls.bc_businessType',
                    'business_brgy_clearance_tbls.bc_businessNature',
                    'business_brgy_clearance_tbls.bc_dateIssued',
                    'business_brgy_clearance_tbls.bc_pickUpDate',
                    'business_brgy_clearance_tbls.bc_status',
                    'resident_tbls.res_id',
                    'resident_tbls.res_fname',
                    'resident_tbls.res_mname',
                    'resident_tbls.res_lname',
                    'resident_tbls.res_suffix',
                    'resident_tbls.res_bdate',
                    'resident_tbls.res_purok'
                )
                ->whereDate('transaction_tbls.tr_date', $currentDate) // Filter transactions by current date
                ->where(function($query) {
                    $query->where('brgy_certificate_tbls.certStatus', 'ready to pick up')
                        ->orWhere('brgy_clearance_tbls.bcl_status', 'ready to pick up')
                        ->orWhere('business_brgy_clearance_tbls.bc_status', 'ready to pick up');
                })
                ->get()
        ];

        // Pass the data array to the view
        return view('dashboards/treasurerDb/transactionTreasurer', $data);
    }

    public function submitTotalRevenue(Request $request)
    {
        $request->validate([
            'revenue' => 'required|numeric',
            'receive' => 'required|numeric',
        ]);
    
        $totalRevenue = $request->input('revenue');
        $totalAmountReceive = $request->input('receive');
    
        $revenue = new revenue_tbl;
        $revenue->rev_type = 'front service/Certifications';
        $revenue->rev_amount = $totalRevenue;
        $revenue->rev_amountReceive = $totalAmountReceive;
        $revenue->rev_verification = ($totalRevenue == $totalAmountReceive) ? 'Yes' : 'No';
        $revenue->rev_date = now();
        $revenue->save();

        return redirect()->back()->with('success', 'Inputted Successfully');
    }


    // for employee
    public function editEmployee($id)
    {
        $employee = employee_tbl::where('em_id', $id)->first();

        if ($employee) {
            return response()->json([
                'status' => 200,
                'LoggedUserInfo' => $employee,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Employee Not Found',
            ]);
        }
    }


    public function updateEmployee(Request $request, $id)
    {
        // Find the employee by ID
        $employee = employee_tbl::find($id);
    
        if (!$employee) {
            return response()->json(['status' => 404, 'msg' => 'Employee Not Found']);
        }
    
        // Validate the request
        $validator = Validator::make($request->all(), [
            'picture' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fname' => 'sometimes|nullable|string|max:255',
            'lname' => 'sometimes|nullable|string|max:255',
            'password' => 'sometimes|nullable|string|min:8', // Allow empty password
            'email' => 'sometimes|nullable|email|max:255',
            'address' => 'sometimes|nullable|string|max:255',
            'contact' => 'sometimes|nullable|numeric|digits:11',
            'position' => 'sometimes|nullable|string|max:255'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
        }
    
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profilePictures', $filename); // Store file in storage/profilePictures
            $employee->em_picture = 'profilePictures/' . $filename; // Save the full file path in the database
        }
    
        if ($request->filled('fname')) {
            $employee->em_fname = $request->input('fname');
        }
        if ($request->filled('lname')) {
            $employee->em_lname = $request->input('lname');
        }
        if ($request->filled('email')) {
            $employee->em_email = $request->input('email');
        }
        if ($request->filled('password')) {
            $employee->em_password = bcrypt($request->input('password')); // Encrypt the password
        }
        if ($request->filled('address')) {
            $employee->em_address = $request->input('address');
        }
        if ($request->filled('contact')) {
            $employee->em_contact = $request->input('contact');
        }
        if ($request->filled('position')) {
            $employee->em_position = $request->input('position');
        }
    
        $employee->save();
    
        return response()->json(['status' => 200, 'employee' => $employee, 'msg' => 'Employee has been updated successfully']);
    }
    
    public function changePassword(Request $request, $id)
    {
        // Find the employee by ID
        $employee = employee_tbl::find($id);

        if (!$employee) {
            return response()->json(['status' => 404, 'msg' => 'Employee Not Found']);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:8',
            'renewPassword' => 'required|string|same:newPassword',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
        }

        // Check if the current password matches
        if (!Hash::check($request->input('currentPassword'), $employee->em_password)) {
            return response()->json(['status' => 400, 'msg' => 'password is incorrect']);
        }

        // Update the password
        $employee->em_password = bcrypt($request->input('newPassword'));
        $employee->save();

        return response()->json(['status' => 200, 'msg' => 'Password has been changed successfully']);
    }

public function traceTransaction(Request $request) 
{
    $transactionCode = $request->input('transactionCode');
    $result = null;
    $type = null;

    if ($result = blotter_tbl::join('resident_tbls', 'blotter_tbls.res_id', '=', 'resident_tbls.res_id')
                            ->where('blotter_transactionCode', $transactionCode)
                            ->select('blotter_tbls.*', 'resident_tbls.*')
                            ->first()) {
        $type = 'blotter';
    } elseif ($result = brgyCertificate_tbl::join('resident_tbls', 'brgy_certificate_tbls.res_id', '=', 'resident_tbls.res_id')
                                            ->where('cert_transactionCode', $transactionCode)
                                            ->select('brgy_certificate_tbls.*', 'resident_tbls.*')
                                            ->first()) {
        $type = 'certificate';
    } elseif ($result = BrgyClearance_tbl::join('resident_tbls', 'brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                                          ->where('bcl_transactionCode', $transactionCode)
                                          ->select('brgy_clearance_tbls.*', 'resident_tbls.*')
                                          ->first()) {
        $type = 'clearance';
    } elseif ($result = businessBrgyClearance_tbl::join('resident_tbls', 'business_brgy_clearance_tbls.res_id', '=', 'resident_tbls.res_id')
                                                  ->where('bc_transactionCode', $transactionCode)
                                                  ->select('business_brgy_clearance_tbls.*', 'resident_tbls.*')
                                                  ->first()) {
        $type = 'business';
    }

    return response()->json(['result' => $result, 'type' => $type]);
}


    

public function cancelBlotter(Request $request)
{
    $id = $request->input('id');
    $blotter = blotter_tbl::find($id);

    if ($blotter) {
        $blotter->blotter_status = 'cancelled';
        $blotter->save();
        return response()->json(['message' => 'Blotter cancelled successfully']);
    }

    return response()->json(['error' => 'Blotter not found'], 404);
}

public function cancelClearance(Request $request)
{
    $id = $request->input('id');
    $clearance = BrgyClearance_tbl::find($id);

    if ($clearance) {
        $clearance->bcl_status = 'cancelled';
        $clearance->save();
        return response()->json(['message' => 'Clearance cancelled successfully']);
    }

    return response()->json(['error' => 'Clearance not found'], 404);
}

public function cancelBusiness(Request $request)
{
    $id = $request->input('id');
    $business = businessBrgyClearance_tbl::find($id);

    if ($business) {
        $business->bc_status = 'cancelled';
        $business->save();
        return response()->json(['message' => 'Business permit cancelled successfully']);
    }

    return response()->json(['error' => 'Business permit not found'], 404);
}

public function cancelCertificate(Request $request)
{
    $id = $request->input('id');
    $certificate = brgyCertificate_tbl::find($id);

    if ($certificate) {
        $certificate->certStatus = 'cancelled';
        $certificate->save();
        return response()->json(['message' => 'Certificate cancelled successfully']);
    }

    return response()->json(['error' => 'Certificate not found'], 404);
}


public function dbAdmin()
{
    // Fetch logged-in employee information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Alternatively, you may want to fetch all employees without any additional joins
    $allEmployees = employee_tbl::all();

    // Prepare data to be passed to the view
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
        'allEmployees' => $allEmployees, // Assuming you need all employees separately
    ];

    // Pass the data array to the view 'dashboards/systemAdmin'
    return view('dashboards.systemAdmin', $data);
}


public function update(Request $request, $id)
{
    // Find the employee by ID
    $employee = Employee_tbl::find($id);

    if (!$employee) {
        return response()->json(['status' => 404, 'msg' => 'Employee Not Found']);
    }

    // Validate the request
    $validator = Validator::make($request->all(), [
        'picture' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'fname' => 'sometimes|nullable|string|max:255',
        'lname' => 'sometimes|nullable|string|max:255',
        'password' => 'sometimes|nullable|string|min:8',
        'email' => 'sometimes|nullable|email|max:255',
        'address' => 'sometimes|nullable|string|max:255',
        'contact' => 'sometimes|nullable|numeric|digits:11',
        'position' => 'sometimes|nullable|string|max:255'
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 400, 'error' => $validator->errors()->toArray()]);
    }

    if ($request->hasFile('picture')) {
        $file = $request->file('picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/profilePictures', $filename);
        $employee->em_picture = 'profilePictures/' . $filename;
    }

    $employee->em_fname = $request->filled('fname') ? $request->input('fname') : $employee->em_fname;
    $employee->em_lname = $request->filled('lname') ? $request->input('lname') : $employee->em_lname;
    $employee->em_email = $request->filled('email') ? $request->input('email') : $employee->em_email;
    if ($request->filled('password')) {
        $employee->em_password = bcrypt($request->input('password'));
    }
    $employee->em_address = $request->filled('address') ? $request->input('address') : $employee->em_address;
    $employee->em_contact = $request->filled('contact') ? $request->input('contact') : $employee->em_contact;
    $employee->em_position = $request->filled('position') ? $request->input('position') : $employee->em_position;

    $employee->save();

    return response()->json(['status' => 200, 'employee' => $employee, 'msg' => 'Employee has been updated successfully']);
}

public function archiveEmployee(Request $request)
{
    $employee = employee_tbl::find($request->input('em_id'));
    
    if (!$employee) {
        return redirect()->back()->with('error', 'Employee not found.');
    }
    
    $employee->em_status = 'archived'; // Or any value representing archived status
    $employee->save();
    
    return redirect()->back()->with('success', 'Employee archived successfully.');
}

public function activateEmployee(Request $request)
{
    $employee = employee_tbl::find($request->input('em_id'));
    
    if (!$employee) {
        return redirect()->back()->with('error', 'Employee not found.');
    }
    
    $employee->em_status = 'active'; // Or any value representing active status
    $employee->save();
    
    return redirect()->back()->with('success', 'Employee activated successfully.');
}


public function getSchedule()
{
    try {
        // Get the current month and year in Asia/Manila timezone
        $now = Carbon::now('Asia/Manila');
        $currentMonth = $now->month;
        $currentYear = $now->year;

        $schedules = DB::table('schedule_tbls')
            ->where('sched_type', 'public')
            ->whereMonth('sched_date', $currentMonth)
            ->whereYear('sched_date', $currentYear)
            ->orderBy('sched_date')
            ->get();

        if ($schedules->isEmpty()) {
            return response()->json(['message' => 'No public schedules found for the current month'], 404);
        }

        return response()->json($schedules);
    } catch (\Exception $e) {
        Log::error('Error fetching public schedules data: ' . $e->getMessage());
        return response()->json(['message' => 'Error fetching public schedules data'], 500);
    }
}

public function getPrivateSchedule()
{
    try {
        // Get the current date in Asia/Manila timezone
        $now = Carbon::now('Asia/Manila');
        $currentDate = $now->toDateString(); // Get the current date in 'Y-m-d' format

        $schedules = DB::table('schedule_tbls')
            ->where('sched_type', 'private')
            ->whereDate('sched_date', $currentDate)
            ->orderBy('sched_date')
            ->get();

        if ($schedules->isEmpty()) {
            return response()->json(['message' => 'No private schedules found for today'], 404);
        }

        return response()->json($schedules); // Return the schedules as JSON
    } catch (\Exception $e) {
        Log::error('Error fetching private schedules data: ' . $e->getMessage());
        return response()->json(['message' => 'Error fetching private schedules data'], 500);
    }
}


public function getOfficialData()
{
    try {
        // Query to fetch officials data joined with residents data
        $officials = DB::table('brgy_officials_tbls')
            ->join('resident_tbls', 'brgy_officials_tbls.res_id', '=', 'resident_tbls.res_id')
            ->select('brgy_officials_tbls.*', 'resident_tbls.*')
            ->get();

        // Check if any data was found
        if ($officials->isEmpty()) {
            // If no data found, return 404 with a message
            return response()->json(['message' => 'No officials found'], 404);
        }

        // If data found, return it as JSON response
        return response()->json($officials);
    } catch (\Exception $e) {
        // Catch any exceptions that occur (database errors, etc.)
        return response()->json(['error' => 'Internal Server Error: ' . $e->getMessage()], 500);
    }
}

public function getPurokCounts()
{
    $purokCounts = resident_tbl::select('res_purok', \DB::raw('count(*) as total'))
                    ->groupBy('res_purok')
                    ->get()
                    ->pluck('total', 'res_purok');

    return response()->json($purokCounts);
}


//FOR HEALTH WORKERS
public function dashboardHW(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/dbHealthWorker', $data);
}

public function dailyServiceRecord(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/dailyServiceRecord', $data);
}

public function indiClientReport(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/individualClientReport', $data);
}

// FOR Medicine 
public function medicineRecord(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
    $medicine = medicine_tbl::all();

    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
        'medicine' => $medicine,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/medicine', $data);
}

public function inputMedicine(Request $request)
{
    $validator = Validator::make($request->all(), [
        'inputEmp' => 'required|string',
        'inputNdc' => 'required|string',
        'inputProd' => 'required|string',
        'inputDesc' => 'required|string',
        'inputBox' => 'required|numeric',
        'inputCount' => 'required|numeric',
        'inputTotalCount' => 'required|numeric',
        'inputDatePurchase' => 'required|date',
        'inputDateExpired' => 'required|date',
        'inputRemarks' => 'required|string',
    ], [
        'inputNdc.required' => 'The NDC field is mandatory.',
        'inputNdc.string' => 'The NDC must be a string.',
        'inputProd.required' => 'The product name is required.',
        'inputProd.string' => 'The product name must be a string.',
        'inputDesc.required' => 'The description is required.',
        'inputDesc.string' => 'The description must be a string.',
        'inputBox.required' => 'The box count is required.',
        'inputBox.numeric' => 'The box count must be a number.',
        'inputCount.required' => 'The count is required.',
        'inputCount.numeric' => 'The count must be a number.',
        'inputTotalCount.required' => 'The total count is required.',
        'inputTotalCount.numeric' => 'The total count must be a number.',
        'inputDatePurchase.required' => 'The purchase date is required.',
        'inputDatePurchase.date' => 'The purchase date must be a valid date.',
        'inputDateExpired.required' => 'The expiration date is required.',
        'inputDateExpired.date' => 'The expiration date must be a valid date.',
        'inputRemarks.required' => 'Remarks are required.',
        'inputRemarks.string' => 'Remarks must be a string.',
    ]);

    if ($validator->fails()) 
    {
        return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } 
    else 
    {
        $medicine = new medicine_tbl;
        $medicine->em_id = $request->inputEmp;
        $medicine->med_ndc = $request->inputNdc;
        $medicine->med_prod = $request->inputProd;
        $medicine->med_desc = $request->inputDesc;
        $medicine->med_qtBox = $request->inputBox;
        $medicine->med_count = $request->inputTotalCount;
        $medicine->med_datePurchases = $request->inputDatePurchase;
        $medicine->med_dateExpiration = $request->inputDateExpired;
        $medicine->med_remarks = $request->inputRemarks;
        $medicine->med_status = 'Available';
   
        if ($medicine->save()) 
        {
            return response()->json(['status' => 1, 'msg' => 'New Medicine Has Been Added']);
        } 
        else 
        {
            return response()->json(['status' => 0, 'msg' => 'Failed to add new Medicine'], 500);
        }
    }
}

public function updateMedicine(Request $request)
{
    $medicine = medicine_tbl::find($request->med_id);

    if ($medicine) {
        $medicine->med_ndc = $request->med_ndc;
        $medicine->med_prod = $request->med_prod;
        $medicine->med_desc = $request->med_desc;
        $medicine->med_qtBox = $request->med_qtBox;
        $medicine->med_count = $request->med_count;
        $medicine->med_datePurchases = $request->med_datePurchases;
        $medicine->med_dateExpiration = $request->med_dateExpiration;
        $medicine->med_remarks = $request->med_remarks;
        $medicine->med_status = $request->med_status;

        if ($medicine->save()) {
            return response()->json(['status' => 1, 'msg' => 'Medicine updated successfully.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Failed to update medicine.']);
        }
    }

    return response()->json(['status' => 0, 'msg' => 'Medicine not found.']);
}

public function updateMedStatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer|exists:medicine_tbls,med_id', // Changed to 'id'
        'status' => 'required|string' // Changed to 'status'
    ]);

    $medicine = medicine_tbl::find($request->id); // Changed to 'id'
    $medicine->med_status = $request->status; // Ensure this is correctly set
    $medicine->save();

    return response()->json(['success' => true]);
}


// FOR OPT
public function optDeworming(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
    $resident = resident_tbl::all();
    $opt = opt_tbl::with('resident')->get();

    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
        'residents' => $resident,
        'opts' => $opt,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/optDeworming', $data);
}

public function inputFirstOpt(Request $request)
{
    $validator = Validator::make($request->all(), [
        'motherName' => 'required|exists:resident_tbls,res_id', // Check if the res_id exists
        'inputChildName' => 'required|string',
        'inputDate' => 'required|date',
        'inputSex' => 'required|string',
        'ageMonthFirst' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
        'weightFirst' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
        'heightFirst' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
        'muacFirst' => 'required|date',
        'nsFirst' => 'required|date',
        'vitaminFirst' => 'required|date',
        'dewormingFirst' => 'required|date',
        'rem' => 'required|string',
    ], [
        'motherName.required' => 'The Mother Name field is required.',
        'motherName.exists' => 'The selected Mother does not exist in the system.',
        'inputChildName.required' => 'The Child Name is required.',
        'inputChildName.string' => 'The Child Name must be letters.',
        'inputDate.required' => 'The Date of Birth is required.',
        'inputDate.date' => 'The Date of Birth must be a valid date.',
        'inputSex.required' => 'The Sex field is required.',
        'inputSex.string' => 'The Sex field must be letters.',
        'ageMonthFirst.required' => 'The Age field is required.',
        'ageMonthFirst.numeric' => 'The Age field must be a number or decimal.',
        'weightFirst.required' => 'The Weight field is required.',
        'weightFirst.numeric' => 'The Weight field must be a number or decimal.',
        'heightFirst.required' => 'The Height field is required.',
        'heightFirst.numeric' => 'The Height field must be a number or decimal.',
        'muacFirst.required' => 'The MUAC field is required.',
        'muacFirst.date' => 'The MUAC field must be a valid date.',
        'nsFirst.required' => 'The NS field is required.',
        'nsFirst.date' => 'The NS field must be a valid date.',
        'vitaminFirst.required' => 'The Vitamin field is required.',
        'vitaminFirst.date' => 'The Vitamin field must be a valid date.',
        'dewormingFirst.required' => 'The Deworming field is required.',
        'dewormingFirst.date' => 'The Deworming field must be a valid date.',
        'rem.required' => 'Remarks are required.',
        'rem.string' => 'Remarks must be letters.',
    ]);    

    if ($validator->fails()) {
        return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {
        $opt = new opt_tbl;
        $opt->res_id = $request->motherName; // Store the res_id directly
        $opt->opt_childName = $request->inputChildName;
        $opt->opt_dob = $request->inputDate;
        $opt->opt_sex = $request->inputSex;
        $opt->opt_ageFirst = $request->ageMonthFirst;
        $opt->opt_wtFirst = $request->weightFirst;
        $opt->opt_htFirst = $request->heightFirst;
        $opt->opt_muacFirst = $request->muacFirst;
        $opt->opt_nsFirst = $request->nsFirst;
        $opt->opt_vitFirst = $request->vitaminFirst;
        $opt->opt_dewormtFirst = $request->dewormingFirst;
        $opt->opt_remarks = $request->rem;
        $opt->opt_status = 'Partially Completed';
        $opt->em_id = $request->inputEmpId;

        if ($opt->save()) {
            return response()->json(['status' => 1, 'msg' => 'New Vaccination Recipient Has Been Added']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Failed to add new Vaccination Recipient'], 500);
        }
    }
}

public function updateSecOpt(Request $request)
{
    $opt = opt_tbl::find($request->opt_id);

    if ($opt) {
        $opt->opt_ageSec = $request->ageMonthSec;
        $opt->opt_wtSec = $request->weightSec;
        $opt->opt_htSec = $request->heightSec;
        $opt->opt_muacSec = $request->muacSec;
        $opt->opt_nsSec = $request->nsSec;
        $opt->opt_vitSec = $request->vitaminSec;
        $opt->opt_dewormSec = $request->dewormingSec;
        $opt->opt_remarks = $request->remarkSec;
        $opt->opt_status = 'Completed';

        if ($opt->save()) {
            return response()->json(['status' => 1, 'msg' => 'OPT updated successfully.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Failed to update OPT.']);
        }
    }

    return response()->json(['status' => 0, 'msg' => 'OPT not found.']);
}

public function updateOptForm(Request $request)
{
    $opt = opt_tbl::find($request->opt_id);

    if ($opt) {
        $opt->opt_id = $request->edit_inputOptId; // Assuming opt_id is being edited
        // Check if edit_motherName is not empty or null
        if (!empty($request->edit_motherName)) {
            $opt->res_id = $request->edit_motherName; // Mother's name as resident id
        }

        $opt->opt_childName = $request->edit_inputChildName; // Child's Name
        $opt->opt_dob = $request->edit_inputDate; // Child's Date of Birth
        $opt->opt_sex = $request->edit_inputSex; // Child's Sex

        $opt->opt_ageFirst = $request->edit_ageMonthFirst; // Age in months (1st)
        $opt->opt_ageSec = $request->edit_ageMonthSec; // Age in months (2nd)

        $opt->opt_wtFirst = $request->edit_weightFirst; // Weight (1st)
        $opt->opt_wtSec = $request->edit_weightSec; // Weight (2nd)

        $opt->opt_htFirst = $request->edit_heightFirst; // Height (1st)
        $opt->opt_htSec = $request->edit_heightSec; // Height (2nd)

        $opt->opt_muacFirst = $request->edit_muacFirst; // MUAC (1st)
        $opt->opt_muacSec = $request->edit_muacSec; // MUAC (2nd)

        $opt->opt_nsFirst = $request->edit_nsFirst; // N.S. (1st)
        $opt->opt_nsSec = $request->edit_nsSec; // N.S. (2nd)

        $opt->opt_vitFirst = $request->edit_vitaminFirst; // Vitamin A (1st)
        $opt->opt_vitSec = $request->edit_vitaminSec; // Vitamin A (2nd)

        $opt->opt_dewormtFirst = $request->edit_dewormingFirst; // Deworming (1st)
        $opt->opt_dewormSec = $request->edit_dewormingSec; // Deworming (2nd)

        $opt->opt_remarks = $request->edit_rem; // Remarks
        $opt->opt_status = $request->edit_status; // Status (Completed / Partially Completed)

        if ($opt->save()) {
            return response()->json(['status' => 1, 'msg' => 'OPT updated successfully.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Failed to update OPT.']);
        }
    }

    return response()->json(['status' => 0, 'msg' => 'OPT not found.']);
}

public function updateOptStatus(Request $request)
{
    $request->validate([
        'id' => 'required|integer|exists:opt_tbls,opt_id', // Changed to 'id'
        'status' => 'required|string' // Changed to 'status'
    ]);

    $opt = opt_tbl::find($request->id); // Changed to 'id'
    $opt->opt_status = $request->status; // Ensure this is correctly set
    $opt->save();

    return response()->json(['success' => true]);
}

public function optFullRecord(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
    $resident = resident_tbl::all();
    $opt = opt_tbl::with('resident')->get();

    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
        'residents' => $resident,
        'opts' => $opt,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/optFullRecord', $data);
}


public function riskAssessment(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/riskAssessment', $data);
}

// FOR DSTB
public function dstb(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
    $resident = resident_tbl::all();
    // $opt = opt_tbl::with('resident')->get();

    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
        'residents' => $resident,
        // 'opts' => $opt,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/dstb', $data);
}

public function familyPlanning(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/familyPlanning', $data);
}

public function rhu(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/rhu', $data);
}

public function dengue(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/dengue', $data);
}

public function destrict(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/destrict', $data);
}

public function maternal(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/maternal', $data);
}

public function immunization(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/immunization', $data);
}


public function dessegragation(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();


    // Merge all the data into a single array
    $data = [
        'LoggedUserInfo' => $loggedUserInfo,
    ];

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/dessegragation', $data);
}

public function fetchResidentsAge(Request $request)
{
    $purok = $request->query('purok');
    
    // Fetch all residents for the given purok
    $residents = resident_tbl::where('res_purok', $purok)->get();
    
    // Initialize an array to hold the age and sex counts
    $ageSexCounts = [];

    // Loop through residents and count them based on age and sex
    foreach ($residents as $resident) {
        $age = \Carbon\Carbon::parse($resident->res_bdate)->age;
        $sex = $resident->res_sex;

        // Limit age from 1 to 100 (optional, based on your needs)
        if ($age > 100) {
            continue;
        }

        // Initialize array for each age if not already present
        if (!isset($ageSexCounts[$age])) {
            $ageSexCounts[$age] = ['Male' => 0, 'Female' => 0];
        }

        // Increment the count for male or female based on the resident's sex
        if ($sex === 'Male') {
            $ageSexCounts[$age]['Male']++;
        } elseif ($sex === 'Female') {
            $ageSexCounts[$age]['Female']++;
        }
    }

    // Pass the ageSexCounts data to the view
    return response()->json($ageSexCounts);
}
//END OF FOR HEALTH WORKERS
}
