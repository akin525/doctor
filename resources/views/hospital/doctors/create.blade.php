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
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" required>
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
                                    <label for="admit_date" class="form-label">Admit Date</label>
                                    <input type="date" name="admit_date" class="form-control" id="admit_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="date" name="age" class="form-control" id="age" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="division" class="form-label">Division</label>
                                    <select  name="division" class="form-control" id="division">
                                        <option>Select option</option>
                                        <option value="Cardiologist">Cardiologist</option>
                                        <option value="Physician">Physician</option>
                                        <option value="Orthopedic">Orthopedic</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
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
                                <div class="col-md-12">
                                    <label for="medical_history" class="form-label">Medical History</label>
                                    <textarea class="form-control" id="medical_history" name="medical_history" rows="3"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Registration Information -->
{{--                <div class="card">--}}
{{--                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">--}}
{{--                        <h6 class="mb-0 fw-bold">Registration Information</h6>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('patients.registration') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="row g-3 align-items-center">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="payment_option" class="form-label">Select Payment Option</label>--}}
{{--                                    <select class="form-select" name="payment_option" id="payment_option">--}}
{{--                                        <option selected disabled>Payment Option</option>--}}
{{--                                        <option value="credit">Credit Card</option>--}}
{{--                                        <option value="debit">Debit Card</option>--}}
{{--                                        <option value="cash">Cash</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label class="form-label">Insurance Information</label>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="radio" name="insurance" id="insuranceYes" value="yes" checked>--}}
{{--                                                <label class="form-check-label" for="insuranceYes">Yes</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="radio" name="insurance" id="insuranceNo" value="no">--}}
{{--                                                <label class="form-check-label" for="insuranceNo">No</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="insurance_number" class="form-label">Insurance Number</label>--}}
{{--                                    <input type="text" name="insurance_number" class="form-control" id="insurance_number">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="ward_number" class="form-label">Ward Number</label>--}}
{{--                                    <input type="text" name="ward_number" class="form-control" id="ward_number">--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="doctor_id" class="form-label">Select Doctor</label>--}}
{{--                                    <select class="form-select" name="doctor_id" id="doctor_id">--}}
{{--                                        <option selected disabled>Select Doctor</option>--}}
{{--                                        <option value="1">Vanessa Miller</option>--}}
{{--                                        <option value="2">Rebecca Hunter</option>--}}
{{--                                        <option value="3">Matt Clark</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="advance_amount" class="form-label">Advance Amount</label>--}}
{{--                                    <input type="text" name="advance_amount" class="form-control" id="advance_amount">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <button type="submit" class="btn btn-primary mt-4">Submit</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
