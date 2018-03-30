

create table users (
	user_id		int			 not null	auto_increment,
	name		varchar(255) not null,
	password	varchar(255) not null,
	user_level	int,
	user_email	varchar(255) not null,
	email_verified	bit		not null
	PRIMARY KEY(user_id)
);

create table messages (
	sender_id	int			not null,
	receiver_id	int			not null,
	messages	varchar(255),
	datetime	timestamp,
	FOREIGN KEY(sender_id) REFERENCES users(user_id),
	FOREIGN KEY(receiver_id) REFERENCES users(user_id)
);

create table banned_phrases(
	phrase_id	int			not null	auto_increment,
	message 	varchar(255),
	PRIMARY KEY(phrase_id)
);

create table rooms (
	room_id		int				not null	auto_increment,
	room_name	varchar(255)	not null,
	private		bit				not null,
	root_name	varchar(255),
	PRIMARY KEY(room_id)
);

create table blocked_url (
	url 		text,
	reason 		text
);

create table cc (
	ccid 		int			not null	auto_increment,
	cc_user_id	int			not null,
	full_name	text,
	ccn			int,
	address1	text,
	address2	text,
	city		text,
	zip			int(64),
	state		text,
	country		text,
	PRIMARY KEY(ccid),
	FOREIGN KEY(cc_user_id) REFERENCES users(user_id)
);

create table payments (
	paym_user_id	int			not null,
	paym_ccid		int			not null,
	date 			timestamp,
	amount			int,
	FOREIGN KEY(paym_user_id) REFERENCES users(user_id),
	FOREIGN KEY(paym_ccid) REFERENCES cc(ccid)
);

create table user_preferences(
	pref_user_id	int			not null,
	color			int,
	outline_color	int,
	border_color	int,
	FOREIGN KEY(pref_user_id) REFERENCES users(user_id)
);

create table user_reports (
	report_id		int			not null	auto_increment,
	reason_type		text 		not null,
	message 		varchar(255),
	reporter_id 	int 		not null,
	reportee_id 	int 		not null,
	datetime 		timestamp,
	report_room_id 		int 		not null,
	PRIMARY KEY(report_id),
	FOREIGN KEY(reporter_id) REFERENCES users(user_id),
	FOREIGN KEY(reportee_id) REFERENCES users(user_id),
	FOREIGN KEY(report_room_id) REFERENCES rooms(room_id)
);

create table banned_users(
	blocked_id		int			not null,
	freedom_date	date 		not null,
	penal_level 	int 		not null,
	FOREIGN KEY(blocked_id) REFERENCES users(user_id)
);

create table ban_levels(
	ban_level 		int			not null,
	meaning 		varchar(255),
	PRIMARY KEY(ban_level)
);

create table user_relationships(
	friend_id 		int 		not null	auto_increment,
	rel_user_id 	int			not null,
	relationship_level	int,
	PRIMARY KEY(friend_id),
	FOREIGN KEY(rel_user_id) REFERENCES users(user_id)
);

create table relationships(
	rel_level 		int,
	meaning			varchar(255),
	PRIMARY KEY(rel_level)
);


