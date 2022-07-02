Lab2

A) Files
This website consists 5 PHP files and 1 CSS file. Some JavaScripts and CSS are inserted directly in PHP code.
1. lab2.php - This is the most important file of the site, this is the root file. This is where all other files are connected. I made some AJAX here so that register and login form doesn't need to be in a seperate file.

2. register.php - This is where the registration process happening. I connected the database and check for username existence before I actually create that to the database. 

3. signin.php - This is a PHP File that is being executed after a login was made. It search for the username input as well as if the user is trying to login as Administrator before grabbing the user details.

4. logout.php - A simple file which destroy the session to delete the saved session variables and reset them to defaults. This will also redirect to the home page and exit the current page.

5. admin.php - This file is a little bit special because it is only intended for one single user, the administrator. In this file, the data from the database will be retrieve and display in a table.

B) How much is complete?
This website can create and read data from the database. It can also change the background color after the user logged in with multiple random colors. The logout functionality works perfectly fine in every page. I used sessions to save retrieve data across pages. I also added a feature wherein if someone tries to enter the admin page url manually without login access, it will throw a 403 Forbidden error. I can also access the Administrator and check the database from my website, by just logging in as user:Administrator, password: admin. 

Extra Credit:
    - Password Encryption
    I used the password_hash() method of PHP to make my website more secured. I also used the password_verify() function to verify if the user input is actually the same the the one saved in the database.

    - Using AJAX
    I used AJAX in the lab2.php to minimize the need to create a bunch of different file. I also used the power of Javascript to manipulate the Document Object Model without actually touching the HTML, this will not only make the file structure organized but also it will save time and effort.

c.) Bugs
The only minor bug I noticed is that whenever a user logs out, the home page shows register instead of login.
