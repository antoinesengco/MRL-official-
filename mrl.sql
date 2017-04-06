set echo on
connect system/amakal

drop user techvoc cascade;
create user techvoc  identified by mrl;
alter user techvoc  default tablespace system temporary tablespace temp account unlock;
grant connect, resource to techvoc; 

connect techvoc/mrl;

create table emp_tab
  (id number(38,0) primary key not null,
    emp_id varchar2(12) not null,
    fname varchar2(25),
    min varchar2(4),
    lname varchar2(25),
    email varchar2(35),
    position varchar2(4000),
    bdate varchar2(4000),
    pass varchar2(35));

create sequence emp_users_sequence start with 1
    increment by 1
    minvalue 1; 

connect techvoc/mrl;

create table stu
  (id number(20,0) primary key not null,
    usn varchar2(11),
    fname varchar2(35),
    min varchar2(4),
    lname varchar2(35),
    email varchar2(35),
    bdate varchar2(20),
    course varchar2(50),
    sec varchar2(4),
    edate varchar2(20),
    pass varchar2(35),
    gender varchar2(10),
    sub_code varchar2(25),
    sub_name varchar2(50),
    grade number);
    
create sequence stu_users_sequence start with 1
    increment by 1
    minvalue 1;

connect techvoc/mrl;

create table grades
  (id number(11,0) primary key not null,
    usn varchar2(20),
    sub_code varchar2(20),
    grades varchar2(20));

  create sequence grades_sequence start with 1
    increment by 1
    minvalue 1;

    connect techvoc/mrl;

create table sem1
  (id number(38,0) primary key not null,
    s1_name varchar2(40),
    s1_code number(11),
    s1_desc varchar2(4),
    s1_units number(4));

    create sequence sem1_sequence start with 1
    increment by 1
    minvalue 1;


connect techvoc/mrl;

create table sem2
  (id number(38,0) primary key not null,
    s2_name varchar2(40),
    s2_code number(11),
    s2_desc varchar2(4),
    s2_units number(4));

    create sequence sem2_sequence start with 1
    increment by 1
    minvalue 1;

    

connect techvoc/mrl;
  
create table sem3
  (id number(38,0) primary key not null,
    s3_name varchar2(40),
    s3_code number(11),
    s3_desc varchar2(4),
    s3_units number(4));

    create sequence sem3_sequence start with 1
    increment by 1
    minvalue 1;