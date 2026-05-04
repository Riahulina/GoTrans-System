@extends('user.layout')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- HEADER -->
            <div class="profile-card mb-4">
                <h3 class="fw-bold mb-1">Edit Profil</h3>
                <p class="text-muted mb-0">Kelola informasi akun dan keamanan Anda</p>
            </div>

            <!-- UPDATE PROFILE -->
            <div class="custom-card mb-4">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- UPDATE PASSWORD -->
            <div class="custom-card mb-4">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- DELETE ACCOUNT -->
            <div class="custom-card danger-card">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>

<style>
body {
    background: #f8f9fa;
}

/* HEADER CARD */
.profile-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.07);
}

/* FORM CARD */
.custom-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

/* DELETE CARD */
.danger-card {
    border-left: 4px solid #dc3545;
}

/* FORM INPUT */
input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #dee2e6;
    border-radius: 12px;
    margin-top: 8px;
    margin-bottom: 15px;
    outline: none;
}

input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13,110,253,0.15);
}

/* BUTTON */
button {
    border-radius: 12px !important;
    padding: 10px 18px !important;
    font-weight: 500;
}

/* LABEL */
label {
    font-weight: 500;
    margin-bottom: 5px;
}

/* ERROR */
.text-red-600 {
    font-size: 14px;
    margin-top: 5px;
}

/* RESPONSIVE */
@media(max-width:768px){
    .custom-card,
    .profile-card{
        padding:20px;
    }
}
</style>

@endsection