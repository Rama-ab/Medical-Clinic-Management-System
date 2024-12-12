
@extends('layouts.master')

@section('title')

@endsection

@section('css')

@endsection


@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-7 col-6">
            <h4 class="page-title">My Profile</h4>
        </div>

        <div class="col-sm-5 col-6 text-right m-b-30">
            <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
        </div>
    </div>
    <div class="card-box profile-header">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img class="avatar" src="{{asset('assets/img/doctor-03.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{ $medicalFile->patient->user->name }}</h3>
                                    {{-- <small class="text-muted">Gynecologist</small> --}}
                                    <div class="staff-id">Patient insurance number : {{ $medicalFile->patient->insurance_number }}</div>
                                    {{-- <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div> --}}
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <span class="title">Phone:</span>
                                        <span class="text"><a href="#">{{ $medicalFile->patient->user->phone_number }}</a></span>
                                    </li>
                                    <li>
                                        <span class="title">Email:</span>
                                        <span class="text"><a href="#">{{ $medicalFile->patient->user->email }}</a></span>
                                    </li>
                                    <li>
                                        <span class="title">Birthday:</span>
                                        <span class="text">{{ $medicalFile->patient->dob }}</span>
                                    </li>
                                    {{-- <li>
                                        <span class="title">Address:</span>
                                        <span class="text">714 Burwell Heights Road, Bridge City, TX, 77611</span>
                                    </li> --}}
                                    {{-- <li>
                                        <span class="title">Gender:</span>
                                        <span class="text">Female</span>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>
    </div>
    <div class="profile-tabs">
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="about-cont">
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h3 class="card-title">old diagnoses:</h3>
                <div class="experience-box">
                    <ul class="experience-list">
                        <li>
                            <div class="experience-user">
                                <div class="before-circle"></div>
                            </div>
                            <div class="experience-content">
                                <div class="timeline-content">
                                    <a href="#/" class="name">{{$medicalFile->diagnoses}}</a>
                                    {{-- <div>MBBS</div>
                                    <span class="time">2001 - 2003</span> --}}
                                </div>
                            </div>
                        </li>
                        {{-- <li>
                            <div class="experience-user">
                                <div class="before-circle"></div>
                            </div>
                            <div class="experience-content">
                                <div class="timeline-content">
                                    <a href="#/" class="name">International College of Medical Science (PG)</a>
                                    <div>MD - Obstetrics &amp; Gynaecology</div>
                                    <span class="time">1997 - 2001</span>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="card-box mb-0">
                <h3 class="card-title">Experience</h3>
                <div class="experience-box">
                    <ul class="experience-list">
                        <li>
                            <div class="experience-user">
                                <div class="before-circle"></div>
                            </div>
                            <div class="experience-content">
                                <div class="timeline-content">
                                    <a href="#/" class="name">Consultant Gynecologist</a>
                                    <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="experience-user">
                                <div class="before-circle"></div>
                            </div>
                            <div class="experience-content">
                                <div class="timeline-content">
                                    <a href="#/" class="name">Consultant Gynecologist</a>
                                    <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="experience-user">
                                <div class="before-circle"></div>
                            </div>
                            <div class="experience-content">
                                <div class="timeline-content">
                                    <a href="#/" class="name">Consultant Gynecologist</a>
                                    <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
            </div>
            <div class="tab-pane" id="bottom-tab2">
                Tab content 2
            </div>
            <div class="tab-pane" id="bottom-tab3">
                Tab content 3
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection
