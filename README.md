# HealHub – Hospital Management System 🏥

A web-based **Hospital Management System** built with **PHP** and **SQL** that streamlines doctor appointments, and patient monitoring. HealHub provides an efficient platform for patients, doctors, and administrators to manage hospital operations effectively.  

---

## 🚀 Features

- **User Management** – Secure login and role-based access for Admins, Doctors, and Patients  
- **Doctor Management** – Add, edit, and manage doctor information and schedules  
- **Patient Management** – Maintain patient records and medical history  
- **Appointment Booking** – Patients can book and manage doctor appointments online  

---
## Entity Relationship Diagram
<img width="856" height="514" alt="Screen Shot 2025-09-30 at 12 31 47 AM" src="https://github.com/user-attachments/assets/75d4fc46-6ec2-4958-b604-0f14e296f8f2" />

---
## Database Relations
<img width="884" height="438" alt="Screen Shot 2025-09-30 at 12 32 31 AM" src="https://github.com/user-attachments/assets/c7600919-8e5b-43db-a16e-e095b95ea0a0" />

---
## Metadata

# User 

| SeqNo | Field Name     | Type       | Length | Domain                |
|-------|----------------|------------|--------|-----------------------|
| 1     | UserID         | AutoNumber | 7      | 0000001 – 9999999     |
| 2     | First Name     | VarChar    | 100    | A – Z                 |
| 3     | Last Name      | VarChar    | 100    | A – Z                 |
| 4     | Birthdate      | Date       | 8      | MM/DD/YYYY            |
| 5     | Gender         | VarChar    | 100    | Male / Female         |
| 6     | Age            | Integer    | 3      | 001 – 999             |
| 7     | Contact Number | VarChar    | 11     | 0 – 9                 |
| 8     | UserType       | Integer    | 1      | 0 – 2                 |

# Account 

| SeqNo | Field Name     | Type       | Length | Domain                            |
|-------|----------------|------------|--------|-----------------------------------|
| 1     | AccountID      | AutoNumber | 7      | 0000001 – 9999999                 |
| 2     | UserID         | Integer    | 100    | 0000001 – 9999999                 |
| 3     | Email          | VarChar    | 100    | A - Z, 0 - 9, @_.                 |
| 4     | Password       | Varchar    | 100    | A - Z, 0 - 9, !#$%&'*+-/=?^_`{|}~ |
| 5     | Username       | VarChar    | 100    | A - Z, 0 - 9                      |

# Patient 

| SeqNo | Field Name       | Type       | Length | Domain                  |
|-------|------------------|------------|--------|-------------------------|
| 1     | PatientID        | AutoNumber | 7      | 0000001 – 9999999       |
| 2     | AccountID        | Integer    | 7      | 0000001 – 9999999       |
| 3     | MedicalRecordID  | Integer    | 7      | 0000001 – 9999999       |
| 4     | AppointmentID    | Integer    | 7      | 0000001 – 9999999       |
| 5     | Bill             | Double     | 12     | 0.01 – 999999999.99     |




