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
use App\Models\dstb;
use App\Models\fp_tbl;
use App\Models\fpSideB_tbl;
use App\Models\risk_tbl;
use App\Models\dengue_tbl;
use App\Models\rhu_tbl;
use App\Models\destrict_tbl;
use App\Models\dailyServiceRec_tbl;
use App\Models\releaseMed_tbl;
use App\Models\epiRecord_tbl;
use App\Models\vaccineTaken_tbl;
use App\Models\sched_tbl;
use App\Models\maternal_tbl;
use App\Models\blogs_tbl;
use App\Models\schedule_tbl;
use App\Models\recNews_tbl;
use App\Models\antepartum_tbl;
use App\Models\postpartum_tbl;
use App\Models\delbirth_tbl;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File;



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


    public function dashboard(Request $request)
    {
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

        // Fetch the required counts
        $totalPopulation = resident_tbl::where('res_personStatus', 'Alive')->where('res_status', 'active')->count();
        $totalMale = resident_tbl::where('res_sex', 'Male')->count();
        $totalFemale = resident_tbl::where('res_sex', 'Female')->count();
        $totalVoters = resident_tbl::where('res_voters', 'Yes')->count();
        $totalNonVoters = resident_tbl::where('res_voters', 'No')->count();
        $totalBlotters = blotter_tbl::where('blotter_status', 'pending')->count();
        $totalCertificates = brgyCertificate_tbl::where('certStatus', 'pending')->count();
        $totalBusinessPermits = businessBrgyClearance_tbl::where('bc_status', 'pending')->count();
        $totalClearances = brgyClearance_tbl::where('bcl_status', 'pending')->count();

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
                case 'SK Kagawad':
                    return redirect('dashboards/dbSk');
                    break;
                case 'SK Chairman':
                    return redirect('dashboards/dbSkChairman');
                    break;
                default:
                    return redirect('/'); // Default redirection if position is not recognized
            }
        } else {
            return back()->withErrors(['fail' => 'Incorrect ID or Password!'])->withInput();
        }
    }
// SECRETARY
    public function saveResidents(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'household' => 'required',
            'dateRegister' => 'required|date',
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'birthPlace' => 'required|string',
            'birthDate' => 'required|date',
            'civilStatus' => 'required',
            'sex' => 'required',
            'education' => 'required',
            'religion' => 'required',
            'tempAddress' => 'required',
            'otherContact' => 'required',
            'purok' => 'required',
            'person' => 'required',
            'living' => 'required',
            'sitio' => 'required',
            'voters' => 'required',
            'email' => 'required', 
            'contact' => 'required',
            'citizens' => 'required|string',
            'address' => 'required|string',
            'occupation' => 'required|string'
        ], [
            'required' => 'This Field is Required',
            'email' => 'Must Be An Email Format',
            'unique' => 'Already Taken',
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
            $resident->res_religion = $request->religion;
            $resident->res_educ = $request->education;
            $resident->res_otherContact = $request->otherContact;
            $resident->res_tempAddress = $request->tempAddress;
            $resident->res_nationalId = $request->national;
            
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
            'edit_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',  // Ensure correct file types and size
            'edit_household' => 'nullable|string',
            'edit_dateRegister' => 'nullable|date',
            'edit_fname' => 'required|string',           // make fname required
            'edit_mname' => 'nullable|string',
            'edit_lname' => 'required|string',           // make lname required
            'edit_suffix' => 'nullable|string',
            'edit_bPlace' => 'required|string',          // make bPlace required
            'edit_bDate' => 'required|date',
            'edit_age' => 'nullable|integer',
            'edit_sex' => 'required|string',             // make sex required
            'edit_education' => 'nullable|string',
            'edit_religion' => 'nullable|string',
            'edit_civilStatus' => 'required|string',    // make civilStatus required
            'edit_voters' => 'required|string',
            'edit_email' => 'nullable|',
            'edit_contact' => 'nullable',
            'edit_otherContact' => 'nullable',
            'edit_citizens' => 'nullable|string',
            'edit_address' => 'required|string',       // make address required
            'edit_occupation' => 'nullable|string',
            'edit_person' => 'nullable|string',
            'edit_living' => 'nullable|string',
            'edit_sitio' => 'nullable|string',
            'edit_purok' => 'nullable|string',
            'edit_tempAddress' => 'nullable|string',
        ]);
    
        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->toArray(),
            ]);
        }
    
        // Handle profile picture upload
        if ($request->hasFile('edit_profile')) {
            $image = $request->file('edit_profile');
            $imagePath = $image->store('profilePictures', 'public');
            $resident->res_picture = $imagePath;
        }
            // Update resident data
            $resident->res_household = $request->input('edit_household');
            $resident->res_dateReg = $request->input('edit_dateRegister');
            $resident->res_fname = $request->input('edit_fname');
            $resident->res_mname = $request->input('edit_mname');
            $resident->res_lname = $request->input('edit_lname');
            $resident->res_suffix = $request->input('edit_suffix');
            $resident->res_bplace = $request->input('edit_bPlace');
            $resident->res_bdate = $request->input('edit_bDate');
            $resident->res_civil = $request->input('edit_civilStatus');
            $resident->res_sex = $request->input('edit_sex');
            $resident->res_educ = $request->input('edit_education');
            $resident->res_religion = $request->input('edit_religion');
            $resident->res_purok = $request->input('edit_purok');
            $resident->res_voters = $request->input('edit_voters');
            $resident->res_personStatus = $request->input('edit_person');
            $resident->res_status = $request->input('edit_living');
            $resident->res_sitio = $request->input('edit_sitio');
            $resident->res_email = $request->input('edit_email');
            $resident->res_contact = $request->input('edit_contact');
            $resident->res_otherContact = $request->input('edit_otherContact');
            $resident->res_citizen = $request->input('edit_citizens');
            $resident->res_address = $request->input('edit_address');
            $resident->res_occupation = $request->input('edit_occupation');
            $resident->res_tempAddress = $request->input('edit_tempAddress');
            $resident->res_nationalId = $request->input('edit_national');
            // Save the updated resident data
            $resident->save();
        
            // Return success response
            return response()->json([
                'status' => 200,
                'resident' => $resident,
                'msg' => 'Resident has been updated successfully'
            ]);
    }
    
    
    public function dbBlogs(Request $request)
    {
        $currentDate = Carbon::now()->toDateString(); // Get today's date
        $sevenDaysAgo = Carbon::now()->subDays(7)->toDateString(); // Get the date 7 days ago
    
        // Get the category from the query parameter, default to 'All Topics' if not set
        $selectedCategory = $request->query('category', 'All Topics');
    
        // Fetch the most recent blog (latest blog)
        $latestBlogs = blogs_tbl::with('author')
            ->where('blog_status', 'Published')
            ->orderBy('created_at', 'DESC')
            ->first(); // Get only the most recent one
    
        // Start building the query for past blogs
        $pastBlogsQuery = blogs_tbl::with('author')
            ->where('blog_status', 'Published')
            ->where('blog_date', '>', $sevenDaysAgo) // Get blogs older than 7 days
            ->where('blog_id', '!=', optional($latestBlogs)->blog_id); // Exclude the latest blog
    
        // Apply category filtering if a category is selected
        if ($selectedCategory !== 'All Topics') {
            $pastBlogsQuery->where('blog_category', $selectedCategory); // Filter by selected category
        }
    
        // Fetch the filtered past blogs
        $pastBlogs = $pastBlogsQuery->orderBy('blog_date', 'DESC')->get();
    
        // Fetch logged user info (if needed for your view)
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
    
        // Fetch latest recommendation news
        $latestRecNews = recNews_tbl::where('rec_status', 'Published')
            ->orderBy('created_at', 'DESC')
            ->first();
    
        // Pass data to the view
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'latestBlogs' => $latestBlogs,
            'pastBlogs' => $pastBlogs,
            'latestRecNews' => $latestRecNews,
            'selectedCategory' => $selectedCategory, // Pass the selected category to the view
        ];
    
        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
    
        return view('dashboards/dbBlogs', $data);
    }

    public function searchBlogs(Request $request)
    {
        $query = $request->query('query'); // Get search query from the request

        // If the query is empty, return an empty array
        if (empty($query)) {
            return response()->json([]);
        }

        // Fetch blogs that match the query on the blog_title
        $blogs = blogs_tbl::with('author')
            ->where('blog_status', 'Published')
            ->where('blog_title', 'LIKE', '%' . $query . '%') // Search in the blog_title
            ->orderBy('created_at', 'DESC') // Optional: Sort by latest created_at
            ->limit(5) // Limit to 5 results
            ->get(['blog_id', 'blog_title', 'blog_pic']); // Fetch only necessary columns

        // Return the results as JSON
        return response()->json($blogs);
    }
    
    
    public function dbBlogsRead($blog_id)
    {
        // Retrieve the blog by its ID
        $blog = blogs_tbl::with('author')->findOrFail($blog_id);
        // Fetch latest recommendation news
        $latestRecNews = recNews_tbl::where('rec_status', 'Published')
            ->orderBy('created_at', 'DESC')  // Sort by creation date, most recent first
            ->first();
    
        
        $data = [
            'blog' => $blog,
            'latestRecNews' => $latestRecNews,
        ];
        // Return the view and pass the blog data to it
        return view('dashboards/skDb/dbBlogsReadMore', $data);
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
                'certType' => 'required|string',
                'purposeCertificate3' => 'required|string',
                'dateIssued3' => 'required|date',
                'pickUp3' => 'required|date'
            ], [
                'fName3.exists' => 'First Name Not Found',
                'mName3.exists' => 'Middle Name Not Found',
                'lName3.exists' => 'Last Name Not Found',
                'suffix3.exists' => 'Suffix Not Found',
                'bDate3.exists' => 'BirthDate Not Same As Your Registered BirthDate',
                'certType.required' => 'Certificate Type Field Required',
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
            $certificate->cert_type = $request->input('certType');
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

    public function getCertData($id)
    {
        // Fetch the dstb record based on the ID, including the related resident information
        $cert = brgyCertificate_tbl::with('resident')->find($id);

        if (!$cert) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $cert]);
    }

    public function updateCert(Request $request, $id)
    {
        // Find the resident by ID
        $cert = brgyCertificate_tbl::find($id);
    
        // Update resident data
        $cert->cert_transactionCode = $request->input('edit_tcode4');
        $cert->cert_purpose = $request->input('edit_Purpose4');
        $cert->cert_dateIssued = $request->input('edit_dIssued4');
        $cert->cert_pickUpDate = $request->input('edit_pickUp4');

        // Save the updated resident data
        $cert->save();
    
        // Return success response
        return response()->json([
            'status' => 200,
            'cert' => $cert,
            'msg' => 'Certificate has been updated successfully'
        ]);
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
            ], [
                // Custom messages for each validation rule
                'required' => 'This field is required.',  // Custom message for all "required" fields
                'string' => 'This field must be a valid string.',
                'date' => 'This field must be a valid date.',
                'fName2.exists' => 'First Name Not Found',
                'mName2.exists' => 'Middle Name Not Found',
                'lName2.exists' => 'Last Name Not Found',
                'suffix2.exists' => 'Suffix Not Found',
                'bDate2.exists' => 'BirthDate Not Same As Your Registered BirthDate',
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

    public function getPermitData($id)
    {
        // Fetch the dstb record based on the ID, including the related resident information
        $permit = businessBrgyClearance_tbl::with('resident')->find($id);

        if (!$permit) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $permit]);
    }
    

    public function getClearData($id)
    {
        // Fetch the dstb record based on the ID, including the related resident information
        $cert = BrgyClearance_tbl::with('resident')->find($id);

        if (!$cert) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $cert]);
    }

    public function updateBcl(Request $request, $id)
    {
        // Find the resident by ID
        $cert = BrgyClearance_tbl::find($id);
    
        // Update resident data
        $cert->bcl_transactionCode = $request->input('edit_tcode4');
        $cert->bcl_purpose = $request->input('edit_Purpose4');
        $cert->bcl_dateIssued = $request->input('edit_dIssued4');
        $cert->bcl_pickUpDate = $request->input('edit_pickUp4');

        // Save the updated resident data
        $cert->save();
    
        // Return success response
        return response()->json([
            'status' => 200,
            'cert' => $cert,
            'msg' => 'Clearance has been updated successfully'
        ]);
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



    //MULTI PURPOSE BARANGAY CLEARANCE
    public function saveBrgyClearance(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fName1' => 'required|string|exists:resident_tbls,res_fname',
                'mName1' => 'required|string|exists:resident_tbls,res_mname',
                'lName1' => 'required|string|exists:resident_tbls,res_lname',
                'suffix1' => 'required|string|exists:resident_tbls,res_suffix',
                'bDate1' => 'required|date|exists:resident_tbls,res_bdate',
                'tcode1' => [
                    'required',
                    function ($attribute, $value, $fail) {
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
                'clearancePurpose.required' => 'Purpose Field Required',
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
                'res_suffix' => $request->input('suffix1'),
            ];

            // Add the suffix to the search criteria if it's provided
            // if ($request->filled('suffix1')) {
            //     $searchCriteria['res_suffix'] = $request->input('suffix1');
            // }

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
                    'brgy_certificate_tbls.cert_type',
                    'brgy_certificate_tbls.created_at',
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
                    'brgy_clearance_tbls.created_at',
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
                    'business_brgy_clearance_tbls.created_at',
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
                'dates' => 'required|date'
            ], [
                'certNum.required' => 'Certificate Number is Required',
                'puOr.required' => 'O.R. Number is Required',
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

    public function rejectCertificate(Request $request) 
    {
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
                'dates' => 'required|date'
            ], [
                'certNum.required' => 'Certificate Number is Required',
                'puOr.required' => 'O.R. Number is Required',
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
                'dates' => 'required|date'
            ], [
                'certNum.required' => 'Certificate Number is Required',
                'puOr.required' => 'O.R. Number is Required',
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

    public function rejectClearance(Request $request) 
    {
        $certificate = BrgyClearance_tbl::find($request->id);
        if ($certificate) {
            $certificate->bcl_status = $request->status;
            $certificate->bcl_reason = $request->reason;
            $certificate->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
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

    public function rejectBlotter(Request $request) 
    {
        $certificate = blotter_tbl::find($request->id);
        if ($certificate) {
            $certificate->blotter_status = $request->status;
            $certificate->blotter_reason = $request->reason;
            $certificate->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function getBlotterData($id)
    {
        // Fetch the dstb record based on the ID, including the related resident information
        $blotter = blotter_tbl::with('resident')->find($id);

        if (!$blotter) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $blotter]);
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
                    'transaction_tbls.created_at',
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
                    $query->where('brgy_certificate_tbls.certStatus', 'completed')
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
                ->where('sched_status', 'Accepted') 
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
            $currentMonth = $now->month;
            $currentYear = $now->year;

            $schedules = DB::table('schedule_tbls')
                ->where('sched_type', 'private')
                ->where('sched_status', 'Accepted') 
                ->whereMonth('sched_date', $currentMonth)
                ->whereYear('sched_date', $currentYear)
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
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

        // Fetch the total population count for display
        $totalPopulation = resident_tbl::count();

        // Initialize arrays for monthly registration counts by gender for current and previous years
        // POPULATION
            $currentYearData = [];
            $previousYearData = [];
            $currentYearMaleData = [];
            $currentYearFemaleData = [];
            $previousYearMaleData = [];
            $previousYearFemaleData = [];
            $years = [];
            $yearlyData = [];
        
        // MEDICAL
            $currentYearDsrData = [];
            $previousYearDsrData = [];
            $currentYearDiabetesData = [];
            $previousYearDiabetesData = [];
            $currentYearFpData = [];
            $previousYearFpData = [];
            $currentYearTbData = [];
            $previousYearTbData = [];
            $currentYearDengueData = [];
            $previousYearDengueData = [];
            $yearsService = [];
            $yearlyServiceData = [];

            $currentYearPregData = [];
            $previousYearPregData = [];
            $currentYearUnder20PregData = [];
            $currentYearAbove20PregData = [];
            $previousYearUnder20PregData = [];
            $previousYearAbove20PregData = [];
        // REFERRAL
            $currentYearRhuData = [];
            $previousYearRhuData = [];
            $currentYearDestrictData = [];
            $previousYearDestrictData = [];
            $yearsRef = [];
            $yearlyRefData = [];
            $yearsDes = [];
            $yearlyDesData = [];

        for ($month = 1; $month <= 12; $month++) {
            // POPULATION
                // Monthly count for all residents
                $currentYearData[] = resident_tbl::whereYear('res_dateReg', $currentYear)
                                                ->whereMonth('res_dateReg', $month)
                                                ->count();

                $previousYearData[] = resident_tbl::whereYear('res_dateReg', $previousYear)
                                                ->whereMonth('res_dateReg', $month)
                                                ->count();

                // Monthly count for male residents
                $currentYearMaleData[] = resident_tbl::whereYear('res_dateReg', $currentYear)
                                                    ->whereMonth('res_dateReg', $month)
                                                    ->where('res_sex', 'Male')
                                                    ->count();
                $previousYearMaleData[] = resident_tbl::whereYear('res_dateReg', $previousYear)
                                                    ->whereMonth('res_dateReg', $month)
                                                    ->where('res_sex', 'Male')
                                                    ->count();

                // Monthly count for female residents
                $currentYearFemaleData[] = resident_tbl::whereYear('res_dateReg', $currentYear)
                                                    ->whereMonth('res_dateReg', $month)
                                                    ->where('res_sex', 'Female')
                                                    ->count();
                $previousYearFemaleData[] = resident_tbl::whereYear('res_dateReg', $previousYear)
                                                        ->whereMonth('res_dateReg', $month)
                                                        ->where('res_sex', 'Female')
                                                        ->count();

            // MEDICAL
                $currentYearDsrData[] = dailyServiceRec_tbl::whereYear('dsr_dateVisit', $currentYear)
                    ->whereMonth('dsr_dateVisit', $month)
                    ->count();
                $previousYearDsrData[] = dailyServiceRec_tbl::whereYear('dsr_dateVisit', $previousYear)
                    ->whereMonth('dsr_dateVisit', $month)
                    ->count();

                $currentYearDiabetesData[] = risk_tbl::whereYear('risk_dateAss', $currentYear)
                    ->whereMonth('risk_dateAss', $month)
                    ->whereJsonContains('risk_Diabetes', 'Yes')
                    ->count();
                
                $previousYearDiabetesData[] = risk_tbl::whereYear('risk_dateAss', $previousYear)
                    ->whereMonth('risk_dateAss', $month)
                    ->whereJsonContains('risk_Diabetes', 'Yes')
                    ->count();

                $currentYearFpData[] = fp_tbl::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $month)
                    ->count();
                
                $previousYearFpData[] = fp_tbl::whereYear('created_at', $previousYear)
                    ->whereMonth('created_at', $month)
                    ->count();


                $currentYearTbData[] = dstb::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $month)
                    ->count();
                
                $previousYearTbData[] = dstb::whereYear('created_at', $previousYear)
                    ->whereMonth('created_at', $month)
                    ->count();
                
                $currentYearDengueData[] = dengue_tbl::whereYear('dengue_date', $currentYear)
                    ->whereMonth('dengue_date', $month)
                    ->where('dengue_status', 'Dengue Positive')
                    ->count();
                
                $previousYearDengueData[] = dengue_tbl::whereYear('dengue_date', $previousYear)
                    ->whereMonth('dengue_date', $month)
                    ->where('dengue_status', 'Dengue Positive')
                    ->count();




                $currentYearPregData[] = maternal_tbl::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $month)
                    ->count();
                
                $previousYearPregData[] = maternal_tbl::whereYear('created_at', $previousYear)
                    ->whereMonth('created_at', $month)
                    ->count();


                    // Pregnancies under 20 (current year)
                    $currentYearUnder20PregData[] = maternal_tbl::whereYear('created_at', $currentYear)
                        ->whereMonth('created_at', $month)
                        ->where(function ($query) {
                            // If maiden_id exists, check the birth date; otherwise, check mat_urBdate
                            $query->whereHas('maiden', function ($subQuery) {
                                $subQuery->whereRaw('TIMESTAMPDIFF(YEAR, res_bdate, CURDATE()) < 20');
                            })
                            ->orWhere(function ($subQuery) {
                                // Fallback to mat_urBdate in maternal_tbl when maiden_id is empty
                                $subQuery->whereNull('maiden_id')
                                        ->whereRaw('TIMESTAMPDIFF(YEAR, mat_urBdate, CURDATE()) < 20');
                            });
                        })
                        ->count();

                    // Pregnancies above 20 (current year)
                    $currentYearAbove20PregData[] = maternal_tbl::whereYear('created_at', $currentYear)
                        ->whereMonth('created_at', $month)
                        ->where(function ($query) {
                            // If maiden_id exists, check the birth date; otherwise, check mat_urBdate
                            $query->whereHas('maiden', function ($subQuery) {
                                $subQuery->whereRaw('TIMESTAMPDIFF(YEAR, res_bdate, CURDATE()) >= 20');
                            })
                            ->orWhere(function ($subQuery) {
                                // Fallback to mat_urBdate in maternal_tbl when maiden_id is empty
                                $subQuery->whereNull('maiden_id')
                                        ->whereRaw('TIMESTAMPDIFF(YEAR, mat_urBdate, CURDATE()) >= 20');
                            });
                        })
                        ->count();

                    // Pregnancies under 20 (previous year)
                    $previousYearUnder20PregData[] = maternal_tbl::whereYear('created_at', $previousYear)
                        ->whereMonth('created_at', $month)
                        ->where(function ($query) {
                            // If maiden_id exists, check the birth date; otherwise, check mat_urBdate
                            $query->whereHas('maiden', function ($subQuery) {
                                $subQuery->whereRaw('TIMESTAMPDIFF(YEAR, res_bdate, CURDATE()) < 20');
                            })
                            ->orWhere(function ($subQuery) {
                                // Fallback to mat_urBdate in maternal_tbl when maiden_id is empty
                                $subQuery->whereNull('maiden_id')
                                        ->whereRaw('TIMESTAMPDIFF(YEAR, mat_urBdate, CURDATE()) < 20');
                            });
                        })
                        ->count();

                    // Pregnancies above 20 (previous year)
                    $previousYearAbove20PregData[] = maternal_tbl::whereYear('created_at', $previousYear)
                        ->whereMonth('created_at', $month)
                        ->where(function ($query) {
                            // If maiden_id exists, check the birth date; otherwise, check mat_urBdate
                            $query->whereHas('maiden', function ($subQuery) {
                                $subQuery->whereRaw('TIMESTAMPDIFF(YEAR, res_bdate, CURDATE()) >= 20');
                            })
                            ->orWhere(function ($subQuery) {
                                // Fallback to mat_urBdate in maternal_tbl when maiden_id is empty
                                $subQuery->whereNull('maiden_id')
                                        ->whereRaw('TIMESTAMPDIFF(YEAR, mat_urBdate, CURDATE()) >= 20');
                            });
                        })
                        ->count();

            // REFERRAL
                $currentYearRhuData[] = rhu_tbl::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $month)
                    ->count();
                $previousYearRhuData[] = rhu_tbl::whereYear('created_at', $previousYear)
                    ->whereMonth('created_at', $month)
                    ->count();

                $currentYearDestrictData[] = destrict_tbl::whereYear('des_dateConsult', $currentYear)
                    ->whereMonth('des_dateConsult', $month)
                    ->count();
                $previousYearDestrictData[] = destrict_tbl::whereYear('des_dateConsult', $previousYear)
                    ->whereMonth('des_dateConsult', $month)
                    ->count();
        }

        // Prepare yearly data for the last 10 years
            // Population 
                for ($year = $currentYear - 10; $year <= $currentYear; $year++) {
                    $years[] = $year;
                    $yearlyData[] = resident_tbl::whereYear('res_dateReg', $year)->count();
                }
            // Medical
                for ($yearService = $currentYear - 10; $yearService <= $currentYear; $yearService++) {
                    $yearsService[] = $yearService;
                    $yearlyServiceData[] = dailyServiceRec_tbl::whereYear('dsr_dateVisit', $yearService)->count();
                }
            // REFERRAL
                for ($yearRef = $currentYear - 10; $yearRef <= $currentYear; $yearRef++) {
                    $yearsRef[] = $yearRef;
                    $yearlyRefData[] = rhu_tbl::whereYear('created_at', $yearRef)->count();
                }

                for ($yearDes = $currentYear - 10; $yearDes <= $currentYear; $yearDes++) {
                    $yearsDes[] = $yearDes;
                    $yearlyDesData[] = destrict_tbl::whereYear('des_dateConsult', $yearDes)->count();
                }

        // Calculate the total registrations for the current and previous years
        // POPULATION
            $populationCurrentYear = array_sum($currentYearData);
            $populationPreviousYear = array_sum($previousYearData);
            $populationMaleCurrentYear = array_sum($currentYearMaleData);
            $populationMalePreviousYear = array_sum($previousYearMaleData);
            $populationFemaleCurrentYear = array_sum($currentYearFemaleData);
            $populationFemalePreviousYear = array_sum($previousYearFemaleData);
        // MEDICAL
            $currentDsrYear = array_sum($currentYearDsrData);
            $previousDsrYear = array_sum($previousYearDsrData);
            $currentDiabetesYear = array_sum($currentYearDiabetesData);
            $previousDiabetesYear = array_sum($previousYearDiabetesData);
            $currentFpYear = array_sum($currentYearFpData);
            $previousFpYear = array_sum($previousYearFpData);
            $currentTbYear = array_sum($currentYearTbData);
            $previousTbYear = array_sum($previousYearTbData);
            $currentDengueYear = array_sum($currentYearDengueData);
            $previousDengueYear = array_sum($previousYearDengueData);

            $currentPregYear = array_sum($currentYearPregData);
            $previousPregYear = array_sum($previousYearPregData);
            $currentUnder20Year = array_sum($currentYearUnder20PregData);
            $previousUnder20Year = array_sum($previousYearUnder20PregData);
            $currentAbove20Year = array_sum($currentYearAbove20PregData);
            $previousAbove20Year = array_sum($previousYearAbove20PregData);
        // REFERRAL
            $currentRhuYear = array_sum($currentYearRhuData);
            $previousRhuYear = array_sum($previousYearRhuData);
            $currentDestrictYear = array_sum($currentYearDestrictData);
            $previousDestrictYear = array_sum($previousYearDestrictData);
        // Calculate the percentage change in population from the previous year
        // POPULATION
            $populationChange = $this->calculatePercentageChange($populationCurrentYear, $populationPreviousYear);
            $populationMaleChange = $this->calculatePercentageChange($populationMaleCurrentYear, $populationMalePreviousYear);
            $populationFemaleChange = $this->calculatePercentageChange($populationFemaleCurrentYear, $populationFemalePreviousYear);
        // MEDICAL
            $dsrChange = $this->calculatePercentageChange($currentDsrYear, $previousDsrYear);
            $diabetesChange = $this->calculatePercentageChange($currentDiabetesYear, $previousDiabetesYear);
            $fpChange = $this->calculatePercentageChange($currentFpYear, $previousFpYear);
            $tbChange = $this->calculatePercentageChange($currentTbYear, $previousTbYear);
            $dengueChange = $this->calculatePercentageChange($currentDengueYear, $previousDengueYear);

            $pregChange = $this->calculatePercentageChange($currentPregYear, $previousPregYear);
            $under20Change = $this->calculatePercentageChange($currentUnder20Year, $previousUnder20Year);
            $above20Change = $this->calculatePercentageChange($currentAbove20Year, $previousAbove20Year);

        // REFERRAL
            $rhuChange = $this->calculatePercentageChange($currentRhuYear, $previousRhuYear);
            $destrictChange = $this->calculatePercentageChange($currentDestrictYear, $previousDestrictYear);
        // Fetch any additional data you need
        $loggedUserInfo = employee_tbl::find(session('LoggedUser'));
        $totalMale = resident_tbl::where('res_sex', 'Male')->count();
        $totalFemale = resident_tbl::where('res_sex', 'Female')->count();
        $totalDiabetes = risk_tbl::whereJsonContains('risk_Diabetes', 'Yes')->whereYear('risk_dateAss', $currentYear)->count();
        $totalFamilyPlanning = fp_tbl::whereYear('created_at', $currentYear)->count();
        $totalRhu = rhu_tbl::whereYear('created_at', $currentYear)->count();
        $totalDsr = dailyServiceRec_tbl::whereYear('dsr_dateVisit', $currentYear)->count();
        $totalDes = destrict_tbl::whereYear('des_dateConsult', $currentYear)->count();
        $tb = dstb::whereYear('created_at', now()->year)->count();

        $dengue = dengue_tbl::whereYear('dengue_date', $currentYear)->where('dengue_status', 'Dengue Positive')->count();
        $maternal = maternal_tbl::whereYear('created_at', $currentYear)->count();

        // Prepare data array for the view
        $data = [
            'maternal' => $maternal,
            'currentYearPregData' => $currentYearPregData,
            'previousYearPregData' => $previousYearPregData,
            'currentYearUnder20PregData' => $currentYearUnder20PregData,
            'previousYearUnder20PregData' => $previousYearUnder20PregData,
            'currentYearAbove20PregData' => $currentYearAbove20PregData,
            'previousYearAbove20PregData' => $previousYearAbove20PregData,
            'pregChange' => $pregChange,
            'under20Change' => $under20Change,
            'above20Change' => $above20Change,

            'LoggedUserInfo' => $loggedUserInfo,
            'totalPopulation' => $totalPopulation,
            'populationChange' => $populationChange,
            'populationMaleChange' => $populationMaleChange,
            'populationFemaleChange' => $populationFemaleChange,
            'currentYearData' => $currentYearData,
            'previousYearData' => $previousYearData,
            'currentYearMaleData' => $currentYearMaleData,
            'currentYearFemaleData' => $currentYearFemaleData,
            'previousYearMaleData' => $previousYearMaleData,
            'previousYearFemaleData' => $previousYearFemaleData,
            'currentYear' => $currentYear,
            'previousYear' => $previousYear,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale,
            'totalDsr' => $totalDsr,
            'yearsService' => $yearsService,
            'yearlyServiceData' => $yearlyServiceData,
            'currentYearDsrData' => $currentYearDsrData,
            'previousYearDsrData' => $previousYearDsrData,
            'totalDiabetes' => $totalDiabetes,
            'currentYearDiabetesData' => $currentYearDiabetesData,
            'previousYearDiabetesData' => $previousYearDiabetesData,
            'totalFamilyPlanning' => $totalFamilyPlanning,
            'currentYearFpData' => $currentYearFpData,
            'previousYearFpData' => $previousYearFpData,
            'tb' => $tb,
            'currentYearTbData' => $currentYearTbData,
            'previousYearTbData' => $previousYearTbData,
            'dengue' => $dengue,
            'currentYearDengueData' => $currentYearDengueData,
            'previousYearDengueData' => $previousYearDengueData,
            'totalRhu' => $totalRhu,
            'currentYearRhuData' => $currentYearRhuData,
            'previousYearRhuData' => $previousYearRhuData,
            'yearsRef' => $yearsRef,
            'yearlyRefData' => $yearlyRefData,
            'totalDes' => $totalDes,
            'currentYearDestrictData' => $currentYearDestrictData,
            'previousYearDestrictData' => $previousYearDestrictData,
            'yearsDes' => $yearsDes,
            'yearlyDesData' => $yearlyDesData,
            'years' => $years,
            'yearlyData' => $yearlyData,

            'dsrChange' => $dsrChange,
            'diabetesChange' => $diabetesChange,
            'fpChange' => $fpChange,
            'tbChange' => $tbChange,
            'dengueChange' => $dengueChange,
            'rhuChange' => $rhuChange,
            'destrictChange' => $destrictChange,
        ];

        // Set headers to prevent caching
        return response()
            ->view('dashboards/dbHealthWorker', $data)
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }


    /**
     * Calculate the percentage change between two values.
     *
     * @param int $current
     * @param int $previous
     * @return float
     */

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous > 0) {
            return round((($current - $previous) / $previous) * 100, 2);
        }

        return $current > 0 ? 100 : 0;
    }

