
# Social system example

ระบบโซเชี่ยลมีเดียอย่างง่าย




## Features

- เข้าสู่ระบบ
- สมัครสมาชิก
- เพิ่มเพื่อน ลบเพื่อน
- สร้างโพสต์ แก้ไขโพสต์ ลบโพสต์ ของตัวเอง
- คอมเม้นแสดงความคิดเห็น


## Authors

- [@playerarm123](https://www.github.com/playerarm123)


## Requirements

- [PHP >= 8.1](http://php.net/)
- [Laravel 10](https://github.com/laravel/framework)
## Installation

โคลนโปรเจคจาก git

```bash
  git clone https://github.com/playerarm123/nayoo.git
```
ติดตั้ง vendor ด้วย composer
```bash
  cd nayoo
  composer install
```
คัดลอกไฟล์ .env.example มาไว้ในไฟล์ .env
``` bash
cp .env.example .env
php artisan key:generate
```
ตั้งค่าฐานข้อมูล mysql ที่ต้องการเชื่อมต่อที่ไฟล์ .env
``` bash
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
สร้างตารางฐานข้อมูลใช้คำสั่ง command line ดังต่อไปนี้
``` bash
php artisan migrate
```
สร้างโฟลเดอร์ shortcut สำหรับลิ้งก์รูปภายในโปรเจคโดยใช้คำสั่ง command line ดังต่อไปนี้
``` bash
php artisan storage:link
```
รันโปรแกรมโดยใช้คำสั่งต่อไปนี้
``` bash
php artisan serve
```
เปิดเบราเซอร์แล้วพิมพ์ http://localhost:8000 เพิ่มเปิดหน้าเว็บ
## การใช้งาน

1. การสมัครสมาชิก กรอกข้อมูลให้ครบถ้วนแล้วกดปุ่ม "Register"
![App Screenshot](https://sv1.img.in.th/U3E8wb.jpeg)

2. การสร้างโพสต์ข้อความธรรมดา
![App Screenshot](https://sv1.img.in.th/U3ECbY.jpeg)

3. การสร้างโพสต์พร้อมกับแนบรูปภาพ
![App Screenshot](https://sv1.img.in.th/U3zejk.jpeg)

4. การแก้ไขโพสต์
![App Screenshot](https://sv1.img.in.th/U3zv93.jpeg)

5. การลบโพสต์
![App Screenshot](https://sv1.img.in.th/U3zspp.jpeg)

6. การแสดงความคิดเห็น
![App Screenshot](https://sv1.img.in.th/U3z3hz.jpeg)

7. การเพิ่มเพื่อน
![App Screenshot](https://sv1.img.in.th/U3zqVk.jpeg)
