<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-Km4P3E/PaR6aOIR/HVgk4EbZHfwnqRWgYLSt4M3l3E0=" crossorigin="anonymous"></script>
<!-- Edit image Modal -->
<div class="modal fade" id="editCollegeModal" tabindex="-1" role="dialog" aria-labelledby="editCollegeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCollegeModalLabel">Edit College Image </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin_panel.college-image-edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="college_id" id="collegeId">
                    <div class="mb-3">
                        <label class="form-label">College Image : </label>
                        <input type="file" name="image">
                    </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
            </form>
        </div>
    </div>
</div>
<!--End Edit image Modal -->

<!-- Edit Brochure Modal -->

<div class="modal fade" id="editBrochureModal" tabindex="-1" role="dialog" aria-labelledby="editBrochureModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBrochureModalLabel">Edit Brochure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin_panel.brochure-edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="college_id" id="collegeId">
                    <div class="mb-3">
                        <label class="form-label">New Brochure : </label>
                        <input type="file" name="brochure">
                    </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <input type="submit" class="btn btn-primary" value="Save Changes">
            </div>
            </form>
        </div>
    </div>
</div>

<!--End Edit Brochure Modal -->

<script>
    $('#editCollegeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var collegeId = button.data('college-id'); // Extract college ID from data-* attributes
        var modal = $(this);
        modal.find('#collegeId').val(collegeId); // Set the value of college ID input field
    });

    $('#editBrochureModal').on('show.bs.modal', function (event) {
        // alert(1);
        var button = $(event.relatedTarget); // Button that triggered the modal
        var collegeId = button.data('college-id'); // Extract college ID from data-* attributes
        var modal = $(this);
        modal.find('#collegeId').val(collegeId); // Set the value of college ID input field
    });
</script>