// DSR
    public function dailyServiceRecord(Request $request)
    {
        $currentYear = Carbon::now()->year;
        
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        
        $editmedicines = medicine_tbl::where('med_status', '!=', 'Expired')->get();

        // Fetch only non-expired medicines
        $medicines = medicine_tbl::where('med_status', '!=', 'Expired')->get();
        
        // Fetch daily service records for the current year with "Completed" status
        $dsr = dailyServiceRec_tbl::with('resident', 'medicine')
            ->whereYear('dsr_dateVisit', $currentYear)
            ->where('dsr_status', 'Completed')
            ->orderBy('created_at', 'DESC')
            ->get();
        
        // Calculate the total released quantity per medicine
        $releaseMed = releaseMed_tbl::select('med_id', DB::raw('SUM(rmed_qtRelease) as total_release'))
            ->groupBy('med_id')
            ->get();

        // Map total releases by medicine ID
        $releaseQuantities = $releaseMed->groupBy('med_id')->map(function ($releases) {
            return $releases->sum('total_release');
        });

        // Filter medicines with remaining stock greater than 0
        $filteredMedicines = $medicines->filter(function ($medicine) use ($releaseQuantities) {
            $totalRelease = $releaseQuantities->get($medicine->med_id, 0);
            $remainingQuantity = $medicine->med_count - $totalRelease;
            return $remainingQuantity > 0;
        });

        // Merge all the data into a single array, using filtered medicines
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'dsr' => $dsr,
            'medicines' => $filteredMedicines, // Pass the filtered medicines here
            'releaseMed' => $releaseMed,
            'editmedicines' => $editmedicines
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/dailyServiceRecord', $data);
    }

    public function dailyForm(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        $medicines = medicine_tbl::where('med_status', '!=', 'Expired')->where('med_count', '>', 0)->get();
        $dsr = dailyServiceRec_tbl::with('resident', 'medicine')->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'dsr' => $dsr,
            'medicines' => $medicines,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/dailyForm', $data);
    }

    public function inputDsr(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'inputDate' => 'required|date',
            'inputPatientName' => 'required',
            'inputBp' => 'required',
            'inputTemp' => 'required|numeric',
            'inputHeight' => 'required|numeric',
            'inputWeight' => 'required|numeric',
            'inputComplaints' => 'required|string',
            'smoker' => 'required',
            'alcohol' => 'required',
            'inputMed' => 'required',
            'inputQuantity' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    // Check if inputQuantity is within inputCurQt
                    $inputCurQt = $request->input('inputCurQt');
                    if ($value > $inputCurQt) {
                        $fail("The quantity cannot exceed the available stock of $inputCurQt.");
                    }
                },
            ],
            'signature_valid' => 'required|in:1',
        ], [
            'inputDate.required' => 'The Date field is required.',
            'inputDate.date' => 'The Date must be DD/MM/YYYY.',
            'inputPatientName.required' => 'The Patient name is required.',
            'inputBp.required' => 'The BP field is required.',
            'inputTemp.required' => 'The Temperature field is required.',
            'inputTemp.numeric' => 'The Temperature must be a number.',
            'inputHeight.required' => 'The Height is required.',
            'inputHeight.numeric' => 'The Height must be a number.',
            'inputWeight.required' => 'The Weight is required.',
            'inputWeight.numeric' => 'The Weight must be a number.',
            'inputComplaints.required' => 'Complaints are required.',
            'inputComplaints.string' => 'Complaints must be in a form of sentence or words.',
            'smoker.required' => 'The Smoker field is required.',
            'alcohol.required' => 'The Alcohol field is required.',
            'inputMed.required' => 'The Medication field is required.',
            'inputQuantity.required' => 'The quantity is required.',
            'inputQuantity.numeric' => 'The quantity must be a number.',
            'signature_valid.required' => 'A valid signature is required.',
            'signature_valid.in' => 'A valid signature is required.',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            // Start a transaction
            DB::beginTransaction();
            try {
                // Insert into daily_service_rec_tbl
                $dsr = new dailyServiceRec_tbl;
                $dsr->dsr_dateVisit = $request->inputDate;
                $dsr->res_id = $request->inputPatientName;
                $dsr->em_id = $request->inputEmId;
                $dsr->dsr_bp = $request->inputBp;
                $dsr->dsr_temp = $request->inputTemp;
                $dsr->dsr_ht = $request->inputHeight;
                $dsr->dsr_wt = $request->inputWeight;
                $dsr->dsr_complaint = $request->inputComplaints;
                $dsr->dsr_smoke = $request->smoker;
                $dsr->dsr_alcohol = $request->alcohol;
                $dsr->med_id = $request->inputMed;
                $dsr->dsr_qt = $request->inputQuantity;
                $dsr->dsr_status = 'Completed';
    
                // Signature
                    // Signature Patient
                    if ($request->filled('signaturePad_1') && !empty($request->input('signaturePad_1'))) {
                        $signaturePatient = $request->input('signaturePad_1');
                        $signaturePath = $this->saveSignature($signaturePatient, 'signaturePad_1');
                        $dsr->dsr_signature = $signaturePath;
                    }

                    // Signature LGU (only if signature is provided)
                    if ($request->filled('signaturePad_2') && !empty($request->input('signaturePad_2'))) {
                        $signatureLgu = $request->input('signaturePad_2');
                        $signaturePath1 = $this->saveSignature($signatureLgu, 'signaturePad_2');
                        $dsr->dsr_signatureLgu = $signaturePath1;
                    } else {
                        $dsr->dsr_signatureLgu = null; // Ensure null is stored if no signature
                    }

                    // Signature BRGY (only if signature is provided)
                    if ($request->filled('signaturePad_3') && !empty($request->input('signaturePad_3'))) {
                        $signatureBrgy = $request->input('signaturePad_3');
                        $signaturePath2 = $this->saveSignature($signatureBrgy, 'signaturePad_3');
                        $dsr->dsr_signatureBrgy = $signaturePath2;
                    } else {
                        $dsr->dsr_signatureBrgy = null; // Ensure null is stored if no signature
                    }

    
                // Save the DSR (daily service record) and capture the dsr_id
                $dsr->save();
                $dsr_id = $dsr->dsr_id;
    
                // Insert into release_med_tbl
                $releaseMed = new releaseMed_tbl;
                $releaseMed->med_id = $request->inputMed;
                $releaseMed->dsr_id = $dsr_id; // Reference the DSR record
                $releaseMed->rmed_qtRelease = $request->inputQuantity;
                $releaseMed->rmed_Date = now();
                $releaseMed->save();
    
                // Commit the transaction
                DB::commit();
    
                return response()->json(['status' => 1, 'msg' => 'New Record Has Been Added']);
            } catch (\Exception $e) {
                // Rollback the transaction in case of failure
                DB::rollBack();
                return response()->json(['status' => 0, 'msg' => 'Failed to add new Record: ' . $e->getMessage()], 500);
            }
        }
    }
    
    private function isEmptySignature($signatureData)
    {
        $emptySignatureBase64 = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUA';
        return str_starts_with($signatureData, $emptySignatureBase64);
    }

    public function getDsrData($dsr_id)
    {
        $currentYear = now()->year;

        $dsr = dailyServiceRec_tbl::with('resident', 'medicine')
            ->where('dsr_id', $dsr_id)
            ->whereYear('created_at', $currentYear)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$dsr) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $dsr]);
    }

    public function updateDsr(Request $request)
    {
        $dsr = dailyServiceRec_tbl::find($request->dsr_id);

        if ($dsr) {
            $dsr->dsr_id = $request->dsr_id;

            // TextBox
                $dsr->dsr_id = $request->edit_dsrId;
                $dsr->dsr_dateVisit = $request->edit_inputDate;
                $dsr->res_id = $request->edit_inputPatientName;
                $dsr->em_id = $request->edit_inputEmId;
                $dsr->dsr_bp = $request->edit_inputBp;
                $dsr->dsr_temp = $request->edit_inputTemp;
                $dsr->dsr_ht = $request->edit_inputHeight;
                $dsr->dsr_wt = $request->edit_inputWeight;
                $dsr->dsr_complaint = $request->edit_inputComplaints;
                $dsr->med_id  = $request->edit_inputMed;
                $dsr->dsr_qt = $request->edit_inputQuantity;

            // Radio
                if ($request->filled('edit_smoker')) {
                    $dsr->dsr_smoke = $request->edit_smoker;
                }
                if ($request->filled('edit_alcohol')) {
                    $dsr->dsr_alcohol = $request->edit_alcohol;
                }
              
            // Signature
                if ($request->has('edit_signaturePad_1')) 
                {
                    // Get the base64 encoded data from the request
                    $signature1 = $request->input('edit_signaturePad_1');
                
                    // Decode the data URL
                    $signature1 = str_replace('data:image/png;base64,', '', $signature1);
                    $signature1 = str_replace(' ', '+', $signature1);
                    $signature1Data = base64_decode($signature1);
                
                    // Generate a unique file name
                    $signature1FileName = 'signatureUp_' . time() . '.png';
                
                    // Save the signature to the public/images/Signature directory directly
                    $filePath = public_path('images/Signature/' . $signature1FileName);
                    file_put_contents($filePath, $signature1Data);
                
                    // Save the file path to the dsr model
                    $dsr->dsr_signature = 'images/Signature/' . $signature1FileName; // Updated attribute name
                }
                
                if ($request->has('edit_signaturePad_2')) 
                {
                    // Get the base64 encoded data from the request
                    $signature2 = $request->input('edit_signaturePad_2');
                
                    // Decode the data URL
                    $signature2 = str_replace('data:image/png;base64,', '', $signature2);
                    $signature2 = str_replace(' ', '+', $signature2);
                    $signature2Data = base64_decode($signature2);
                
                    // Generate a unique file name
                    $signature2FileName = 'signatureUl_' . time() . '.png';
                
                    // Save the signature to the public/images/Signature directory directly
                    $filePath = public_path('images/Signature/' . $signature2FileName);
                    file_put_contents($filePath, $signature2Data);
                
                    // Save the file path to the dsr model
                    $dsr->dsr_signatureLgu = 'images/Signature/' . $signature2FileName; // Updated attribute name
                }

                if ($request->has('edit_signaturePad_3')) 
                {
                    // Get the base64 encoded data from the request
                    $signature2 = $request->input('edit_signaturePad_3');
                
                    // Decode the data URL
                    $signature2 = str_replace('data:image/png;base64,', '', $signature2);
                    $signature2 = str_replace(' ', '+', $signature2);
                    $signature2Data = base64_decode($signature2);
                
                    // Generate a unique file name
                    $signature2FileName = 'signatureUb_' . time() . '.png';
                
                    // Save the signature to the public/images/Signature directory directly
                    $filePath = public_path('images/Signature/' . $signature2FileName);
                    file_put_contents($filePath, $signature2Data);
                
                    // Save the file path to the dsr model
                    $dsr->dsr_signatureBrgy = 'images/Signature/' . $signature2FileName; // Updated attribute name
                }
            
            if ($dsr->save()) {
                    // Find the related release_med_tbl record using dsr_id
                    $releaseMed = releaseMed_tbl::where('dsr_id', $dsr->dsr_id)->first();

                    if ($releaseMed) {
                        // Check if med_id or dsr_qt were updated
                        $updated = false;
                        if ($dsr->med_id != $releaseMed->med_id) {
                            $releaseMed->med_id = $dsr->med_id;
                            $updated = true;
                        }
                        if ($dsr->dsr_qt != $releaseMed->rmed_qtRelease) {
                            $releaseMed->rmed_qtRelease = $dsr->dsr_qt;
                            $updated = true;
                        }

                        // Update the release_med_tbl if needed
                        if ($updated) {
                            // $releaseMed->rmed_Date = now(); // Optionally update the release date
                            $releaseMed->save();
                        }
                    }
                return response()->json(['status' => 1, 'msg' => 'Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update Record.']);
            }
        }

        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }
// End of DSR

// FOR INDIVIDUAL CLIENT REPORT
    public function indiClientReport(Request $request)
    {
        $currentYear = Carbon::now()->year;
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        $medicines = medicine_tbl::where('med_status', '!=', 'Expired')->where('med_count', '>', 0)->get();
        $dsr = dailyServiceRec_tbl::with('resident', 'medicine') ->whereYear('dsr_dateVisit', $currentYear)->where('dsr_status', 'Completed')->orderBy('created_at', 'DESC')->get();
        $release = releaseMed_tbl::all();
        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'dsr' => $dsr,
            'medicines' => $medicines,
            'release' => $release,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/individualClientReport', $data);
    }

    public function getItrData($residentId)
    {
        $currentYear = now()->year;
    
        // Access `release_med_tbl` and join `daily_service_rec_tbl` to filter by `res_id`
        $serviceRecords = releaseMed_tbl::with(['dsr' => function($query) use ($currentYear) {
            // Filter daily_service_rec_tbl by the current year
            $query->whereYear('created_at', $currentYear);
        }, 'medicine']) // Load medicine relationship
        ->whereHas('dsr', function($query) use ($residentId) {
            // Join with daily_service_rec_tbl to filter by residentId
            $query->where('res_id', $residentId);
        })
        ->orderBy('created_at', 'desc')
        ->get(); // Use get() to return all matching records
    
        if ($serviceRecords->isEmpty()) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }
    
        return response()->json(['status' => 1, 'data' => $serviceRecords]);
    }
// END OF INDIVIDUAL CLIENT REPORT

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
            'inputProd' => 'required|string',
            'inputDesc' => 'required|string',
            'inputUnit' => 'required|string',
            'inputBox' => 'numeric',
            'inputCount' => 'numeric',
            'inputTotalCount' => 'numeric',
            'inputDatePurchase' => 'required|date',
            'inputDateExpired' => 'required|date',
        ], [
            'inputProd.required' => 'The product name is required.',
            'inputProd.string' => 'The product name must be a string.',
            'inputDesc.required' => 'The description is required.',
            'inputDesc.string' => 'The description must be a string.',
            'inputUnit.required' => 'The unit field is required.',
            'inputBox.numeric' => 'The box count must be a number.',
            'inputCount.numeric' => 'The count must be a number.',
            'inputTotalCount.numeric' => 'The total count must be a number.',
            'inputDatePurchase.required' => 'The purchase date is required.',
            'inputDatePurchase.date' => 'The purchase date must be a valid date.',
            'inputDateExpired.required' => 'The expiration date is required.',
            'inputDateExpired.date' => 'The expiration date must be a valid date.',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } 
        else 
        {
            $medicine = new medicine_tbl;
            $medicine->em_id = $request->inputEmp;
            $medicine->med_prod = $request->inputProd;
            $medicine->med_desc = $request->inputDesc;
            $medicine->med_unit = $request->inputUnit;
            $medicine->med_qtBox = $request->inputBox;
            $medicine->med_qtPerUnit = $request->inputCount;
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
            $medicine->med_unit = $request->edit_inputUnit;
            $medicine->med_qtPerUnit = $request->edit_med_ctPerTab;
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

    public function medRelease(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $medicine = releaseMed_tbl::with('medicine')->get();
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
        return view('dashboards/healthWorkerDb/medRelease', $data);
    }
// END OF MEDICINE

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
        $currentYear = date('Y');

        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

        // Fetch available distinct years from the 'created_at' column of 'opt_tbls'
        $availableYears = opt_tbl::selectRaw('YEAR(created_at) as year')
                                ->distinct()
                                ->orderByDesc('year')
                                ->pluck('year');

        // Fetch the relevant OPT records for the selected year or current year by default
        $year = $request->input('selectYear', $currentYear); // Default to current year if not selected
        $opts = opt_tbl::join('resident_tbls', 'opt_tbls.res_id', '=', 'resident_tbls.res_id')
                    ->join('employee_tbls', 'opt_tbls.em_id', '=', 'employee_tbls.em_id')
                    ->whereYear('opt_tbls.created_at', $year) // Filter by selected year
                    ->whereColumn('resident_tbls.res_purok', '=', 'employee_tbls.em_address')
                    ->select('opt_tbls.*', 'resident_tbls.res_purok', 'employee_tbls.em_address')
                    ->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'availableYears' => $availableYears,  // Pass the available years to the view
            'opts' => $opts,
            'selectedYear' => $year,  // Pass the selected year to the view
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/optFullRecord', $data);
    }

