<!DOCTYPE html>
<html>
<head>
    <title>Laravel CKEditor</title>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>

<form method="POST" action="/submit">
    @csrf
    <textarea name="content" id="editor"></textarea>
    <button type="submit">Submit</button>
</form>

<script>
    CKEDITOR.replace('editor');
</script>

</body>
</html>
