@php $user = auth()->user(); @endphp

<section class="profile_form pt-5 pb-5 bg-white text-dark px-5 rounded mt-3 shadow-sm">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customer.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control"
                    value="{{ old('first_name', $user->first_name) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control"
                    value="{{ old('last_name', $user->last_name) }}">
            </div>
            <div class="col-md-12">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
            </div>
            <div class="col-md-8">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Apartment</label>
                <input type="text" name="apartment" class="form-control"
                    value="{{ old('apartment', $user->apartment) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Zip Code</label>
                <input type="text" name="zip_code" class="form-control"
                    value="{{ old('zip_code', $user->zip_code) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Country</label>
                <input type="text" name="country" class="form-control" value="{{ old('country', $user->country) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-dark mt-4">Save Changes</button>
    </form>
</section>
