<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .cover-image {
            width: 100%;
            height: 200px;
            background-image: url('cover-image.jpg');
            background-size: cover;
            background-position: center;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: -75px auto 20px;
            display: block;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        
        .profile-name {
            text-align: center;
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }
        
        .profile-description {
            text-align: center;
            color: #777;
            font-size: 18px;
        }
        
        .profile-stats {
            text-align: center;
            margin-top: 20px;
        }
        
        .profile-stats p {
            color: #555;
            margin: 0;
        }
        
        .profile-stats strong {
            display: block;
            font-size: 20px;
            color: #333;
        }
        
        .profile-contact {
            margin-top: 20px;
        }
        
        .profile-contact a {
            display: block;
            margin-bottom: 5px;
            color: #333;
            text-decoration: none;
            font-size: 16px;
        }
        
        .profile-contact i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cover-image"></div>
        <img class="profile-picture" src="profile-picture.jpg" alt="Profile Picture">
        <h1 class="profile-name">John Doe</h1>
        <p class="profile-description">Web Developer</p>
        <div class="profile-stats">
            <p><strong>500</strong> Friends</p>
            <p><strong>200</strong> Photos</p>
        </div>
        <div class="profile-contact">
            <a href="mailto:john.doe@example.com"><i class="fas fa-envelope"></i>john.doe@example.com</a>
            <a href="tel:+123456789"><i class="fas fa-phone"></i>+123456789</a>
            <a href="https://www.example.com" target="_blank"><i class="fas fa-globe"></i>www.example.com</a>
        </div>
    </div>
</body>
</html>