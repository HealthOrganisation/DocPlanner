<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.contact-container {
    position: relative;
    height: 100vh;
}

.image-section {
    height: 90%;
}

.image-section img {
    width: 100%;
    height: 110%;
    object-fit: cover;
}

.triangle-section {
    position: absolute;
    top: 66%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 70%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.title-container {
    margin-bottom: 6px;
    margin-left: -13cm;
    color: rgb(0, 0, 0);
}

.title-container h1 {
    font-size: 36px;
    margin-top: -300px;
}

.title-container p {
    font-size: 18px;
}

.filter-buttons {
    text-align: center;
    margin-bottom: 20px;
}

.filter-buttons button {
    background-color: #dfdfdf;
    color: #333;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px;
    font-size: 14px;
    transition: background-color 0.3s;
}

.filter-buttons button:hover {
    background-color: #3579c3;
    color: white;
}

.doctor-profiles {
    text-align: center;
    padding: 40px 20px;
    background-color: #f5f5f5;
    margin-top: -250px;
    position: relative;
    z-index: 2;
}

.doctor-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.doctor-card {
    background: #efefef;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.doctor-card img {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: cover;
}

.doctor-card h3 {
    font-size: 20px;
    margin: 10px 0;
    color: #333;
}

.doctor-card p {
    font-size: 16px;
    color: #666;
    margin-bottom: 15px;
}

.profile-btn {
    background-color: #3579c3;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
    display: inline-block;
    font-size: 14px;
}

.profile-btn:hover {
    background-color: #285a8e;
}.searchBox {
    position: absolute;
    top: 2%;
    left: 10%;
    transform:  translate(-50%,50%);
    background: #285a8e;
    height: 40px;
    border-radius: 40px;
    padding: 2px;

}

.searchBox:hover > .searchInput {
    width: 240px;
    padding: 0 6px;
}

.searchBox:hover > .searchButton {
  background: white;
  color : #285a8e;
}

.searchButton {
    color: white;
    float: right;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #285a8e;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.4s;
}

.searchInput {
    border:none;
    background: none;
    outline:none;
    float:left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 40px;
    width: 0px;

}

@media screen and (max-width: 620px) {
.searchBox:hover > .searchInput {
    width: 150px;
    padding: 0 6px;
}
}
</style>
<body>
    <header>
        @include('header')
    </header>
    <div class="contact-container">
        <div class="image-section">
            <img src="images/cont2.jpg" alt="Contact Image">
        </div>
        <div class="triangle-section">
            <div class="title-container">
                <h1>Introduce you to our experts</h1>
                <p>Choose from our expert doctors and get the help you need</p>
            </div>
        </div>
        
        <div class="doctor-profiles">
            <div class="searchBox">

                <input class="searchInput"type="text" name="" placeholder="Search">
                <button class="searchButton" href="#">
                    <i class="material-icons">
                        search
                    </i>
                </button>
            </div>
            <div class="filter-buttons">
                <button onclick="filterDoctors('all')">All</button>
                <button onclick="filterDoctors('Cardiologist')">Cardiologist</button>
                <button onclick="filterDoctors('Dermatologist')">Dermatologist</button>
                <button onclick="filterDoctors('Neurologist')">Neurologist</button>
                <button onclick="filterDoctors('Orthopedic Surgeon')">Orthopedic Surgeon</button>
                <button onclick="filterDoctors('Pediatrician')">Pediatrician</button>
                <button onclick="filterDoctors('Oncologist')">Oncologist</button>
            </div>
            <div class="doctor-container">
                @foreach($doctors as $doctor)
                <div class="doctor-card" data-specialty="{{ $doctor->specialite }}">
                    <img src="{{ asset('storage/images/' . $doctor->image) }}" alt="Doctor Image">
                    <h3>{{ $doctor->nom }}</h3>
                    <p>{{ $doctor->specialite }}</p>
                    <a href="{{ route('doctor.showw', $doctor->id_doctor) }}" class="profile-btn">View Profile</a>
                </div>
                @endforeach
            </div>
            
            
            
        </div>
    </div>
    <footer>
        @include('footer')
    </footer>
    </body>
    <script>
        function filterDoctors(specialty) {
            const doctors = document.querySelectorAll('.doctor-card');
            doctors.forEach(doctor => {
                if (specialty === 'all' || doctor.getAttribute('data-specialty') === specialty) {
                    doctor.style.display = 'block';
                } else {
                    doctor.style.display = 'none';
                }
            });
        }
    </script>
</html>