// END OF OPT

// FOR RISK ASSESSMENT
    public function riskAssessment(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        $risk = risk_tbl::with('resident')->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'risk' => $risk,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/riskAssessment', $data);
    }

    public function riskInput(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'inputDateAssessment' => 'required|date',
            'fullName' => 'required|string',
        ], 
        [
            'inputDateAssessment.required' => 'The assessment date is required.',
            'inputDateAssessment.date' => 'The assessment date must be a valid date.',
            'fullName.required' => 'The full name is required.',
            'fullName.string' => 'The full name must be a string.',
        ]); 

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $risk = new risk_tbl;
            // textbox
                // Personal Info
                    $risk->risk_dateAss = $request->inputDateAssessment;
                    $risk->res_id = $request->fullName;
                // Obesity
                    $risk->risk_obHt = $request->inputOHt;
                    $risk->risk_obWt = $request->inputOWt;
                    $risk->risk_obBmi = $request->inputBmi;
                    $risk->risk_obWc = $request->inputWc;
                    $risk->risk_obSysFirst = $request->inputSystolic1;
                    $risk->risk_obSysSec = $request->inputSystolic2;
                    $risk->risk_obSysAve = $request->inputSystolic3;
                    $risk->risk_obDiaFirst = $request->inputDiastolic1;
                    $risk->risk_obDiaSec = $request->inputDiastolic2;
                    $risk->risk_obDiaAve = $request->inputDiastolic3;
                // Signature
                    $risk->em_id = $request->inputAssessed;
                // Diabetes
                    $risk->risk_gloFbs = $request->inputFbs;
                    $risk->risk_gloDate = $request->inputDateTakenFbs;
                    $risk->risk_lipChol = $request->inputChol;
                    $risk->risk_lipDate = $request->inputDateTakenChol;
                    $risk->risk_ketone = $request->inputUrket;
                    $risk->risk_urDate = $request->inputDateTakenUrket;
                    $risk->risk_protein = $request->inputProtein;
                    $risk->risk_proDate = $request->inputDateTakenPro;
                    $risk->risk_followUp = $request->inputRaFfUp;
                // Risk
                    $risk->risk_findings = $request->inputRaFinding;
                    $risk->risk_status = 'Completed';

            // radio
                // Familiy History
                    $risk->risk_fhHypertension = $request->hypertension;
                    $risk->risk_fhStroke = $request->stroke;
                    $risk->risk_fhHeartAttack = $request->heart_attack;
                    $risk->risk_fhDiabetes = $request->diabetes;
                    $risk->risk_fhAsthma = $request->asthma;
                    $risk->risk_fhCancer = $request->cancer;
                    $risk->risk_fhKidney = $request->kidney_disease;
                // Obesity
                    $risk->risk_obObesity = $request->obesity;
                    $risk->risk_obAdiposity = $request->adposity;
                    $risk->risk_obBp = $request->raisedBp;
                // Alcohol
                    $risk->risk_alIntake = $request->alcoholIntake;
                    $risk->risk_alExcessive = $request->exAlcoholIntake;
                // High Fat
                    $risk->risk_highFat = $request->fatSaltIntake;
                // Dietary Fiber
                    $risk->risk_dfVege = $request->vegetables;
                    $risk->risk_dfFruit = $request->fruits;
                // Physical Activities
                    $risk->risk_Pa = $request->physicalAct;
                // Questionaire
                    $risk->risk_q1 = $request->questionnaire1;
                    $risk->risk_q2 = $request->questionnaire2;
                    $risk->risk_q3 = $request->questionnaire3;
                    $risk->risk_q4 = $request->questionnaire4;
                    $risk->risk_q5 = $request->questionnaire5;
                    $risk->risk_q6 = $request->questionnaire6;
                    $risk->risk_q7 = $request->questionnaire7;
                    $risk->risk_qResult = $request->result;
                    $risk->risk_q8Stroke = $request->questionnaire8;
                    $risk->risk_qStrokeResult = $request->questionnaireStroke;
                // Diabetes
                    $risk->risk_diaMed = $request->medications;
                    $risk->risk_diaSymp1 = $request->polyphagia;
                    $risk->risk_diaSymp2 = $request->polydipsia;
                    $risk->risk_diaSymp3 = $request->polyuria;
                    $risk->risk_glocuse = $request->rbg;
                    $risk->risk_lipids = $request->rbl;
                    $risk->risk_urKetones = $request->ketones;
                    $risk->risk_urProtein = $request->protein;
                    $risk->risk_management = $request->raManagement;
                    $risk->risk_level = $request->riskLevel;
            // checkboxes
                // Smoker
                    $risk->risk_smoker = isset($request->smokerFaq) ? json_encode($request->smokerFaq) : null;
                // Diabetes
                    $risk->risk_Diabetes = isset($request->diaDiabetes) ? json_encode($request->diaDiabetes) : null;
            // Signature
                // Handle signature 1
                    if ($request->has('signature1')) {
                        $signatureData1 = $request->input('signature1');
                        $signaturePath1 = $this->saveSignature($signatureData1, 'signature1');
                        $risk->risk_signatureFirst = $signaturePath1; // Store the file path in the database
                    }

                // Handle signature 2
                    if ($request->has('signature2')) {
                        $signatureData2 = $request->input('signature2');
                        $signaturePath2 = $this->saveSignature($signatureData2, 'signature2');
                        $risk->risk_signatureSecond = $signaturePath2; // Store the file path in the database
                    }
            
            if ($risk->save()) 
            {
                return response()->json(['status' => 1, 'msg' => 'New RA Record Has Been Added']);
            } 
            else 
            {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new RA Record'], 500);
            }
        }
    }

    private function saveSignature($base64Data, $filePrefix)
    {
        // Decode base64 data
        $base64Image = explode(',', $base64Data)[1]; // Remove the data:image/png;base64, part
        $decodedImage = base64_decode($base64Image);

        // Define destination path and file name
        $fileName = $filePrefix . '_' . time() . '.png';
        $filePath = public_path('images/Signature/' . $fileName);

        // Save the file
        file_put_contents($filePath, $decodedImage);

        // Return the file path relative to the public directory
        return 'images/Signature/' . $fileName;
    }

    public function getRaData($risk_id)
    {
        $currentYear = now()->year;

        $risk = risk_tbl::with('resident')
            ->where('risk_id', $risk_id)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$risk) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $risk]);
    }

    public function updateRisk(Request $request)
    {
        $risk = risk_tbl::find($request->risk_id);

        if ($risk) {
            $risk->risk_id = $request->risk_id;

            // TextBox
                $risk->risk_id = $request->edit_riskId;
                $risk->risk_dateAss = $request->edit_inputDateAssessment;
                $risk->res_id = $request->edit_fullName;
                $risk->em_id = $request->edit_inputAssessed;
                $risk->risk_obHt = $request->edit_inputOHt;
                $risk->risk_obWt = $request->edit_inputOWt;
                $risk->risk_obBmi = $request->edit_inputBmi;
                $risk->risk_obWc = $request->edit_inputWc;
                $risk->risk_obSysFirst = $request->edit_inputSystolic1;
                $risk->risk_obSysSec = $request->edit_inputSystolic2;
                $risk->risk_obSysAve = $request->edit_inputSystolic3;
                $risk->risk_obDiaFirst = $request->edit_inputDiastolic1;
                $risk->risk_obDiaSec = $request->edit_inputDiastolic2;
                $risk->risk_obDiaAve = $request->edit_inputDiastolic3;
                $risk->risk_gloFbs = $request->edit_inputFbs;
                $risk->risk_gloDate = $request->edit_inputDateTakenFbs;
                $risk->risk_lipChol = $request->edit_inputChol;
                $risk->risk_lipDate = $request->edit_inputDateTakenChol;
                $risk->risk_ketone = $request->edit_inputUrket;
                $risk->risk_urDate = $request->edit_inputDateTakenUrket;
                $risk->risk_protein = $request->edit_inputProtein;
                $risk->risk_proDate = $request->edit_inputDateTakenPro;
                $risk->risk_followUp = $request->edit_inputRaFfUp;
                $risk->risk_findings = $request->edit_inputRaFinding;
                $risk->risk_status = $request->edit_inputStatus;

            // Checkbox
                $risk->risk_smoker = json_decode($request->edit_smokerFaq, true);
                $risk->risk_Diabetes = json_decode($request->edit_diaDiabetes, true);

            // Radio
                if ($request->filled('edit_hypertension')) {
                    $risk->risk_fhHypertension = $request->edit_hypertension;
                }
                if ($request->filled('edit_stroke')) {
                    $risk->risk_fhStroke = $request->edit_stroke;
                }
                if ($request->filled('edit_heart_attack')) {
                    $risk->risk_fhHeartAttack = $request->edit_heart_attack;
                }
                if ($request->filled('edit_diabetes')) {
                    $risk->risk_fhDiabetes = $request->edit_diabetes;
                }
                if ($request->filled('edit_asthma')) {
                    $risk->risk_fhAsthma = $request->edit_asthma;
                }
                if ($request->filled('edit_cancer')) {
                    $risk->risk_fhCancer = $request->edit_cancer;
                }
                if ($request->filled('edit_kidney_disease')) {
                    $risk->risk_fhKidney = $request->edit_kidney_disease;
                }
                // obese
                if ($request->filled('edit_obesity')) {
                    $risk->risk_obObesity = $request->edit_obesity;
                }
                if ($request->filled('edit_adposity')) {
                    $risk->risk_obAdiposity = $request->edit_adposity;
                }
                if ($request->filled('edit_raisedBp')) {
                    $risk->risk_obBp = $request->edit_raisedBp;
                }
                // Alcohol 
                if ($request->filled('edit_alcoholIntake')) {
                    $risk->risk_alIntake = $request->edit_alcoholIntake;
                }
                if ($request->filled('edit_exAlcoholIntake')) {
                    $risk->risk_alExcessive = $request->edit_exAlcoholIntake;
                }
                // High Fat 
                if ($request->filled('edit_fatSaltIntake')) {
                    $risk->risk_highFat = $request->edit_fatSaltIntake;
                }
                // Dietary Fiber
                if ($request->filled('edit_vegetables')) {
                    $risk->risk_dfVege = $request->edit_vegetables;
                }
                if ($request->filled('edit_fruits')) {
                    $risk->risk_dfFruit = $request->edit_fruits;
                }
                // Physical Activity 
                if ($request->filled('edit_physicalAct')) {
                    $risk->risk_Pa = $request->edit_physicalAct;
                }
                // Questionaire
                if ($request->filled('edit_result')) {
                    $risk->risk_qResult = $request->edit_physicalAct;
                }
                if ($request->filled('edit_questionnaire1')) {
                    $risk->risk_q1 = $request->edit_questionnaire1;
                }
                if ($request->filled('edit_questionnaire2')) {
                    $risk->risk_q2 = $request->edit_questionnaire2;
                }
                if ($request->filled('edit_questionnaire3')) {
                    $risk->risk_q3 = $request->edit_questionnaire3;
                }
                if ($request->filled('edit_questionnaire4')) {
                    $risk->risk_q4 = $request->edit_questionnaire4;
                }
                if ($request->filled('edit_questionnaire5')) {
                    $risk->risk_q5 = $request->edit_questionnaire5;
                }
                if ($request->filled('edit_questionnaire6')) {
                    $risk->risk_q6 = $request->edit_questionnaire6;
                }
                if ($request->filled('edit_questionnaire7')) {
                    $risk->risk_q7 = $request->edit_questionnaire7;
                }
                if ($request->filled('edit_questionnaireStroke')) {
                    $risk->risk_qStrokeResult = $request->edit_questionnaireStroke;
                }
                if ($request->filled('edit_questionnaire8')) {
                    $risk->risk_q8Stroke = $request->edit_questionnaire8;
                }
                // Diabetes
                if ($request->filled('edit_medications')) {
                    $risk->risk_diaMed = $request->edit_medications;
                }
                if ($request->filled('edit_polyphagia')) {
                    $risk->risk_diaSymp1 = $request->edit_polyphagia;
                }
                if ($request->filled('edit_polydipsia')) {
                    $risk->risk_diaSymp2 = $request->edit_polydipsia;
                }
                if ($request->filled('edit_polyuria')) {
                    $risk->risk_diaSymp3 = $request->edit_polyuria;
                }
                if ($request->filled('edit_rbg')) {
                    $risk->risk_glocuse = $request->edit_rbg;
                }
                if ($request->filled('edit_rbl')) {
                    $risk->risk_lipids = $request->edit_rbl;
                }
                if ($request->filled('edit_ketones')) {
                    $risk->risk_urKetones = $request->edit_ketones;
                }
                if ($request->filled('edit_protein')) {
                    $risk->risk_urProtein = $request->edit_protein;
                }
                if ($request->filled('edit_raManagement')) {
                    $risk->risk_management = $request->edit_raManagement;
                }
                if ($request->filled('edit_riskLevel')) {
                    $risk->risk_level = $request->edit_riskLevel;
                }
            // Signature
            if ($request->has('edit_signature1')) 
            {
                // Get the base64 encoded data from the request
                $signature1 = $request->input('edit_signature1');
            
                // Decode the data URL
                $signature1 = str_replace('data:image/png;base64,', '', $signature1);
                $signature1 = str_replace(' ', '+', $signature1);
                $signature1Data = base64_decode($signature1);
            
                // Generate a unique file name
                $signature1FileName = 'signature1_' . time() . '.png';
            
                // Save the signature to the public/images/Signature directory directly
                $filePath = public_path('images/Signature/' . $signature1FileName);
                file_put_contents($filePath, $signature1Data);
            
                // Save the file path to the risk model
                $risk->risk_signatureFirst = 'images/Signature/' . $signature1FileName; // Updated attribute name
            }
            
            if ($request->has('edit_signature2')) 
            {
                // Get the base64 encoded data from the request
                $signature2 = $request->input('edit_signature2');
            
                // Decode the data URL
                $signature2 = str_replace('data:image/png;base64,', '', $signature2);
                $signature2 = str_replace(' ', '+', $signature2);
                $signature2Data = base64_decode($signature2);
            
                // Generate a unique file name
                $signature2FileName = 'signature2_' . time() . '.png';
            
                // Save the signature to the public/images/Signature directory directly
                $filePath = public_path('images/Signature/' . $signature2FileName);
                file_put_contents($filePath, $signature2Data);
            
                // Save the file path to the risk model
                $risk->risk_signatureSecond = 'images/Signature/' . $signature2FileName; // Updated attribute name
            }
            
            if ($risk->save()) {
                return response()->json(['status' => 1, 'msg' => 'Risk Assessment Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update Risk Assessment Record.']);
            }
        }

        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }

    public function showRaForm($id)
    {
        $risk = risk_tbl::with('resident')->find($id);
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();

        $checkboxSmoker = json_decode($risk->risk_smoker, true);
        $checkboxDiabetes = json_decode($risk->risk_Diabetes, true);

        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'risk' => $risk,
            'checkboxSmoker' => $checkboxSmoker,
            'checkboxDiabetes' => $checkboxDiabetes,
        ];

        if (!$risk) {
            return redirect()->back()->with('error', 'Record not found.');
        }
        return view('dashboards/healthWorkerDb/riskAssessmentForm', $data);
    }
// END OF RISK ASSESSMENT

// FOR DSTB
    public function dstb(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        $dstb = dstb::with('resident')->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'dstb' => $dstb,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/dstb', $data);
    }

    public function dstbInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inputDiagnosingFac' => 'nullable|string',
            'inputNtpCode' => 'nullable|string',
            'inputProvinceHuc' => 'nullable|string',
            'inputRegion' => 'nullable|string',
            
            'inputPatient' => 'required|exists:resident_tbls,res_id',
            'inputPhilHealth' => 'nullable|string',
        
            'inputRefEmp' => 'required|exists:employee_tbls,em_id', 
            'inputRefLoc' => 'nullable|string',
            'refferedBy' => 'nullable|array',
            'screeningMode' => 'nullable|array',
            'dateScreening' => 'nullable|date',
        
            'testName' => 'nullable|array',
            'testName.*' => 'nullable|string',
            'othersDetails' => 'nullable|string',
            'dateTestXpert' => 'nullable|date',
            'dateTestSmear' => 'nullable|date',
            'dateTestChest' => 'nullable|date',
            'dateTestTuborculin' => 'nullable|date',
            'dateTestOther' => 'nullable|date',

            'resultTestXpert' => 'nullable|string',
            'resultTestSmear' => 'nullable|string',
            'resultTestChest' => 'nullable|string',
            'resultTestTuborculin' => 'nullable|string',
            'resultTestOther' => 'nullable|string',
        
            'tuberculosis' => 'nullable|string',
            'dateDiagnosis' => 'nullable|date',
            'tbCaseNum' => 'nullable|string',
            'dateNotif' => 'nullable|date',
            'attendingPhysician' => 'nullable|string',
            'refferedToName' => 'nullable|string',
            'refferedToAddress' => 'nullable|string',
            'refferedToFcode' => 'nullable|string',
            'refferedToProvHuc' => 'nullable|string',
            'refferedToRegion' => 'nullable|string',
        
            'Bacteriological' => 'nullable|string',
            'pulmonarySite' => 'nullable|string',
            'pulmonarySiteSpecifc' => 'nullable|string',
            'drugResistence' => 'nullable|array',
            'drugResistence.*' => 'nullable|string',
            'other_drug_resistant_tb_text' => 'nullable|string',
            'registration' => 'nullable|array',
            'registration.*' => 'nullable|string',
        ], [
            'string' => 'This Field Must Contain Letters/Words.',
            'date' => 'Date must be a valid date.',
        ]); 

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $dstb = new dstb;
            $dstb->dstb_inputDiagnosingFac = $request->inputDiagnosingFac;
            $dstb->dstb_inputNtpCode = $request->inputNtpCode;
            $dstb->dstb_inputProvinceHuc = $request->inputProvinceHuc;
            $dstb->dstb_inputRegion = $request->inputRegion;

            $dstb->res_id = $request->inputPatient;
            $dstb->dstb_inputPhilHealth = $request->inputPhilHealth;


            $dstb->em_id = $request->inputRefEmp;
            $dstb->dstb_inputRefLoc = $request->inputRefLoc;
            $dstb->dstb_refferedBy = isset($request->refferedBy) ? json_encode($request->refferedBy) : null;
            // $dstb->dstb_refferedBy = json_encode($request->refferedBy);
            $dstb->dstb_screeningMode = isset($request->screeningMode) ? json_encode($request->screeningMode) : null;
            // $dstb->dstb_screeningMode = json_encode($request->screeningMode);
            $dstb->dstb_dateScreening = $request->dateScreening;

            $dstb->dstb_testName = isset($request->testName) ? json_encode($request->testName) : null;
            // $dstb->dstb_testName = json_encode($request->testName);
            $dstb->dstb_othersDetails = $request->othersDetails;
            $dstb->dstb_dateTestXpert = $request->dateTestXpert;
            $dstb->dstb_dateTestSmear = $request->dateTestSmear;
            $dstb->dstb_dateTestChest = $request->dateTestChest;
            $dstb->dstb_dateTestTuborculin = $request->dateTestTuborculin;
            $dstb->dstb_dateTestOther = $request->dateTestOther;

            $dstb->dstb_resultTestXpert = $request->resultTestXpert;
            $dstb->dstb_resultTestSmear = $request->resultTestSmear;
            $dstb->dstb_resultTestChest = $request->resultTestChest;
            $dstb->dstb_resultTestTuborculin = $request->resultTestTuborculin;
            $dstb->dstb_resultTestOther = $request->resultTestOther;

            $dstb->dstb_tuberculosis = $request->tuberculosis;
            $dstb->dstb_dateDiagnosis = $request->dateDiagnosis;
            $dstb->dstb_tbCaseNumber = $request->tbCaseNum;
            $dstb->dstb_dateNotification = $request->dateNotif;
            $dstb->dstb_attendingPhysician = $request->attendingPhysician;
            $dstb->dstb_referredToName = $request->refferedToName;
            $dstb->dstb_referredToAddress = $request->refferedToAddress;
            $dstb->dstb_referredToFcode = $request->refferedToFcode;
            $dstb->dstb_referredToProvHuc = $request->refferedToProvHuc;
            $dstb->dstb_referredToRegion = $request->refferedToRegion;
            $dstb->dstb_bacteriologicalStatus = $request->Bacteriological;
            $dstb->dstb_pulmonarySite = $request->pulmonarySite;
            $dstb->dstb_specificPulmonarySite = $request->pulmonarySiteSpecifc;
            $dstb->dstb_drugResistance = isset($request->drugResistence) ? json_encode($request->drugResistence) : null;
            // $dstb->dstb_drugResistance = json_encode($request->drugResistence);
            $dstb->dstb_drugResistanceSpecific = $request->other_drug_resistant_tb_text;
            $dstb->dstb_registrationGroup = isset($request->registration) ? json_encode($request->registration) : null;
            // $dstb->dstb_registrationGroup = json_encode($request->registration);
            $dstb->dstb_status = 'Active TB';

            if ($dstb->save()) 
            {
                return response()->json(['status' => 1, 'msg' => 'New DSTB Patient Has Been Added']);
            } 
            else 
            {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new DSTB Patient'], 500);
            }
        }
    }

    public function getDstbData($dstb_id)
    {
        // Fetch the dstb record based on the ID, including the related resident information
        $dstb = dstb::with('resident')->find($dstb_id);

        if (!$dstb) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $dstb]);
    }

    public function updateDstb(Request $request)
    {
        $dstb = dstb::find($request->dstb_id);

        if ($dstb) {
            $dstb->dstb_id = $request->dstb_id;

            $dstb->dstb_inputDiagnosingFac = $request->Edit_inputDiagnosingFac;
            $dstb->dstb_inputNtpCode = $request->Edit_inputNtpCode;
            $dstb->dstb_inputProvinceHuc = $request->Edit_inputProvinceHuc;
            $dstb->dstb_inputRegion = $request->Edit_inputRegion;

            $dstb->dstb_inputPhilHealth = $request->Edit_inputPhilHealth;

            $dstb->dstb_inputRefLoc = $request->edit_inputRefLoc;
            $dstb->dstb_refferedBy = json_decode($request->edit_refferedBy, true);
            $dstb->dstb_screeningMode = json_decode($request->edit_screeningMode, true);
            $dstb->dstb_dateScreening = $request->edit_dateScreening;

            $dstb->dstb_testName = json_decode($request->edit_testName, true);
            $dstb->dstb_othersDetails = $request->edit_othersDetails;
            $dstb->dstb_dateTestXpert = $request->edit_dateTestXpert;
            $dstb->dstb_dateTestSmear = $request->edit_dateTestSmear;
            $dstb->dstb_dateTestChest = $request->edit_dateTestChest;
            $dstb->dstb_dateTestTuborculin = $request->edit_dateTestTuborculin;
            $dstb->dstb_dateTestOther = $request->edit_dateTestOther;
            $dstb->dstb_resultTestXpert = $request->edit_resultTestXpert;
            $dstb->dstb_resultTestSmear = $request->edit_resultTestSmear;
            $dstb->dstb_resultTestChest = $request->edit_resultTestChest;
            $dstb->dstb_resultTestTuborculin = $request->edit_resultTestTuborculin;
            $dstb->dstb_resultTestOther = $request->edit_resultTestOther;

            // $dstb->dstb_tuberculosis = $request->edit_tuberculosis;
            $dstb->dstb_dateDiagnosis = $request->edit_dateDiagnosis;
            $dstb->dstb_tbCaseNumber = $request->edit_tbCaseNum;
            $dstb->dstb_dateNotification = $request->edit_dateNotif;
            $dstb->dstb_attendingPhysician = $request->edit_attendingPhysician;

            $dstb->dstb_referredToName = $request->edit_refferedToName;
            $dstb->dstb_referredToAddress = $request->edit_refferedToAddress;
            $dstb->dstb_referredToFcode = $request->edit_refferedToFcode;
            $dstb->dstb_referredToProvHuc = $request->edit_refferedToProvHuc;
            $dstb->dstb_referredToRegion = $request->edit_refferedToRegion;

            // $dstb->dstb_bacteriologicalStatus = $request->edit_Bacteriological;
            // $dstb->dstb_pulmonarySite = $request->edit_pulmonarySite;
            $dstb->dstb_specificPulmonarySite = $request->edit_specificPulmonarySite;
            $dstb->dstb_drugResistance = json_decode($request->edit_drugResistence, true);
            $dstb->dstb_drugResistanceSpecific = $request->edit_other_drug_resistant_tb_text;
            $dstb->dstb_registrationGroup = json_decode($request->edit_registration, true);
            $dstb->dstb_status = $request->edit_inputStatus;

            if ($request->filled('edit_tuberculosis')) {
                $dstb->dstb_tuberculosis = $request->edit_tuberculosis;
            }

            if ($request->filled('edit_Bacteriological')) {
                $dstb->dstb_bacteriologicalStatus = $request->edit_Bacteriological;
            }

            if ($request->filled('edit_pulmonarySite')) {
                $dstb->dstb_pulmonarySite = $request->edit_pulmonarySite;
            }



            if ($dstb->save()) {
                return response()->json(['status' => 1, 'msg' => 'DSTB Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update DSTB Record.']);
            }
        }

        return response()->json(['status' => 0, 'msg' => 'DSTB not found.']);
    }

    public function updateDstbStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:dstb_tables,dstb_id', // Changed to 'id'
            'status' => 'required|string' // Changed to 'status'
        ]);

        $dstb = dstb::find($request->id); // Changed to 'id'
        $dstb->dstb_status = $request->status; // Ensure this is correctly set
        $dstb->save();

        return response()->json(['success' => true]);
    }

    public function showDstbForm($id)
    {
        $dstb = dstb::with('resident')->find($id);
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();

        $checkboxValues = json_decode($dstb->dstb_refferedBy, true);
        $checkboxScreen = json_decode($dstb->dstb_screeningMode, true);
        $checkboxTest = json_decode($dstb->dstb_testName, true);
        $checkboxDrug = json_decode($dstb->dstb_drugResistance, true);
        $checkboxRegister = json_decode($dstb->dstb_registrationGroup, true);

        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'dstb' => $dstb,
            'checkboxValues' => $checkboxValues,
            'checkboxScreen' => $checkboxScreen,
            'checkboxTest' => $checkboxTest,
            'checkboxDrug' => $checkboxDrug,
            'checkboxReg' => $checkboxRegister,
        ];

        if (!$dstb) {
            return redirect()->back()->with('error', 'DSTB record not found.');
        }
        return view('dashboards/healthWorkerDb/dstbForm', $data);
    }
