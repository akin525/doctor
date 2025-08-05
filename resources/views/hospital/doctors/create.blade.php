@extends('layouts.sidebar')
@section('title', 'Add Patients')
@section('content')
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Add Patients</h3>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <!-- Patient Basic Information -->
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Patient Basic Information</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="middlename" class="form-label">Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" id="middlename">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" id="dob">
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control" id="age" required min="0">
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" checked>
                                                <label class="form-check-label" for="genderMale">Male</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
                                                <label class="form-check-label" for="genderFemale">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="marital_status" class="form-label">Marital Status</label>
                                    <select name="marital_status" class="form-control" id="marital_status">
                                        <option selected disabled>Select Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="blood_group" class="form-label">Blood Group</label>
                                    <select name="blood_group" class="form-control" id="blood_group">
                                        <option selected disabled>Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="address">
                                </div>
                                <div class="col-md-6">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <input type="text" name="nationality" class="form-control" id="nationality">
                                </div>
                                <div class="col-md-6">
                                    <label for="next_of_kin" class="form-label">Next of Kin Name</label>
                                    <input type="text" name="next_of_kin" class="form-control" id="next_of_kin">
                                </div>
                                <div class="col-md-6">
                                    <label for="kin_phone" class="form-label">Next of Kin Phone</label>
                                    <input type="text" name="kin_phone" class="form-control" id="kin_phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="admit_date" class="form-label">Admit Date</label>
                                    <input type="date" name="admit_date" class="form-control" id="admit_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="division" class="form-label">Division</label>
                                    <select name="division" class="form-control" id="division">
                                        <option>Select option</option>
                                        <option value="Cardiologist">Cardiologist</option>
                                        <option value="Physician">Physician</option>
                                        <option value="Orthopedic">Orthopedic</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="medical_history" class="form-label">Medical History</label>
                                    <textarea class="form-control" id="medical_history" name="medical_history" rows="3"></textarea>
                                </div>
                                <!-- Extended Medical History -->
                                <div class="card mb-3 mt-4">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold">Extended Medical History</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="xyz" id="xyz">
                                                    <label class="form-check-label" for="xyz">XYZ</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="asthma" id="asthma">
                                                    <label class="form-check-label" for="asthma">Asthma</label>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="present_medication" class="form-label">Present Medication</label>
                                                    <input type="text" name="present_medication" id="present_medication" class="form-control">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="past_surgical_history" class="form-label">Past Surgical History</label>
                                                    <input type="text" name="past_surgical_history" id="past_surgical_history" class="form-control">
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="refractive_error" id="refractive_error">
                                                    <label class="form-check-label" for="refractive_error">Positive History of Refractive Error</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="known_allergies" class="form-label">Known Allergies</label>
                                                    <input type="text" name="known_allergies" id="known_allergies" class="form-control">
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="glaucoma_history" id="glaucoma_history">
                                                    <label class="form-check-label" for="glaucoma_history">Positive History of Glaucoma</label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="smoking" id="smoking">
                                                    <label class="form-check-label" for="smoking">Smoking or Tobacco Use</label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="alcohol" id="alcohol">
                                                    <label class="form-check-label" for="alcohol">Alcohol</label>
                                                </div>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" name="herbal_concoction" id="herbal_concoction">
                                                    <label class="form-check-label" for="herbal_concoction">Herbal Concoction</label>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label for="review_of_systems" class="form-label">Review of Systems</label>
                                                    <textarea class="form-control" name="review_of_systems" id="review_of_systems" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Optional Registration Information (Billing, Doctor Assignment, etc.) -->
                {{-- You can uncomment and reuse this section when billing info is needed --}}
            </div>
        </div>
    </div>
@endsection
