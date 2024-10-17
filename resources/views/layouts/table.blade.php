<style>
    
</style>

<div class="sideBar">
    <div class="sLogoPic">
        <img src="/images/logo.png" class="logo" alt="brgy logo">
        <h2 class="systemName">BIM SYSTEM</h2>
    </div>

    <div class="profNameCon" onclick="toggleDropdown()">
        @if($LoggedUserInfo)
            <div class="profilePart">
                <img src="/storage/{{ $LoggedUserInfo['em_picture']}}" class="profilePicEmp" alt="employee profile">
            </div>

            <div class="namePart">
                <h4 class="profName">{{ $LoggedUserInfo['em_fname'] . ' ' . $LoggedUserInfo['em_lname'] }}</h4>
                <input type="hidden" name="idVal" value="{{ $LoggedUserInfo['em_id']}}">
                <h5 class="position">{{ $LoggedUserInfo['em_position']}}</h5>
            </div>

            <div class="optionPartBtn">
                <h6>&#9660;</h6>
            </div>

            <div class="optionPart dropdown-content" id="dropdownContent">
                <button type="button" value="{{ $LoggedUserInfo['em_id'] }}" class="changeProf editProfile" onclick='openEditEmpForm(@json($LoggedUserInfo))'>Change Profile</button>
                <a href="{{ route('regValidation.logout') }}">Logout</a>
            </div>
        @else
            <p>You are not logged in.</p>
        @endif
    </div>

    <div class="navBar">
        <a href="{{ action('App\Http\Controllers\regValidation@dashboard') }}"><div class="secDashboard">
            <button class="btnSecDashboard act"><span class="dashb"> <i class='bx bxs-home'></i> Dashboard</span></button>
        </div></a>

        <a href="{{ action('App\Http\Controllers\regValidation@residentsRec') }}"><div class="resRecord">
            <button class="btnResRecord"><span class="resR"> <i class='bx bx-group'></i> Resident Record</span></button>
        </div></a>

        <a href="{{ action('App\Http\Controllers\regValidation@barangayCert') }}"><div class="resRecord">
            <button class="btnResRecord"><span class="resR"> <i class='bx bxs-certification'></i>Certifications</span></button>
        </div></a>

        <a href="{{ action('App\Http\Controllers\regValidation@barangayClearance') }}"><div class="resRecord">
            <button class="btnResRecord"><span class="resR"> <i class='bx bx-file'></i>Barangay Clearance</span></button>
        </div></a>

        <a href="{{ action('App\Http\Controllers\regValidation@dbBlotter') }}"><div class="resRecord">
            <button class="btnResRecord"><span class="resR"> <i class='bx bx-folder-open'></i> Blotter Records</span></button>
        </div></a>

        <a href="{{ action('App\Http\Controllers\regValidation@businessPermit') }}"><div class="resRecord">
            <button class="btnResRecord"><span class="resR"><i class='bx bxs-book-open'></i>Business Permit</span></button>
        </div></a>

        <a href="{{ action('App\Http\Controllers\regValidation@requestedDoc') }}"><div class="resRecord">
            <button class="btnResRecord"><span class="resR"> <i class='bx bxs-file-import'></i>Transaction Documents</span></button>
        </div></a>


        <a href="{{ action('App\Http\Controllers\regValidation@dashboardPur') }}"><div class="resRecord">
            <button class="btnResRecord"><span class="resR"> <i class='bx bx-current-location'></i> Purok</span></button>
        </div></a>
    </div>
</div>