// END OF DSTB

// FOR FP
    public function familyPlanning(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        
        // Fetch all residents
        $resident = resident_tbl::all();
        
        // Fetch family planning data with related client and spouse information
        $fp = fp_tbl::with(['client', 'spouse'])->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'fp' => $fp,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/familyPlanning', $data);
    }

    public function fpInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inputClient' => 'required|integer',
            'inputSpouse' => 'required|integer',
            'em_id' => 'required|String',
            //Postpone
                // 'fp_NoLivChild' => 'nullable|integer',
                // 'fp_planMoreChild' => 'nullable|in:Yes,No',
                // 'fp_monthlyIncome' => 'nullable|numeric',
                // 'fp_clientType' => 'nullable|in:New Acceptor,Current User',
                // 'fp_ifCurrent' => 'nullable|in:Changing Method,Changing Clinic,Dropout/Restart',
                // 'fp_reasonForFp' => 'nullable|in:Spacing,Limiting',
                // 'fp_reasonOthers' => 'nullable|string|max:50',
                // 'fp_reasonFp' => 'nullable|in:Medical Condition,Side Effects',
                // 'fp_sideEffects' => 'nullable|string|max:50',
                // 'fp_methodCurUse' => 'nullable|json',
                // 'fp_methodIud' => 'nullable|json',
                // 'fp_mhMigraine' => 'nullable|in:Yes,No',
                // 'fp_mhStroke' => 'nullable|in:Yes,No',
                // 'fp_mhHematoma' => 'nullable|in:Yes,No',
                // 'fp_mhBreast' => 'nullable|in:Yes,No',
                // 'fp_mhChestPain' => 'nullable|in:Yes,No',
                // 'fp_mhCough' => 'nullable|in:Yes,No',
                // 'fp_mhJaundice' => 'nullable|in:Yes,No',
                // 'fp_mhBleeding' => 'nullable|in:Yes,No',
                // 'fp_mhDischarge' => 'nullable|in:Yes,No',
                // 'fp_mhPhenobarbital' => 'nullable|in:Yes,No',
                // 'fp_mhSmoker' => 'nullable|in:Yes,No',
                // 'fp_mhDisability' => 'nullable|in:Yes,No',
                // 'fp_mhSpecific' => 'nullable|string|max:50',
                // 'fp_ohNpG' => 'nullable|integer',
                // 'fp_ohNpP' => 'nullable|integer',
                // 'fp_ohNpFt' => 'nullable|integer',
                // 'fp_ohNpPre' => 'nullable|integer',
                // 'fp_ohNpAbort' => 'nullable|integer',
                // 'fp_ohNpLc' => 'nullable|integer',
                // 'fp_ohDateLastDel' => 'nullable|date',
                // 'fp_ohTypeDel' => 'nullable|in:Vaginal,Cesarean Section',
                // 'fp_ohLastPeriod' => 'nullable|date',
                // 'fp_ohPrevPeriod' => 'nullable|date',
                // 'fp_ohMensFlow' => 'nullable|json',
                // 'fp_ohDysmenorrhea' => 'nullable|in:Yes,No',
                // 'fp_ohMole' => 'nullable|in:Yes,No',
                // 'fp_ohEctopic' => 'nullable|in:Yes,No',
                // 'fp_riskDischarge' => 'nullable|in:Yes,No',
                // 'fp_riskGenital' => 'nullable|in:Penis,Vagina',
                // 'fp_riskUlcer' => 'nullable|in:Yes,No',
                // 'fp_riskBurning' => 'nullable|in:Yes,No',
                // 'fp_riskHistory' => 'nullable|in:Yes,No',
                // 'fp_riskHiv' => 'nullable|in:Yes,No',
                // 'fp_vawPartner' => 'nullable|in:Yes,No',
                // 'fp_vawApprove' => 'nullable|in:Yes,No',
                // 'fp_vawHistory' => 'nullable|in:Yes,No',
                // 'fp_vawReferredto' => 'nullable|json',
                // 'fp_vawReferredtoSpecific' => 'nullable|string|max:50',
                // 'fp_peHt' => 'nullable|numeric',
                // 'fp_peWt' => 'nullable|numeric',
                // 'fp_peBp' => 'nullable|numeric',
                // 'fp_pePr' => 'nullable|numeric',
                // 'fp_peSkin' => 'nullable|json',
                // 'fp_peConjuctiva' => 'nullable|json',
                // 'fp_peNeck' => 'nullable|json',
                // 'fp_peBreast' => 'nullable|json',
                // 'fp_peAbdomen' => 'nullable|json',
                // 'fp_peExtremities' => 'nullable|json',
                // 'fp_pelIud' => 'nullable|json',
                // 'fp_pelCab' => 'nullable|json',
                // 'fp_pelCc' => 'nullable|json',
                // 'fp_pelUp' => 'nullable|json',
                // 'fp_pelUd' => 'nullable|numeric',
                // 'fp_q1' => 'nullable|in:Yes,No',
                // 'fp_q2' => 'nullable|in:Yes,No',
                // 'fp_q3' => 'nullable|in:Yes,No',
                // 'fp_q4' => 'nullable|in:Yes,No',
                // 'fp_q5' => 'nullable|in:Yes,No',
                // 'fp_q6' => 'nullable|in:Yes,No',
                // 'fp_status' => 'nullable|string|max:15',
                // 'em_id' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fp = new fp_tbl;
            $fp->fp_phNum = $request->fpPhNum;
            $fp->fp_nhts = $request->fpNhts;
            $fp->fp_4ps = $request->fp4Ps;
            $fp->fp_clientId = $request->inputClient;
            $fp->fp_spouseId = $request->inputSpouse;
            $fp->fp_NoLivChild = $request->fpLiveChild;
            $fp->fp_planMoreChild = $request->children;
            $fp->fp_monthlyIncome = $request->fpIncome;
            $fp->fp_clientType = $request->fpClientType;
            $fp->fp_ifCurrent = $request->fpClientTypeff;
            $fp->fp_reasonForFp = $request->fpReasonFp;
            $fp->fp_reasonOthers = $request->fpReasonOtherFp;
            $fp->fp_reasonFp = $request->fpReason;
            $fp->fp_sideEffects = $request->fpReasonSpecifySs;
            $fp->fp_methodCurUse = isset($request->method) ? json_encode($request->method) : null;
            $fp->fp_otherMethod = $request->other_specify;
            $fp->fp_methodIud = isset($request->methodIud) ? json_encode($request->methodIud) : null;
            $fp->fp_mhMigraine = $request->fpMigraine;
            $fp->fp_mhStroke = $request->fpStroke;
            $fp->fp_mhHematoma = $request->fpHematoma;
            $fp->fp_mhBreast = $request->fpBreast;
            $fp->fp_mhChestPain = $request->fpChest;
            $fp->fp_mhCough = $request->fpCough;
            $fp->fp_mhJaundice = $request->fpJaundice;
            $fp->fp_mhBleeding = $request->fpVBleed;
            $fp->fp_mhDischarge = $request->fpDischarge;
            $fp->fp_mhPhenobarbital = $request->fpIntake;
            $fp->fp_mhSmoker = $request->fpSmoker;
            $fp->fp_mhDisablity = $request->fpDisability;
            $fp->fp_mhSpecific = $request->disabilityDetails;
            $fp->fp_ohNpG = $request->fpNumG;
            $fp->fp_ohNpP = $request->fpNumP;
            $fp->fp_ohNpFt = $request->fpNumFullTerm;
            $fp->fp_ohNpPre = $request->fpNumPremature;
            $fp->fp_ohNpAbort = $request->fpNumAbortion;
            $fp->fp_ohNpLc = $request->fpNumLivingChildren;
            $fp->fp_ohDateLastDel = $request->dateLastDelivery;
            $fp->fp_ohTypeDel = $request->deliveryType;
            $fp->fp_ohLastPeriod = $request->dateLastPeriod;
            $fp->fp_ohPrevPeriod = $request->datePrevPeriod;
            $fp->fp_ohMensFlow = isset($request->fpMenstrualFlow) ? json_encode($request->fpMenstrualFlow) : null;
            $fp->fp_ohDysmenorrhea = $request->fpDys;
            $fp->fp_ohMole = $request->fpHyda;
            $fp->fp_ohEctopic = $request->fpEcto;
            $fp->fp_riskDischarge = $request->stiFaqAd;
            $fp->fp_riskGenital = $request->stiFaqGenital;
            $fp->fp_riskUlcer = $request->stiFaqSu;
            $fp->fp_riskBurning = $request->stiFaqPb;
            $fp->fp_riskHistory = $request->stiFaqTreatment;
            $fp->fp_riskHiv = $request->stiFaqHiv;
            $fp->fp_vawPartner = $request->fpUnpleasant;
            $fp->fp_vawApprove = $request->fpNotApprove;
            $fp->fp_vawHistory = $request->fpVaw;
            $fp->fp_vawRefferedto = isset($request->fpRefferedVaw) ? json_encode($request->fpRefferedVaw) : null;
            $fp->fp_vawRefferedtoSpecific = $request->othersVaw;
            $fp->fp_peHt = $request->fpinputOHt;
            $fp->fp_peWt = $request->fpinputOWt;
            $fp->fp_peBp = $request->fpinputBp;
            $fp->fp_pePr = $request->fpinputPr;
            $fp->fp_peSkin = isset($request->fpPeSkin) ? json_encode($request->fpPeSkin) : null;
            $fp->fp_peConjuctiva = isset($request->fpPeConj) ? json_encode($request->fpPeConj) : null;
            $fp->fp_peNeck = isset($request->fpPeNeck) ? json_encode($request->fpPeNeck) : null;


            $fp->fp_peBreast = isset($request->fpPeBreast) ? json_encode($request->fpPeBreast) : null;
            $fp->fp_peAbdomen = isset($request->fpPeAbdomen) ? json_encode($request->fpPeAbdomen) : null;
            $fp->fp_peExtremities = isset($request->fpPeExtremities) ? json_encode($request->fpPeExtremities) : null;
            $fp->fp_pelIud = isset($request->fpPelExIud) ? json_encode($request->fpPelExIud) : null;
            $fp->fp_pelCab = isset($request->fpPelExIudCab) ? json_encode($request->fpPelExIudCab) : null;
            $fp->fp_pelCc = isset($request->fpPelExIudCerCon) ? json_encode($request->fpPelExIudCerCon) : null;
            $fp->fp_pelUp = isset($request->fpPelExIudUtPo) ? json_encode($request->fpPelExIudUtPo) : null;

            $fp->fp_pelUd = $request->fpPelExUd;
            $fp->fp_q1 = $request->fpFaq1;
            $fp->fp_q2 = $request->fpFaq2;
            $fp->fp_q3 = $request->fpFaq3;
            $fp->fp_q4 = $request->fpFaq4;
            $fp->fp_q5 = $request->fpFaq5;
            $fp->fp_q6 = $request->fpFaq6;
            $fp->fp_status = "Active";
            $fp->em_id = $request->em_id;

            // Save the record in the database
            if ($fp->save()) {
                return response()->json(['status' => 1, 'msg' => 'Family Planning record added successfully!']);
            }
            else {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new Family Planning record'], 500);
            }
        }
    }

    public function getFpData($fp_id)
    {
        // Fetch the FP record based on the ID, including the related resident information
        $fp = fp_tbl::with(['client', 'spouse'])->find($fp_id);

        if (!$fp) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $fp]);
    }

    public function updateFp(Request $request)
    {
        $fp = fp_tbl::find($request->fp_id);

        if ($fp) {
            $fp->fp_id = $request->fp_id;

            // TextBox
                $fp->fp_phNum = $request->edit_fpPhNum;
                $fp->fp_clientId = $request->edit_inputClient;
                $fp->fp_spouseId = $request->edit_inputSpouse;
                $fp->em_id = $request->edit_em_id;
                $fp->fp_NoLivChild = $request->edit_fpLiveChild;
                $fp->fp_monthlyIncome = $request->edit_fpIncome;
                $fp->fp_reasonOthers = $request->edit_fpReasonOtherFp;
                $fp->fp_sideEffects = $request->edit_fpReasonSpecifySs;
                $fp->fp_otherMethod = $request->edit_other_specify;

                $fp->fp_mhSpecific = $request->edit_disabilityDetails;

                $fp->fp_ohNpG = $request->edit_fpNumG;
                $fp->fp_ohNpP = $request->edit_fpNumP;
                $fp->fp_ohNpFt = $request->edit_fpNumFullTerm;
                $fp->fp_ohNpPre = $request->edit_fpNumPremature;
                $fp->fp_ohNpAbort = $request->edit_fpNumAbortion;
                $fp->fp_ohNpLc = $request->edit_fpNumLivingChildren;
                $fp->fp_ohDateLastDel = $request->edit_dateLastDelivery;
                $fp->fp_ohLastPeriod = $request->edit_dateLastPeriod;
                $fp->fp_ohPrevPeriod = $request->edit_datePrevPeriod;

                $fp->fp_vawRefferedtoSpecific = $request->edit_othersVaw;

                $fp->fp_peHt = $request->edit_fpinputOHt;
                $fp->fp_peWt = $request->edit_fpinputOWt;
                $fp->fp_peBp = $request->edit_fpinputBp;
                $fp->fp_pePr = $request->edit_fpinputPr;
                $fp->fp_pelUd = $request->edit_fpPelExUd;

                $fp->fp_status = $request->edit_fpStatus;

            // Checkbox
                $fp->fp_methodCurUse = json_decode($request->edit_method, true);
                $fp->fp_methodIud = json_decode($request->edit_methodIud, true);
                $fp->fp_ohMensFlow = json_decode($request->edit_fpMenstrualFlow, true);
                $fp->fp_vawRefferedto = json_decode($request->edit_fpRefferedVaw, true);
                $fp->fp_peSkin = json_decode($request->edit_fpPeSkin, true);
                $fp->fp_peConjuctiva = json_decode($request->edit_fpPeConj, true);
                $fp->fp_peNeck = json_decode($request->edit_fpPeNeck, true);
                $fp->fp_peBreast = json_decode($request->edit_fpPeBreast, true);
                $fp->fp_peAbdomen = json_decode($request->edit_fpPeAbdomen, true);
                $fp->fp_peExtremities = json_decode($request->edit_fpPeExtremities, true);
                $fp->fp_pelIud = json_decode($request->edit_fpPelExIud, true);
                $fp->fp_pelCab = json_decode($request->edit_fpPelExIudCab, true);
                $fp->fp_pelCc = json_decode($request->edit_fpPelExIudCerCon, true);
                $fp->fp_pelUp = json_decode($request->edit_fpPelExIudUtPo, true);
            // Radio
                if ($request->filled('edit_fpNhts')) {
                    $fp->fp_nhts = $request->edit_fpNhts;
                }

                if ($request->filled('edit_fp4Ps')) {
                    $fp->fp_4ps = $request->edit_fp4Ps;
                }

                if ($request->filled('edit_children')) {
                    $fp->fp_planMoreChild = $request->edit_children;
                }
                if ($request->filled('edit_fpClientType')) {
                    $fp->fp_clientType = $request->edit_fpClientType;
                }
                if ($request->filled('edit_fpClientTypeff')) {
                    $fp->fp_ifCurrent = $request->edit_fpClientTypeff;
                }
                if ($request->filled('edit_fpReasonFp')) {
                    $fp->fp_reasonForFp = $request->edit_fpReasonFp;
                }
                if ($request->filled('edit_fpReason')) {
                    $fp->fp_reasonFp = $request->edit_fpReason;
                }
                if ($request->filled('edit_fpMigraine')) {
                    $fp->fp_mhMigraine = $request->edit_fpMigraine;
                }
                if ($request->filled('edit_fpStroke')) {
                    $fp->fp_mhStroke = $request->edit_fpStroke;
                }
                if ($request->filled('edit_fpHematoma')) {
                    $fp->fp_mhHematoma = $request->edit_fpHematoma;
                }
                if ($request->filled('edit_fpBreast')) {
                    $fp->fp_mhBreast = $request->edit_fpBreast;
                }
                if ($request->filled('edit_fpChest')) {
                    $fp->fp_mhChestPain = $request->edit_fpChest;
                }
                if ($request->filled('edit_fpCough')) {
                    $fp->fp_mhCough = $request->edit_fpCough;
                }
                if ($request->filled('edit_fpJaundice')) {
                    $fp->fp_mhJaundice = $request->edit_fpJaundice;
                }
                if ($request->filled('edit_fpVBleed')) {
                    $fp->fp_mhBleeding = $request->edit_fpVBleed;
                }
                if ($request->filled('edit_fpDischarge')) {
                    $fp->fp_mhDischarge = $request->edit_fpDischarge;
                }
                if ($request->filled('edit_fpIntake')) {
                    $fp->fp_mhPhenobarbital = $request->edit_fpIntake;
                }
                if ($request->filled('edit_fpSmoker')) {
                    $fp->fp_mhSmoker = $request->edit_fpSmoker;
                }
                if ($request->filled('edit_fpDisability')) {
                    $fp->fp_mhDisablity = $request->edit_fpDisability;
                }
                if ($request->filled('edit_deliveryType')) {
                    $fp->fp_ohTypeDel = $request->edit_deliveryType;
                }
                if ($request->filled('edit_fpDys')) {
                    $fp->fp_ohDysmenorrhea = $request->edit_fpDys;
                }
                if ($request->filled('edit_fpHyda')) {
                    $fp->fp_ohMole = $request->edit_fpHyda;
                }
                if ($request->filled('edit_fpEcto')) {
                    $fp->fp_ohEctopic = $request->edit_fpEcto;
                }
                if ($request->filled('edit_stiFaqAd')) {
                    $fp->fp_riskDischarge = $request->edit_stiFaqAd;
                }
                if ($request->filled('edit_stiFaqGenital')) {
                    $fp->fp_riskGenital = $request->edit_stiFaqGenital;
                }
                if ($request->filled('edit_stiFaqSu')) {
                    $fp->fp_riskUlcer = $request->edit_stiFaqSu;
                }
                if ($request->filled('edit_stiFaqPb')) {
                    $fp->fp_riskBurning = $request->edit_stiFaqPb;
                }
                if ($request->filled('edit_stiFaqTreatment')) {
                    $fp->fp_riskHistory = $request->edit_stiFaqTreatment;
                }
                if ($request->filled('edit_stiFaqHiv')) {
                    $fp->fp_riskHiv = $request->edit_stiFaqHiv;
                }
                if ($request->filled('edit_fpUnpleasant')) {
                    $fp->fp_vawPartner = $request->edit_fpUnpleasant;
                }
                if ($request->filled('edit_fpNotApprove')) {
                    $fp->fp_vawApprove = $request->edit_fpNotApprove;
                }
                if ($request->filled('edit_fpVaw')) {
                    $fp->fp_vawHistory = $request->edit_fpVaw;
                }
                if ($request->filled('edit_fpFaq1')) {
                    $fp->fp_q1 = $request->edit_fpFaq1;
                }
                if ($request->filled('edit_fpFaq2')) {
                    $fp->fp_q2 = $request->edit_fpFaq2;
                }
                if ($request->filled('edit_fpFaq3')) {
                    $fp->fp_q3 = $request->edit_fpFaq3;
                }
                if ($request->filled('edit_fpFaq4')) {
                    $fp->fp_q4 = $request->edit_fpFaq4;
                }
                if ($request->filled('edit_fpFaq5')) {
                    $fp->fp_q5 = $request->edit_fpFaq5;
                }
                if ($request->filled('edit_fpFaq6')) {
                    $fp->fp_q6 = $request->edit_fpFaq6;
                }

            if ($fp->save()) {
                return response()->json(['status' => 1, 'msg' => 'FP Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update FP Record.']);
            }
        }

        return response()->json(['status' => 0, 'msg' => 'OPT not found.']);
    }

    // public function fpSideB(Request $request)
    // {
    //     $rules = [
    //         'fpDateVisit' => 'required',
    //         'fpMedFind' => 'required',
    //         'fpMetAcc' => 'required',
    //         'fpDateFfVisit' => 'required',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, [
    //         'required' => 'This Field is Required.',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    //     }

    //     DB::beginTransaction();

    //     try {
    //         $fp = new fpSideB_tbl;
    //         $fp->fp_id = $request->fp_id;
    //         $fp->em_id = $request->sideBEm_id;
    //         $fp->sideB_dateVisit = $request->fpDateVisit;
    //         $fp->sideB_MedFinds = $request->fpMedFind;
    //         $fp->sideB_metAcc = $request->fpMetAcc;
    //         $fp->sideB_followUpVisit = $request->fpDateFfVisit;

    //         if ($fp->save()) {
    //             // Now create the sched_tbl record with vt_id as a foreign key
    //             if ($request->filled('fpDateFfVisit')) {
    //                 $schedule = new sched_tbl;
    //                 $schedule->sideB_id = $fp->sideB_id;
    //                 $schedule->sched_desc = 'Family Planning Schedule'; 
    //                 $schedule->save();
    //             }

    //             DB::commit();
    //             return response()->json(['status' => 1, 'msg' => 'Side-B Record Added Successfully']);
    //         } else {
    //             DB::rollBack();
    //             return response()->json(['status' => 0, 'msg' => 'Failed to add Side-B Record'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['status' => 0, 'msg' => 'An error occurred'], 500);
    //     }
    // }

    public function fpSideB(Request $request)
    {
        $rules = [
            'fpDateVisit' => 'required',
            'fpMedFind' => 'required',
            'fpMetAcc' => 'required',
            'fpDateFfVisit' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'required' => 'This Field is Required.',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        DB::beginTransaction();

        try {
            // Find the previous Side-B record for the same patient (fp_id) with a follow-up visit
            $previousSideB = fpSideB_tbl::where('fp_id', $request->fp_id)
                ->whereNotNull('sideB_followUpVisit') // Only consider records with a next follow-up visit
                ->orderBy('sideB_id', 'desc')  // Get the latest record by sideB_id
                ->first();

            // If a previous record exists, check if the fpDateVisit matches the previous sideB_followUpVisit
            if ($previousSideB && $request->fpDateVisit === $previousSideB->sideB_followUpVisit) {
                // Update the previous schedule's status to "Completed"
                $previousSchedule = sched_tbl::where('sideB_id', $previousSideB->sideB_id)->first();

                if ($previousSchedule) {
                    $previousSchedule->sched_status = 'Completed';
                    $previousSchedule->save();
                }
            }

            // Create a new Side-B record
            $fp = new fpSideB_tbl;
            $fp->fp_id = $request->fp_id;
            $fp->em_id = $request->sideBEm_id;
            $fp->sideB_dateVisit = $request->fpDateVisit;
            $fp->sideB_MedFinds = $request->fpMedFind;
            $fp->sideB_metAcc = $request->fpMetAcc;
            $fp->sideB_followUpVisit = $request->fpDateFfVisit;

            if ($fp->save()) {
                // Create the schedule record with sideB_id as a foreign key
                if ($request->filled('fpDateFfVisit')) 
                {
                    $schedule = new sched_tbl;
                    $schedule->sideB_id = $fp->sideB_id;
                    $schedule->sched_desc = 'Family Planning Schedule';
                    $schedule->sched_status = 'Scheduled';
                    $schedule->save();
                }

                DB::commit();
                return response()->json(['status' => 1, 'msg' => 'Side-B Record Added Successfully']);
            } else {
                DB::rollBack();
                return response()->json(['status' => 0, 'msg' => 'Failed to add Side-B Record'], 500);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 0, 'msg' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    public function fpForm($id)
    {
        $currentYear = Carbon::now()->year;

        $fp = fp_tbl::with(['client', 'spouse'])->where('fp_id', $id)->first();
        $fpSideB = fpSideB_tbl::with('employee')->where('fp_id', $id)->whereYear('created_at', $currentYear)->orderBy('created_at', 'desc')->get();
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();

        $dob = new \DateTime($fp->client->res_bdate);
        $age = $dob->diff(new \DateTime())->y;

        $dobSpouse = new \DateTime($fp->spouse->res_bdate ?? 'now');
        $ageSpouse = $dobSpouse->diff(new \DateTime())->y;


        $checkboxTest = json_decode($fp->fp_methodCurUse, true);
        $checkboxTestIud = json_decode($fp->fp_methodIud, true);
        $checkboxFlow = json_decode($fp->fp_ohMensFlow, true);
        $checkboxRef = json_decode($fp->fp_vawRefferedto, true);
        $checkboxSkin = json_decode($fp->fp_peSkin, true);
        $checkboxConj = json_decode($fp->fp_peConjuctiva, true);
        $checkboxNeck = json_decode($fp->fp_peNeck, true);
        $checkboxBreast = json_decode($fp->fp_peBreast, true);
        $checkboxAbdo = json_decode($fp->fp_peAbdomen, true);
        $checkboxExtr = json_decode($fp->fp_peExtremities, true);
        $checkboxIud = json_decode($fp->fp_pelIud, true);
        $checkboxCab = json_decode($fp->fp_pelCab, true);
        $checkboxCc = json_decode($fp->fp_pelCc, true);
        $checkboxUp = json_decode($fp->fp_pelUp, true);



        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'fp' => $fp,
            'fpSideB' => $fpSideB,
            'age' => $age,
            'ageSpouse' => $ageSpouse,
            'checkboxRef' => $checkboxRef,
            'checkboxTest' => $checkboxTest,
            'checkboxTestIud' => $checkboxTestIud,
            'checkboxFlow' => $checkboxFlow,

            'checkboxSkin' => $checkboxSkin,
            'checkboxConj' => $checkboxConj,
            'checkboxNeck' => $checkboxNeck,
            'checkboxBreast' => $checkboxBreast,
            'checkboxAbdo' => $checkboxAbdo,
            'checkboxExtr' => $checkboxExtr,
            'checkboxIud' => $checkboxIud,
            'checkboxCab' => $checkboxCab,
            'checkboxCc' => $checkboxCc,
            'checkboxUp' => $checkboxUp,
        ];

        if (!$fp) {
            return redirect()->back()->with('error', 'FP record not found.');
        }
        return view('dashboards/healthWorkerDb/fpForm', $data);
    }

    public function updateFpSideB(Request $request)
    {
        $fpSideB = fpSideB_tbl::find($request->edit_fpSideB_id);
        
        if ($fpSideB) {
            // Log for debugging
            Log::info('Updating FP_tbl record for sideB_id: ' . $request->edit_fpSideB_id);
    
            // Store original Next Schedule value to detect changes
            $originalNextSchedule = $fpSideB->sideB_followUpVisit;
    
            // Update fields in FP_tbl
            $fpSideB->sideB_dateVisit = $request->edit_fpDateVisit;
            $fpSideB->sideB_MedFinds = $request->edit_fpMedFind;
            $fpSideB->sideB_metAcc = $request->edit_fpMetAcc;
            $fpSideB->sideB_followUpVisit = $request->edit_fpDateFfVisit;
    
            if ($fpSideB->save()) {
                // Log successful save
                Log::info('FP_tbl updated successfully for sideB_id: ' . $request->edit_fpSideB_id);
    
                // Only perform CRUD on sched_tbl if the Next Schedule value has changed
                if ($request->edit_fpDateFfVisit !== $originalNextSchedule) {
                    // If Next Schedule is filled, create or update sched_tbl
                    if ($request->filled('edit_fpDateFfVisit')) {
                        Log::info('Next schedule provided, updating or creating sched_tbl for sideB_id: ' . $fpSideB->sideB_id);
    
                        sched_tbl::updateOrCreate(
                            ['sideB_id' => $fpSideB->sideB_id],
                            ['sched_desc' => 'Family Planning Schedule']
                        );
                    } else {
                        // If Next Schedule is empty, delete any existing sched_tbl record
                        Log::info('No next schedule provided, deleting sched_tbl record if it exists for sideB_id: ' . $fpSideB->sideB_id);
    
                        sched_tbl::where('sideB_id', $fpSideB->sideB_id)->delete();
                    }
                } else {
                    Log::info('Next schedule remains unchanged; no action taken on sched_tbl.');
                }
    
                return response()->json(['status' => 1, 'msg' => 'Record updated successfully.']);
            } else {
                Log::error('Failed to save vaccineTaken_tbl record for sideB_id: ' . $request->edit_fpSideB_id);
                return response()->json(['status' => 0, 'msg' => 'Failed to update record.']);
            }
        }
        
        Log::error('Record not found for sideB_id: ' . $request->edit_fpSideB_id);
        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }

    public function updateFpStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:fp_tbls,fp_id', // Changed to 'id'
            'status' => 'required|string' // Changed to 'status'
        ]);

        $fp = fp_tbl::find($request->id); // Changed to 'id'
        $fp->fp_status = $request->status; // Ensure this is correctly set
        $fp->save();

        return response()->json(['success' => true]);
    }
