
delimiter //
drop procedure if exists schedule_course;
create procedure schedule_course(IN course_name1 varchar(30), IN start_date1 date, IN trainer_email1 varchar(30), IN assessment_status1 enum('Yes','No'), IN participation_limit int, IN no_of_questions1 int, IN action varchar(20), OUT status varchar(100))
begin
	declare cour_id int;
	declare e_date date;
	declare check_avail int;
	declare durat int;
	declare no_of_accep_quest int;
	declare check1 int default 0;
	
	select course_id, duration into cour_id,durat from course_details where course_name=course_name1;
	select date_add(start_date1, INTERVAL durat DAY) into e_date;
	
	select group_concat(1) into check1 from scheduled_courses where start_date1<>start_date and trainer_email=trainer_email1 and ((start_date1 between start_date and end_date) or (e_date between start_date and end_date));
	if (check1 = 1)then
		set status="The trainer chosen is not available";
		if (action = 'schedule') then
			select group_concat(1) into check1 from scheduled_courses where course_id=cour_id and start_date=start_date1;
			if (check1 = 1) then
				set status="Course is already scheduled for the same dates!";
			end if;
		end if;
	else
		if (assessment_status1='Yes') then
			 select count(*) into no_of_accep_quest from question_generation_details where status='accepted' group by course_id having course_id=cour_id;
			if !(no_of_accep_quest) then
				set status="You cannot schedule assessment for this course";
			elseif (no_of_accep_quest < no_of_questions1) then
				set status="You do not have enough questions to schedule assessment for this course";
			else
				if (action = 'schedule') then
					select group_concat(1) into check1 from scheduled_courses where course_id=cour_id and start_date=start_date1;
					if (check1 = 1) then
						set status="Course is already scheduled for the same dates!";
					else
						INSERT INTO `scheduled_courses` (`course_id`, `start_date`, `end_date`, `trainer_email`, `assessment_status`, `participant_limit`, `no_of_questions`) VALUES (cour_id,start_date1,e_date,trainer_email1,assessment_status1,participation_limit,no_of_questions1);
						set status="Course Scheduled successfully!";
					end if;
				elseif (action = 'update') then
					update scheduled_courses set start_date=start_date1,end_date=e_date,trainer_email=trainer_email1,participant_limit=participation_limit,no_of_questions=no_of_questions1 where course_id=cour_id;
					set status="Schedule updated successfully";
				end if;
			end if;
		else
			if (action = 'schedule') then
				select group_concat(1) into check1 from scheduled_courses where course_id=cour_id and start_date=start_date1;
				if (check1 = 1) then
					set status="Course is already scheduled for the same dates!";
				else
					INSERT INTO `scheduled_courses` (`course_id`, `start_date`, `end_date`, `trainer_email`, `assessment_status`, `participant_limit`, `no_of_questions`) VALUES (cour_id,start_date1,e_date,trainer_email1,assessment_status1,participation_limit,no_of_questions1);
					set status="Course Scheduled successfully!";
				end if;
			elseif (action = 'update') then
				update scheduled_courses set start_date=start_date1,end_date=e_date,trainer_email=trainer_email1,participant_limit=participation_limit,no_of_questions=no_of_questions1 where course_id=cour_id;
				set status="Schedule updated successfully";
			end if;

		end if;
	end if;
	



end; //
delimiter ;


call schedule_course("Java",'2020-04-24','RajKumar@elearn.com','Yes',4,5,'schedule',@check);
