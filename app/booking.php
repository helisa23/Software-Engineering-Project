<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            background: var(--light-01);
            width: 100vw;
            overflow-x: hidden;
        }

        header {
            height: auto;
            position: sticky;
            top: 0;
            z-index: 100;
            background: var(--light-02);
            padding: 16px var(--pg-margin);
        }

        #appointment-form {
            padding: var(--pg-margin);
        }

        #appointment-form > div {
            background: var(--brand-02);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: var(--hover-timing);
            cursor: pointer;
        }

        #appointment-form h2 {
            color: var(--text-01);
            margin-top: 0;
        }

        #appointment-form label {
            color: var(--text-01);
            margin-bottom: 8px;
        }

        #appointment-form select, #appointment-form input[type="text"], #appointment-form input[type="date"], #appointment-form input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: none;
            border-radius: 4px;
            box-shadow: var(--card-shadow);
        }

        #appointment-form button {
            background: var(--brand-01);
            color: var(--light-02);
            padding: 12px 24px;
            border: none;
            border-radius: 24px;
            cursor: pointer;
            transition: var(--hover-timing);
        }

        #appointment-form button:hover {
            background: var(--brand-02);
            color: var(--text-01);
        }

        footer {
            background: var(--text-01);
            padding: 80px 80px 0px;
            margin-top: 80px;
            display: flex;
            flex-direction: row;
            text-align: left;
        }

        footer ul {
            display: flex;
            flex-direction: column;
            grid-gap: 24px;
            box-shadow: none;
            flex: 1;
            color: var(--light-01);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 80px;
        }

        footer ul li a {
            color: var(--light-01);
            text-decoration: none;
            font-size: 14px;
        }

        footer ul li {
            color: var(--light-01);
            padding: 0;
        }
    </style>
    <title>Appointment Form</title>
</head>
<body>
    <header>
        <nav> 
            <div id="logo">
               PAW <br> CARE
            </div>
        </nav>
    </header>

    <section id="appointment-form">
        <div>
            <h2>Book an Appointment</h2>
            <form id="appointment-form" method="post" action="process_form.php" onsubmit="return validateForm()">
                <label for="appointment-type">Appointment Type:</label>
                <select id="appointment-type" name="appointment-type">
                    <option value="medical-appt">Medical Appointment</option>
                    <option value="grooming">Grooming</option>
                </select><br>

                <label for="pet-type">Pet Type:</label>
                <input type="text" id="pet-type" name="pet-type" required><br>

                <label for="pet-name">Pet Name:</label>
                <input type="text" id="pet-name" name="pet-name" required><br>

                <label for="owner-name">Owner Name:</label>
                <input type="text" id="owner-name" name="owner-name" required><br>

                <label for="owner-number">Phone No:</label>
                <input type="text" id="owner-number" name="owner-number" required><br>

                <label for="owner-email">Email:</label>
                <input type="text" id="owner-email" name="owner-email" required><br>

                <label for="appointment-date">Date:</label>
                <input type="date" id="appointment-date" name="appointment-date" required><br>

                <label for="appointment-time">Time Slot:</label>
                <select id="appointment-time" name="appointment-time" required>
                    <?php
                    // Generate time slots between 12:00 and 18:00
                    $startTime = strtotime("12:00");
                    $endTime = strtotime("18:00");
                    $interval = 30 * 60; // 30 minutes interval

                    // Loop through time slots and create options
                    for ($time = $startTime; $time < $endTime; $time += $interval) {
                        echo "<option value='" . date("H:i", $time) . "'>" . date("h:i A", $time) . "</option>";
                    }
                    ?>
                    
                </select><br>
                <button type="submit" onclick="submit()">Submit</button>
            </form>
        </div>
    </section>

    <footer>
        <!-- Your footer content here -->
    </footer>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            if (status === 'success') {
                const notification = document.createElement('div');
                notification.className = 'notification';
                notification.textContent = 'Appointment submitted successfully. We will contact you soon!';
                document.body.insertBefore(notification, document.body.firstChild);
            }
        };

        function validateForm() {
            var appointmentType = document.getElementById("appointment-type").value;
            var petType = document.getElementById("pet-type").value;
            var petName = document.getElementById("pet-name").value;
            var ownerName = document.getElementById("owner-name").value;
            var ownerNumber = document.getElementById("owner-number").value;
            var ownerEmail = document.getElementById("owner-email").value;
            var appointmentDate = document.getElementById("appointment-date").value;
            var appointmentTime = document.getElementById("appointment-time").value;

            // Perform validation based on test outcomes
            if (appointmentType !== "medical-appt" && appointmentType !== "grooming") {
                alert("Invalid appointment type");
                return false;
            }

            if (petType.trim() === "") {
                alert("Pet type is required");
                return false;
            }

            if (petName.trim() === "") {
                alert("Pet name is required");
                return false;
            }

            if (ownerName.trim() === "") {
                alert("Owner name is required");
                return false;
            }

            if (ownerNumber.trim() === "") {
                alert("Phone number is required");
                return false;
            }

            if (ownerEmail.trim() === "") {
                alert("Email is required");
                return false;
            }

            if (appointmentDate.trim() === "") {
                alert("Appointment date is required");
                return false;
            }

            if (appointmentTime.trim() === "") {
                alert("Appointment time is required");
                return false;
            }

            // Additional validation logic can be added here if needed

            return true; // Submit the form if all validations pass
        }
    </script>
    </script>

</body>
</html>
