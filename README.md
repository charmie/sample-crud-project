# sample-crud-project

PRE-REQUISITES: create a database on your local machine called **_local_staging_**
ASSUMPTIONS: Basic CLI Commands know-how

1. Clone the project in your local machine
2. Install Composer in the respective folder where the project is cloned
3. This step can be tricky but to ensure that this will work, do the following:
		3.1. Remove vendor folder (if it is present)
		3.2. Remove composer.lock file (if it is present)
		3.3. Run this command to install dependencies >>>>> _composer update_
4. Run this command to create the table structures >>>>> _php artisan migrate_
5. Run this command to populate initial records on the users table >>>>> _php artisan db:seed_
6. Run this command to start the app >>>>> _php artisan serve_
7. Browse to localhost:8000 as per instructed by php artisan serve: login page must be shown
6. If seeding is successfully executed, use the ff credentials: username -> duterte; password: forpresident
