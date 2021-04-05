
create database e_learning;
use e_learning;

----------------student_details--------
create table student_details(
student_email varchar(50) primary key,
phone_number bigint(10) not null,
gender enum('Male','Female') not null,
date_of_birth date not null,
password varchar(50) not null);

------trainer_details---------
create table trainer_details(
trainer_email varchar(50) primary key,
phone_number bigint(10) not null,
experience float not null,
skill_set varchar(50) not null,
job_level int(2) default 1 not null,
salary float not null,
password varchar(50) default 'Elearn@123' not null);


-----course_details-----
create table course_details(
course_id int(4) primary key auto_increment,
course_name varchar(50) not null,
duration int(5) not null default 1)auto_increment=1001; 

----------------Scheduled_Courses_Table------------
create table scheduled_courses (
course_id int(4) not null,
start_date date not null,
end_date date not null,
trainer_email varchar(50) not null,
assessment_status enum('Yes','No') not null default 'No',
participant_limit int(5) not null default 10,
no_of_questions int(5) default 0,
constraint scheduled_courses_pk primary key(course_id,start_date),
constraint course_id_fk foreign key(course_id) references course_details(course_id),
constraint trainer_email_fk foreign key(trainer_email) references trainer_details(trainer_email));

-----------------enrolled_courses-------------------
create table enrolled_courses (
enrollment_id int not null primary key auto_increment,
student_email varchar(50) not null ,
course_id int(4) not null ,
start_date date not null ,
marks_secured int(5),
assessment_date date,
--add constraint for this later 
--constraint fk_cid_startdate foreign key(course_id,start_date) references scheduled_courses(course_id,start_date),
constraint fk_studmail foreign key(student_email) references student_details(student_email)) auto_increment=1; 



-----------------question_generation_details--------------

create table question_generation_details(
question_id varchar(5) primary key,
course_id int(4) not null,
author_email varchar(50) not null,
reviewer_email varchar(50) not null,
status enum('initiated','saved','rejected','submitted','accepted','deleted') not null,
reviewer_comments text,
author_comments text,
constraint fk_cid_1 foreign key(course_id) references course_details(course_id));

alter table question_generation_details add constraint fk_authormail foreign key(author_email) references trainer_details(trainer_email);
alter table question_generation_details add constraint fk_reviewermail foreign key(reviewer_email) references trainer_details(trainer_email); 

--------------------------question_bank-----------------

create table question_bank(
question_id varchar(5) primary key,
question_description text not null,
code text,
category enum('Single','Multiple') default 'Single',
options text not null,
answer varchar(50) not null);

alter table question_bank add constraint fk_qid foreign key(question_id) references question_generation_details(question_id);


----------------------------------------------
