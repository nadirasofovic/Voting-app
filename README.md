# Voting System

## Overview

This project is a **web-based voting system** developed for the **University of SSST**, allowing students to vote for the **best student and best professor** in each department. The system provides a **user-friendly interface** and ensures **secure and efficient** vote management.

## Features

- **User Registration & Login**: Students can sign up and log in using their **email and student ID**.
- **Voting System**: Students can vote for candidates in their department and academic year.
- **Live Election Results**: The system updates and displays voting results in **real-time**.
- **Admin Panel**: Admins can manage elections, candidates, and review voting data.
- **Secure Data Management**: User authentication and database integrity ensured via **PHP and MySQL**.

## Technologies Used

- **Front-End**: HTML, CSS
- **Back-End**: PHP
- **Database**: MySQL

## Database Schema

The database consists of the following tables:

- `Election` - Stores election details (start and end date, result date).
- `Candidate` - Stores candidate information.
- `Position` - Defines the available positions for voting.
- `Voter` - Manages registered student voters.
- `Right_to_Vote` - Tracks voter eligibility.
- `Votes` - Records votes cast by students.
