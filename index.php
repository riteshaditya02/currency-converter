<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Currency Converter</h1>
    <div class="container">
        <form id="Form" action="convert.php" method="post">
            <input type="number" name="price" placeholder="Price"> <br><br>
            <select name="currency" class="selector">
                <option value="select" hidden>From</option>
                <option value="INR">INR</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="YER">YER</option>
                <option value="AED">AED</option>
            </select> <br> <br>
            <select name="convert" class="selector">
                <option value="select" hidden>To</option>
                <option value="INR">INR</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="YER">YER</option>
                <option value="AED">AED</option>
            </select> <br> <br>

            <button type="submit" id="submit">Submit</button>
        </form>
        <h2 id="converted"></h2>
    </div>
    
    <script>
        document.getElementById('submit').addEventListener('click', function (event) {
            event.preventDefault(); 
            
            var formData = new FormData(document.getElementById('Form'));
            var request = new XMLHttpRequest();
            
            request.onload = function () {
                if (request.status === 200) {
                    document.getElementById('converted').textContent = request.responseText;
                }
            };
            
            request.open('POST', 'convert.php', true);
            request.send(formData);
        });
    </script>
</body>
</html>
