@extends('user.layouts.main')
@section('body')
<div class="main_section">
    @include('user.layouts.sidenav')
    <div class="content-area">
        <div class="mobilebar">
          <div class="logo sml">iX</div>
          <div class="mbh">
          <button class="mnubtn" onclick="slideMenu()"><i class="fa fa-bars" aria-hidden="true"></i></button>
          </div>
        </div>
        <div class="page-title">Inventory</div>
        <div class="page-desc">View and manage your stock</div>
    <div class="genral-infor">
        <h6 class="font-20 fw_600">General Information</h6>

        <div class="profile-creation d-flex align-items-center">
            <div class="admin-profile">
                <h6 class="font-16 fw_600">Admin</h6>
            </div>
        </div>
        <form>
            <div class="input-detail d-flex align-items-center">
                <div class="login-name error d-flex flex-column">
                    <label class="font-18 fw_500" for="fname">First
                        Name</label>
                    <input type="name" class="font-18 fw_500" id="fname" placeholder="AspiraSys">
                    <span class="error-text"></span>
                </div>
                <div class="login-name error d-flex flex-column">
                    <label class="font-18 fw_500" for="fname">First
                        Name</label>
                    <input type="name" class="font-18 fw_500" id="fname" placeholder="AspiraSys">
                    <span class="error-text"></span>
                </div>
                <div class="login-name error d-flex flex-column">
                    <label class="font-18 fw_500" for="fname">First
                        Name</label>
                    <input type="name" class="font-18 fw_500" id="fname" placeholder="AspiraSys">
                    <span class="error-text"></span>
                </div>
                <div class="login-name error d-flex flex-column">
                    <label class="font-18 fw_500" for="fname">First
                        Name</label>
                    <input type="name" class="font-18 fw_500" id="fname" placeholder="AspiraSys">
                    <span class="error-text"></span>
                </div>
            </div>
        </form>
        <div class="profile-update-btn">
            <a type="button" class="btn cancel" data-bs-toggle="modal">
                Cancel
            </a>
            <a type="button" class="btn save" data-bs-toggle="modal">
                Save
            </a>
        </div>
    </div>
    </div>
</div>
@endsection