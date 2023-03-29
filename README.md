Laravel 9 + VueJS 3 Business Card App

This is a web application built using Laravel 9 and VueJS 3. The application allows users to register and login, input their details, and create a business card with a QR code that links to a presentation page containing their details.

Installation
Clone the repository: gh repo clone YanVL/qrcode-image-generator
Navigate to the project directory: cd businesscard-app
Install the dependencies: composer install and npm install
Create a .env file by copying .env.example and updating the database credentials
Generate an application key: php artisan key:generate
Run the database migrations: php artisan migrate
Compile the assets: npm run dev

Usage
Register or log in to your account.
Input your details in the "home" page.
Click "Generate Image" to generate a card with a QR code.
Click "See my Card" to see your online card.
Scan the QR code to view your presentation page containing your details.

Contributing
Contributions are welcome! Please feel free to submit a pull request.

License
This project is open-sourced software licensed under the MIT license.