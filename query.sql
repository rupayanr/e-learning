select course_name, start_date , end_date, assessment_status, trainer_email, participant_limit
from scheduled_courses sc 
join course_details c  on sc.course_id=c.course_id where start_date >= curdate()
order by start_date asc;

end_date < curdate() - Completed 

start_date < curdate() and end_date > curdate() - In Progress

start_date >= curdate() -  Can be selected by admin 