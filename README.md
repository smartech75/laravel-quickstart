# Get Started
Laravel Quickstart is a boilerplate for Laravel Application with typical packages preinstalled and configured to extend a full-fledged application. We tried to make it as minimal as possible.

## Installation

### 1. Download Laravel-QuickStart 
Choose your preferred method
- Download [Zipped Archive](https://github.com/developervijay7/laravel-quickstart/archive/refs/heads/main.zip).
- Clone from GitHub <code>git clone https://github.com/developervijay7/laravel-quickstart.git</code>

### 2. Setup .env file
Laravel-QuickStart has a **.env.example** file in the root of the project.

Rename **.env.example** to **.env**  make sure that the **.env** file must be in root directory. 
Open **.env** file in your preferred choice of editor and add database credentials.

Database configuration

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=root
DB_PASSWORD=password
```

Also, don't forget to set up mail configuration.

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@laravel-quickstart.co"
MAIL_TO_ADDRESS="${APP_NAME}"
```

**Note:** Make sure your operating system is not configured to display hidden files to show **.env** file.

### 3. Composer
In order to install php [composer]() dependencies you first need to [set up composer on your operating system]().
Once your system is compatible with php composer run the following command in your Terminal/ Windows Command Prompt/ Windows powershell/ git bash.

<code>composer install</code>

### 4. Generate Application Keys
This will set your APP_KEY in your **.env** file

<code>php artisan key:generate</code>

### 5. Migrate Database

<code>php artisan migrate</code>

if you also want to import demo users, permissions, and roles run:

<code>php artisan db:seed</code>


### 6. NPM/Yarn
In order to install JavaScript dependencies in your application you will need to install [Node Package Manager]()
and optionally you can use [yarn]() to install them.

Once you have NPM installed run this command
<code>npm install</code>

or if you want to install using yarn run:
<code>yarn</code>


### 7. NPM run prod/dev
If you are deploying Laravel-QuickStart on your production environment run:

<code>npm run prod</code>

If you are deploying it on your local development computer run:

<code>npm run dev</code>

### 8. Demo Credentials
For the purpose of demonstration we have seeded 3 users by default that are Master, Admin and User having roles assigned for them respectively.
To add more refer to Spatie Permission Package Documentation [here](https://spatie.be/docs/laravel-permission/v5/introduction)

Master: master@example.com

Password: Master@123

Admin: admin@example.com

Password: Admin@123

User: user@example.com

Password: User@123
