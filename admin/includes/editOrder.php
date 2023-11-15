<?php
    echo '
        <table class="table table-striped table-primary table-hover table-bordered border-white align-middle">
            <thead>
            <tr>
                <th scope="col">Art ID</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Postcode</th>
                <th scope="col">Address Line 1</th>
                <th scope="col">Address Line 2</th>
                <th scope="col">City</th>
                <th>Remove Order</th>
            </tr>
            </thead>
            <tbody>
            ';
            $query = "SELECT * FROM orders";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                $name         = $row['name'];
                $phoneNumber  = $row['phoneNumber'];
                $email        = $row['email'];
                $postcode     = $row['postcode'];
                $addressLine1 = $row['addressLine1'];
                $addressLine2 = $row['addressLine2'];
                $city         = $row['city'];
                $artId        = $row['artId'];

            echo "      
                <tr>
                    <td>$artId</td>
                    <td>$name</td>
                    <td>$phoneNumber</td>
                    <td>$email</td>
                    <td>$postcode</td>
                    <td>$addressLine1</td>
                    <td>$addressLine2</td>
                    <td>$city</td>
                    <td><a href='./admin.php?artId=$artId&edit=True' class='link-underline-danger link-underline-opacity-0 link-underline-opacity-100-hover' id='remove-order'>Remove Order</a></td>
                </tr>
                ";
            }
        echo '</tbody></table>';
