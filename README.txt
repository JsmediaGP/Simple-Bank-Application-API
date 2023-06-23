To run this project locally, follow these steps:

Ensure that you have PHP and MySQL installed on your machine.

Clone the repository to your local machine.

Create a new MySQL database for the application

Import the database file api.sql

Update the database connection configuration in the db.php file with your MySQL credentials

Start a local PHP development server

API ENDPOINTS TESTING

CREATE ACCOUNT

Endpoint: POST /create_account.php 
Input: JSON body with account details (account_number, account_name, account_balance, account_type) 
Response: JSON object with Success Message

DELETE ACCOUNT

Endpoint: PUT /delete_account.php 
Input: JSON with account number 
Response: JSON object with a success message

UPDATE ACCOUNT

Endpoint: PUT /account_update.php/:account_number 
Input: JSON body with update account details you want (account_number, account_name, account_balance, account_type) 
Response: JSON object with a success message

SEND & RECEIVE MONEY

Endpoint: POST /send_receive_money.php 
Input: JSON body with sender, receiver account details and amount (sender_account_number, receiver_account_number, amount) 
Response: JSON object with a success message

VIEW TRANSACTIONS

Endpoint: GET /transactions.php 
Input: JSON body with account number (account_number) 
Response: JSON object with the list of transactions for the account