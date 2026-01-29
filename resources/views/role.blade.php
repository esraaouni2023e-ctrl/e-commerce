@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Select Your Role</h5>
                    <p class="text-muted">Choose your account type to proceed</p>
                </div>
                <div class="p-2 mt-4">
                    <form method="POST" action="{{ route('role.redirect') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="client">Client</option>
                                <option value="boutique">Boutique</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-4 text-center">
            <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="fw-semibold text-primary">Login</a></p>
        </div>
    </div>
</div>

@endsection
