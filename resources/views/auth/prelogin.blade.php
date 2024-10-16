@php
$setting = DB::table('settings')->get()->first();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@if(!empty($setting)) 
    <title>{{ $setting->name ?? '' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ env('IMAGE_SHOW_PATH').'setting/left_logo/'.$setting->left_logo ?? ''}}" onerror="this.src='{{ env('IMAGE_SHOW_PATH').'default/mini_logo.png' }}'">
@endif
    <script src="{{URL::asset('public/assets/school/js/jquery.min.js')}}"></script>

    <script src="{{URL::asset('public/assets/school/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('public/assets/school/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/school/css/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/school/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       .contact-info {
       
            padding: 10px;
           line-height: 15px;
           
        }
       
        .contact-info p {
            margin: 10px;
        }
        .login-card-body,
        .register-card-body {
            background-color: #00000000;
            border-top: 0;
            color: #fff;
            padding: 20px;
            box-shadow: -1px 4px 28px 0px rgb(9 197 242);
        }

        .card1 {
            position: relative;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #00000030 !important;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .btn-lg {
            padding: 18px 36px;
            color: #fff;
        }

        .btn-lg:hover {
            box-shadow: -1px 4px 28px 0px rgb(9 197 242);
            color: #fff;
        }

        .btn1 {
            background-color: #9c27b0;
        }

        .btn3 {
            background-color: #b0dd38;
        }

        .btn2 {
            background-color: #e91e63;
        }

        .pointer {
            cursor: pointer;
        }
        
         .main_logo {
            position: fixed;
            top: 10px;
            right: 40px;
            filter: drop-shadow(6px 5px 3px #7d7d7d);
        }

        .title {
            font-weight: 600;
            font-size: 18px;
            font-family: Georgia;
            letter-spacing: 3px;
            margin-bottom: 10px;
            text-transform:capitalize;
            text-shadow: 5px 5px 4px gray;
        }

        .elevated-card {
            margin: 10px;
            background-color: white;

            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            transition: background-position 0.5s ease;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 5px;
            color:black;
        }
        
        .admin_card{
            background: linear-gradient(270deg,#fff 50%,#003787 0) 100%;
            background-size: 200%;
        }
        .teacher_card{
            background: linear-gradient(270deg,#fff 50%,#9e029e 0) 100%;
            background-size: 200%;
        }
        .student_card{
            background: linear-gradient(270deg,#fff 50%,orange 0) 100%;
            background-size: 200%;
        }
        
        
        .admin_card:hover {
            background-position: 0;
            color:white;
        }
        
        .teacher_card:hover {
            background-position: 0;
            color:white;
        }
        
        .student_card:hover {
            background-position: 0;
            color:white;
        }

        .logo-container {
            text-align: center;
        }


        .logo {
            padding: 10px;
            /*height: 55px;*/
            width: 80px;
            margin-bottom: 20px;
            padding-bottom: 5px;
            border-bottom: 1px solid lightgray;
        }


        .logo-title {

            margin: 0;
            padding-left: 30px;
            padding-right: 30px;
            font-size: 12px;

            font-weight: bold;

        }

        .information {
            padding: 10px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .refresh-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #6639b5;
            color: #fff;
            border: 1px solid transparent;
            border-color: #6639b5;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .refresh-button:hover {
            color: #ff5722;
            background-color: #6639b500;
            border-color: #ff5722;
        }

        .connectionimg {
            max-width: 400px;
        }

        section {
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            height: 100%;
            align-items: center;
            text-align: center;
            justify-content: center;
        }

        .login-box {
            width: auto !important;
        }
        
        .bg_image{
            background-image: url('{{ env('IMAGE_SHOW_PATH').'default/Icon_images/rm347-porpla-01.jpg' }}');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        
        .flex_cards{
            display:flex;
        }
        
        @media only screen and (max-width: 600px) {
            .bg_image{
                background-color: #e8e4d9;
                background-image:none;
            }
            
            .main_logo {
                top:50px;
                right: auto;
            }
            
            .elevated-card {
                margin: 10px;
            }
            
            .logo{
                width: 100px;
                margin-bottom: 10px;
            }
            .flex_cards{
                display:grid;
            }
            
            .information{
                position:absolute;
                bottom:0;
                left:10px;
            }
            
            body{
                overflow:hidden;
            }
        }
        
    </style>
</head>

<body class="hold-transition login-page bg_image">

    <div id="expiryNotice" class="text-danger h4"></div>
    @if(!empty($setting))
        <img src="{{ env('IMAGE_SHOW_PATH').'setting/left_logo/'.$setting->left_logo ?? ''}}" alt="Company Logo" class="main_logo" width="100px">
    @endif
    <div class='title'>@if(!empty($setting)) {{ $setting->name ?? '' }}@endif</div>
    <div class="login-box">
        <div class='flex_cards'>
            <a href="{{ url('admin/login') }}">
                <div class="elevated-card admin_card">

                    <div class="logo-container">

                        <img src="{{env('IMAGE_SHOW_PATH')}}default/Icon_images/web-development_762714.png"
                            alt="Company Logo" class="logo">

                        <h2 class="logo-title">Admin Login</h2>

                    </div>

                </div>
            </a>
            <a href="{{ url('teacher/login') }}">
                <div class="elevated-card teacher_card">

                    <div class="logo-container">

                        <img src="{{env('IMAGE_SHOW_PATH')}}default/Icon_images/presentation_1436664.png"
                            alt="Company Logo" class="logo">

                        <h2 class="logo-title">Teacher Login</h2>

                    </div>

                </div>
            </a>
            <a href="{{ url('student/login') }}">
                <div class="elevated-card student_card">

                    <div class="logo-container">

                        <img src="{{env('IMAGE_SHOW_PATH')}}default/Icon_images/woman_4140047.png" alt="Company Logo"
                            class="logo">

                        <h6 class="logo-title">Student Login</h6>

                    </div>

                </div>
            </a>

        </div>
        
   
       <!-- <div class='information'>
            <a data-toggle="modal" data-target="#contactModal" class="text-white pointer">
               <i class="fa fa-address-book text-dark" aria-hidden="true"></i>
<span style='color:black'>  Contact Details</span>

            </a>
        </div>-->
        <div class='information'>
            <a data-toggle="modal" data-target="#softwareDetailsModal" class="text-white pointer">
                <img src="{{env('IMAGE_SHOW_PATH')}}default/Icon_images/info_5639164.png" alt="Company Logo"
                    width='30px'><span style='color:black'> Software Information</span>

            </a>
        </div>
    </div>

    <!--Default Login Page Content Start-->


    <div class="modal fade p-0" id="softwareDetailsModal" role="dialog">
        <div class="modal-dialog modal-xl">

            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Support Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="container-fluid p-0">

                        <div class="row mb-2" id="softwareOwnerDetails">
                            <div class="col-12">
                                <div class="card card-primary mb-0">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="position-relative p-3 bg-warning" style="">
                                                    <div class="ribbon-wrapper ribbon-xl">
                                                        <div class="ribbon bg-success">
                                                            Software Details
                                                        </div>
                                                    </div>
                                                    Software Licensed To : <span id="schoolName"></span> <br>
                                                    Director/Owner Name : <span id="ownerName"></span> <br>
                                                    Mobile No. : <span id="mobile"></span> <br>
                                                    Software Version : 3.2.0 <br>
                                                    Software Validity : <span id="validity"></span> <br>
                                                    Validity Duration : <span id="validityDuration"></span> <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2" id="bankDetails">
                            <div class="col-12">
                                <div class="card card-primary mb-0">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="position-relative p-3 bg-warning" style="">
                                                    <div class="ribbon-wrapper ribbon-xl">
                                                        <div class="ribbon bg-success">
                                                            Bank Details
                                                        </div>
                                                    </div>
                                                    Bank Name : <span id="bankName"></span> <br>
                                                    Bank IFSC : <span id="bankIfsc"></span> <br>
                                                    Bank Type : <span id="bankAccType"></span> <br>
                                                    Account No. : <span id="bankAccNo"></span> <br>
                                                    Account Holder : <span id="bankAccOwner"></span> <br>
                                                    Mobile No. : <span id="bankAccOwnerMobile"></span> <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="appendSupportDiv"></div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="d-none" id="supportDiv">
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-2">
            <div class="card bg-light d-flex flex-fill mb-0">
                <div class="card-header text-muted border-bottom-0">
                    Developer
                </div>
                <div class="card-body pt-0">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h2 class="lead"><b>Vineet</b></h2>
                            <p class="text-muted text-sm"><b>About: </b> Skill </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fa fa-lg fa-phone"></i></span> Phone #:
                                    8209949186</li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="{{ asset('public/images/default/tech_support.avif') }}" alt="user-avatar"
                                class="img-circle img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay-wrapper">
        <div class="overlay dark">
            <h1 class="fetchingDetails text-center d-none"><i class="fa fa-spinner fa-spin"></i></h1>
            <div class="">
                <div class="spinner-grow text-primary"></div>
                <div class="spinner-grow text-success"></div>
                <div class="spinner-grow text-info"></div>
                <div class="spinner-grow text-warning"></div>
                <div class="spinner-grow text-danger"></div>
            </div>
            <section id="noInternetSection" class="d-none">
                <div>
                    <img class="connectionimg" src="{{ asset('public/images/default/no_internet.jpg') }}">
                    <h1>No Internet Connection</h1>
                    <p>Please check your internet connection and try again.</p>
                    <a href="{{ url('/') }}" class="refresh-button">Refresh</a>
                    <br><br>
                </div>
            </section>

            <section id="softwareExpiredSection" class="d-none">
                <div>
                    <img class="connectionimg" src="{{ asset('public/images/default/software_expired.jpg') }}">
                    <h2>Software Expired Time to Renew!</h2>
                    <p>Your Software's Validity Has Expired. Please Contact Your Provider Or Administration.</p>
                    <br>
                    <a href="{{ url('/') }}" class="refresh-button">Refresh</a>&nbsp; &nbsp;
                    <a class="refresh-button autoPayment" onclick="autoPayment()">Payment</a>&nbsp; &nbsp;
                    <a class="refresh-button" data-toggle="modal" data-target="#softwareDetailsModal">Support</a>
                </div>
            </section>

        </div>
    </div>


    <input type="hidden" id="studentCount" />
    <input type="hidden" id="branchCount" />
    <input type="hidden" id="userCount" />
 <!-- The Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!--<div class="modal-header">-->
                <!--    <h5 class="modal-title" id="contactModalLabel">Contact Information</h5>-->
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--        <span aria-hidden="true">&times;</span>-->
                <!--    </button>-->
                <!--</div>-->
                <div class="modal-body">
                    <p><strong>Address:</strong> {{$setting->address ?? ''}}</p>
                    <p><strong>Mobile:</strong> {{$setting->mobile ?? ''}}</p>
                    <p><strong>Email:</strong> {{$setting->email ?? ''}}</p>
                </div>
                <!--<div class="modal-footer">-->
                <!--    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <script src="{{URL::asset('public/assets/school/js/update.js')}}"></script>
    <script> openToken('{{ env('SOFTWARE_TOKEN_NO') }}', 'login'); </script>

    <!--Default Login Page Content End-->

</body>

<script>
    $(window).load(function () {

        alert("sdfsf");
    })
</script>

</html>