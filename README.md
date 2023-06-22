# Bank Application API

This is a simple Bank Application API built with PHP and MySQL. It provides endpoints for creating accounts, updating account details, deleting accounts, sending and receiving money, and viewing transactions.

## Technologies Used

- PHP
- MySQL

## Setup Instructions

To run this project locally, follow these steps:

1. Ensure that you have PHP and MySQL installed on your machine.

2. Clone the repository to your local machine.

3. Create a new MySQL database for the application

4. Import the database file `api.sql`

5. Update the database connection configuration in the db.php file with your MySQL credentials

6. Start a local PHP development server

7. API ENDPOINTS TESTING

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
Response: JSON object with  a success message


=======================remain to edit===========================
SEND & RECEIVE MONEY

Endpoint: POST /send-money
Input: JSON body with sender and receiver account details (account numbers, amount, etc.)
Response: JSON object with a success message

VIEW TRANSACTIONS

Endpoint: GET /view-transactions/:account_number
Input: Account number as a URL parameter
Response: JSON object with the list of transactions for the account
