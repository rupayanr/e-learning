--------------------fn add_trainer------------
delimiter //
drop function if exists add_trainer ;
create function add_trainer(trainer_email1 varchar(50),phone_number int,experience float,skill_set varchar(250))
returns int
begin
declare job_level,salary,c int;
select count(trainer_email) into c from trainer_details where trainer_email=trainer_email1;

if c then
        return 0;
	
else
		if(experience<=2) then
			set job_level=1;
			set salary=15000;
		elseif(experience>2 and experience<=3.5) then
			set job_level=2;
			set salary=20000;
		elseif(experience>3.5 and experience<=5) then
			set job_level=3;
			set salary=25000;
		elseif(experience>5 and experience<=8) then
			set job_level=4;
			set salary=30000;
		elseif(experience>8 and experience<=15) then
			set job_level=5;
			set salary=35000;
		else
			set job_level=6;
			set salary=40000;
		end if;
		insert into trainer_details values(trainer_email1,phone_number,experience,skill_set,job_level,salary,'Elearn@123');
		return 1;
		
end if;
end //
delimiter ;
 select add_trainer('ss@gmail.com',1234567895,3.5,'IT');
 
 
 --------------triggrr-------------
 delimiter //
drop trigger if exists update_trainer_details;
create trigger update_trainer_details after insert on scheduled_courses for each row
begin
declare c int default 0;
declare j int;
select count(trainer_email) into c from scheduled_courses where trainer_email=new.trainer_email and end_date<curdate() group by trainer_email;
select job_level into j from trainer_details where trainer_email=new.trainer_email;
set @a=j;
set @b=c;
if (c<=1 and j<1)then
	update trainer_details set job_level=1, salary=15000 where trainer_email=new.trainer_email;

elseif(c>1 and c<=3 and j<2) then
	update trainer_details set job_level=2,salary=20000 where trainer_email=new.trainer_email;
elseif(c>3 and c<=5 and j<3) then
	update trainer_details set job_level=3 , salary=25000 where trainer_email=new.trainer_email;
elseif(c>5 and c<=7 and j<4)then
	update trainer_details set job_level=4 ,salary=30000 where trainer_email=new.trainer_email;
elseif (c>7 and c<=9 and j<5) then
	update trainer_details set job_level=5 , salary=35000 where trainer_email=new.trainer_email;
else
	update trainer_details set job_level=6 , salary=40000 where trainer_email=new.trainer_email;
end if ;
end //
delimiter ;