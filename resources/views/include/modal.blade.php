<div class="modal fade" id="new-project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-wrapper container">
        <div class="modal-content">
            <div class="container position-relative modal-wrapper">
                <i href="#" class="fa-solid fa-xmark close-model primary--clr cursor-pointer position-absolute"
                    data-bs-dismiss="modal" onclick="closeModal()"></i>
                <div class="row p-4">
                    <div class="col-md-6">
                        @dd($activeAnnouncement)
                        <img src="{{ $activeAnnouncement->image ? asset('storage/images/' . $activeAnnouncement->image) : asset('assets/frontend/images/pop-up-left-img.webp') }}" alt=""
                            class="pop-up-left-img">
                    </div>
                    <div class="col-md-6 font-primary d-flex flex-column justify-content-center">
                        <div class="pop-content text-center d-flex flex-column justify-content-center">
                            <h2 class="head--1 secondary--clr">
                                {!! $activeAnnouncement->title ?? 'New Project is Launching Soon!' !!}
                            </h2>
                            <div class="container text-center">
                                <div class="row">
                                    <!-- Days -->
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="time-box">
                                                <span class="time-num digino">0</span> <!-- Tens place -->
                                            </div>
                                            <div class="time-box">
                                                <span class="time-num digino">0</span> <!-- Ones place -->
                                            </div>
                                        </div>
                                        <p class="time-label">HOURS</p>
                                    </div>
                                    <!-- Hours -->
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="time-box">
                                                <span class="time-num digino">0</span> <!-- Tens place -->
                                            </div>
                                            <div class="time-box">
                                                <span class="time-num digino">0</span> <!-- Ones place -->
                                            </div>
                                        </div>
                                        <p class="time-label">MIN</p>
                                    </div>
                                    <!-- Minutes -->
                                    <div class="col-4">
                                        <div class="row">
                                            <div class="time-box">
                                                <span class="time-num digino">0</span> <!-- Tens place -->
                                            </div>
                                            <div class="time-box">
                                                <span class="time-num digino">0</span> <!-- Ones place -->
                                            </div>
                                        </div>
                                        <p class="time-label">SEC</p>
                                    </div>
                                </div>

                            </div>
                            <p class="body-txt1 txt--clr">
                                {!! $activeAnnouncement->description ?? 'We’ll let you know when we are launching' !!}
                            </p>
                            <form action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Email Address"
                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="primary-btn wht--clr " type="button" id="button-addon2">Notify
                                        Me</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
