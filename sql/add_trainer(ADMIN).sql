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