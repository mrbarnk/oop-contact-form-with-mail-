create table messages (
	id int (10) not null PRIMARY key AUTO_INCREMENT,
    name varchar(190) not null,
    email varchar(190) not null,
    phone varchar(190) not null,
    message text not null
);