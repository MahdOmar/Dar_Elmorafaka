<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Tourist City Guide</title>
</head>
<body>
    <header class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">City Guide</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#best-places">Best Places</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#hotels">Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#restaurants">Restaurants</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section id="hero" class="bg-primary text-white text-center py-5">
        <h1>Welcome to Beautiful City</h1>
        <p>Discover the best places, hotels, and restaurants in our amazing city.</p>
        <a href="#best-places" class="btn btn-light btn-lg">Explore</a>
    </section>

    <section id="best-places" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Best Places to Visit</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="place1.jpg" class="card-img-top" alt="Place 1">
                        <div class="card-body">
                            <h5 class="card-title">Place 1</h5>
                            <p class="card-text">A brief description of Place 1.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- Add more place cards here -->

            </div>
        </div>
    </section>

    <section id="hotels" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Hotels</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="hotel1.jpg" class="card-img-top" alt="Hotel 1">
                        <div class="card-body">
                            <h5 class="card-title">Hotel 1</h5>
                            <p class="card-text">A brief description of Hotel 1.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- Add more hotel cards here -->

            </div>
        </div>
    </section>

    <section id="restaurants" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Restaurants</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="restaurant1.jpg" class="card-img-top" alt="Restaurant 1">
                        <div class="card-body">
                            <h5 class="card-title">Restaurant 1</h5>
                            <p class="card-text">A brief description of Restaurant 1.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- Add more restaurant cards here -->

            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Tourist City Guide</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
