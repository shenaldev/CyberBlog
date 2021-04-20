<footer>
    <div class="container-fluid footer mt-4">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h1 class="footer-header">About</h1>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                </p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h1 class="footer-header">Usefull Links</h1>
                <ul class="footer-list">
                    <li>
                        <a href="#" class="footer-link">Home</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">Terms And Condions</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h1 class="footer-header">Top Categories</h1>
                <ul class="footer-list">
                    <li>
                        <a href="#" class="footer-link">Wordpress</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">PHP</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">JavaScript</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">Laravel</a>
                    </li>
                    <li>
                        <a href="#" class="footer-link">Android</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h1 class="footer-header">Find Us</h1>
                <div class="footer-social-div">
                    <svg class="footer-icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 125 125"><defs><linearGradient id="a" x1="0.946" y1="0.289" x2="0.014" y2="0.947" gradientUnits="objectBoundingBox"><stop offset="0" stop-opacity="0.102"/><stop offset="1" stop-opacity="0"/></linearGradient><linearGradient id="b" x1="0.008" y1="0.023" x2="1.251" y2="0.65" gradientUnits="objectBoundingBox"><stop offset="0" stop-opacity="0.2"/><stop offset="0.595" stop-opacity="0.2"/><stop offset="1" stop-opacity="0"/></linearGradient></defs><g transform="translate(-757 -126)"><rect width="125" height="125" rx="5" transform="translate(757 126)" fill="#f57f17"/><rect width="100" height="72" rx="6" transform="translate(770 152)" fill="#fff"/><path d="M87.415,73V18.939L49.259,45.447,11,18.939S11.081,73.046,11.03,73l-.018,0h-4.9a6,6,0,0,1-6-6V7.089a6.048,6.048,0,0,1,.069-.913q.033-.2.075-.4A5.984,5.984,0,0,1,1.623,3.1l.069-.056q.05-.065.1-.128A5.983,5.983,0,0,1,6.108,1.089H8.8c.188.045.293.077.293.077l40.163,29.42L89.323,1.166s.026-.029.074-.077h4.711a6,6,0,0,1,6,6V67a6,6,0,0,1-6,6Z" transform="translate(769.892 150.911)" fill="#f04a3f"/><path d="M780.917,223.91l38.333-27.66-49.375-33.875L770.031,219A7.6,7.6,0,0,0,772,222.438a5.985,5.985,0,0,0,3.125,1.473C775.125,223.875,780.917,223.91,780.917,223.91Z" fill="url(#a)"/><path d="M869.938,161.063l-50.75,35.25L770.063,162.25,831.813,224h32.6a8.413,8.413,0,0,0,3.865-1.813,7.1,7.1,0,0,0,1.656-3.687Z" fill="url(#b)"/></g></svg>
                    <a href="mailto:{{ $settings->email }}" class="text-capitalize">{{ $settings->email }}</a>
                </div>
                <div class="footer-social-div">
                    <svg class="footer-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 125"><g transform="translate(-274 -123)"><rect width="125" height="125" rx="5" transform="translate(274 123)" fill="#1e88e5"/><path d="M411.822,71.568V55.8s-35.031-8.779-36.48,20.882c-.085-.17,0,14.916,0,14.916H360v17.9h15.342v45.089H393.5V109.5h15.172L411.4,91.6H393.5V79.452s-.384-8.481,9.674-7.884C403.341,71.4,411.822,71.568,411.822,71.568Z" transform="translate(-49 81.414)" fill="#fff"/></g></svg>
                    <a href="{{ $settings->facebook }}">Facebook</a>
                </div>
                <div class="footer-social-div">
                    <svg class="footer-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 125"><g transform="translate(-112 -123)"><rect width="125" height="125" rx="5" transform="translate(112 123)" fill="#03a9f4"/><path d="M111.312,163.129c.149,0,9.984,22.949,44.11,20.118-.745.6-3.576-37.4,31.741-21.459-.149.3,13.561-.149,15.5-1.043s1.639,1.043,1.639,1.043-6.706,6.706-6.408,8.047,7.3-1.043,7.6,0-7.451,8.643-7.6,9.388-13.561,89.413-92.392,53.648c0-.149,22.055-1.043,25.333-7-9.537-7.749-17.286-13.412-17.286-17.435,3.725.149,7.6,1.788,7.9,0-1.49-1.937-15.051-12.369-14.157-20.714,2.98,1.043,5.812,1.937,6.259.745C112.951,186.526,105.5,171.475,111.312,163.129Z" transform="translate(18.5 -13.877)" fill="#fff"/></g></svg>
                    <a href="{{ $settings->twitter }}">Twitter</a>
                </div>
                <div class="footer-social-div">
                    <svg class="footer-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 125"><g transform="translate(-446 -123)"><rect width="125" height="125" rx="5" transform="translate(446 123)" fill="#9c27b0"/><g transform="translate(459 136)" fill="none"><path d="M25,0H75a25,25,0,0,1,25,25V75a25,25,0,0,1-25,25H25A25,25,0,0,1,0,75V25A25,25,0,0,1,25,0Z" stroke="none"/><path d="M 25 6 C 14.52336120605469 6 6 14.52336120605469 6 25 L 6 75 C 6 85.47663879394531 14.52336120605469 94 25 94 L 75 94 C 85.47663879394531 94 94 85.47663879394531 94 75 L 94 25 C 94 14.52336120605469 85.47663879394531 6 75 6 L 25 6 M 25 0 L 75 0 C 88.80712127685547 0 100 11.19287872314453 100 25 L 100 75 C 100 88.80712127685547 88.80712127685547 100 75 100 L 25 100 C 11.19287872314453 100 0 88.80712127685547 0 75 L 0 25 C 0 11.19287872314453 11.19287872314453 0 25 0 Z" stroke="none" fill="#fff"/></g><g transform="translate(477 154)" fill="none" stroke="#fff" stroke-width="6"><circle cx="32.5" cy="32.5" r="32.5" stroke="none"/><circle cx="32.5" cy="32.5" r="29.5" fill="none"/></g><circle cx="5" cy="5" r="5" transform="translate(535 151)" fill="#fff"/></g></svg>
                    <a href="{{ $settings->instagram }}">  Instagram</a>
                </div>
                <div class="footer-social-div">
                    <svg class="footer-icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 125 125"><g transform="translate(-614 -126)"><rect width="125" height="125" rx="5" transform="translate(614 126)" fill="#ff5722"/><path d="M50.668,90.076c-12.03,0-23.34-3.54-31.847-9.968S5.63,65.138,5.63,56.047a26.178,26.178,0,0,1,.627-5.687A12.142,12.142,0,0,1,0,40.033a11.978,11.978,0,0,1,2.8-8.179,10.107,10.107,0,0,1,7.774-3.2,15.313,15.313,0,0,1,8.8,2.924c8.174-5.969,18.93-9.359,30.284-9.546l-.148-.009,6.442-20.3A2.585,2.585,0,0,1,58.247.195a3.385,3.385,0,0,1,.96.15c1.979.592,11.852,2.75,16,3.65a9.007,9.007,0,1,1-1.522,5.179c-1.335-.3-5.79-1.266-13.241-2.877l-.333-.072L55,22.173a52.275,52.275,0,0,1,26.219,8.874,13.768,13.768,0,0,1,7.734-2.437,9.956,9.956,0,0,1,5.873,1.728,12.349,12.349,0,0,1,4.861,7.046,11.04,11.04,0,0,1-1.483,8.593,10.15,10.15,0,0,1-3.417,3.21,26.289,26.289,0,0,1,.915,6.86c0,9.09-4.685,17.636-13.191,24.061S62.7,90.076,50.668,90.076ZM35.546,65.8c-.536,0-3.207.139-3.207,2.879,0,.184.427,1.526,2.314,3.049,1.659,1.338,4.873,3.133,10.759,4.081a31.161,31.161,0,0,0,4.938.4C58.932,76.212,66,72.466,67.62,69a3.455,3.455,0,0,0-.3-1.5A2.62,2.62,0,0,0,64.7,65.987a6.238,6.238,0,0,0-1.212.131,20.763,20.763,0,0,1-13.387,4.5,25.1,25.1,0,0,1-14.448-4.815S35.616,65.8,35.546,65.8ZM64.68,42.035a7.006,7.006,0,1,0,7.006,7.006A7.014,7.014,0,0,0,64.68,42.035Zm-30.026,0a7.006,7.006,0,1,0,7.006,7.006A7.014,7.014,0,0,0,34.654,42.035Z" transform="translate(626 143)" fill="#fff"/><path d="M659.813,172" fill="none" stroke="#707070" stroke-width="1"/></g></svg>
                    <a href="{{ $settings->reddit }}">Reddit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row footer-credits">
        <div class="col-lg-6">
            <p>Copyright 2020 Cyber Blog.</p>
        </div>
        <div class="col-lg-6 right-credit">
            <div>
                <p>Developed By</p><a href="#"> ShenalDev</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-------------TOASTER NOTIFICATIONS -------------------->

    @if(Session::has('success'))
        <script>
            toastr.success('{{ Session::get('success') }}');
            toastr.options.showMethod = 'slideDown';
        </script>
    @endif

</footer>
