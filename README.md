# MediConnect Application

MediConnect is an application built with CodeIgniter that allows users to register, activate their accounts via email, and complete their profiles.

## Features

- **User Registration:** Users can register by providing their full name, email, and password.
- **Email Activation:** Upon registration, users receive an activation email containing a link to activate their account.
- **Profile Completion:** After activation, users can complete their profiles by providing their address and phone number.

## Installation

1. Clone the repository:
    git clone https://github.com/yourusername/MediConnect.git
2. Configure your database settings in `app/Config/Database.php`.
3. Update email settings in `app/Config/Email.php`.
4. Ensure that PHPMailer library is installed via Composer:
    composer require phpmailer/phpmailer
5. Serve the application:
   php -S localhost:8080 -t public
6. Access the application in your web browser at `http://localhost:8080`.

## Usage

1. Navigate to the registration page.
2. Fill out the registration form with your details.
3. Check your email for the activation link and click on it to activate your account.
4. Complete your profile by providing your address and phone number.

## Configuration

- **Database:** Configure database settings in `app/Config/Database.php`.
- **Email:** Update email settings in `app/Config/Email.php`.

## Contributors

- Kariuki Mary Anne (@K-Maryanne)
- Oanda Michelle Nyatero (@MichelleOanda)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

