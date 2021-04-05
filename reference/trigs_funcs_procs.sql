-----calculate_rank_funtion--------
drop function if exists calculate_rank;

delimiter //
create function calculate_rank(s_email varchar(50),c_name varchar(50)) RETURNS varchar(1000)
BEGIN
    declare score int(10);
    declare s_rank int(2);
    declare c_id int(10);
    declare email_exists BOOL;
    declare c_exists BOOL;
   
    set email_exists = EXISTS(select student_email from student_details where student_email=s_email);
    set c_exists = EXISTS(select course_name from course_details where course_name=c_name);
   
    if (!email_exists) then 
        return "Invalid Email";
    else  
        set email_exists=EXISTS(select student_email from enrolled_courses where student_email=s_email);
        if(email_exists) then 
            if(c_exists) then
                return "Hold on I am still coding this";
            else    
                return "I am coding this too";
                
            end if;
        else    
            return "They have not enrolled in any course";
        end if;    
    end if;
    
END//

delimiter ;


----rank_function-----
SELECT
    val,
    RANK() OVER (
        ORDER BY val
    ) my_rank
FROM
    t;
-------
select distinct rank() over(order by sum(marks_secured) desc) "Rank" ,student_email, sum(marks_secured) "Marks" 
from enrolled_courses 
group by student_email 
order by sum(marks_secured) desc;

i_amHacker@gmail.com

select rank,student_email,marks_secured 
from enrolled_courses where rank in
(select dense_rank() over (order by sum(marks_secured) desc) as "rank" 
from enrolled_courses 
group by student_email 
order by sum(marks_secured) desc);


------add_trainer-------
drop function if exists add_trainer;

delimiter //
create function add_trainer(t_email varchar(50),t_p_num bigint(10),t_exp float,t_skill varchar(50)) RETURNS int
BEGIN
    declare j_lvl int(2);
    declare sal float;
    declare t_exists BOOL;
    
    set t_exists = EXISTS(select trainer_email from trainer_details where trainer_email = t_email);
    if (!t_exists) then 
        if (t_exp <= 2) then
            set j_lvl = 1;
            set sal = 15000;
        elseif(t_exp > 2 and t_exp <= 3.5) then 
            set j_lvl = 2;
            set sal = 20000;
        elseif(t_exp > 3.5 and t_exp <= 5) then 
            set j_lvl = 3;
            set sal = 25000;
        elseif(t_exp > 5 and t_exp <= 8) then 
            set j_lvl = 4;
            set sal = 30000;
        elseif(t_exp > 8 and t_exp <= 15) then 
            set j_lvl = 5;
            set sal = 35000;
        else 
            set j_lvl = 6;
            set sal = 40000;    
        end if;
        insert into trainer_details values (t_email,t_p_num,t_exp,t_skill,j_lvl,sal,'Elearn@123');
        return 1;

    else    
        return 0;
    end if;
END//      

delimiter ;

-----------------update_trainer_details--------
drop trigger if exists update_trainer_details;

delimiter //

create trigger update_trainer_details after insert on scheduled_courses for each row 
BEGIN 
    declare c_num int(5);
    declare j_lvl int(2);
    
    select count(course_id) into c_num from scheduled_courses where trainer_email = new.trainer_email and end_date<curdate() group by trainer_email;
    select job_level into j_lvl from trainer_details where trainer_email = new.trainer_email;  

    if (c_num <=1 and j_lvl < 1) then
        update trainer_details set job_level=1, salary = 15000 where trainer_email=new.trainer_email;
    
    elseif (c_num > 1 and c_num <= 3 and j_lvl < 2) then
        update trainer_details set job_level=2, salary = 20000 where trainer_email=new.trainer_email;
    
    elseif (c_num > 3 and c_num <= 5 and j_lvl < 3) then 
        update trainer_details set job_level=3, salary = 25000 where trainer_email=new.trainer_email;
    
    elseif (c_num > 5 and c_num <= 7 and j_lvl < 4) then 
        update trainer_details set job_level=4, salary = 30000 where trainer_email=new.trainer_email;            

    elseif (c_num > 7 and c_num <=10 and j_lvl < 5) then 
        update trainer_details set job_level=5, salary = 35000 where trainer_email=new.trainer_email;

    elseif (c_num > 10 and c_num <=15 and j_lvl < 6) then 
        update trainer_details set job_level=6, salary = 40000 where trainer_email=new.trainer_email;

    end if;    
END//




