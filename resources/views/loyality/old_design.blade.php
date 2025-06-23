    <div class="container mt-5">
                <input type="hidden" name="tabs" value="android" id="active_tab">
                <div class="row justify-content-center d-none" id="android_div">
                    <div class="col-md-4 design-container">
                        <h6 class="text-center text-secondary">CARD FRONT</h6>
                        <div class="card design-card coupon_card_2" style="background: #e8bfbf">
                            <div class="card-body front_card">
                                <div class="card-head row">
                                    <div class="col-8 gap-3">
                                        <img src="{{ asset('img/logo.png') }}" alt="" class="w-25 img-logo">
                                        <span class="ms-3 design-heading">
                                            Passify
                                        </span>
                                    </div>


                                </div>

                                <hr>
                                <div class="card-b2">
                                    <div class="mb-3 design-heading">
                                        My Passify Card
                                    </div>

                                    <div class="card-input mb-3 design-heading design-border p-1">
                                        <span class="point">Mr/Ms</span> Abdullah
                                    </div>
                                    <div class="card-input mb-1 design-border p-1">
                                        <span class="point">10</span> Points
                                    </div>

                                    <div class="mb-3 barcode-img text-center">
                                        <img src="{{ asset('img/barcode.png') }}" class="img-fluid w-50 h-25 barcode_img_2">
                                    </div>


                                    <div class="google-wallet-img hero-bg">

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 design-container">
                        <h6 class="text-center text-secondary">DETAILS</h6>
                        <div class="card design-card">
                            <div class="card-body">
                                <p class="card-text font-18">Details</p>

                                <div class="mb-3 design-card-details">
                                    <label for="name" class="border-design">Name</label>
                                    <div class="border_bottom"></div>

                                </div>

                                <div class="mb-3 design-card-details">
                                    <label for="name">Tier</label>
                                    <div class="border_bottom"></div>

                                </div>

                                <div class="mb-3 design-card-details">
                                    <label for="name">Information</label>
                                    <div class="border_bottom"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" id="apple_div">
                    <div class="col-md-4 design-container">
                        <h6 class="text-center text-secondary">CARD FRONT</h6>
                        <div class="card design-card coupon_card_2" style="background: #e8bfbf">
                            <div class="card-body front_card">
                                <div class="card-head row">
                                    <div class="col-8">
                                        <img src="{{ asset('img/logo.png') }}" alt="" class="w-25 img-logo">
                                    </div>

                                    <div class="col-4 text-end fw-bolder">
                                        Points
                                        <br>
                                        <span>0</span>
                                    </div>


                                </div>

                                <hr>
                                <div class="card-b2">

                                    <div class="apple-wallet-img hero-bg">

                                    </div>

                                </div>
                                <div class="mb-3 barcode-img text-center" style="margin-top: 180px; font-size:12px">
                                    <div class="card-input mb-3 design-border p-1 d-flex justify-content-between fw-bolder">
                                        <div class="first">
                                            <span class="first_con">
                                                Name
                                            </span>
                                            <br>
                                            <div class="span">Someone</div>
                                        </div>
                                        <div class="second">
                                            <span>Tier</span>
                                            <br>
                                            <span>Bronze</span>
                                        </div>
                                    </div>
                                    <img src="{{ asset('img/barcode.png') }}" class="img-fluid w-50 h-25 barcode_img_2">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 design-container">
                        <h6 class="text-center text-secondary">DETAILS</h6>
                        <div class="card design-card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('img/barcode.png') }}" class="img-fluid w-25 h-25">
                                    <div class="mt-2 design-heading-2">
                                        Your Special Card
                                    </div>

                                    <div class="mt-5 application_box mb-5">
                                        <a href="#">ADD APPLICATION</a>
                                    </div>

                                </div>
                                <div class="application_box p-3 cursor_not_allowed mb-3">

                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            Automatic Updates
                                        </div>
                                        <div class="switch form-switch">
                                            <input class="form-check-input fw-bolder " type="checkbox"
                                                id="flexSwitchCheckDefault" checked="true" @disabled(true)>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            Allow Notifications
                                        </div>
                                        <div class="switch form-switch">
                                            <input class="form-check-input fw-bolder " type="checkbox"
                                                id="flexSwitchCheckDefault" checked="true" @disabled(true)>
                                        </div>
                                    </div>
                                </div>
                                <div class="application_box text-danger p-2 cursor_not_allowed mb-3">
                                    <span>Remove Pass</span>
                                </div>

                                <div class="mb-3 design-card-details application_box p-2">
                                    <label for="name" class="border-design">Information</label>
                                    <div class="border_bottom"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
