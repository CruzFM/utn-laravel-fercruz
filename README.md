
# My wallet - by Fernando Cruz

This project simulates a wallet app, where users can upload their incomes, spendings and savings; in order to obtain a balance and increase their finantial control.


## Instructions
Deployment is still under work, so downloading the project is required for it to be tested.

So far, given the structure of the project, users can create their own users and password. No verification mails will be sent after registration, as of now.

Once registered, the application will redirect the user to the /home page. This route is protected thanks to the authentication middleware that enables route protection in case the user is logged in and logged out.

Every new user created will be stored in the users table of the 'laravel' database (use php artisan migrate in order to run the migrations).

After a user is logged in, home.blade.php view will be rendered, and it has the main data of the application in display: the total balance, the total incomes an the total spendings the user has introduced. 

If no such data has been introduced, default messages will indicate the user such thing (thanks to the @if statement used in the view file).

New transactions can be introduced using the form below the cards.

Since there can be many users, I decided to just create the transactions table in the 'laravel' database, but using a foreing key (being it, the user id) in order to just render the rows that contain such foreign key, and only if that foreign key is equal to the logged user's id.

Each card in the home section have an anchor redirecting to the /incomes and /spending views.
Such views have the Delete function, so the user can delete the selected row once submitted the Delete button.

That's it for now, thank you!