// END OF FP

// RHU
    public function rhu(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        
        // Fetch all residents
        $resident = resident_tbl::all();
        
        // Fetch family planning data with related client and spouse information
        $rhu = rhu_tbl::with(['resident'])->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'rhu' => $rhu,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/rhu', $data);
    }

    public function rhuInput(Request $request)
    {
        // Validator for the input fields
        $validator = Validator::make($request->all(), [
            'rhuFullName' => 'required|integer', // res_id
            'referFnum' => 'required|integer', // rhu_familyNum
            'referFrom' => 'required|string', // em_id
            'referTo' => 'required|string', // rhu_referredTo
            'referSubFind' => 'required|string', // rhu_subjectFinding
            'referPhMem' => 'required|in:Yes,No', // rhu_phMember (radio)
            'referPhDep' => 'required|in:Yes,No', // rhu_dependent (radio)
            'referPhPri' => 'required|in:Yes,No', // rhu_private (radio)
            'referPhic' => 'required|string', // rhu_phicNum
            'referTemp' => 'required|numeric', // rhu_temp
            'referPulse' => 'required|integer', // rhu_pr (Pulse rate)
            'referResp' => 'required|integer', // rhu_rr (Respiratory rate)
            'referBp' => 'required|string', // rhu_bp (Blood pressure)
            'referWeight' => 'required|numeric', // rhu_wt (Weight)
            'referReason' => 'required|string', // rhu_reason
            'referDiagnosis' => 'required|string', // rhu_diagnosis
            'referTreatment' => 'required|string', // rhu_treatment
            'referRfngLvl' => 'required|string', // rhu_referringLvl
            'referRfLvl' => 'required|string', // rhu_referredLvl
        ]);


        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $rhu = new rhu_tbl;

            $rhu->res_id = $request->rhuFullName;
            $rhu->rhu_familyNum = $request->referFnum;
            $rhu->em_id = $request->referFrom;
            $rhu->rhu_referredTo = $request->referTo;
            $rhu->rhu_subjectFinding = $request->referSubFind;
            $rhu->rhu_phMember = $request->referPhMem;
            $rhu->rhu_dependent = $request->referPhDep;
            $rhu->rhu_private = $request->referPhPri;
            $rhu->rhu_phicNum = $request->referPhic;
            $rhu->rhu_temp = $request->referTemp;
            $rhu->rhu_pr = $request->referPulse;
            $rhu->rhu_rr = $request->referResp;
            $rhu->rhu_bp = $request->referBp;
            $rhu->rhu_wt = $request->referWeight;
            $rhu->rhu_reason = $request->referReason;
            $rhu->rhu_diagnosis = $request->referDiagnosis;
            $rhu->rhu_treatment = $request->referTreatment;
            $rhu->rhu_referringLvl = $request->referRfngLvl;
            $rhu->rhu_referredLvl = $request->referRfLvl;
            $rhu->rhu_status = 'Completed';
            
            if ($rhu->save()) {
                return response()->json(['status' => 1, 'msg' => 'RHU record added successfully!']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new RHU record'], 500);
            }
        }
    }

    public function getRhuData($rhu_id)
    {
        $currentYear = now()->year;

        $rhu = rhu_tbl::with('resident')
            ->where('rhu_id', $rhu_id)
            ->whereYear('created_at', $currentYear)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$rhu) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $rhu]);
    }

    public function updateRhu(Request $request)
    {
        // Find the RHU record by ID
        $rhu = rhu_tbl::find($request->rhu_id);

        // Check if the record exists
        if ($rhu) {
            // Update the fields from the request

            // Text fields
            $rhu->res_id = $request->edit_rhuFullName;
            $rhu->rhu_familyNum = $request->edit_referFnum;
            $rhu->em_id = $request->edit_referFrom;
            $rhu->rhu_referredTo = $request->edit_referTo;
            $rhu->rhu_subjectFinding = $request->edit_referSubFind;
            $rhu->rhu_phicNum = $request->edit_referPhic;
            $rhu->rhu_temp = $request->edit_referTemp;
            $rhu->rhu_pr = $request->edit_referPulse;
            $rhu->rhu_rr = $request->edit_referResp;
            $rhu->rhu_bp = $request->edit_referBp;
            $rhu->rhu_wt = $request->edit_referWeight;
            $rhu->rhu_reason = $request->edit_referReason;
            $rhu->rhu_diagnosis = $request->edit_referDiagnosis;
            $rhu->rhu_treatment = $request->edit_referTreatment;
            $rhu->rhu_referringLvl = $request->edit_referRfngLvl;
            $rhu->rhu_referredLvl = $request->edit_referRfLvl;
            $rhu->rhu_status = $request->edit_referStatus;

            // Radio buttons for membership status
            if ($request->filled('edit_referPhMem')) {
                $rhu->rhu_phMember = $request->edit_referPhMem;
            }

            if ($request->filled('edit_referPhDep')) {
                $rhu->rhu_dependent = $request->edit_referPhDep;
            }

            if ($request->filled('edit_referPhPri')) {
                $rhu->rhu_private = $request->edit_referPhPri;
            }

            // Save the record and return a response
            if ($rhu->save()) {
                return response()->json(['status' => 1, 'msg' => 'RHU Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update RHU Record.']);
            }
        }

        // If the record is not found
        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }

    public function rhuForm($id)
    {
        $currentYear = Carbon::now()->year;

        $rhu = rhu_tbl::with(['resident', 'employee'])->where('rhu_id', $id)->first();
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();

        $dob = new \DateTime($rhu->resident->res_bdate);
        $age = $dob->diff(new \DateTime())->y;

        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'rhu' => $rhu,
            'age' => $age,
        ];

        if (!$rhu) {
            return redirect()->back()->with('error', 'RHU record not found.');
        }
        return view('dashboards/healthWorkerDb/rhuForm', $data);
    }
// END OF RHU

// DENGUE
    public function dengue(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        $dengue = dengue_tbl::with('resident')->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'dengue' => $dengue,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');


        // Pass the data to the view
        return view('dashboards/healthWorkerDb/dengue', $data);
    }

    public function dengueInput(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dengueFullName' => 'required|string',
            'dengueDateSymp' => 'required|date',
            'dengueScPl' => 'required|string',
            'dengueInSymp' => 'required|string',
            'dengueDateFever' => 'required|date',
        ], [
            'dengueFullName.required' => 'This Field is required.',
            'dengueDateSymp.required' => 'This Field is required.',
            'dengueScPl.required' => 'This Field is required.',
            'dengueInSymp.required' => 'This Field is required.',
            'dengueDateFever.required' => 'This Field is required.',
        ]); 

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $dengue = new dengue_tbl;
            $dengue->res_id = $request->dengueFullName;
            $dengue->dengue_date = $request->dengueDateSymp;
            $dengue->dengue_place = $request->dengueScPl;
            $dengue->dengue_initialSymp = $request->dengueInSymp;
            $dengue->dengue_dateOnSetFever = $request->dengueDateFever;
            $dengue->dengue_high = $request->dengueTempHigh;
            $dengue->dengue_moderate = $request->dengueTempMod;
            $dengue->dengue_slight = $request->dengueTempSli;
            $dengue->dengue_dateOfFever = $request->dengueStartDateSymp;
            $dengue->dengue_durationFever = $request->dengueDurFev;
            $dengue->dengue_medTake = $request->dengueMedTake;
            $dengue->dengue_hospitalized = $request->dengueHosp;
            $dengue->dengue_inclusiveDate = $request->dengueIncDate;
            $dengue->dengue_hospWhen = $request->dengueWhen;
            $dengue->dengue_hospLong = $request->dengueHowLong;
            $dengue->dengue_outcome = $request->dengueOutcome;
            $dengue->dengue_hisTravel = $request->dengueTravelHist;
            $dengue->dengue_whereTravel = $request->dengueTravelWhere;
            $dengue->dengue_exposed = $request->dengueExpPer;
            $dengue->dengue_animalsSpecify = $request->dengueAnimalSpecify;
            $dengue->dengue_waterInSpecify = $request->dengueWaterConSpecific;
            $dengue->dengue_waterOutSpecify = $request->dengueWaterContainersSpec;
            $dengue->dengue_doorWindow = $request->dengueDoor;
            $dengue->em_id = $request->dengueByName;
            $dengue->dengue_adminDate = $request->dengueAdDate;
            $dengue->dengue_adminBrgy = $request->dengueAdBrgy;
            $dengue->dengue_adminSitio = $request->dengueAdSitio;
            $dengue->dengue_adminMunicipality = $request->dengueAdMunicipality;
            $dengue->dengue_signSymp = isset($request->dengueSignSymp) ? json_encode($request->dengueSignSymp) : null;
            $dengue->dengue_tests = isset($request->dengueTests) ? json_encode($request->dengueTests) : null;
            $dengue->dengue_nameContact = isset($request->dengueNameContact) ? json_encode($request->dengueNameContact) : null;
            $dengue->dengue_addressContact = isset($request->dengueAddressContact) ? json_encode($request->dengueAddressContact) : null;
            $dengue->dengue_animals = isset($request->dengueAnimalPres) ? json_encode($request->dengueAnimalPres) : null;
            $dengue->dengue_waterConIn = isset($request->dengueWaterCon) ? json_encode($request->dengueWaterCon) : null;
            $dengue->dengue_waterConOut = isset($request->dengueWaterContainers) ? json_encode($request->dengueWaterContainers) : null;
            $dengue->dengue_status = 'Pending Diagnosis';

            if ($dengue->save()) 
            {
                return response()->json(['status' => 1, 'msg' => 'New Dengue Patient Has Been Added']);
            } 
            else 
            {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new Dengue Patient'], 500);
            }
        }
    }

    public function getDengueData($dengue_id)
    {
        $currentYear = now()->year;

        $risk = dengue_tbl::with('resident')
            ->where('dengue_id', $dengue_id)
            ->whereYear('created_at', $currentYear)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$risk) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $risk]);
    }

    public function updateDengue(Request $request)
    {
        $dengue = dengue_tbl::find($request->dengue_id);

        if ($dengue) {
            $dengue->dengue_id = $request->edit_dengueId;

            // TextBox
                $dengue->res_id = $request->edit_dengueFullName;
                $dengue->dengue_date = $request->edit_dengueDateSymp;
                $dengue->dengue_place = $request->edit_dengueScPl;
                $dengue->dengue_initialSymp = $request->edit_dengueInSymp;
                $dengue->dengue_dateOnSetFever = $request->edit_dengueDateFever;
                $dengue->dengue_high = $request->edit_dengueTempHigh;
                $dengue->dengue_moderate = $request->edit_dengueTempMod;
                $dengue->dengue_slight = $request->edit_dengueTempSli;
                $dengue->dengue_dateOfFever = $request->edit_dengueStartDateSymp;
                $dengue->dengue_durationFever = $request->edit_dengueDurFev;
                $dengue->dengue_medTake = $request->edit_dengueMedTake;
                $dengue->dengue_inclusiveDate = $request->edit_dengueIncDate;
                $dengue->dengue_hospWhen = $request->edit_dengueWhen;
                $dengue->dengue_hospLong = $request->edit_dengueHowLong;
                $dengue->dengue_whereTravel = $request->edit_dengueTravelWhere;
                $dengue->dengue_animalsSpecify = $request->edit_dengueAnimalSpecify;
                $dengue->dengue_waterInSpecify = $request->edit_dengueWaterConSpecific;
                $dengue->dengue_waterOutSpecify = $request->edit_dengueWaterContainersSpec;
                $dengue->em_id = $request->edit_dengueByName;
                $dengue->dengue_adminDate = $request->edit_dengueAdDate;
                $dengue->dengue_adminBrgy = $request->edit_dengueAdBrgy;
                $dengue->dengue_adminSitio = $request->edit_dengueAdSitio;
                $dengue->dengue_adminMunicipality = $request->edit_dengueAdMunicipality;
                $dengue->dengue_status = $request->edit_dengueStatuss;
            // Checkbox
                $dengue->dengue_signSymp = json_decode($request->edit_dengueSignSymp, true);
                $dengue->dengue_tests = json_decode($request->edit_dengueTests, true);
                $dengue->dengue_animals = json_decode($request->edit_dengueAnimalPres, true);
                $dengue->dengue_waterConIn = json_decode($request->edit_dengueWaterCon, true);
                $dengue->dengue_waterConOut = json_decode($request->edit_dengueWaterContainers, true);
            // Radio
                if ($request->filled('edit_dengueHosp')) {
                    $dengue->dengue_hospitalized = $request->edit_dengueHosp;
                }
                if ($request->filled('edit_dengueOutcome')) {
                    $dengue->dengue_outcome = $request->edit_dengueOutcome;
                }
                if ($request->filled('edit_dengueTravelHist')) {
                    $dengue->dengue_hisTravel = $request->edit_dengueTravelHist;
                }
                if ($request->filled('edit_dengueExpPer')) {
                    $dengue->dengue_exposed = $request->edit_dengueExpPer;
                }
                if ($request->filled('edit_dengueDoor')) {
                    $dengue->dengue_doorWindow = $request->edit_dengueDoor;
                }
            // Contact Details
                $names = json_decode($request->edit_dengueNameContact, true);
                $addresses = json_decode($request->edit_dengueAddressContact, true);
                
                if (is_array($names) && is_array($addresses)) {
                    $dengue->dengue_nameContact = json_encode($names);
                    $dengue->dengue_addressContact = json_encode($addresses);
                }
            
            
                if ($dengue->save()) {
                return response()->json(['status' => 1, 'msg' => 'Dengue Patient Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update Dengue Patient Record.']);
            }
        }

        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }

    public function showDengueForm($id)
    {
        $dengue = dengue_tbl::with('resident')->find($id);
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();

        $checkBoxSigns = json_decode($dengue->dengue_signSymp, true);
        $checkboxTest = json_decode($dengue->dengue_tests, true);

        $name = json_decode($dengue->dengue_nameContact, true);
        $address = json_decode($dengue->dengue_addressContact, true);
        $checkboxAnimals = json_decode($dengue->dengue_animals, true);
        $checkboxWaterIn = json_decode($dengue->dengue_waterConIn, true);
        $checkboxWaterOut = json_decode($dengue->dengue_waterConOut, true);
        

        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'dengue' => $dengue,
            'checkBoxSigns' => $checkBoxSigns,
            'checkboxTest' => $checkboxTest,
            'name' => $name,
            'address' => $address,
            'checkboxAnimals' => $checkboxAnimals,
            'checkboxWaterIn' => $checkboxWaterIn,
            'checkboxWaterOut' => $checkboxWaterOut,

        ];

        if (!$dengue) {
            return redirect()->back()->with('error', 'Dengue Patient record not found.');
        }
        return view('dashboards/healthWorkerDb/dengueForm', $data);
    }
// END OF DENGUE

