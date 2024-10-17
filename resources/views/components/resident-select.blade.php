<div>
    <div class="col-md-6">
        <label for="inputPatientName" class="form-label">Patient's Name</label>
        <select id="inputPatientName" class="form-control" name="inputPatientName" onchange="updateResidentDetails(this)">
            <option value="">Select...</option>
            @foreach($residents as $resident)
                <option value="{{ json_encode($resident) }}">
                    {{ $resident->res_id }} - {{ $resident->res_lname }}, {{ $resident->res_fname }} {{ $resident->res_mname }} {{ $resident->res_suffix ?? '' }}
                </option>
            @endforeach
        </select>
    </div>
</div>
