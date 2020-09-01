# About
NFQ Software Engineering Internship task\
Developed by Vilius Gečas\
Project is developed using PHP
Project page: http://nfqtask5.herokuapp.com

# Page users
- Specialist - doctors
- Customers - patients


# Page manual
User can choose from 4 different functions: 
- See waiting board (only when users registered appointment)
- Register appointment
- Use doctors page (only with doctors credentials) 
- See information about registered appointment

### Register appointment
- User can choose doctor and date with time and must enter information about himself
- If information is correct, user will see his unique ID, number in waiting line, time left until registered date and time
- User can cancel his appointment
- User must remember unique ID

### Information about appointment (Your appointment)
- User must enter his information (personal number and unique ID)
- If information is correct, user can see his unique ID, number in waiting line, time left until registered date and time
- User can cancel his appointment

### Waiting board 
- User must enter his information (personal number and unique ID)
- If information is correct, user can see waiting line for each specialist (started appointments and 5 waiting user IDs)

### Doctors page
- Doctor must enter his credentials (employee ID and password)
- If information is correct, doctor will be redirected to registered patients page (can see only his patients)
- Doctor can start new appointment (only one active at a time)
- Doctor can end appointment
- Doctor can cancel appointment

#### Doctors credentials
Accounts created through a database
- Employee ID: 75368 Password: 123654
- Employee ID: 465789 Password: 7418520