// DESTRICT REFERRAL
    public function destrict(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        
        // Fetch all residents
        $resident = resident_tbl::all();
        
        // Fetch family planning data with related client and spouse information
        $destrict = destrict_tbl::with(['resident'])->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'destrict' => $destrict,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/destrict', $data);
    }

    public function desInput(Request $request)
    {
        // Validator for the input fields
        $validator = Validator::make($request->all(), [
            'desFullName' => 'required|integer', 
            'destrictTransaction' => 'required|string', 
            'destrictDateConsult' => 'required|date', 
            'destrictTimeConsult' => 'required|string', 
            'destrictBloodPressure' => 'required', 
            'destrictTemp' => 'required|numeric', 
            'destrictHeight' => 'required|numeric',
            'destrictWeight' => 'required|numeric',
            'destrictAttProv' => 'required|string',
            'destrictRefFrom' => 'required|string',
        ]);


        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $destrict = new destrict_tbl;

            $destrict->res_id = $request->desFullName;
            $destrict->des_modTrans = $request->destrictTransaction;
            $destrict->des_dateConsult = $request->destrictDateConsult;
            $destrict->des_consultTime = $request->destrictTimeConsult;
            $destrict->des_bp = $request->destrictBloodPressure;
            $destrict->des_temp = $request->destrictTemp;
            $destrict->des_ht = $request->destrictHeight;
            $destrict->des_wt = $request->destrictWeight;
            $destrict->des_attProvider = $request->destrictAttProv;
            $destrict->des_refFrom = $request->destrictRefFrom;
            $destrict->des_refTo = $request->destrictRefTo;
            $destrict->des_refReason = $request->destrictReasonRef;
            $destrict->em_id = $request->destrictRefBy;
            $destrict->des_natVisit = $request->destrictNatVis;
            $destrict->des_signSymp = isset($request->destrictTypeCon) ? json_encode($request->destrictTypeCon) : null;
            $destrict->des_complaint = $request->destrictChiefComp;
            $destrict->des_diagnosis = $request->destrictDiagnosis;
            $destrict->des_medTreatment = $request->destrictMedication;
            $destrict->des_labFindings = $request->destrictLaboratory;
            $destrict->des_refBy = $request->destrictHealthCare;
            $destrict->des_perfLabTest = $request->destrictLabTest;
            $destrict->des_status = 'Completed';
            
            if ($destrict->save()) {
                return response()->json(['status' => 1, 'msg' => 'Destrict record added successfully!']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to add new Destrict record'], 500);
            }
        }
    }

    public function getDesData($des_id)
    {
        $currentYear = now()->year;

        $destrict = destrict_tbl::with('resident')
            ->where('des_id', $des_id)
            ->whereYear('created_at', $currentYear)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$destrict) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $destrict]);
    }

    public function updateDes(Request $request)
    {
        $destrict = destrict_tbl::find($request->des_id);

        if ($destrict) {
            $destrict->des_id = $request->edit_desId;

            // TextBox
                $destrict->res_id = $request->edit_desFullName;
                $destrict->des_dateConsult = $request->edit_destrictDateConsult;
                $destrict->des_consultTime = $request->edit_destrictTimeConsult;
                $destrict->des_bp = $request->edit_destrictBloodPressure;
                $destrict->des_temp = $request->edit_destrictTemp;
                $destrict->des_ht = $request->edit_destrictHeight;
                $destrict->des_wt = $request->edit_destrictWeight;
                $destrict->des_attProvider = $request->edit_destrictAttProv;
                $destrict->des_refFrom = $request->edit_destrictRefFrom;
                $destrict->des_refTo = $request->edit_destrictRefTo;
                $destrict->des_refReason = $request->edit_destrictReasonRef;
                $destrict->des_refBy = $request->edit_destrictRefBy;
                $destrict->des_complaint = $request->edit_destrictChiefComp;
                $destrict->des_diagnosis = $request->edit_destrictDiagnosis;
                $destrict->des_medTreatment = $request->edit_destrictMedication;
                $destrict->des_labFindings = $request->edit_destrictLaboratory;
                $destrict->em_id = $request->edit_destrictHealthCare;
                $destrict->des_perfLabTest = $request->edit_destrictLabTest;
                $destrict->des_status = $request->edit_desStatus;


            // Checkbox
                $destrict->des_signSymp = json_decode($request->edit_destrictTypeCon, true);

            // Radio
                if ($request->filled('edit_destrictTransaction')) {
                    $destrict->des_modTrans = $request->edit_destrictTransaction;
                }
                if ($request->filled('edit_destrictNatVis')) {
                    $destrict->des_natVisit = $request->edit_destrictNatVis;
                }
            
            
                if ($destrict->save()) {
                return response()->json(['status' => 1, 'msg' => 'Destrict Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update Destrict Record.']);
            }
        }

        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }

    public function destForm($id)
    {
        $currentYear = Carbon::now()->year;

        $des = destrict_tbl::with(['resident', 'employee'])->where('des_id', $id)->first();
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();

        $dob = new \DateTime($des->resident->res_bdate);
        $age = $dob->diff(new \DateTime())->y;

        $checkboxType = json_decode($des->des_signSymp, true);

        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'des' => $des,
            'age' => $age,
            'checkboxType' => $checkboxType,
        ];

        if (!$des) {
            return redirect()->back()->with('error', 'Destrict Referral record not found.');
        }
        return view('dashboards/healthWorkerDb/destForm', $data);
    }
// END OF DESTRICT REFERRAL

// MATERNAL
    public function maternal(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        $maternal = maternal_tbl::with('maiden', 'husband')->get();

        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'maternal' => $maternal,
        ];

        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/maternal', $data);
    }

    public function inputMform1(Request $request)
    {
        $rules = [
            'maternalClinic' => 'required',
            'maternalBloodType' => 'required',
            'maternalFamNum' => 'required',
            'maternalRisk' => 'required',
            'maternalLmp' => 'required',
            'maternalEdc' => 'required',
            'maternalG' => 'required',
            'maternalT' => 'required',
            'maternalP' => 'required',
            'maternalA' => 'required',
            'maternalL' => 'required',

            'maternalChildAl' => 'required',
            'maternalLivChild' => 'required',
            'maternalAbort' => 'required',
            'maternalStillBirth' => 'required',
            'maternalCaesarian' => 'required',
            'maternalHemorr' => 'required',
            'maternalAbruptio' => 'required',

            'maternalTb' => 'required',
            'maternalHeart' => 'required',
            'maternalDiabetes' => 'required',
            'maternalAsthma' => 'required',
            'maternalGoiter' => 'required',
            'maternalTetanus' => 'required',

            'maternalAsthma' => 'required',
            'maternalGoiter' => 'required',
            'maternalTetanus' => 'required',
        ];

        // Apply mother-related validations conditionally
        if ($request->input('isMaidenResident') === 'No') {
            $rules['maternalMaiden'] = 'required';
            $rules['maternalBdate'] = 'required';
            $rules['maternalOccupation'] = 'required';
        }

        if ($request->input('isMaidenResident') === 'Yes') {
            $rules['inputMaidenName'] = 'required';
        }

        // Apply father-related validations conditionally
        if ($request->input('isHusbandResident') === 'No') {
            $rules['urMaternalHusband'] = 'required';
            $rules['maternalAddress'] = 'required';
        } 

        if ($request->input('isHusbandResident') === 'Yes') {
            $rules['inputMaternalHname'] = 'required';
        }

        // if ($request->input('maternalTetanus') === 'Yes') {
        //     $rules['maternalGiven1'] = 'required';
        //     $rules['maternalGiven2'] = 'required';
        //     $rules['maternalGiven3'] = 'required';
        //     $rules['maternalGiven4'] = 'required';
        //     $rules['maternalGiven5'] = 'required';
        //     $rules['maternalGivenTtl'] = 'required';
        // }

        if ($request->input('maternalTetanus') === 'Yes') {
            $rules['maternalGiven1'] = 'required';

            $rules['maternalGiven2'] = 'nullable';
            $rules['maternalGiven3'] = 'nullable';
            $rules['maternalGiven4'] = 'nullable';
            $rules['maternalGiven5'] = 'nullable';

            $rules['maternalGivenTtl'] = 'nullable|required_with:maternalGiven1,maternalGiven2,maternalGiven3,maternalGiven4,maternalGiven5';
        }

        if ($request->input('maternalFp') === 'No') {
            $rules['maternalFpPrac'] = 'required';
        } 
        if ($request->input('maternalFp') === 'Yes') {
            $rules['maternalFpMethod'] = 'required';
        }



        // Validate with dynamic rules
        $validator = Validator::make($request->all(), $rules, [
            'required' => 'This Field is Required.',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        // Saving to database if validation passes
        $maternal = new maternal_tbl;
        $maternal->mat_clinic = $request->maternalClinic;
        $maternal->mat_bType = $request->maternalBloodType;
        $maternal->mat_fNum = $request->maternalFamNum;
        $maternal->mat_risk = $request->maternalRisk;
        $maternal->mat_lmp = $request->maternalLmp;
        $maternal->mat_edc = $request->maternalEdc;
        $maternal->mat_g = $request->maternalG;
        $maternal->mat_t = $request->maternalT;
        $maternal->mat_p = $request->maternalP;
        $maternal->mat_a = $request->maternalA;
        $maternal->mat_l = $request->maternalL;

        $maternal->mat_childAlive = $request->maternalChildAl;
        $maternal->mat_livingChildAlive = $request->maternalLivChild;
        $maternal->mat_abortion = $request->maternalAbort;
        $maternal->mat_fDeaths = $request->maternalStillBirth;
        $maternal->mat_cSection = $request->maternalCaesarian;
        $maternal->mat_ppHemorr = $request->maternalHemorr;
        $maternal->mat_abruptio = $request->maternalAbruptio;
        $maternal->mat_others = $request->maternalOthers;

        $maternal->mat_tb = $request->maternalTb;
        $maternal->mat_hd = $request->maternalHeart;
        $maternal->mat_diabetes = $request->maternalDiabetes;
        $maternal->mat_ba = $request->maternalAsthma;
        $maternal->mat_goiter = $request->maternalGoiter;
        $maternal->mat_tetanus = $request->maternalTetanus;

        $maternal->mat_status = 'Completed';
        $maternal->mat_riskFactor = isset($request->maternalRiskFactors) ? json_encode($request->maternalRiskFactors) : null;

        if ($request->input('isMaidenResident') === 'No') {
            $maternal->mat_urMaiden = $request->maternalMaiden;
            $maternal->mat_urBdate = $request->maternalBdate;
            $maternal->mat_urOcc = $request->maternalOccupation;
        } else {
            $maternal->maiden_id = $request->inputMaidenName;
        }

        if ($request->input('isHusbandResident') === 'No') {
            $maternal->mat_urHusband = $request->urMaternalHusband;
            $maternal->mat_urAddress = $request->maternalAddress;
        } else {
            $maternal->husband_id = $request->inputMaternalHname;
        }

        if ($request->input('maternalTetanus') === 'Yes') {
            $maternal->mat_date1 = $request->maternalGiven1;
            $maternal->mat_date2 = $request->maternalGiven2;
            $maternal->mat_date3 = $request->maternalGiven3;
            $maternal->mat_date4 = $request->maternalGiven4;
            $maternal->mat_date5 = $request->maternalGiven5;
            $maternal->mat_total = $request->maternalGivenTtl;
        }

        $maternal->mat_fp = $request->maternalFp;
        if ($request->input('maternalFp') === 'Yes') {
            $maternal->mat_fpMethod = $request->maternalFpMethod;
        }
        else {
            $maternal->mat_fpWilling = $request->maternalFpPrac;
        }


        $maternal->em_id = $request->empId;

        if ($maternal->save()) {
            return response()->json(['status' => 1, 'msg' => 'New Maternal Record Has Been Added']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Failed to add new Record'], 500);
        }
    }

    public function getMatData($mat_id)
    {
        $currentYear = now()->year;

        $maternal = maternal_tbl::with('maiden', 'husband')
            ->where('mat_id', $mat_id)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$maternal) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $maternal]);
    }

    public function updateMat(Request $request)
    {
        $maternal = maternal_tbl::find($request->edit_matId);

        if ($maternal) {
            $maternal->mat_id = $request->edit_matId;
            $maternal->mat_clinic = $request->edit_maternalClinic;
            $maternal->mat_bType = $request->edit_maternalBloodType;
            $maternal->mat_fNum = $request->edit_maternalFamNum;
            
            $maternal->maiden_id = $request->edit_inputMaidenName; 
            $maternal->mat_urMaiden = $request->edit_maternalMaiden;
            $maternal->mat_urBdate = $request->edit_maternalBdate;
            $maternal->mat_urOcc = $request->edit_maternalOccupation;
            $maternal->husband_id = $request->edit_inputMaternalHname; 
            $maternal->mat_urHusband = $request->edit_urMaternalHusband;
            $maternal->mat_urAddress = $request->edit_maternalAddress;
            
            $maternal->mat_lmp = $request->edit_maternalLmp;
            $maternal->mat_edc = $request->edit_maternalEdc;
            $maternal->mat_g = $request->edit_maternalG;
            $maternal->mat_t = $request->edit_maternalT;
            $maternal->mat_p = $request->edit_maternalP;
            $maternal->mat_a = $request->edit_maternalA;
            $maternal->mat_l = $request->edit_maternalL;
            $maternal->mat_childAlive = $request->edit_maternalChildAl;
            $maternal->mat_livingChildAlive = $request->edit_maternalLivChild;
            $maternal->mat_abortion = $request->edit_maternalAbort;
            $maternal->mat_fDeaths = $request->edit_maternalStillBirth;
            $maternal->mat_others = $request->edit_maternalOthers;
            $maternal->mat_date1 = $request->edit_maternalGiven1;
            $maternal->mat_date2 = $request->edit_maternalGiven2;
            $maternal->mat_date3 = $request->edit_maternalGiven3;
            $maternal->mat_date4 = $request->edit_maternalGiven4;
            $maternal->mat_date5 = $request->edit_maternalGiven5;
            $maternal->mat_total = $request->edit_maternalGivenTtl;
            $maternal->mat_fpMethod = $request->edit_maternalFpMethod;
            $maternal->em_id = $request->edit_empId;
            $maternal->mat_status = $request->edit_maternalStatus;
            

            // Checkbox
                $maternal->mat_riskFactor = json_decode($request->edit_maternalRiskFactors, true);

            // Radio
                if ($request->filled('edit_maternalRisk')) {
                    $maternal->mat_risk = $request->edit_maternalRisk;
                }
                if ($request->filled('edit_maternalCaesarian')) {
                    $maternal->mat_cSection = $request->edit_maternalCaesarian;
                }
                if ($request->filled('edit_maternalHemorr')) {
                    $maternal->mat_ppHemorr = $request->edit_maternalHemorr;
                }
                if ($request->filled('edit_maternalAbruptio')) {
                    $maternal->mat_abruptio = $request->edit_maternalAbruptio;
                }
                if ($request->filled('edit_maternalTb')) {
                    $maternal->mat_tb = $request->edit_maternalTb;
                }
                if ($request->filled('edit_maternalHeart')) {
                    $maternal->mat_hd = $request->edit_maternalHeart;
                }
                if ($request->filled('edit_maternalDiabetes')) {
                    $maternal->mat_diabetes = $request->edit_maternalDiabetes;
                }
                if ($request->filled('edit_maternalAsthma')) {
                    $maternal->mat_ba = $request->edit_maternalAsthma;
                }
                if ($request->filled('edit_maternalGoiter')) {
                    $maternal->mat_goiter = $request->edit_maternalGoiter;
                }
                if ($request->filled('edit_maternalTetanus')) {
                    $maternal->mat_tetanus = $request->edit_maternalTetanus;
                }
                if ($request->filled('edit_maternalFp')) {
                    $maternal->mat_fp = $request->edit_maternalFp;
                }
                if ($request->filled('edit_maternalFpPrac')) {
                    $maternal->mat_fpWilling = $request->edit_maternalFpPrac;
                }

                
            
            if ($maternal->save()) {
                return response()->json(['status' => 1, 'msg' => 'Risk Assessment Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update Risk Assessment Record.']);
            }
        }

        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }
    // ANTEPARTUM
        public function matAnte($id)
        {
            $currentYear = Carbon::now()->year;
            $maternal = maternal_tbl::with(['maiden', 'husband'])->where('mat_id', $id)->first();
            $ante = antepartum_tbl::where('mat_id', $id)->get(); 
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
        
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'maternal' => $maternal,
                'ante' => $ante,
            ];
        
            return view('dashboards/healthWorkerDb/matAnte', $data);
        }
        
        // public function inputMform2(Request $request)
        // {
        //     $rules = [
        //         'apDate' => 'required',
        //         'apComplaints' => 'required',
        //         'apPresentation' => 'required',
        //         'apLab' => 'required',
        //         'apDiagnosis' => 'required',
        //         'apPlan' => 'required',
        //     ];
        
        //     $validator = Validator::make($request->all(), $rules, [
        //         'required' => 'This Field is Required.',
        //     ]);
        
        //     if ($validator->fails()) {
        //         return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        //     }
        
        //     DB::beginTransaction();
        
        //     try {
        //         $antePartum = new antepartum_tbl;
        //         $antePartum->mat_id = $request->matId;
        //         $antePartum->ap_dateVisit = $request->apDate;
        //         $antePartum->ap_complaints = $request->apComplaints;
        //         $antePartum->apf_aog = $request->apAog;
        //         $antePartum->apf_ht = $request->apHt;
        //         $antePartum->apf_wt = $request->apWt;
        //         $antePartum->apf_bp = $request->apBp;
        //         $antePartum->apf_fundal = $request->apFundal;
        //         $antePartum->apf_fhb = $request->apFhb;
        //         $antePartum->apf_presentation = $request->apPresentation;
        //         $antePartum->ap_labResult = $request->apLab;
        //         $antePartum->ap_diagnosis = $request->apDiagnosis;
        //         $antePartum->ap_treatment = $request->apPlan;
        //         $antePartum->ap_nextVisit = $request->apNxtVisit;
        //         $antePartum->em_id = $request->empId;
        
        //         if ($antePartum->save()) {
        //             // Now create the sched_tbl record with vt_id as a foreign key
        //             if ($request->filled('apNxtVisit')) {
        //                 $schedule = new sched_tbl;
        //                 $schedule->ap_id = $antePartum->ap_id;
        //                 $schedule->sched_desc = 'Antepartum Schedule'; 
        //                 $schedule->save();
        //             }
        
        //             DB::commit();
        //             return response()->json(['status' => 1, 'msg' => 'Antepartum Record Added Successfully']);
        //         } else {
        //             DB::rollBack();
        //             return response()->json(['status' => 0, 'msg' => 'Failed to add Antepartum Record'], 500);
        //         }
        //     } catch (\Exception $e) {
        //         DB::rollBack();
        //         return response()->json(['status' => 0, 'msg' => 'An error occurred'], 500);
        //     }
        // }

        public function inputMform2(Request $request)
        {
            $rules = [
                'apDate' => 'required',
                'apComplaints' => 'required',
                'apPresentation' => 'required',
                'apLab' => 'required',
                'apDiagnosis' => 'required',
                'apPlan' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules, [
                'required' => 'This Field is Required.',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }

            DB::beginTransaction();

            try {
                // Find the previous antepartum record for the same patient (mat_id)
                $previousAntePartum = antepartum_tbl::where('mat_id', $request->matId)
                    ->whereNotNull('ap_nextVisit')  // Only consider records with a next visit
                    ->orderBy('ap_id', 'desc')  // Order by ID descending (get the most recent record)
                    ->first();

                // If there is a previous record, check if the ap_dateVisit matches the previous ap_nextVisit
                if ($previousAntePartum && $request->apDate === $previousAntePartum->ap_nextVisit) {
                    // Update the previous record's schedule status to "Completed"
                    $previousSchedule = sched_tbl::where('ap_id', $previousAntePartum->ap_id)
                        ->first();

                    if ($previousSchedule) {
                        $previousSchedule->sched_status = 'Completed';
                        $previousSchedule->save();
                    }
                }

                // Create a new Antepartum record
                $antePartum = new antepartum_tbl;
                $antePartum->mat_id = $request->matId;
                $antePartum->ap_dateVisit = $request->apDate;
                $antePartum->ap_complaints = $request->apComplaints;
                $antePartum->apf_aog = $request->apAog;
                $antePartum->apf_ht = $request->apHt;
                $antePartum->apf_wt = $request->apWt;
                $antePartum->apf_bp = $request->apBp;
                $antePartum->apf_fundal = $request->apFundal;
                $antePartum->apf_fhb = $request->apFhb;
                $antePartum->apf_presentation = $request->apPresentation;
                $antePartum->ap_labResult = $request->apLab;
                $antePartum->ap_diagnosis = $request->apDiagnosis;
                $antePartum->ap_treatment = $request->apPlan;
                $antePartum->ap_nextVisit = $request->apNxtVisit;
                $antePartum->em_id = $request->empId;

                if ($antePartum->save()) {
                    // Create the schedule record with ap_id as a foreign key
                    if ($request->filled('apNxtVisit')) {
                        $schedule = new sched_tbl;
                        $schedule->ap_id = $antePartum->ap_id;
                        $schedule->sched_desc = 'Antepartum Schedule';
                        $schedule->sched_status = 'Scheduled';
                        $schedule->save();
                    }

                    DB::commit();
                    return response()->json(['status' => 1, 'msg' => 'Antepartum Record Added Successfully']);
                } else {
                    DB::rollBack();
                    return response()->json(['status' => 0, 'msg' => 'Failed to add Antepartum Record'], 500);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => 0, 'msg' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        
        public function updateAnte(Request $request)
        {
            $antePartum = antepartum_tbl::find($request->edit_apId);
        
            if ($antePartum) {
                // Log for debugging
                Log::info('Updating antepartum_tbl record for ap_id: ' . $request->edit_apId);
        
                // Store original Next Schedule value to detect changes
                $originalNextSchedule = $antePartum->ap_nextVisit;
        
                // Update fields in vaccineTaken_tbl
                $antePartum->ap_dateVisit = $request->edit_apDate;
                $antePartum->ap_complaints = $request->edit_apComplaints;
                $antePartum->apf_aog = $request->edit_apAog;
                $antePartum->apf_ht = $request->edit_apHt;
                $antePartum->apf_wt = $request->edit_apWt;
                $antePartum->apf_bp = $request->edit_apBp;
                $antePartum->apf_fundal = $request->edit_apFundal;
                $antePartum->apf_fhb = $request->edit_apFhb;
                $antePartum->apf_presentation = $request->edit_apPresentation;
                $antePartum->ap_labResult = $request->edit_apLab;
                $antePartum->ap_diagnosis = $request->edit_apDiagnosis;
                $antePartum->ap_treatment = $request->edit_apPlan;
                $antePartum->ap_nextVisit = $request->edit_apNxtVisit;
        
                if ($antePartum->save()) {
                    // Log successful save
                    Log::info('vaccineTaken_tbl updated successfully for ap_id: ' . $request->edit_apId);
        
                    // Only perform CRUD on sched_tbl if the Next Schedule value has changed
                    if ($request->edit_apNxtVisit !== $originalNextSchedule) {
                        // If Next Schedule is filled, create or update sched_tbl
                        if ($request->filled('edit_apNxtVisit')) {
                            Log::info('Next schedule provided, updating or creating sched_tbl for ap_id: ' . $antePartum->ap_id);
        
                            sched_tbl::updateOrCreate(
                                ['ap_id' => $antePartum->ap_id],
                                ['sched_desc' => 'Antepartum Schedule']
                            );
                        } else {
                            // If Next Schedule is empty, delete any existing sched_tbl record
                            Log::info('No next schedule provided, deleting sched_tbl record if it exists for ap_id: ' . $antePartum->ap_id);
        
                            sched_tbl::where('ap_id', $antePartum->ap_id)->delete();
                        }
                    } else {
                        Log::info('Next schedule remains unchanged; no action taken on sched_tbl.');
                    }
        
                    return response()->json(['status' => 1, 'msg' => 'Record updated successfully.']);
                } else {
                    Log::error('Failed to save vaccineTaken_tbl record for vt_id: ' . $request->edit_apId);
                    return response()->json(['status' => 0, 'msg' => 'Failed to update record.']);
                }
            }
            
            Log::error('Record not found for vt_id: ' . $request->edit_apId);
            return response()->json(['status' => 0, 'msg' => 'Record not found.']);
        }
    // POST PARTUM
        public function matPost($id)
        {
            $currentYear = Carbon::now()->year;
            $maternal = maternal_tbl::with(['maiden', 'husband'])->where('mat_id', $id)->first();
            $post = postpartum_tbl::where('mat_id', $id)->get(); 
            $birth = delbirth_tbl::where('mat_id', $id)->get(); 
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();

            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'maternal' => $maternal,
                'post' => $post,
                'birth' => $birth,
            ];

            if (!$maternal) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            return view('dashboards/healthWorkerDb/matPost', $data);
        }

        // public function inputMform3(Request $request)
        // {
        //     $rules = [
        //         'postVisit' => 'required',
        //         'postFeSo' => 'required',
        //         'postVit' => 'required',
        //         'postIntervention' => 'required',
        //     ];
        
        //     $validator = Validator::make($request->all(), $rules, [
        //         'required' => 'This Field is Required.',
        //     ]);
        
        //     if ($validator->fails()) {
        //         return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        //     }
        
        //     DB::beginTransaction();
        
        //     try {
        //         $postPartum = new postpartum_tbl;
        //         $postPartum->mat_id = $request->matId;
        //         $postPartum->pp_dateVisit = $request->postVisit;
        //         $postPartum->pp_feso = $request->postFeSo;
        //         $postPartum->pp_vitA = $request->postVit;
        //         $postPartum->ap_Intervention = $request->postIntervention;
        //         $postPartum->pp_dateNextVisit = $request->postNxtVisit;
        
        //         if ($postPartum->save()) {
        //             // Now create the sched_tbl record with vt_id as a foreign key
        //             if ($request->filled('postNxtVisit')) {
        //                 $schedule = new sched_tbl;
        //                 $schedule->pp_id = $postPartum->pp_id;
        //                 $schedule->sched_desc = 'Postpartum Schedule'; 
        //                 $schedule->save();
        //             }
        
        //             DB::commit();
        //             return response()->json(['status' => 1, 'msg' => 'Postpartum Record Added Successfully']);
        //         } else {
        //             DB::rollBack();
        //             return response()->json(['status' => 0, 'msg' => 'Failed to add Postpartum Record'], 500);
        //         }
        //     } catch (\Exception $e) {
        //         DB::rollBack();
        //         return response()->json(['status' => 0, 'msg' => 'An error occurred'], 500);
        //     }
        // }

        public function inputMform3(Request $request)
        {
            $rules = [
                'postVisit' => 'required',
                'postFeSo' => 'required',
                'postVit' => 'required',
                'postIntervention' => 'required',
            ];
        
            $validator = Validator::make($request->all(), $rules, [
                'required' => 'This Field is Required.',
            ]);
        
            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }
        
            DB::beginTransaction();
        
            try {
                $postPartum = new postpartum_tbl;
                $postPartum->mat_id = $request->matId;
                $postPartum->pp_dateVisit = $request->postVisit;
                $postPartum->pp_feso = $request->postFeSo;
                $postPartum->pp_vitA = $request->postVit;
                $postPartum->ap_Intervention = $request->postIntervention;
                $postPartum->pp_dateNextVisit = $request->postNxtVisit;
        
                // Find the latest postpartum record for this patient
                $lastPostPartum = postpartum_tbl::where('mat_id', $request->matId)
                                                ->orderBy('pp_dateVisit', 'desc')
                                                ->first();
        
                // If a previous record exists and the current visit date matches the previous next visit date
                if ($lastPostPartum && $request->postVisit == $lastPostPartum->pp_dateNextVisit) {
                    // Update the sched_tbl record of the last visit to mark it as completed
                    $lastSchedule = sched_tbl::where('pp_id', $lastPostPartum->pp_id)
                                             ->first();
        
                    if ($lastSchedule) {
                        $lastSchedule->sched_status = 'Completed';
                        $lastSchedule->save();
                    }
                }
        
                // Save the new postpartum record
                if ($postPartum->save()) {
                    // Now create the sched_tbl record with pp_id as a foreign key
                    if ($request->filled('postNxtVisit')) {
                        $schedule = new sched_tbl;
                        $schedule->pp_id = $postPartum->pp_id;
                        $schedule->sched_desc = 'Postpartum Schedule'; 
                        $schedule->sched_status = 'Scheduled';  // The new schedule initially has no status
                        $schedule->save();
                    }
        
                    DB::commit();
                    return response()->json(['status' => 1, 'msg' => 'Postpartum Record Added Successfully']);
                } else {
                    DB::rollBack();
                    return response()->json(['status' => 0, 'msg' => 'Failed to add Postpartum Record'], 500);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => 0, 'msg' => 'An error occurred: ' . $e->getMessage()], 500);
            }
        }

        public function updatePost(Request $request)
        {
            $postPartum = postpartum_tbl::find($request->edit_ppId);
        
            if ($postPartum) {
                // Log for debugging
                Log::info('Updating postPartum_tbl record for pp_id: ' . $request->edit_ppId);
        
                // Store original Next Schedule value to detect changes
                $originalNextSchedule = $postPartum->pp_dateNextVisit;
        
                // Update fields in vaccineTaken_tbl
                $postPartum->pp_dateVisit = $request->edit_postVisit;
                $postPartum->pp_feso = $request->edit_postFeSo;
                $postPartum->pp_vitA = $request->edit_postVit;
                $postPartum->ap_Intervention = $request->edit_postIntervention;
                $postPartum->pp_dateNextVisit = $request->edit_postNxtVisit;
        
                if ($postPartum->save()) {
                    // Log successful save
                    Log::info('vaccineTaken_tbl updated successfully for pp_id: ' . $request->edit_ppId);
        
                    // Only perform CRUD on sched_tbl if the Next Schedule value has changed
                    if ($request->edit_postNxtVisit !== $originalNextSchedule) {
                        // If Next Schedule is filled, create or update sched_tbl
                        if ($request->filled('edit_postNxtVisit')) {
                            Log::info('Next schedule provided, updating or creating sched_tbl for pp_id: ' . $postPartum->pp_id);
        
                            sched_tbl::updateOrCreate(
                                ['pp_id' => $postPartum->pp_id],
                                ['sched_desc' => 'Postpartum Schedule']
                            );
                        } else {
                            // If Next Schedule is empty, delete any existing sched_tbl record
                            Log::info('No next schedule provided, deleting sched_tbl record if it exists for pp_id: ' . $postPartum->pp_id);
        
                            sched_tbl::where('pp_id', $postPartum->pp_id)->delete();
                        }
                    } else {
                        Log::info('Next schedule remains unchanged; no action taken on sched_tbl.');
                    }
        
                    return response()->json(['status' => 1, 'msg' => 'Record updated successfully.']);
                } else {
                    Log::error('Failed to save vaccineTaken_tbl record for pp_id: ' . $request->edit_ppId);
                    return response()->json(['status' => 0, 'msg' => 'Failed to update record.']);
                }
            }
            
            Log::error('Record not found for pp_id: ' . $request->edit_ppId);
            return response()->json(['status' => 0, 'msg' => 'Record not found.']);
        }
    // BIRTH AND DELIVERY
        public function inputMform4(Request $request)
        {
            // Validation rules
            $rules = [
                'postDelDate' => 'required',
                'postDelPlace' => 'required',
                'postDelType' => 'required',
                'postDelFnameChild' => 'required',
                'postDelSex' => 'required',
                'postDelBirthLen' => 'required',
                'postDelBirthWt' => 'required',
                'postDelAttendant' => 'required',
            ];
            
            // Custom error messages
            $messages = [
                'required' => 'This field is required.',
            ];
        
            // Validate input
            $validator = Validator::make($request->all(), $rules, $messages);
            
            // Return validation errors if any
            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }
        
            // Begin database transaction to ensure consistency
            DB::beginTransaction();
        
            try {
                // Create a new record in the delbirth_tbl
                $birth = new delbirth_tbl;
                $birth->mat_id = $request->postmatId; // Maternal ID
                $birth->db_delDateTime = $request->postDelDate; // Delivery Date and Time
                $birth->db_placeDel = $request->postDelPlace; // Place of Delivery
                $birth->db_outcome = $request->postDelType; // Delivery Outcome
                $birth->db_childFullName = $request->postDelFnameChild; // Child's Full Name
                $birth->db_sex = $request->postDelSex; // Child's Sex
                $birth->db_birthLt = $request->postDelBirthLen; // Birth Length
                $birth->db_birthWt = $request->postDelBirthWt; // Birth Weight
                $birth->db_attendant = $request->postDelAttendant; // Attendant at Birth
                $birth->db_fatherFullName = $request->postDelFnFather; // Father's Full Name (no validation)
        
                // Save the record to the database
                if ($birth->save()) {
                    // Commit transaction if the data is saved successfully
                    DB::commit();
                    return response()->json(['status' => 1, 'msg' => 'New Record Has Been Added']);
                } else {
                    // Rollback if save failed
                    DB::rollBack();
                    return response()->json(['status' => 0, 'msg' => 'Failed to add new Record'], 500);
                }
            } catch (\Exception $e) {
                // Catch any exceptions and rollback the transaction
                DB::rollBack();
                return response()->json(['status' => 0, 'msg' => 'An error occurred', 'error' => $e->getMessage()], 500);
            }
        }
        
        public function updateDb(Request $request)
        {
            $birth = delbirth_tbl::find($request->edit_postdelId);
    
            if ($birth) {
                $birth->mat_id = $request->edit_postdelId;
                $birth->db_delDateTime = $request->edit_postDelDate;
                $birth->db_placeDel = $request->edit_postDelPlace;
                $birth->db_childFullName = $request->edit_postDelFnameChild; 
                $birth->db_birthLt = $request->edit_postDelBirthLen;
                $birth->db_birthWt = $request->edit_postDelBirthWt;
                $birth->db_fatherFullName = $request->edit_postDelFnFather;
                
                // Radio
                    if ($request->filled('edit_postDelType')) {
                        $birth->db_outcome = $request->edit_postDelType;
                    }
                    if ($request->filled('edit_postDelSex')) {
                        $birth->db_sex = $request->edit_postDelSex;
                    }
                    if ($request->filled('edit_postDelAttendant')) {
                        $birth->db_attendant = $request->edit_postDelAttendant;
                    }

    
                    
                
                if ($birth->save()) {
                    return response()->json(['status' => 1, 'msg' => 'Record updated successfully.']);
                } else {
                    return response()->json(['status' => 0, 'msg' => 'Failed to update Record.']);
                }
            }
    
            return response()->json(['status' => 0, 'msg' => 'Record not found.']);
        }

        public function matView($id)
        {
            $currentYear = Carbon::now()->year;

            $maternal = maternal_tbl::with(['maiden', 'husband'])->where('mat_id', $id)->first();
            $post = postpartum_tbl::where('mat_id', $id)->get(); 
            $post2 = $post->skip(1)->first();
            $ante = antepartum_tbl::where('mat_id', $id)->get();
            $delBirth = delbirth_tbl::where('mat_id', $id)->first();
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();

            $checkboxRisk = json_decode($maternal->mat_riskFactor, true);
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'maternal' => $maternal,
                'post' => $post,
                'post2' => $post2,
                'ante' => $ante,
                'checkboxRisk' => $checkboxRisk,
                'delBirth' => $delBirth,
            ];

            if (!$maternal) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            return view('dashboards/healthWorkerDb/matView', $data);
        }
    
        
