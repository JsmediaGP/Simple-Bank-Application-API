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

Endpoint: POST /create-account
Input: JSON body with account details (name, email, etc.)
Response: JSON object with the created account details

UPDATE ACCOUNT

Endpoint: PUT /update-account/:account_number
Input: JSON body with updated account details (name, email, etc.)
Response: JSON object with the updated account details

DELETE ACCOUNT

Endpoint: DELETE /delete-account/:account_number
Input: Account number as a URL parameter
Response: JSON object with a success message

SEND & RECEIVE MONEY

Endpoint: POST /send-money
Input: JSON body with sender and receiver account details (account numbers, amount, etc.)
Response: JSON object with a success message

VIEW TRANSACTIONS

Endpoint: GET /view-transactions/:account_number
Input: Account number as a URL parameter
Response: JSON object with the list of transactions for the account
