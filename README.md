# ET4132 Project - Fantasy Dice Company

## Project Description
Web application for fantasy-themed dice manufacturing company with MySQL database backend.

## Team Members
- [X]: Products pages
- [Y]: Customers pages
- [Z]: Orders pages

## Setup Instructions

### Prerequisites
- XAMPP installed (Apache + MySQL)
- Git installed

### Initial Setup

1. **Clone the repository**
```bash
   cd C:\xampp\htdocs
   git clone https://github.com/YOUR_USERNAME/ET4132_Project.git
```

2. **Start XAMPP**
   - Start Apache
   - Start MySQL

3. **Import the database**
   - Open phpMyAdmin: http://localhost/phpmyadmin
   - Click "Import"
   - Select `db_ET4132_GroupX.sql`
   - Click "Go"

4. **Test it works**
   - Open: http://localhost/ET4132_Project/index.html
   - Should load without errors

## Project Structure
```
ET4132_Project/
├── index.html              - Homepage
├── styles.css              - Shared stylesheet
├── db_connect.php          - Database connection
├── db_ET4132_GroupX.sql    - Database dump
├── images/                 - Image assets
├── view_*.php              - Display pages
└── add_*.php               - Data entry pages
```

## Daily Workflow

### Before you start working:
```bash
cd C:\xampp\htdocs\ET4132_Project
git pull origin main
```

### After you finish working:
```bash
git add .
git commit -m "Descriptive message about what you did"
git push origin main
```

### If you update the database structure:
1. Export from phpMyAdmin
2. Replace `db_ET4132_GroupX.sql`
3. Commit with message: "Database updated - team please re-import!"
4. Notify team in group chat

## Critical Rules

1. **Always `git pull` before starting work**
2. **Only edit YOUR assigned files**
3. **Don't modify shared files (styles.css, db_connect.php) without coordinating**
4. **Use clear commit messages**
5. **If you change database structure, tell everyone immediately**
