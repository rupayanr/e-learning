
------------calculate_rank---------
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
                return " ";
            else    
                return " ";
                
            end if;
        else    
            return "They have not enrolled in any course";
        end if;    
    end if;
    
END//

delimiter ;