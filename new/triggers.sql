//v2.0
Create or Replace TRIGGER insertUser
after UPDATE OF status
ON signup
FOR EACH ROW
when (new.status='granted')
BEGIN
insert into users values (:new.user_id,:new.first_name,:new.last_name,:new.user_pwd,:new.contact_number,:new.user_email,:new.occupation,:new.house_number,:new.road_number,:new.block,:new.city) ;
END ;

//update signup
Create or Replace TRIGGER update_signup
after update of status
ON permission
FOR EACH ROW
BEGIN
update signup
set status = :new.status
where signup.user_id = :new.user_id ; 
END ;

//insert_permission
Create or Replace TRIGGER insert_permission
after insert
ON signup
FOR EACH ROW
BEGIN
insert into permission values (:new.user_id,'pending') ; 
END ;

//repair_log_book trigger ;  //done
Create or Replace TRIGGER insert_log_book
after update
ON repair
FOR EACH ROW
when(new.status='done')
BEGIN
insert into repair_log_book values (:old.train_id,:old.component_id,:old.repaired_date,:old.repair_parts,:old.description) ;
END ;

//insert on insert_user_login //done
Create or Replace TRIGGER insert_user_login
after insert
ON users
FOR EACH ROW
BEGIN
insert into user_login values (:new.user_id,:new.user_pwd) ; 
END ;

//insert into metrocard;
Create or Replace TRIGGER update_metrocard
after update
ON metrocard_user
FOR EACH ROW
BEGIN
update permission
set status = 'granted'
where permission.user_id = :new.user_id ;
END ;



