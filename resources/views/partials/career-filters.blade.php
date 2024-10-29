<div class="career-filter-sidebar p-4 fit-content">
    <h3 class="head--3 secondary--clr">Filters</h3>
    <div class="accordion accordion-flush" id="filter-accordion">
        <div class="location-filters">
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header" id="filterheading1">
                    <button class="accordion-button collapsed bg-transparent body-txt1 secondary--clr mb-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#filters-dropper1" aria-expanded="false"
                        aria-controls="filters-dropper1">
                        Location
                    </button>
                </h2>
                <div id="filters-dropper1" class="accordion-collapse collapse" aria-labelledby="filterheading1"
                    data-bs-parent="#filter-accordion">
                    <div class="accordion-body">
                        <form action="">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="loc1" name="optradio"
                                    value="option1" checked />
                                <label class="form-check-label body-txt2 txt--clr" for="loc1">Near</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="loc2" name="optradio"
                                    value="option2" />
                                <label class="form-check-label body-txt2 txt--clr" for="loc2">Remote
                                    Job</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="loc3" name="optradio"
                                    value="option3" />
                                <label class="form-check-label body-txt2 txt--clr" for="loc3">Exact
                                    location</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="loc4" name="optradio"
                                    value="option4" />
                                <label class="form-check-label body-txt2 txt--clr" for="loc4">Within
                                    15 km</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="loc5" name="optradio"
                                    value="option4" />
                                <label class="form-check-label body-txt2 txt--clr" for="loc5">Within
                                    30 km</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="loc6" name="optradio"
                                    value="option5" />
                                <label class="form-check-label body-txt2 txt--clr" for="loc6">Within 50 km</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="salary-tabs-filter">
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header" id="filterheading2">
                    <button class="accordion-button collapsed bg-transparent body-txt1 secondary--clr mb-2"
                        type="button" data-bs-toggle="collapse" data-bs-target="#filters-dropper2"
                        aria-expanded="false" aria-controls="filters-dropper2">
                        Salary
                    </button>
                </h2>
                <div id="filters-dropper2" class="accordion-collapse collapse" aria-labelledby="filterheading2"
                    data-bs-parent="#filter-accordion">
                    <div class="accordion-body">
                        <div class="salary-tabs d-flex flex-column justify-content-center">
                            <div class="mb-4">
                                <ul id="salary-tabs-nav" class="d-flex ps-0">
                                    <li class="col-4">
                                        <a href="#salary-tab1"
                                            class="body-txt2 txt--clr h-tab text-decoration-none text-center w-100 d-inline-block">Hourly</a>
                                    </li>
                                    <li class="col-4">
                                        <a href="#salary-tab2"
                                            class="body-txt2 txt--clr m-tab text-decoration-none text-center w-100 d-inline-block">Monthly</a>
                                    </li>
                                    <li class="col-4">
                                        <a href="#salary-tab3"
                                            class="body-txt2 txt--clr y-tab text-decoration-none text-center w-100 d-inline-block">Yearly</a>
                                    </li>
                                </ul>
                            </div>
                            <div id="salary-tabs-content">
                                <div id="salary-tab1" class="salary-tab-content">
                                    <form action="">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="hourly-radio1"
                                                name="hourly-radio" value="option1" checked />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="hourly-radio1">Any</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="hourly-radio2"
                                                name="hourly-radio" value="option2" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="hourly-radio2">>100</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="hourly-radio3"
                                                name="hourly-radio" value="option3" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="hourly-radio3">>200</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="hourly-radio4"
                                                name="monthlyhourly-radio" value="option4" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="hourly-radio4">>300</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="hourly-radio5"
                                                name="hourly-radio" value="option5" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="hourly-radio5">>500</label>
                                        </div>
                                    </form>
                                </div>
                                <div id="salary-tab2" class="salary-tab-content">
                                    <form action="">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="monthly-radio1"
                                                name="monthly-radio" value="option1" checked />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="monthly-radio1">Any</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="monthly-radio2"
                                                name="monthly-radio" value="option2" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="monthly-radio2">>2500k</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="monthly-radio3"
                                                name="monthly-radio" value="option3" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="monthly-radio3">>5000k</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="monthly-radio4"
                                                name="monthly-radio" value="option4" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="monthly-radio4">>7500k</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="monthly-radio5"
                                                name="monthly-radio" value="option5" />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="monthly-radio5">>100000</label>
                                        </div>
                                    </form>
                                </div>
                                <div id="salary-tab3" class="salary-tab-content">
                                    <form action="">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="yearly-radio1"
                                                name="yearly-radio" value="option1" checked />
                                            <label class="form-check-label body-txt2 txt--clr"
                                                for="yearly-radio1">Any</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="yearly-radio2"
                                                name="yearly-radio" value="option2" />
                                            <label class="form-check-label body-txt2 txt--clr" for="yearly-radio2">>
                                                30000k</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="yearly-radio3"
                                                name="yearly-radio" value="option3" />
                                            <label class="form-check-label body-txt2 txt--clr" for="yearly-radio3">>
                                                50000k</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="yearly-radio4"
                                                name="yearly-radio" value="option4" />
                                            <label class="form-check-label body-txt2 txt--clr" for="yearly-radio4">>
                                                80000k</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="yearly-radio5"
                                                name="yearly-radio" value="option5" />
                                            <label class="form-check-label body-txt2 txt--clr" for="yearly-radio5">>
                                                100000k</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="date-posted-filters">
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header" id="filterheading3">
                    <button class="accordion-button collapsed bg-transparent body-txt1 secondary--clr mb-2"
                        type="button" data-bs-toggle="collapse" data-bs-target="#filters-dropper3"
                        aria-expanded="false" aria-controls="filters-dropper3">
                        Date of posting
                    </button>
                </h2>
                <div id="filters-dropper3" class="accordion-collapse collapse" aria-labelledby="filterheading3"
                    data-bs-parent="#filter-accordion">
                    <div class="accordion-body">
                        <form action="">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="date-post1" name="date-post"
                                    value="option1" checked />
                                <label class="form-check-label body-txt2 txt--clr" for="date-post1">All time</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="date-post2" name="date-post"
                                    value="option2" />
                                <label class="form-check-label body-txt2 txt--clr" for="date-post2">Last 24
                                    hours</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="date-post3" name="date-post"
                                    value="option3" />
                                <label class="form-check-label body-txt2 txt--clr" for="date-post3">Last 3
                                    days</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="date-post4" name="date-post"
                                    value="option4" />
                                <label class="form-check-label body-txt2 txt--clr" for="date-post4">Last 7
                                    days</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="experience-type-filters">
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header" id="filterheading4">
                    <button class="accordion-button collapsed bg-transparent body-txt1 secondary--clr mb-2"
                        type="button" data-bs-toggle="collapse" data-bs-target="#filters-dropper4"
                        aria-expanded="false" aria-controls="filters-dropper4">
                        Experience Type
                    </button>
                </h2>
                <div id="filters-dropper4" class="accordion-collapse collapse" aria-labelledby="filterheading4"
                    data-bs-parent="#filter-accordion">
                    <div class="accordion-body">
                        <form action="">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="exp-type1" name="exp-type"
                                    value="option1" checked />
                                <label class="form-check-label body-txt2 txt--clr" for="exp-type1">Any
                                    experience</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="exp-type2" name="exp-type"
                                    value="option2" />
                                <label class="form-check-label body-txt2 txt--clr" for="exp-type2">Intership</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="exp-type3" name="exp-type"
                                    value="option3" />
                                <label class="form-check-label body-txt2 txt--clr" for="exp-type3">Work
                                    remotely</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="employement-type-filters">
            <div class="accordion-item bg-transparent border-0">
                <h2 class="accordion-header" id="filterheading5">
                    <button class="accordion-button collapsed bg-transparent body-txt1 secondary--clr mb-2"
                        type="button" data-bs-toggle="collapse" data-bs-target="#filters-dropper5"
                        aria-expanded="false" aria-controls="filters-dropper5">
                        Type of Employement
                    </button>
                </h2>
                <div id="filters-dropper5" class="accordion-collapse collapse" aria-labelledby="filterheading5"
                    data-bs-parent="#filter-accordion">
                    <div class="accordion-body">
                        <form action="">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="emp-type1" name="emp-type"
                                    value="something" checked />
                                <label class="form-check-label body-txt2 txt--clr" for="emp-type1">Full-Time</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="emp-type2" name="emp-type"
                                    value="something" />
                                <label class="form-check-label body-txt2 txt--clr" for="emp-type2">Temporary</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="emp-type3" name="emp-type"
                                    value="something" />
                                <label class="form-check-label body-txt2 txt--clr" for="emp-type3">Part-Time</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
