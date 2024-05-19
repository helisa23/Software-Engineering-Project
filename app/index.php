<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav> 
            <div id="logo">
               PAW <br> CARE
            </div>
            <ul class="navigation-menu">
                <li><a href="#">Services</a>
                    <ul class="subnav">
                        <li class="card-med" id="serv-groom">
                            <div class="card-image"><img src="https://cdn-icons-png.flaticon.com/512/1615/1615211.png"></div>
                            <a href="#">
                                <span>Grooming</span>
                                <span>   <span class="material-symbols-outlined">
                                    </span></span>
                            </a>
                        </li>
                         
                        <li class="card-med" id="serv-board">
                            <div class="card-image"><img src="https://openclipart.org/image/800px/309088"></div>
                            <a href="#">
                                <span>Medical Assistance</span>
                                <span>  <span class="material-symbols-outlined">
                    
                                    </span></span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li><a href="#locate">Book an appointment</a>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
            </ul>
            <div id="utility">
            
                <span class="material-symbols-outlined">
                     
                </span>

            </div>
        </nav>
    </header>
    <section class="hero">
        <h1>You know what we like about you?<br>Your pet!</h1>
        <div class="btn-group">
                     
            <button class="btn-outline-dark btn-hover-color" onclick="redirectToPage()"><span class="material-symbols-outlined">
                     
                </span> Book a Service</button>
        </div>

    </section>
    
    <section>
        <h2>Our Services</h2>

        <ul class="services">
            <li class="card-large card-dark card-wide" id="serv-groom">
                <div class="card-image"><img src="https://ouch-cdn2.icons8.com/T11rfGmMKgcStJyAFKNgtOfE79cadabx0DVMnvzA9Pk/rs:fit:368:313/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvNDQx/LzFlYWU4MWY3LWQ1/ZjYtNDM2Ny1hZjM5/LWVmNTFmMGM5Njk4/MS5wbmc.png"></div>
                <ul>
                    Dog Grooming<span class="subtitle">Tail-wagging transformations are our specialty.</span>
                    <li><a href="#">Coat Care</a><span>$80</span></li>
                    <li><a href="#">Nail Care</a><span>$16</span></li>
                    <li><a href="#">Doggie Deluxe Spa Day</a><span>$160</span></li>
                    <button class="btn-filled-dark" onclick="redirectToPage()"><span class="material-symbols-outlined">     
                        </span>Book Now</button>
                </ul>

            </li>
            <li class="card-large card-dark card-wide" id="serv-board">
                <div class="card-image"><img src="https://openclipart.org/image/800px/309088"></div>
                <ul>
                    Medical Assistance<span class="subtitle">"A veterinarian’s job often begins where that of a doctor ends."</span>
                    <li><a href="#">Spaying</a><span>$80+</span></li>
                    <li><a href="#">Vaccines</a><span>$50+</span></li>
                    <li><a href="#">Allergy Treatments</a><span> -- </span></li>

                    <button class="btn-filled-dark" onclick="redirectToPage()"><span class="material-symbols-outlined">
                             
                        </span>Book Now</button>
                </ul>

            </li>
        </ul>
    </section>

    <section id="locate">

        <div>
            <h2>Book an appointment</h2>
            <p>Our knowledgeable and friendly staff is always ready to assist you in making the best choices for your pawsome friends.</p>
            <div class="btn-group">
                <button class="btn-filled-dark" onclick="redirectToPage()"><span class="material-symbols-outlined">
 
</span>Appointment Application</button>
                
            </div>
        </div>
    </section>

    <footer>

     @ Paw care, All rights reserved
     Contact us on :+355 68 234 45678
     You may find us at: Street "Bardhyl", Bulding 2

    </footer>
    <script>
        function redirectToPage() { 
            var fileUrl = 'booking.php'; 
            window.location.href = fileUrl;
        }
    </script>

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
    </script>

    
</body>
</html>
