@extends('index')
@section('content')

<section class="shop-area pt-60  pb-120 p-relative " data-animation="fadeInUp animated" data-delay=".2s">
    <div class="container">
        <div class="row  class-scroll">
            <div class="col-lg-3 col-md-3">
                <div class="accordion " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                COUNTRY
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach ($country as $c)
                                    <div class="form-check">
                                        <input class="form-check-input country-checkbox" type="checkbox" value="{{ $c->id }}" id="checkbox{{ $c->id }}">
                                        <label class="form-check-label" for="checkbox{{ $c->id }}">
                                            {{ $c->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            INSTITUTION TYPE
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach ($institution_type as $i )
                            <div class="form-check">
                                <input class="form-check-input institute-checkbox" type="checkbox" value="{{ $i->id }}" id="checkbox1{{ $i->id }}">
                                <label class="form-check-label" for="checkbox1{{ $i->id }}">
                                    {{ $i->name }}
                                </label>
                            </div>
                        @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                FEE
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-check">
                                    <input class="form-check-input fee-checkbox" type="checkbox" value="<100000" id="checkbox1">
                                    <label class="form-check-label" for="checkbox1"> < 1 LAKH</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input fee-checkbox" type="checkbox" value="100000 < 200000" id="checkbox2">
                                    <label class="form-check-label" for="checkbox2">1 -2 LAKH</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input fee-checkbox" type="checkbox" value="200000 < 300000" id="checkbox3">
                                    <label class="form-check-label" for="checkbox3">2 - 3 LAKH</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input fee-checkbox" type="checkbox" value="300000 < 500000" id="checkbox4">
                                    <label class="form-check-label" for="checkbox4">3 - 5 LAKH</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input fee-checkbox" type="checkbox" value=">500000" id="checkbox5">
                                    <label class="form-check-label" for="checkbox5"> > 5 LAKH</label>
                                </div>
                            </div>
                        </div>

                    </div>
                  </div>
            </div>
            {{-- <div id="loader" class="spinner-border text-primary" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
            </div> --}}

            <div class="col-lg-9 col-md-9" id="college-list">
                <!-- Include the partial view here -->
                @include('website.partials.college_list_partial')
            </div> <br> <br>
        </div>
		<div class="row">
            <div class="col-12">
                <div class="pagination-wrap mt-20 text-center">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            <li class="page-item active"><a href="#">1</a></li>
                            <li class="page-item"><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('contentjs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    var routeUrl = "{{ route('subcategory.colleges', ['categoryId' => ':categoryId', 'subcategoryId' => ':subcategoryId']) }}";
    var categoryId = '{{ $categoryId }}';
    var subcategoryId = '{{ $subcategoryId }}';
    var url = routeUrl.replace(':categoryId', categoryId).replace(':subcategoryId', subcategoryId);

    function updateColleges() {
        var selectedCountries = [];
        $('.country-checkbox:checked').each(function() {
            selectedCountries.push($(this).val());
        });

        var selectedInstitute = [];
        $('.institute-checkbox:checked').each(function() {
            selectedInstitute.push($(this).val());
        });

        var selectedFees = [];
        $('.fee-checkbox:checked').each(function() {
            selectedFees.push($(this).val());
        });

        $('#loader').show();

        $.ajax({
            url: url,
            type: 'GET',
            data: { countries: selectedCountries, institutes: selectedInstitute, fees: selectedFees },
            success: function(response) {
                $('#college-list').html(response);
            },
            error: function(xhr) {
                console.log('Error:', xhr);
            },
            complete: function() {
                $('#loader').hide();
            }
        });
    }

    $('.country-checkbox, .institute-checkbox, .fee-checkbox').on('change', function() {
        updateColleges();
    });
});




</script>






@endsection