// END OF MATERNAL

// IMMUNIZATION
    public function immunization(Request $request)
    {
        // Fetch the logged-in user's information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();
        $epi = epiRecord_tbl::with(['father', 'mother'])->orderBy('created_at', 'desc')->get();


        // Merge all the data into a single array
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'epi' => $epi,
        ];


        // Set headers for no-cache
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Pass the data to the view
        return view('dashboards/healthWorkerDb/immunization', $data);
    }

    public function inputImmu(Request $request)
    {
        $rules = [
            'immuLname' => 'required',
            'immuFname' => 'required',
            'immuMname' => 'required',
            'immuSex' => 'required',
            'immuNhts' => 'required',
            'immuBday' => 'required',
            'immuTime' => 'required',
            'immuAddress' => 'required',
            'immuFp' => 'required',
            'immuPlaceDel' => 'required',
            'immuTtRec' => 'required',
            'immuBreastFeed' => 'required',
            'immuScreen' => 'required',
            'immuDateNbs' => 'required',
            'immuBirthOrder' => 'required',
        ];

        // Apply mother-related validations conditionally
        if ($request->input('momLive') === 'No') {
            $rules['urMotherName'] = 'required';
            $rules['immuAge'] = 'required';
        } else {
            $rules['inputImmuMother'] = 'required';
        }

        // Apply father-related validations conditionally
        if ($request->input('dadLive') === 'No') {
            $rules['urFatherName'] = 'required';
        } else {
            $rules['inputImmuFather'] = 'required';
        }

        // Validate with dynamic rules
        $validator = Validator::make($request->all(), $rules, [
            'required' => 'This Field is Required.',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        // Saving to database if validation passes
        $epi = new epiRecord_tbl;
        $epi->epi_lname = $request->immuLname;
        $epi->epi_fname = $request->immuFname;
        $epi->epi_mname = $request->immuMname;
        $epi->epi_suffix = $request->immuSuffix;
        $epi->epi_sex = $request->immuSex;
        $epi->epi_nhts = $request->immuNhts;
        $epi->epi_bdate = $request->immuBday;
        $epi->epi_time = $request->immuTime;
        $epi->epi_address = $request->immuAddress;
        $epi->epi_fp = $request->immuFp;
        $epi->epi_delPlace = $request->immuPlaceDel;
        $epi->epi_ttReceived = $request->immuTtRec;
        $epi->epi_breastFeed = $request->immuBreastFeed;
        $epi->epi_newBornSc = $request->immuScreen;
        $epi->epi_dateNbs = $request->immuDateNbs;
        $epi->epi_birthOrder = $request->immuBirthOrder;
        $epi->epi_status = 'Partially Completed';

        // Assign mother and father fields based on the radio selection
        if ($request->input('momLive') === 'No') {
            $epi->epi_motherName = $request->urMotherName;
            $epi->epi_motherAge = $request->immuAge;
        } else {
            $epi->mother_id = $request->inputImmuMother;
        }

        if ($request->input('dadLive') === 'No') {
            $epi->epi_fatherName = $request->urFatherName;
        } else {
            $epi->father_id = $request->inputImmuFather;
        }

        $epi->em_id = $request->immuEmp;

        if ($epi->save()) {
            return response()->json(['status' => 1, 'msg' => 'New Vaccination Recipient Has Been Added']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Failed to add new Vaccination Recipient'], 500);
        }
    }

    public function getEpiData($immu_id)
    {
        $currentYear = now()->year;

        $immu = epiRecord_tbl::with('mother', 'father')
            ->where('epi_id', $immu_id)
            ->whereYear('created_at', $currentYear)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$immu) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $immu]);
    }

    public function updateEpi(Request $request)
    {
        $epi = epiRecord_tbl::find($request->edit_immuId);

        if ($epi) {
            $epi->epi_id = $request->edit_immuId;

            // TextBox
                $epi->epi_id = $request->edit_immuId;
                $epi->epi_lname = $request->edit_immuLname;
                $epi->epi_fname = $request->edit_immuFname;
                $epi->epi_mname = $request->edit_immuMname;
                $epi->epi_suffix = $request->edit_immuSuffix;
                $epi->epi_bdate = $request->edit_immuBday;
                $epi->epi_time = $request->edit_immuTime;
                $epi->epi_address = $request->edit_immuAddress;
                $epi->mother_id = $request->edit_inputImmuMother;
                $epi->epi_motherName  = $request->edit_urMotherName;
                $epi->epi_motherAge = $request->edit_immuAge;
                $epi->epi_fp = $request->edit_immuFp;
                $epi->father_id = $request->edit_inputImmuFather;
                $epi->epi_fatherName = $request->edit_urFatherName;
                $epi->epi_delPlace  = $request->edit_immuPlaceDel;
                $epi->epi_ttReceived = $request->edit_immuTtRec;
                $epi->epi_dateNbs = $request->edit_immuDateNbs;
                $epi->epi_birthOrder = $request->edit_immuBirthOrder;
                $epi->epi_status  = $request->edit_immuStatus;
                $epi->em_id = $request->edit_immuEmp;

            // Radio
                if ($request->filled('edit_immuSex')) {
                    $epi->epi_sex = $request->edit_immuSex;
                }
                if ($request->filled('edit_immuNhts')) {
                    $epi->epi_nhts = $request->edit_immuNhts;
                }
                if ($request->filled('edit_immuBreastFeed')) {
                    $epi->epi_breastFeed = $request->edit_immuBreastFeed;
                }
                if ($request->filled('edit_immuScreen')) {
                    $epi->epi_newBornSc = $request->edit_immuScreen;
                }
            
            if ($epi->save()) {
                return response()->json(['status' => 1, 'msg' => 'Record updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'msg' => 'Failed to update Record.']);
            }
        }
        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }

    public function epiForm($id)
    {
        $currentYear = Carbon::now()->year;

        $epi = epiRecord_tbl::with(['mother', 'father'])->where('epi_id', $id)->first();

        $vacForm = vaccineTaken_tbl::with('epi')->where('epi_id', $id)->whereYear('created_at', $currentYear)->orderBy('created_at', 'desc')->get();
        
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        $resident = resident_tbl::all();

        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'residents' => $resident,
            'epi' => $epi,
            'vacForm' => $vacForm,
        ];

        if (!$epi) {
            return redirect()->back()->with('error', 'FP record not found.');
        }
        return view('dashboards/healthWorkerDb/immuVaccine', $data);
    }

    // public function inputVac(Request $request)
    // {
    //     $rules = [
    //         'vacDate' => 'required',
    //         'vacWt' => 'required',
    //         'vaccines' => 'required',
    //         'vacStatus' => 'required',
    //     ];
    
    //     $validator = Validator::make($request->all(), $rules, [
    //         'required' => 'This Field is Required.',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    //     }
    
    //     DB::beginTransaction();
    
    //     try {
    //         // Create vaccine record
    //         $vac = new vaccineTaken_tbl;
    //         $vac->epi_id = $request->epId;
    //         $vac->vt_date = $request->vacDate;
    //         $vac->vt_wt = $request->vacWt;
    //         $vac->vt_vaccines = $request->vaccines;
    //         $vac->vt_nxtSched = $request->vacSched;
    //         $vac->vt_status = $request->vacStatus;
    //         $vac->em_id = $request->empId;
    
    //         if ($vac->save()) {
    //             // Now create the sched_tbl record with vt_id as a foreign key
    //             if ($request->filled('vacSched')) {
    //                 $schedule = new sched_tbl;
    //                 $schedule->vt_id = $vac->vt_id;
    //                 $schedule->sched_desc = 'Immunization Schedule'; 
    //                 $schedule->save();
    //             }
    
    //             DB::commit();
    //             return response()->json(['status' => 1, 'msg' => 'Vaccination and Schedule Added Successfully']);
    //         } else {
    //             DB::rollBack();
    //             return response()->json(['status' => 0, 'msg' => 'Failed to add Vaccination'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['status' => 0, 'msg' => 'An error occurred'], 500);
    //     }
    // }

    public function inputVac(Request $request)
    {
        $rules = [
            'vacDate' => 'required',
            'vacWt' => 'required',
            'vaccines' => 'required',
            'vacStatus' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'required' => 'This Field is Required.',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        DB::beginTransaction();

        try {
            // Find the previous vaccination record for the same patient (epi_id)
            $previousVac = vaccineTaken_tbl::where('epi_id', $request->epId)
                ->whereNotNull('vt_nxtSched') // Only consider records with a next scheduled date
                ->orderBy('vt_id', 'desc')  // Get the latest record by vt_id
                ->first();

            // If there is a previous record, check if the vacDate matches the previous vt_nxtSched
            if ($previousVac && $request->vacDate === $previousVac->vt_nxtSched) {
                // Update the previous schedule's status to "Completed"
                $previousSchedule = sched_tbl::where('vt_id', $previousVac->vt_id)->first();

                if ($previousSchedule) {
                    $previousSchedule->sched_status = 'Completed';
                    $previousSchedule->save();
                }
            }

            // Create a new Vaccine record
            $vac = new vaccineTaken_tbl;
            $vac->epi_id = $request->epId;
            $vac->vt_date = $request->vacDate;
            $vac->vt_wt = $request->vacWt;
            $vac->vt_vaccines = $request->vaccines;
            $vac->vt_nxtSched = $request->vacSched;
            $vac->vt_status = $request->vacStatus;
            $vac->em_id = $request->empId;

            if ($vac->save()) {
                // Create the schedule record with vt_id as a foreign key
                if ($request->filled('vacSched')) {
                    $schedule = new sched_tbl;
                    $schedule->vt_id = $vac->vt_id;
                    $schedule->sched_desc = 'Immunization Schedule';
                    $schedule->save();
                }

                DB::commit();
                return response()->json(['status' => 1, 'msg' => 'Vaccination and Schedule Added Successfully']);
            } else {
                DB::rollBack();
                return response()->json(['status' => 0, 'msg' => 'Failed to add Vaccination'], 500);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 0, 'msg' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
    
    public function getVacData($immu_id)
    {
        $currentYear = now()->year;

        $vac = vaccineTaken_tbl::with('epi')
            ->where('vt_id', $immu_id)
            ->whereYear('created_at', $currentYear)
            ->orderBy('created_at', 'desc')
            ->first(); 

        if (!$vac) {
            return response()->json(['status' => 0, 'msg' => 'Record not found'], 404);
        }

        return response()->json(['status' => 1, 'data' => $vac]);
    }

    public function updateVac(Request $request)
    {
        $vac = vaccineTaken_tbl::find($request->edit_vtId);
    
        if ($vac) {
            // Log for debugging
            Log::info('Updating vaccineTaken_tbl record for vt_id: ' . $request->edit_vtId);
    
            // Store original Next Schedule value to detect changes
            $originalNextSchedule = $vac->vt_nxtSched;
    
            // Update fields in vaccineTaken_tbl
            $vac->vt_date = $request->edit_vacDate;
            $vac->vt_wt = $request->edit_vacWt;
            $vac->vt_vaccines = $request->edit_vaccines;
            $vac->vt_nxtSched = $request->edit_vacSched;
            $vac->vt_status = $request->edit_vacStatus;
    
            if ($vac->save()) {
                // Log successful save
                Log::info('vaccineTaken_tbl updated successfully for vt_id: ' . $request->edit_vtId);
    
                // Only perform CRUD on sched_tbl if the Next Schedule value has changed
                if ($request->edit_vacSched !== $originalNextSchedule) {
                    // If Next Schedule is filled, create or update sched_tbl
                    if ($request->filled('edit_vacSched')) {
                        Log::info('Next schedule provided, updating or creating sched_tbl for vt_id: ' . $vac->vt_id);
    
                        sched_tbl::updateOrCreate(
                            ['vt_id' => $vac->vt_id],
                            ['sched_desc' => 'Immunization Schedule']
                        );
                    } else {
                        // If Next Schedule is empty, delete any existing sched_tbl record
                        Log::info('No next schedule provided, deleting sched_tbl record if it exists for vt_id: ' . $vac->vt_id);
    
                        sched_tbl::where('vt_id', $vac->vt_id)->delete();
                    }
                } else {
                    Log::info('Next schedule remains unchanged; no action taken on sched_tbl.');
                }
    
                return response()->json(['status' => 1, 'msg' => 'Record updated successfully.']);
            } else {
                Log::error('Failed to save vaccineTaken_tbl record for vt_id: ' . $request->edit_vtId);
                return response()->json(['status' => 0, 'msg' => 'Failed to update record.']);
            }
        }
        
        Log::error('Record not found for vt_id: ' . $request->edit_vtId);
        return response()->json(['status' => 0, 'msg' => 'Record not found.']);
    }
// END OF IMMUNIZATION

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

public function calendar(Request $request)
{
    // Fetch the logged-in user's information
    $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

    // Fetch all the schedule data along with the relationships
    $sched = sched_tbl::with([
        'vt.epi',    // Eager load epi (from vaccineTaken_tbl)
        'ap',        // Eager load 'ap' (from antepartum_tbl)
        'pp.maternal', // Eager load maternal (from postpartum_tbl)
        'sb.fp.client' // Eager load fp and client (from fpSideB_tbl)
    ])->get();

    // Prepare an array to hold the schedule events for the calendar
    $events = [];

    // Loop through each schedule and get the relevant date information
    foreach ($sched as $schedule) {
        // Normalize and check if sched_status is "Completed"
        if (strtolower(trim($schedule->sched_status)) === 'completed') {
            continue;  // Skip this iteration if the status is "Completed"
        }

        $fullName = '';

        // Check if `vt` and `epi` relationship exists and get the full name
        if ($schedule->vt && $schedule->vt->epi) {
            $fullName = $schedule->vt->epi->epi_lname . ' ' . $schedule->vt->epi->epi_fname . ' ' . $schedule->vt->epi->epi_mname;
        }

        // Check if the related record exists and get the dates for the vaccineTaken_tbl (vt)
        if ($schedule->vt) {
            $events[] = [
                'date' => $schedule->vt->vt_nxtSched,
                'description' => $schedule->sched_desc . ': ' . $schedule->vt->vt_nxtSched,
                'type' => 'vt',
                'id' => $schedule->vt->epi_id,
                'Name' => !empty($fullName) ? $fullName : ($schedule->ap->maternal->mother_id ?? '')
            ];
        }

        // Check if the `ap` relationship exists and add antepartum data
        if ($schedule->ap) {
            $events[] = [
                'date' => $schedule->ap->ap_nextVisit,
                'description' => $schedule->sched_desc . ': ' . $schedule->ap->ap_nextVisit,
                'type' => 'ap',
                'id' => $schedule->ap->mat_id,
                'Name' => !empty($schedule->ap->maternal->mat_urMaiden) 
                        ? $schedule->ap->maternal->mat_urMaiden 
                        : (
                            $schedule->ap->ap->maiden 
                                ? $schedule->ap->ap->maiden->res_fname . ' ' . 
                                $schedule->ap->ap->maiden->res_mname . ' ' . 
                                $schedule->ap->ap->maiden->res_lname . ' ' . 
                                ($schedule->ap->ap->maiden->suffix ?? '') 
                                : ''),
            ];
        }

        // Check if the `pp` relationship exists and add postpartum data
        if ($schedule->pp) {
            $events[] = [
                'date' => $schedule->pp->pp_dateNextVisit,
                'description' => $schedule->sched_desc . ': ' . $schedule->pp->pp_dateNextVisit,
                'type' => 'pp',
                'id' => $schedule->pp->mat_id,
                'Name' => !empty($schedule->pp->maternal->mat_urMaiden) 
                        ? $schedule->pp->maternal->mat_urMaiden 
                        : (
                            $schedule->pp->maternal->maiden 
                                ? $schedule->pp->maternal->maiden->res_fname . ' ' . 
                                $schedule->pp->maternal->maiden->res_mname . ' ' . 
                                $schedule->pp->maternal->maiden->res_lname . ' ' . 
                                ($schedule->pp->maternal->maiden->suffix ?? '') 
                                : ''),
            ];
        }

        // Check if the `sb` relationship exists and add sideB data
        if ($schedule->sb) {
            $events[] = [
                'date' => $schedule->sb->sideB_followUpVisit,
                'description' => $schedule->sched_desc . ': ' . $schedule->sb->sideB_followUpVisit,
                'type' => 'db',
                'id' => $schedule->sb->fp_id,
                'Name' => $schedule->sb->fp->client->res_fname . ' ' . $schedule->sb->fp->client->res_lname
            ];
        }
    }

    // Set headers for no-cache
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');

    // Pass the data to the view
    return view('dashboards/healthWorkerDb/calendar', [
        'LoggedUserInfo' => $loggedUserInfo,
        'events' => $events,
    ]);
}






//END OF FOR HEALTH WORKERS


// FOR SK KAGAWAD
    // FOR ARTICLE
        public function dbSk()
        {
            // Fetch logged-in employee information
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
        
            // Fetch all blogs where blog_author is the logged-in user
            $events = DB::table('schedule_tbls')
                ->where('em_id', '=', $loggedUserInfo->em_id)
                ->where('sched_status', '=', 'Pending Event') // Assuming drafts have 'Draft' status
                ->get();

            $blogs = DB::table('blogs_tbls')
                ->where('blog_author', '=', $loggedUserInfo->em_id)
                ->where('blog_status', '=', 'Draft') // Assuming drafts have 'Draft' status
                ->get();
        
            // Prepare data to be passed to the view
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'blogs' => $blogs, // Add blogs data
                'events' => $events,
            ];
        
            return view('dashboards/dbSk', $data);
        }

        public function createArt()
        {
            // Fetch logged-in employee information
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            // Prepare data to be passed to the view
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
            ];

            return view('dashboards/skDb/createArticle', $data);
        }

        public function articleInput(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'inputTitle' => 'required',
                'inputSubTitle' => 'required',
                'inputQoute' => 'required',
                'inputDate' => 'required',
                'inputContent' => 'required',
                'inputCategory' => 'required',
                'inputAuthor' => 'required',
                'inputImg' => 'required|mimes:jpeg,png,jpg,svg',
                'inputImgLoc' => 'required',
                'inputImgOwn' => 'required',
                'inputFbLink' => 'required',
                'inputXLink' => 'required',
                'inputInsLink' => 'required',
            ], [
                // Custom error messages
                'required' => 'This field is required.',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            } else {
                $blogs = new blogs_tbl;
                $blogs->blog_title = $request->inputTitle;
                $blogs->blog_subtitle = $request->inputSubTitle;
                $blogs->blog_qoute = $request->inputQoute;
                $blogs->blog_description = $request->inputContent;
                $blogs->blog_date = $request->inputDate;
                $blogs->blog_category = $request->inputCategory;
                $blogs->blog_author = $request->inputAuthor;
                $blogs->blog_picLocation = $request->inputImgLoc;
                $blogs->blog_picOwner = $request->inputImgOwn;
                $blogs->blog_fbLink = $request->inputFbLink;
                $blogs->blog_xLink = $request->inputXLink;
                $blogs->blog_insLink = $request->inputInsLink;

                $blogs->blog_status = $request->input('blogStatus', 'Draft');

                // Save primary image
                if ($request->hasFile('inputImg')) {
                    $picFile2 = $request->file('inputImg');
                    $picFileName2 = uniqid() . '.' . $picFile2->getClientOriginalExtension();
                    $picFilePath2 = 'public/assets/img/blogs/' . $picFileName2;
                    $picFile2->move(public_path('assets/img/blogs'), $picFileName2);
                    $blogs->blog_pic = $picFilePath2; // Store the image path
                }

                if ($blogs->save()) {
                    return response()->json(['status' => 1, 'msg' => 'New article has been added.']);
                } else {
                    return response()->json(['status' => 0, 'msg' => 'Failed to add new article.'], 500);
                }
            }
        }


        public function myDraft($em_id)
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $blogs = blogs_tbl::where('blog_status', 'Draft')->whereBetween('blog_date', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->endOfDay()])->where('blog_author', $em_id)->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'blogs' => $blogs,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('dashboards/skDb/myDraft', $data);
        }

        public function mySubmission($em_id)
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $blogs = blogs_tbl::whereIn('blog_status', ['Pending Article', 'Published', 'Declined'])
            ->whereBetween('blog_date', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])
            ->where('blog_author', $em_id) // Filter by the 'blog_author' (the 'em_id' from the URL)
            ->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'blogs' => $blogs,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('dashboards/skDb/mySubmission', $data);
        }

        public function editArticle($id)
        {
            $currentYear = Carbon::now()->year;

            $blogs = blogs_tbl::where('blog_id', $id)->first();
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'blogs' => $blogs,
            ];

            if (!$blogs) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            return view('dashboards/skDb/editArticle', $data);
        }

        public function updateArticle(Request $request, $blogId)
        {
            // Find the blog by its ID
            $blog = blogs_tbl::where('blog_id', $blogId)->firstOrFail();

            // Update blog post fields
            $blog->blog_title = $request->input('inputTitle');
            $blog->blog_subtitle = $request->input('inputSubTitle');
            $blog->blog_qoute = $request->input('inputQoute');
            $blog->blog_date = $request->input('inputDate');
            $blog->blog_description = $request->input('inputContent');
            $blog->blog_category = $request->input('inputCategory');
            $blog->blog_author = $request->input('inputAuthor');
            $blog->blog_fbLink = $request->input('inputFbLink');
            $blog->blog_xLink = $request->input('inputXLink');
            $blog->blog_insLink = $request->input('inputInsLink');
            $blog->blog_picLocation = $request->input('inputImgLoc');
            $blog->blog_picOwner = $request->input('inputImgOwn');
        
            if ($request->hasFile('inputImg')) {
                // Get the uploaded file
                $image = $request->file('inputImg');

                // Generate a random, unique image name using Str::random() method
                $imageName = Str::random(12) . '.' . $image->getClientOriginalExtension(); // 12-character unique name

                // Direct path to the pre-existing 'public/assets/img/blogs'
                $destinationPath = public_path('assets/img/blogs');

                // Save the file directly to 'public/assets/img/blogs' without creating new directories
                $image->move($destinationPath, $imageName);

                // Save the relative path in the database (no 'storage' prefix)
                $blog->blog_pic = 'public/assets/img/blogs/' . $imageName; // Relative path
            }

            // Recommended links and images (for the recommended news section)
            for ($i = 1; $i <= 4; $i++) {
                $recLink = $request->input("inputRec{$i}");
                $recTitle = $request->input("inputRecTitle{$i}");
                $recImgField = $request->file("inputRecImg{$i}");

                if ($recLink || $recTitle || $recImgField) {
                    $blog->{"blog_recommend{$i}"} = $recLink;
                    $blog->{"blog_recommendTitle{$i}"} = $recTitle;

                    if ($recImgField) {
                        // Handle recommended images upload
                        $recImageName = Str::random(12) . '-' . $i . '.' . $recImgField->getClientOriginalExtension();

                        // Direct path for recommended images to the pre-existing folder
                        $recImagePath = public_path('assets/img/blogs');

                        // Save the recommended image file directly to the folder (no creation of directories)
                        $recImgField->move($recImagePath, $recImageName);

                        // Save the relative path for the recommended image
                        $blog->{"blog_recommendPic{$i}"} = 'public/assets/img/blogs/' . $recImageName;
                    }
                }
            }


            // Save the blog status (draft or submitted)
            if ($request->has('blogStatus') && $request->input('blogStatus') === 'Draft') {
                $blog->blog_status = 'Draft';
            } else {
                $blog->blog_status = 'Pending Article';
            }

            // $blogs->blog_status = $request->input('blogStatus', 'Draft');

            // Save the blog
            $blog->save();

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Article updated successfully!',
            ]);
        }

        public function updateArticleStatus(Request $request)
        {
            $request->validate([
                'id' => 'required|integer|exists:blogs_tbls,blog_id', // Changed to 'id'
                'status' => 'required|string' // Changed to 'status'
            ]);

            $blogs = blogs_tbl::find($request->id); // Changed to 'id'
            $blogs->blog_status = $request->status; // Ensure this is correctly set
            $blogs->save();

            return response()->json(['success' => true]);
        }

    // FOR  PUBLIC AND PRIVATE EVENTS
        public function createEvent()
        {
            // Fetch logged-in employee information
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            // Prepare data to be passed to the view
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
            ];

            return view('dashboards/skDb/createEvent', $data);
        }

        public function eventInput(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'inputDate' => 'required',
                'inputTitle' => 'required',
                'inputDesc' => 'required',
                'inputType' => 'required',
                'inputImg' => 'required|mimes:jpeg,png,jpg,svg',

            ], [
                // Custom error messages
                'required' => 'This field is required.',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            } else {
                $events = new schedule_tbl;
                $events->sched_title = $request->inputTitle;
                $events->sched_description = $request->inputDesc;
                $events->sched_date = $request->inputDate;
                $events->sched_type = $request->inputType;
                $events->em_id = $request->inputEmp;
                $events->sched_status = 'Pending Event';

                // Save primary image
                if ($request->hasFile('inputImg')) {
                    $picFile2 = $request->file('inputImg');
                    $picFileName2 = uniqid() . '.' . $picFile2->getClientOriginalExtension();
                    $picFilePath2 = 'public/assets/img/events/' . $picFileName2;
                    $picFile2->move(public_path('assets/img/events'), $picFileName2);
                    $events->sched_picture = $picFilePath2; // Store the image path
                }

                if ($events->save()) {
                    return response()->json(['status' => 1, 'msg' => 'New Event has been added.']);
                } else {
                    return response()->json(['status' => 0, 'msg' => 'Failed to add new event.'], 500);
                }
            }
        }


        public function eventLists($em_id)
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $events = schedule_tbl::whereIn('sched_status', ['Pending Event', 'Accepted', 'Denied', 'Archived'])->where('em_id', $em_id)->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'events' => $events,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('dashboards/skDb/eventList', $data);
        }

        public function editEvent($id)
        {
            $currentYear = Carbon::now()->year;

            $event = schedule_tbl::where('sched_id', $id)->first();
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'event' => $event,
            ];

            if (!$event) {
                return redirect()->back()->with('error', 'Destrict Referral record not found.');
            }
            return view('dashboards/skDb/editEvent', $data);
        }

        public function updateEvent(Request $request, $schedId)
        {
            $event = schedule_tbl::where('sched_id', $schedId)->firstOrFail();

            $event->em_id = $request->input('empId');
            $event->sched_date = $request->input('inputDate');
            $event->sched_title = $request->input('inputTitle');
            $event->sched_description = $request->input('inputContent');
            $event->sched_type = $request->input('inputType');
            $event->sched_status = $request->input('inputStatus');
        
            if ($request->hasFile('inputImg')) {
                $image = $request->file('inputImg');
                $imageName = Str::random(12) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/events');
                $image->move($destinationPath, $imageName);
                $event->sched_picture = 'public/assets/img/events/' . $imageName;
            }

            // Save the blog
            $event->save();

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Event updated successfully!',
            ]);
        }

        public function updateEventStatus(Request $request)
        {
            $request->validate([
                'id' => 'required|integer|exists:schedule_tbls,sched_id', // Changed to 'id'
                'status' => 'required|string' // Changed to 'status'
            ]);

            $event = schedule_tbl::find($request->id); // Changed to 'id'
            $event->sched_status = $request->status; // Ensure this is correctly set
            $event->save();

            return response()->json(['success' => true]);
        }

