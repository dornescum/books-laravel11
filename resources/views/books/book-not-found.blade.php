<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Not Found</title>
    <!-- Add here more head links and scripts if needed -->
</head>
<body>
<div>
    <h1>Book Not Found</h1>
    <p>The book you're looking for does not exist. You will be redirected to the books page in a few seconds...</p>
    <button onclick="redirectToBooks()">Go to Books Page Now</button>

    <script>
        // Redirect to the books page after 2 seconds
        setTimeout(function() {
            window.location.href = "{{ url('/books') }}";
        }, 2000);

        // Or when the button is clicked
        function redirectToBooks(){
            window.location.href = "{{ url('/books') }}";
        }
    </script>
</div>
</body>
</html>
