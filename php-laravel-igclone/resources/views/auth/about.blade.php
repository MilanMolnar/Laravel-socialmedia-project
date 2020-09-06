@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="justify-content-center">
        <div class="d-flex pt-5 pb-5">
            <img style="width: 20vh; height: 20vh" class="rounded-circle" src="/images/about-image.jpg" alt="">
            <div class="pt-3">
                <div class="animated-title" style="max-height: 270px">
                    <div class="text-top">
                        <div>
                            <span>This is my Instagram-like laravel demo project,</span>
                            <span>that focuses on the basics of using php Laravel.</span>
                            <span>The application is using:</span>
                            <span> • Vue.js</span>
                            <span> • MySQL database</span>
                            <span> • Laravel 7.x</span>
                            <span> • PHP 7.2.5</span>
                        </div>
                    </div>
                    <div class="text-bottom" style="pointer-events: none; font-family: 'Segoe Script'">
                        <div>Created by: MilánMolnár</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="justify-content-center">
            <hr style="width: 65%;" class=" pb-2">
            <p class="pt-5" style="text-align: center">For more information visit my Github page, or check out my LinkedIn profile.</p>
            <div class="d-flex justify-content-center">
                <a target="blank" href="https://github.com/MilanMolnar">
                    <img id="about-icon" src="/images/git-hub.png" alt="github-link" style="height: 50px; width: 50px">
                </a>
                <a target="blank" href="https://www.linkedin.com/in/mil%C3%A1n-moln%C3%A1r-4467411b4/">
                    <img id="about-icon" src="/images/linked-in.png" alt="linkedin-link" style="height: 65px; width: 67px; margin-top:-7px">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