// END OF SK KAGAWAD

// SK CHAIRMAN
    public function dbSkChairman()
    {
        // Fetch logged-in employee information
        $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

        // Fetch all blogs where blog_author is the logged-in user
        $events = DB::table('schedule_tbls')
            ->where('em_id', '=', $loggedUserInfo->em_id)
            ->where('sched_status', '=', 'Pending Event') // Assuming drafts have 'Draft' status
            ->get();

        $blogs = DB::table('blogs_tbls')
            ->where('blog_status', '=', 'Pending Article') // Assuming drafts have 'Draft' status
            ->get();

        // Prepare data to be passed to the view
        $data = [
            'LoggedUserInfo' => $loggedUserInfo,
            'blogs' => $blogs, // Add blogs data
            'events' => $events,
        ];

        return view('dashboards/dbSkChairman', $data);
    }

    // BLOGS
        public function submittedBlogs()
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $blogs = blogs_tbl::where('blog_status', 'Pending Article')->whereBetween('blog_date', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->endOfDay()])->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'blogs' => $blogs,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('/dashboards/skChairmanDb/submittedBlogs', $data);
        }

        public function publishedBlogs()
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $blogs = blogs_tbl::where('blog_status', 'Published')->whereBetween('blog_date', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->endOfDay()])->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'blogs' => $blogs,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('/dashboards/skChairmanDb/publishedBlogs', $data);
        }

        public function archivedBlogs()
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $blogs = blogs_tbl::whereIn('blog_status', ['Archive', 'Denied'])->whereBetween('blog_date', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->endOfDay()])->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'blogs' => $blogs,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('dashboards/skChairmanDb/archivedBlogs', $data);
        }

        public function viewBlogs($id)
        {
            $currentYear = Carbon::now()->year;

            $blogs = blogs_tbl::where('blog_id', $id)->first();
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'blogs' => $blogs,
            ];

            if (!$blogs) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            return view('dashboards/skChairmanDb/viewBlogs', $data);
        }

        public function updateArticleStatus1(Request $request)
        {
            $request->validate([
                'id' => 'required|integer|exists:blogs_tbls,blog_id', // Validate the blog ID
                'status' => 'required|string', // Validate the status (it will be "Denied")
                'reason' => 'nullable|string' // Validate the reason for denial
            ]);
        
            // Find the blog by ID
            $blogs = blogs_tbl::find($request->id);
        
            // Update the blog's status and reason
            $blogs->blog_status = $request->status;  // Set status to 'Denied'
            $blogs->blog_reason = $request->reason;  // Set the reason for denial
        
            // Save the updated blog record
            $blogs->save();
        
            // Return a success response
            return response()->json(['success' => true]);
        }
        
        public function recInput(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'inputRec1' => 'required',
                'inputRecTitle1' => 'required',
                'inputRecImg1' => 'required|mimes:jpeg,png,jpg,svg',
                'inputRec2' => 'required',
                'inputRecTitle2' => 'required',
                'inputRecImg2' => 'required|mimes:jpeg,png,jpg,svg',
                'inputRec3' => 'required',
                'inputRecTitle3' => 'required',
                'inputRecImg3' => 'required|mimes:jpeg,png,jpg,svg',
                'inputRec4' => 'required',
                'inputRecTitle4' => 'required',
                'inputRecImg4' => 'required|mimes:jpeg,png,jpg,svg',
            ], [
                // Custom error messages
                'required' => 'This field is required.',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            } else {
                $news = new recNews_tbl;

                $news->em_id = $request->empId;
                $news->rec_status = 'Pending News';

                $news->rec_link1 = $request->inputRec1;
                $news->rec_title1 = $request->inputRecTitle1;
                if ($request->hasFile('inputRecImg1')) {
                    $recFile1 = $request->file('inputRecImg1');
                    $recFileName1 = uniqid() . '.' . $recFile1->getClientOriginalExtension();
                    $recFilePath1 = 'public/assets/img/blogs/' . $recFileName1;
                    $recFile1->move(public_path('assets/img/blogs'), $recFileName1);
                    $news->rec_img1 = $recFilePath1; // Store the image path
                }
                
                $news->rec_link2 = $request->inputRec2;
                $news->rec_title2 = $request->inputRecTitle2;
                if ($request->hasFile('inputRecImg2')) {
                    $recFile2 = $request->file('inputRecImg2');
                    $recFileName2 = uniqid() . '.' . $recFile2->getClientOriginalExtension();
                    $recFilePath2 = 'public/assets/img/blogs/' . $recFileName2;
                    $recFile2->move(public_path('assets/img/blogs'), $recFileName2);
                    $news->rec_img2 = $recFilePath2; // Store the image path
                }
                
                $news->rec_link3 = $request->inputRec3;
                $news->rec_title3 = $request->inputRecTitle3;
                if ($request->hasFile('inputRecImg3')) {
                    $recFile3 = $request->file('inputRecImg3');
                    $recFileName3 = uniqid() . '.' . $recFile3->getClientOriginalExtension();
                    $recFilePath3 = 'public/assets/img/blogs/' . $recFileName3;
                    $recFile3->move(public_path('assets/img/blogs'), $recFileName3);
                    $news->rec_img3 = $recFilePath3; // Store the image path
                }
                
                $news->rec_link4 = $request->inputRec4;
                $news->rec_title4 = $request->inputRecTitle4;
                if ($request->hasFile('inputRecImg4')) {
                    $recFile4 = $request->file('inputRecImg4');
                    $recFileName4 = uniqid() . '.' . $recFile4->getClientOriginalExtension();
                    $recFilePath4 = 'public/assets/img/blogs/' . $recFileName4;
                    $recFile4->move(public_path('assets/img/blogs'), $recFileName4);
                    $news->rec_img4 = $recFilePath4; // Store the image path
                }

                if ($news->save()) {
                    return response()->json(['status' => 1, 'msg' => 'News has been added.']);
                } else {
                    return response()->json(['status' => 0, 'msg' => 'Failed to add News.'], 500);
                }
            }
        }
        
        public function createArt1()
        {
            // Fetch logged-in employee information
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            // Prepare data to be passed to the view
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
            ];

            return view('dashboards/skChairmanDb/createArticle', $data);
        }

        public function submittedNews()
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $blogs = recNews_tbl::whereIn('rec_status', ['Pending News'])
            ->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])
            ->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'blogs' => $blogs,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('dashboards/skChairmanDb/submittedNews', $data);
        }

        public function viewNews($id)
        {
            $currentYear = Carbon::now()->year;

            $blogs = recNews_tbl::where('rec_id', $id)->first();
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'blogs' => $blogs,
            ];

            if (!$blogs) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            return view('dashboards/skChairmanDb/viewNews', $data);
        }

        public function updateNews(Request $request, $blogId)
        {
            // Find the blog by its ID
            $blog = recNews_tbl::where('rec_id', $blogId)->firstOrFail();

            for ($i = 1; $i <= 4; $i++) {
                $recLink = $request->input("inputRec{$i}");
                $recTitle = $request->input("inputRecTitle{$i}");
                $recImgField = $request->file("inputRecImg{$i}");

                if ($recLink || $recTitle || $recImgField) {
                    $blog->{"rec_link{$i}"} = $recLink;
                    $blog->{"rec_title{$i}"} = $recTitle;

                    if ($recImgField) {
                        // Handle recommended images upload
                        $recImageName = Str::random(12) . '-' . $i . '.' . $recImgField->getClientOriginalExtension();

                        // Direct path for recommended images to the pre-existing folder
                        $recImagePath = public_path('assets/img/blogs');

                        // Save the recommended image file directly to the folder (no creation of directories)
                        $recImgField->move($recImagePath, $recImageName);

                        // Save the relative path for the recommended image
                        $blog->{"rec_img{$i}"} = 'public/assets/img/blogs/' . $recImageName;
                    }
                }
            }

            // $blogs->blog_status = $request->input('blogStatus', 'Draft');

            // Save the blog
            $blog->save();

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Article updated successfully!',
            ]);
        }

        public function updateNewsStatus(Request $request)
        {
            $request->validate([
                'id' => 'required|integer|exists:rec_news_tbls,rec_id', // Changed to 'id'
                'status' => 'required|string' // Changed to 'status'
            ]);

            $blogs = recNews_tbl::find($request->id); // Changed to 'id'
            $blogs->rec_status = $request->status; // Ensure this is correctly set
            $blogs->save();

            return response()->json(['success' => true]);
        }
    
    // EVENTS
        public function submittedEvents()
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $events = schedule_tbl::whereIn('sched_status', ['Pending Event'])->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'events' => $events,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('dashboards/skChairmanDb/submittedEvents', $data);
        }

        public function createEvent1()
        {
            // Fetch logged-in employee information
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            // Prepare data to be passed to the view
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
            ];

            return view('dashboards/skChairmanDb/createEvent', $data);
        }

        public function eventLists1($em_id)
        {
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();
            $resident = resident_tbl::all();
            $events = schedule_tbl::whereIn('sched_status', ['Pending Event', 'Accepted', 'Denied', 'Archived'])->where('em_id', $em_id)->get();

            // Merge all the data into a single array
            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'residents' => $resident,
                'events' => $events,
            ];

            // Set headers for no-cache
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            return view('dashboards/skChairmanDb/eventList', $data);
        }

        public function editEvent1($id)
        {
            $currentYear = Carbon::now()->year;

            $event = schedule_tbl::where('sched_id', $id)->first();
            $loggedUserInfo = employee_tbl::where('em_id', '=', session('LoggedUser'))->first();

            $data = [
                'LoggedUserInfo' => $loggedUserInfo,
                'event' => $event,
            ];

            if (!$event) {
                return redirect()->back()->with('error', 'Record not found.');
            }
            return view('dashboards/skChairmanDb/editEvent', $data);
        }
// END OF SK CHAIRMAN
}
