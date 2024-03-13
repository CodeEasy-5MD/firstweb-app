<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dash.css">

    <title>Choose Sacco</title>
</head>
<body>
    <h2>Choose a Sacco</h2>

    <div class="sacco-container" onclick="storeSelectedSacco('Rongai Sacco')">Rongai Sacco</div>
    <div class="sacco-container" onclick="storeSelectedSacco('Langata Sacco')">Langata Sacco</div>
    <div class="sacco-container" onclick="storeSelectedSacco('Kiambu Sacco')">Kiambu Sacco</div>
    
    <script>
        

        function storeSelectedSacco(saccoName) {
            // Use AJAX to send the selected Sacco to the server
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'store_sacco.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Handle the server's response if needed
                    console.log(xhr.responseText);
                    // Redirect to red.php after successful response
                    window.location.href = 'sacco_reg.php?sacco='+ saccoName;
                }
            };
            xhr.send('sacco=' + encodeURIComponent(saccoName));
        }

    </script>
</body>
</html>
