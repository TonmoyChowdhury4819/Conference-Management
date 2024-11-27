@extends('dashboard.layouts.superadmindefault')
@section('abc')

<div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->
    <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
        </div>
    </div>
    <hr class="my-0">
    <div class="card-body">
        <form method="POST" action="{{ url('update-user/'.$user->id) }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Country</label>
                    <select name="country" class="select2 form-select">
                        <option value="">Select Country</option>
                        <option {{ $user->country=='Australia' ? 'selected' : '' }} value="Australia">Australia</option>
                        <option {{ $user->country=='Bangladesh' ? 'selected' : '' }} value="Bangladesh">Bangladesh</option>
                        <option {{ $user->country=='Belarus' ? 'selected' : '' }} value="Belarus">Belarus</option>
                        <option {{ $user->country=='Brazil' ? 'selected' : '' }} value="Brazil">Brazil</option>
                        <option {{ $user->country=='Canada' ? 'selected' : '' }} value="Canada">Canada</option>
                        <option {{ $user->country=='China' ? 'selected' : '' }} value="China">China</option>
                        <option {{ $user->country=='France' ? 'selected' : '' }} value="France">France</option>
                        <option {{ $user->country=='Germany' ? 'selected' : '' }} value="Germany">Germany</option>
                        <option {{ $user->country=='India' ? 'selected' : '' }} value="India">India</option>
                        <option {{ $user->country=='Indonesia' ? 'selected' : '' }} value="Indonesia">Indonesia</option>
                        <option {{ $user->country=='Israel' ? 'selected' : '' }} value="Israel">Israel</option>
                        <option {{ $user->country=='Italy' ? 'selected' : '' }} value="Italy">Italy</option>
                        <option {{ $user->country=='Japan' ? 'selected' : '' }} value="Japan">Japan</option>
                        <option {{ $user->country=='Korea' ? 'selected' : '' }} value="Korea">Korea, Republic of</option>
                        <option {{ $user->country=='Mexico' ? 'selected' : '' }} value="Mexico">Mexico</option>
                        <option {{ $user->country=='Philippines' ? 'selected' : '' }} value="Philippines">Philippines</option>
                        <option {{ $user->country=='Russian' ? 'selected' : '' }} value="Russia">Russian Federation</option>
                        <option {{ $user->country=='South Africa' ? 'selected' : '' }} value="South Africa">South Africa</option>
                        <option {{ $user->country=='Thailand' ? 'selected' : '' }} value="Thailand">Thailand</option>
                        <option {{ $user->country=='Turkey' ? 'selected' : '' }} value="Turkey">Turkey</option>
                        <option {{ $user->country=='Ukraine' ? 'selected' : '' }} value="Ukraine">Ukraine</option>
                        <option {{ $user->country=='United Arab Emirates' ? 'selected' : '' }} value="United Arab Emirates">United Arab Emirates</option>
                        <option {{ $user->country=='United Kingdom' ? 'selected' : '' }} value="United Kingdom">United Kingdom</option>
                        <option {{ $user->country=='United States' ? 'selected' : '' }} value="United States">United States</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="salutation" class="form-label">Salutation</label>
                    <select name="salutation" class="select2 form-select">
                        <option value="">Select Status</option>
                        <option {{ $user->salutation=='Mr.' ? 'selected' : '' }} value="Mr.">Mr.</option>
                        <option {{ $user->salutation=='Mrs.' ? 'selected' : '' }} value="Mrs.">Mrs.</option>
                        <option {{ $user->salutation=='Ms.' ? 'selected' : '' }} value="Ms.">Ms.</option>
                        <option {{ $user->salutation=='Dr.' ? 'selected' : '' }} value="Dr.">Dr.</option>
                        <option {{ $user->salutation=='Prof.' ? 'selected' : '' }} value="Prof.">Prof.</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="select2 form-select">
                        <option value="">Select Status</option>
                        <option {{ $user->status=='Student' ? 'selected' : '' }} value="Student">Student</option>
                        <option {{ $user->status=='Academia' ? 'selected' : '' }} value="Academia">Academia</option>
                        <option {{ $user->status=='Industry' ? 'selected' : '' }} value="Industry">Industry</option>
                        <option {{ $user->status=='Government' ? 'selected' : '' }} value="Government">Government</option>
                        <option {{ $user->status=='Other' ? 'selected' : '' }} value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">First Name</label>
                    <input class="form-control" type="text" value="{{ $user->first_name}}" name="first_name" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Last Name</label>
                    <input class="form-control" type="text" value="{{ $user->last_name}}" name="last_name">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" value="{{ $user->address}}" name="address">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ $user->email}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ $user->password}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Role</label>
                    <select name="role" class="select2 form-select">
                        <option value="">Select Role</option>
                        <option {{ $user->role=='Author' ? 'selected' : '' }} value="Author">Author</option>
                        <option {{ $user->role=='Reviewer' ? 'selected' : '' }} value="Reviewer">Reviewer</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Approval</label>
                    <select name="is_approved" class="select2 form-select">
                        <option {{ $user->is_approved=='0' ? 'selected' : '' }} value="0">Decline</option>
                        <option {{ $user->is_approved=='1' ? 'selected' : '' }} value="1">Accept</option>
                    </select>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>
    <!-- /Account -->
</div>

@endsection