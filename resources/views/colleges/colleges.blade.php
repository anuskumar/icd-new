@extends('index')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 col-12 mb-4">
                <!-- Filter Section Heading -->
                <h4 class="mb-4">FILTERS</h4>

                <!-- Selected Filters -->
                <div id="selected-filters" class="mb-4"></div>

                <!-- Country Filter -->
                <div class="mb-4">
                    <label for="stateSearch" class="form-label">Country: {{ $country->name }}</label>
                    <input type="text" id="stateSearch" class="form-control mb-2" placeholder="Search State"
                        onkeyup="filterStates()">
                    <div class="overflow-auto border p-2" style="max-height: 200px;">
                        @foreach ($states as $state)
                            <div class="form-check state-checkbox">
                                <input class="form-check-input state-filter" type="checkbox" value="{{ $state->name }}"
                                    id="state{{ $state->id }}" onchange="filterColleges()">
                                <label class="form-check-label" for="state{{ $state->id }}">{{ $state->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Fees Range Filter -->
                <div class="mb-4">
                    <label class="form-label">Fees Range</label>
                    <div class="form-check">
                        <input class="form-check-input fees-filter" type="checkbox" value="Below 2 Lakh" id="fees1"
                            onchange="filterColleges()">
                        <label class="form-check-label" for="fees1">Below 2 Lakh</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input fees-filter" type="checkbox" value="2 Lakh - 5 Lakhs" id="fees2"
                            onchange="filterColleges()">
                        <label class="form-check-label" for="fees2">2 Lakh - 5 Lakhs</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input fees-filter" type="checkbox" value="Above 5 Lakhs" id="fees3"
                            onchange="filterColleges()">
                        <label class="form-check-label" for="fees3">Above 5 Lakhs</label>
                    </div>
                </div>

                <!-- Institution Type Filter -->
                <div class="mb-4">
                    <label class="form-label">Institution Type</label>
                    @foreach ($institutionTypes as $institutionType)
                        <div class="form-check">
                            <input class="form-check-input institution-filter" type="checkbox"
                                value="{{ $institutionType->name }}" id="institution{{ $institutionType->id }}"
                                onchange="filterColleges()">
                            <label class="form-check-label"
                                for="institution{{ $institutionType->id }}">{{ $institutionType->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-9 col-12">
                <!-- College Cards -->
                <div id="college-list">
                    @foreach ($colleges as $college)
                        <div class="college-card mb-4 p-4 border rounded d-flex flex-wrap align-items-center bg-light">
                            <div class="me-4 text-center" style="width: 60px;">
                                <h2 class="m-0">{{ $loop->index + 1 }}</h2>
                                <p class="small m-0">NIRF '24</p>
                            </div>
                            <div class="me-4">
                                <img src="{{ asset('storage/' . $college->image) }}" class="college-logo"
                                    alt="College Logo"
                                    style="height: 90px; width: 120px; object-fit: cover; border-radius: 4px;">
                            </div>
                            <div class="flex-grow-1">
                                <div class="mb-1 d-flex flex-md-row justify-content-between">
                                    <h5><a
                                            href="{{ route('college.show', ['id' => base64_encode($college->id),'name' => $college->name]) }}">{{ $college->name }}</a>
                                    </h5>
                                    <p>4.6 <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span> (125)</p>
                                </div>

                                <div class="mb-1 d-flex flex-column flex-md-row justify-content-around align-items-center">
                                    <p>Country: {{ $college->country->name }}</p>
                                    <p>Fee: {{ $college->courses->avg('course_amount') }}</p>
                                    <p>Type of Institution : {{ $college->institutionType->name }}</p>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-start">
                                    <a   href="{{ route('college.show', ['id' => base64_encode($college->id),'name' => $college->name]) }}#programs" class="me-md-3 mb-2 mb-md-0"><i class="fas fa-graduation-cap"
                                            aria-hidden="true"></i> Admission</a>
                                    <a href="{{ route('college.show', ['id' => base64_encode($college->id),'name' => $college->name]) }}#programs" class="me-md-3 mb-2 mb-md-0"><i class="fa fa-book-open"
                                            aria-hidden="true"></i> Courses</a>
                                    <a href="{{ route('college.show', ['id' => base64_encode($college->id),'name' => $college->name]) }}#programs" class="me-md-3 mb-2 mb-md-0"><i class="fa fa-dollar-sign"
                                            aria-hidden="true"></i> Fees</a>

                                </div>
                            </div>
                            <div class="d-flex flex-column mt-3 mt-md-0">
                                <a href="{{ route('college.brochure', ['id' => $college->id]) }}"
                                    class="btn btn-primary text-white btn-md">
                                    <i class="fa fa-download" aria-hidden="true"></i> Brochure
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contentjs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectedFiltersDiv = document.getElementById('selected-filters');
            const checkboxes = document.querySelectorAll('.form-check-input');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        const badge = document.createElement('span');
                        badge.className = 'badge bg-primary me-2';
                        badge.textContent = checkbox.value;

                        const closeButton = document.createElement('button');
                        closeButton.className = 'btn-close btn-close-white ms-2';
                        closeButton.type = 'button';
                        closeButton.addEventListener('click', () => {
                            checkbox.checked = false;
                            badge.remove();
                            filterColleges(); // Trigger filterColleges on badge removal
                        });

                        badge.appendChild(closeButton);
                        selectedFiltersDiv.appendChild(badge);
                    } else {
                        const badges = selectedFiltersDiv.querySelectorAll('.badge');
                        badges.forEach(badge => {
                            if (badge.textContent.trim() === checkbox.value) {
                                badge.remove();
                            }
                        });
                    }
                    filterColleges(); // Trigger filterColleges on checkbox change
                });
            });
        });

        function filterStates() {
            const input = document.getElementById('stateSearch').value.toLowerCase();
            document.querySelectorAll('.state-checkbox').forEach(stateCheckbox => {
                const label = stateCheckbox.querySelector('label').textContent.toLowerCase();
                stateCheckbox.style.display = label.includes(input) ? '' : 'none';
            });
        }

        function getCountryIdFromUrl() {
            const url = window.location.pathname;
            const parts = url.split('/');
            return parts[parts.length - 1];
        }

        function filterColleges() {
            const countryId = getCountryIdFromUrl(); // Get the countryId from the URL

            const stateFilter = $('.state-filter:checked').map(function() {
                return $(this).val();
            }).get();

            const feesFilter = $('.fees-filter:checked').map(function() {
                return $(this).val();
            }).get();

            const institutionTypeFilter = $('.institution-filter:checked').map(function() {
                return $(this).val();
            }).get();

            const requestData = {};
            if (stateFilter.length > 0) requestData.state = stateFilter;
            if (feesFilter.length > 0) requestData.fees = feesFilter;
            if (institutionTypeFilter.length > 0) requestData.institutionType = institutionTypeFilter;

            $.ajax({
                url: `/list/colleges/${countryId}`,
                method: 'GET',
                data: requestData,
                success: function(response) {
                    const collegeListDiv = $('#college-list');
                    collegeListDiv.empty();

                    response.colleges.forEach(college => {
                        // Ensure the image path is correct
                        const imageUrl = `{{ asset('storage') }}/${college.image}`;
                        const brochureUrl = `/colleges/${college.id}/brochure`;

                        // Append each college to the college list
                        collegeListDiv.append(`
                            <div class="college-card mb-4 p-4 border rounded d-flex flex-wrap align-items-center bg-light">
                                <div class="me-4 text-center" style="width: 60px;">
                                    <h2 class="m-0">${response.colleges.indexOf(college) + 1}</h2>
                                    <p class="small m-0">NIRF '24</p>
                                </div>
                                <div class="me-4">
                                    <img src="${imageUrl}" class="college-logo"
                                        alt="College Logo"
                                        style="height: 90px; width: 120px; object-fit: cover; border-radius: 4px;">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="mb-1 d-flex flex-md-row justify-content-between">
                                        <h5><a href="/college/${college.id}">${college.name}</a></h5>
                                        <p>4.6 <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span> (125)</p>
                                    </div>
                                    <div class="mb-1 d-flex flex-column flex-md-row justify-content-around align-items-center">
                                        <p>Country: ${college.country.name}</p>
                                        <p>Fee: ${college.courses.length > 0 ? college.courses[0].course_amount : 'N/A'}</p>
                                        <p>Type of Institution: ${college.institution_type ? college.institution_type.name : 'N/A'}</p>
                                    </div>
                                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-start">
                                        <a href="" class="me-md-3 mb-2 mb-md-0"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Admission</a>
                                        <a href="" class="me-md-3 mb-2 mb-md-0"><i class="fa fa-book-open" aria-hidden="true"></i> Courses</a>
                                        <a href="" class="me-md-3 mb-2 mb-md-0"><i class="fa fa-dollar-sign" aria-hidden="true"></i> Fees</a>
                                        <a href="" class="me-md-3 mb-2 mb-md-0"><i class="fa fa-briefcase" aria-hidden="true"></i> Placements</a>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mt-3 mt-md-0">
                                    <a href="${brochureUrl}" class="btn btn-primary text-white btn-md">
                                        <i class="fa fa-download" aria-hidden="true"></i> Brochure
                                    </a>
                                </div>
                            </div>
                        `);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }
    </script>
@endsection
