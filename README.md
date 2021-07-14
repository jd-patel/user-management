# Laravel User Management System with Social Login and Admin Panel

## Description

This application is a PHP Laravel based “User Management” web application for frontend and admin panel.

It is secured and fully responsive. It allows frontend users to register and log-in using email addresses or social media providers such as (Facebook, Google, Twitter, Linkedin, Github). Users can also reset his/her password.

On the Admin side, It has an interactive admin Dashboard with all data visualization charts.
Admin can manage user's account and also can active/inactive user account.
Admin can also create another admin. It has functionalities to manage Email settings, Social media provider settings and General settings. Easy to install.

## How to install?
Step 1: Simpely download the repository or clone the repository to your local machine.

Step 2: Create Database and import [Database](https://github.com/jd-patel/user-management/blob/master/user-management.sql).

Step 3: Change Database credentials in ".env" file

Step 4: Run in browser

## Main Features:
- Built with Laravel 8 and Bootstrap 4
- Secure user registration and login
- Interactive admin Dashboard
- Fully secured with server-side validation
- Used Laravel built-in CSRF token system
- Easy to install and customizable

## Frontend:
- Registration using the email address or social media
- Login using email or password with remember me or login with social media
- Reset password
- Redirect non-login user to login page

## Admin Panel:
- Major data visualization on admin dashboard
- Manage frontend users
- Activate/Inactive user accounts
- View user’s extra information such as Browser, Browser version, Platform (OS),     IP Address, Last login date and time and Last login type (Website, Facebook, etc.)
- Manage admin users (CRUD)
- Manage social authentication (Facebook, Google, Twitter, Linkedin, Github)
- Enable/disable social authentication for each provider
- Manage social authentication display order
- Manage email settings
- Manage Site name from admin panel
- Responsive admin panel

## PHP Version Required:
- PHP >= 7.3

## Create your Client ID & Client Secret for Social Accounts, Please refer to [Laravel Social Login](https://github.com/jd-patel/laravel-social-login)

Happy Coding!!!