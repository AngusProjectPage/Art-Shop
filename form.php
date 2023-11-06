<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Order Form</title>
</head>
<body>
<?php include "header.php"; ?>
    <main class="container">
        <form action="#">
            <section>
                <h2>Contact Information</h2>
                <p>Required fields are followed by <span aria-label="required">*</span>.</p>
                <p class="form-group">
                    <label for="name">Name: <span aria-label="required">*</span></label>
                    <input type="text" id="name" class="form-control">
                </p>
                <p class="form-group">
                    <label for="phoneNumber">Phone Number: <span aria-label="required">*</span></label>
                    <input type="text" id="phoneNumber" class="form-control">
                </p>
                <p class="form-group">           
                    <label for="email">Email: <span aria-label="required">*</span></label>
                    <input type="text" id="email" class="form-control">
                </p>
                <p class="form-group">
                    <label for="address">Postal Address: <span aria-label="required">*</span></label>
                    <input type="text" id="address" class="form-control">
                </p>
            </section>
            <section>
                <h2>Painting Details</h2>
            </section>
            <section>
                <p>
                  <button type="submit" class="btn btn-primary">Validate the payment</button>
                </p>
            </section>              
        </form>
    </main>
</body>
</html>