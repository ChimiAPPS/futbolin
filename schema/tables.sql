use montregr_futbolin;

create table team(  id int not null auto_increment,
                    name varchar(30) not null,
                    reputation int not null default 0,
                    primary key (id));

create table user(  id int not null auto_increment,
                    alias varchar(10) not null,
                    firstname varchar(15) not null,
                    lastname varchar(15) not null,
                    email varchar(50),
					password varchar(255) not null,
                    team_id int,
                    primary key (id),
                    CONSTRAINT fk_team foreign key (team_id) references team(id),
                    unique key email_unique (email));
                    
                    
                    