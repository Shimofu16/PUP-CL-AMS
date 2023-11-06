### PUP Computer Laboratory Attendance and Monitoring System

**Description:**

The PUP Computer Laboratory Attendance and Monitoring System is a web-based application that allows computer laboratory administrators to manage the attendance and monitoring of students using Laravel. The system has the following features:

* Student registration and management
* Attendance tracking
* Computer Status
* Reporting

**Installation:**

1. Clone the repository:

```
git clone https://github.com/Shimofu16/PUP-CL-AMS.git
```

2. Install the project dependencies:

```
cd PUP-CL-AMS
composer install
```

3. Configure the database:

```
cp .env.example .env
php artisan key:generate
php artisan migrate
```

4. Start the development server:

```
php artisan serve
```

**Usage:**

1. Open the application in your web browser at http://localhost:8000.
2. Log in with the default username and password: `pupadmin@app.com` and `password`.
3. The application dashboard will show you a summary of the current attendance and monitoring status.
4. You can manage students, track attendance, monitor computer usage, and generate reports from the application's menus.

**Contributions:**

The PUP Computer Laboratory Attendance and Monitoring System is an open source project, and contributions are welcome. Please see the contributing guidelines for more information.

**License:**

The PUP Computer Laboratory Attendance and Monitoring System is licensed under the MIT License.
