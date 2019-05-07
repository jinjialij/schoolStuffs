create database chat;
use chat;

create Table User
(
	UserID int(11) auto_increment not null,
    Name varchar(100) not null,
    Profile text not null,
    Primary key (UserID)
);
CREATE TABLE login (
  `loginID` int(4) NOT NULL AUTO_INCREMENT,
  `UserID` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
   primary key (loginID),
   foreign key (UserID) references User(UserID)
) 

create Table Posts
(
	PostID int(11) auto_increment not null,
    UserID int(11) not null,
    Date timestamp not null default current_timestamp on update current_timestamp,
    Post text not null,
    Primary key (PostID),
    foreign key (UserID) references User(UserID)
);

create Table Following
(
	FollowingID int(11) auto_increment not null,
    User int(11) not null,
    FollowingUser int(11) not null,
    primary key (FollowingID),
    foreign key (User) references User(UserID),
    foreign key (FollowingUser) references User(UserID)
);



insert into User values(null,'Jiali Jin','A short description of Jiali Jin  Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.');
insert into User values(null,'Iris Morris','A short description of Iris Morris  Mauris vitae convallis nulla. Aliquam id lorem ipsum. Phasellus ornare, leo sed tincidunt vulputate, neque sem vehicula enim, at mattis dolor mi eget ligula. ');

