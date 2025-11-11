@extends('admin_index')
@section('admin_content')
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- Wizard CSS -->
    <link rel="stylesheet" href="assets/plugins/twitter-bootstrap-wizard/form-wizard.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    {{ $slot }}


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Feather Icon JS -->
    <script src="assets/js/feather.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Wizard JS -->
    <script src="assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="assets/plugins/twitter-bootstrap-wizard/prettify.js"></script>
    <script src="assets/plugins/twitter-bootstrap-wizard/form-wizard.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
@endsection

@section('contentjs')
    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            // Create a new div to contain the file input and close button
            var newDiv = document.createElement('div');
            newDiv.className = 'form-group mt-2 d-flex align-items-center';

            // Create a new file input field
            var newFileInput = document.createElement('input');
            newFileInput.type = 'file';
            newFileInput.className = 'form-control';
            newFileInput.name = 'files[]'; // Ensure this input is part of the 'files[]' array
            newFileInput.multiple = true; // Allow multiple file selections
            newDiv.appendChild(newFileInput);

            // Create a close button
            var closeButton = document.createElement('button');
            closeButton.type = 'button';
            closeButton.className = 'btn btn-danger btn-sm ml-2';
            closeButton.innerHTML = '&times;';
            closeButton.style.fontSize = '20px';
            newDiv.appendChild(closeButton);

            // Append the new div to the container
            document.getElementById('inputContainer').appendChild(newDiv);

            // Add event listener to remove the file input and close button when clicked
            closeButton.addEventListener('click', function() {
                newDiv.remove();
            });
        });
    </script>
@endsection
