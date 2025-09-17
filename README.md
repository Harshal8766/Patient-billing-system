# 🏥 Patient Billing System

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-green.svg)](https://www.mysql.com/)

A **robust, secure, and user-friendly** system built with **PHP & MySQL** to streamline hospital **patient management, billing, and invoicing**.  
Designed for healthcare providers who want efficiency and simplicity in one place.

---

## ✨ Key Features

- 👨‍⚕️ **Patient Management** – Add, view, and update patient records  
- 💳 **Billing & Invoicing** – Create, manage, and print patient bills  
- 🔑 **User Authentication** – Secure login/logout and session management  
- 📊 **Dashboard Overview** – Quick insights into patients, bills, and feedback  
- 📝 **Feedback System** – Collect and manage patient feedback  
- ⚡ **Modular Codebase** – Easy to maintain and extend  

---

## 🛠️ Tech Stack

| Layer       | Technology             |
|-------------|------------------------|
| Backend     | PHP 7.4+               |
| Database    | MySQL / MariaDB        |
| Web Server  | Apache / Nginx         |
| Frontend    | HTML5, CSS3, JavaScript|

---

## 📋 Requirements

Before installation, make sure you have:

- PHP 7.4+ with extensions: `mysqli`, `pdo_mysql`  
- MySQL or MariaDB  
- Apache or Nginx web server  
- Git (optional, for cloning repo)  

---

## ⚙️ Installation

1️⃣ **Clone Repository**
```bash
git clone https://github.com/your-username/patient-billing-system.git
cd patient-billing-system

2️⃣ Setup Database

CREATE DATABASE patient_billing;

mysql -u your_username -p patient_billing < db_Setup.sql

3️⃣ Configure Application

cp config.example.php config.php

Edit config.php:

define('DB_HOST', 'localhost');
define('DB_NAME', 'patient_billing');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

4️⃣ Set Permissions

chmod 644 *.php
chmod 755 .

5️⃣ Run Application
Place project inside your web server root (/var/www/html/)
Then visit in browser:

http://localhost/patient-billing-system/


---

🗂️ Project Structure

patient-billing-system/
├── db_Setup.sql          # Database schema
├── config.example.php    # Sample config file
├── index.php             # Login page
├── dashboard.php         # Dashboard overview
├── view_patients.php     # Patient management
├── create_bill.php       # Bill creation
├── billing.php           # Billing overview
├── print_invoice.php     # Invoice printing
├── feedback.php          # Feedback system
├── logout.php            # Logout script
├── .gitignore            # Git ignore rules
└── README.md             # Documentation


---

🔐 Security Notes

❌ Never commit config.php with real credentials

🔒 Always use HTTPS in production

🛡️ Validate & sanitize all inputs

⬆️ Keep PHP & dependencies updated



---

🛠️ Troubleshooting

Issue	Solution

Database connection error	Check DB credentials in config.php
Permission denied	Verify file/folder permissions
Blank pages	Enable PHP error reporting for debugging
Session issues	Ensure PHP session directory is writable



---

🤝 Contributing

Contributions are welcome 🎉

1. Fork the repo


2. Create a feature branch:

git checkout -b feature/your-feature


3. Commit changes:

git commit -m "Add new feature"


4. Push branch:

git push origin feature/your-feature


5. Open a Pull Request




---

📬 Contact

👤 Harshal Bhangare
📧 Email: harshalbhangare88@gmail.com
💻 GitHub: Harshal8766


---

⭐ If you found this project useful, don’t forget to star the repo! ⭐

---