insert into User values(null,'Jane Harris','A short description of Jane Harris  Nam vehicula faucibus est sed accumsan. Vestibulum imperdiet arcu ex. Vivamus gravida enim felis, vitae ornare ipsum tempus sed. 
');
insert into User values(null,'Luke Empire','A short description of Luke Empire  Sed non urna id arcu vestibulum luctus.');
insert into User values(null,'Marty Fly','A short description of Marty Fly  Morbi id volutpat est, in ornare justo. Vestibulum sit amet volutpat neque. Donec blandit mi nibh, sed molestie magna pellentesque vitae.');
insert into User values(null,'Steve Law','A short description of Steve Law  Integer rhoncus purus ut ornare venenatis. Nullam ullamcorper interdum mi condimentum consequat. Mauris dapibus sed ex vitae rhoncus. ');
insert into User values(null,'Ty Lysa','A short description of Ty Lysa  Cras dapibus blandit nulla ac dignissim. Cras elementum elit non tortor suscipit aliquet.');
INSERT INTO `user` (`UserID`, `Name`, `Profile`) VALUES (null, 'Mary Smith', 'I am Mary. Love chatting!');

insert into following values(null,1,4);
insert into following values(null,1,5);
insert into following values(null,1,7);

insert into following values(null,2,1);
insert into following values(null,3,1);
insert into following values(null,6,1);

insert into posts values(null,1,'2018-08-21 01:08:00','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac metus nec est tempor tempor sit amet non justo. Duis molestie enim id rutrum eleifend.
');
insert into posts values(null,1,'2018-09-30 19:23:00','Sed suscipit lacus a orci vestibulum, id varius neque pellentesque. Proin luctus sodales odio, in commodo velit euismod a. Integer dolor velit, condimentum in ipsum sed, venenatis faucibus ligula. Mauris lobortis iaculis commodo. 
');
insert into posts values(null,1,'2018-10-01 09:52:00','Morbi purus est, bibendum at pulvinar eget, tempus sed tortor. In tincidunt elementum ornare. Donec nulla massa, ultricies vel lorem quis, consectetur interdum felis
');
insert into posts values(null,1,'2018-10-14 06:06:00','Maecenas ullamcorper accumsan pretium. Nulla mollis purus nec venenatis ornare. Nulla est mauris, semper non porttitor a, viverra eu eros.
');

insert into posts values(null,2,'2018-09-27 11:35:00','Nam viverra sollicitudin magna, tincidunt scelerisque erat ultrices et. Nunc faucibus dui et leo tempor, vitae interdum quam hendrerit. Donec in aliquet justo.
');
insert into posts values(null,2,'2018-08-01 06:23:00','Vivamus lorem metus, ullamcorper et vulputate sed, tincidunt posuere dolor. Integer scelerisque vel mi eget convallis. Quisque ultricies leo dignissim, porta eros feugiat, ullamcorper diam.
');
insert into posts values(null,2,'2018-10-14 12:53:00','Praesent id ultrices orci, eu pulvinar lorem. Aenean id erat vel elit commodo dictum. Ut interdum arcu dui, blandit molestie risus luctus ac. Phasellus porttitor accumsan lectus in varius.
');

insert into posts values(null,3,'2018-10-13 13:26:00','Sed sem lorem, aliquam sit amet fringilla sed, venenatis quis nunc. Ut consectetur eget ligula semper pulvinar.
');
insert into posts values(null,3,'2018-10-14 12:51:00','Nunc varius, quam quis lacinia congue, nulla libero tempus quam, sit amet mollis nunc diam ut mauris. Proin faucibus pulvinar sem vitae suscipit.
');
insert into posts values(null,3,'2018-10-14 3:18:00','Nunc faucibus dui et leo tempor, vitae interdum quam hendrerit. Ut tellus felis, porta eget laoreet pellentesque, aliquet vel nulla.
');

insert into posts values(null,4,'2018-08-19 16:23:00','Proin tempor quam nec diam rutrum congue.');
insert into posts values(null,4,'2018-10-13 09:52:00','Sed lacinia tortor a metus pharetra pharetra. Morbi varius facilisis tellus sit amet congue. Nam bibendum est elementum augue maximus, non ultrices nisl finibus.
');
insert into posts values(null,4,'2018-10-14 13:32:00','Nullam tincidunt, tortor ut aliquam laoreet, lectus lorem semper turpis, ac euismod nunc enim ut sapien.
');
insert into posts values(null,4,'2018-10-15 16:45:00','Nulla vel dapibus justo, a dignissim purus. Sed vehicula consectetur tellus vitae facilisis. Sed vulputate convallis.
');

insert into posts values(null,5,'2018-09-01 22:35:00','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi purus est, bibendum at pulvinar eget, tempus sed tortor. In tincidunt elementum ornare. Donec nulla massa, ultricies vel lorem quis, consectetur interdum felis.
');
insert into posts values(null,5,'2018-10-13 09:49:00','Aenean in enim vel enim cursus facilisis. Proin ac mollis quam. Etiam pretium, sapien sed consequat pharetra, sapien lacus volutpat lacus, lobortis lacinia sem erat quis neque.
');
insert into posts values(null,5,'2018-10-14 12:31:00','Ut eu odio fermentum, ullamcorper velit in, faucibus enim. Sed mattis tincidunt laoreet. Nunc blandit ultrices orci vel ullamcorper. Nunc sodales erat at mauris rutrum hendrerit.
');

insert into posts values(null,6,'2018-09-01 23:35:00','Maecenas ullamcorper accumsan pretium. Nulla mollis purus nec venenatis ornare. Nulla est mauris, semper non porttitor a, viverra eu eros.
');
insert into posts values(null,6,'2018-10-14 12:53:00','Cras vel justo massa. Maecenas hendrerit elementum elit non volutpat. Ut venenatis neque ac justo ornare accumsan. Nunc mollis, ligula ut molestie efficitur, risus ipsum fringilla dui, sed sodales elit nibh ac dolor.
');
insert into posts values(null,6,'2018-10-14 03:19:00','Maecenas auctor gravida erat, eget interdum ante porttitor quis. Mauris lacus justo, rhoncus in arcu sed, dignissim rhoncus elit. 
');

insert into posts values(null,7,'2018-08-21 01:08:00','Morbi id volutpat est, in ornare justo. Vestibulum sit amet volutpat neque. Donec blandit mi nibh, sed molestie magna pellentesque vitae. Phasellus imperdiet lacinia tincidunt. Aliquam erat volutpat.
');
insert into posts values(null,7,'2018-10-13 09:56:00','Donec enim velit, rutrum nec tellus sed, fermentum consectetur diam. Donec magna sapien, tempor vitae laoreet id, scelerisque sit amet nibh. 
');
insert into posts values(null,7,'2018-10-13 09:57:00','Fusce hendrerit ultricies purus, quis cursus ex hendrerit in. In mi nisl, fringilla ut orci vitae, luctus tristique felis. Cras finibus lobortis est, eget ullamcorper felis fringilla nec.
');

insert into login values(null,1,"jiali","123456");
insert into login values(null,2,"iris","ab3456");
insert into login values(null,3,"jane","kb3456");
insert into login values(null,4,"luke","em3456");
insert into login values(null,5,"steve","s23456");
insert into login values(null,6,"ty","t23456");

