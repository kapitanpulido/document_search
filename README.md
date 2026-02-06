# Document Search

Wildcard searching from uploaded documents.

## Getting Started

Clone this project using the following command:
```
git clone https://github.com/kapitanpulido/document_search.git
```

Go to your project folder and install project dependencies:
```
composer install
```

Install npm packages:
```
npm install
```

Import npm packages:
```
npm run build
```

Generate configuration file:
```
cp .env.example .env
```

Genereate application key:
```
php artisan key:generate
```

Configure your database and mail settings on your `.env` file:
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

MAIL_DRIVER=
MAIL_HOST=
MAIL_PORT=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
```

Initialize database structure and database content:
```
php artisan migrate
php artisan db:seed
```

## License

This project is owned by the **************. No parts of this software can be use without the written consent of the owner.

[https://www.mywebsite.com](https://www.mywebsite.com)

## Support

You can ask for support by emailing m y e m a i l a t s b m a d o t c o m
