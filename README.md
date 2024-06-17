# DBMS Assignment

This project is an Simple Employee Management System that allows users to manage employee information, including their IDs, names, salaries, and department affiliations. The project uses PHP, MySQL, and Bootstrap for the frontend.

## Installation

1. **Clone the Repository**
   Clone the project repository from GitHub to your local machine using the following command:
   ```bash
   git clone https://github.com/yourusername/employee-management-system.git
   ```
2. **Navigate to the Project Directory**

   Change your directory to the project folder using the following command in your terminal:

   ```bash
   cd employee-management-system
   ```

   > **_NOTE:_** For security reasons, it is recommended to use a `.env` file to manage sensitive information such as passwords and usernames. If you have not already done so, create a `.env` file in your project directory.

3. **Build and Start the Containers**

   Run the following commands in your terminal to build and start the Docker containers:

   ```bash
   docker-compose build
   docker-compose up
   ```

4. **Setup Database**

   Once the containers are running,create the required tables by running the following SQL commands:

   ```sql
   --User table
   CREATE TEBLE user(
        name VARCHAR(255) PRIMARY KEY,
        password VARCHAR(155)
   )
   -- Department table
   CREATE TABLE department (
        id INT PRIMARY KEY,
        name VARCHAR(255)
   );

   -- Employee table
   CREATE TABLE employee (
        emp_id INT PRIMARY KEY,
        emp_name VARCHAR(255),
        salary DECIMAL(10, 2),
        dept_id INT,
        FOREIGN KEY (dept_id) REFERENCES department(id)
        ON DELETE SET NULL ON UPDATE CASCADE
   );
   ```

## Queries
The queries that are used in this project:
