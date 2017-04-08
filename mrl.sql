set echo on
connect system/amakal

drop user techvoc cascade;
create user techvoc  identified by mrl;
alter user techvoc  default tablespace system temporary tablespace temp account unlock;
grant connect, resource to techvoc; 

connect techvoc/mrl;

create table emp_tab
  (id number(38,0) primary key not null,
    emp_id varchar2(12) not null unique,
    fname varchar2(45),
    min varchar2(4),
    lname varchar2(25),
    email varchar2(35),
    position varchar2(4000),
    bdate varchar2(4000),
    gender varchar2(25),
    pass varchar2(35));

create sequence emp_users_sequence start with 1
    increment by 1
    minvalue 1; 

connect techvoc/mrl;

create table stu
  (id number(20,0) primary key not null,
    usn varchar2(11) not null unique,
    fname varchar2(45),
    min varchar2(4),
    lname varchar2(35),
    email varchar2(35),
    bdate varchar2(20),
    course varchar2(50),
    sec varchar2(4),
    edate varchar2(20),
    gender varchar2(10),
    pass varchar2(35),
    sub_code varchar2(25),
    sub_name varchar2(50),
    grades varchar2(20));
    
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
    sub_name varchar2(40),
    sub_code number(11) not null unique,
    sub_desc varchar2(30),
    sub_units number(4),
    grades varchar2(15));

    create sequence sem1_sequence start with 1
    increment by 1
    minvalue 1;


connect techvoc/mrl;

create table sem2
  (id number(38,0) primary key not null,
    sub_name varchar2(40),
    sub_code number(11) not null unique,
    sub_desc varchar2(30),
    sub_units number(4),
    grades varchar2(15));

    create sequence sem2_sequence start with 1
    increment by 1
    minvalue 1;

connect techvoc/mrl;
  
create table sem3
  (id number(38,0) primary key not null,
    sub_name varchar2(40),
    sub_code number(11) not null unique,
    sub_desc varchar2(30),
    sub_units number(4),
    grades varchar2(15));

    create sequence sem3_sequence start with 1
    increment by 1
    minvalue 1;

connect techvoc/mrl;

create table con_code
  (id number(38,0) primary key not null,
    code varchar2(20));

    create sequence con_code_sequence start with 1
    increment by 1
    minvalue 1;


    #inserting

    insert into con_code values (1,'mrl413');
    insert into emp_tab values (1,'15EAD600','Edison','A','Delos Reyes','edison@gmail.com','IT Professor','01-01-1980','Male','edison');
    insert into stu values  (1,'15000125200','Lou Antoine','S','Sengco','antoine.sengco24@gmail.com','03-24-1999','Information Technology','IA','05-18-2015','Male','lou','','','');
    insert into stu values  (1,'16000125200','Apple','I','Lising','janelisingintal@yahoo.com','01-21-1999','Accounting','IA','06-01-2015','Female','apple','','','');
    commit;