How to get this thing working:
------------------------------

1. Install the relevant packages on your server.

	For debian:
	$ apt-get install ruby
	$ apt-get install mod_ruby
	$ apt-get install eruby
	$ apt-get install libmysql-ruby


2. Add the relevant lines to your apache config

	LoadModule ruby_module /modules/mod_ruby.so

	<IfModule mod_ruby.c>
		RubyRequire apache/ruby-run
		RubyRequire apache/eruby-run

		<Files *.ruby>
			SetHandler ruby-object
			RubyHandler Apache::RubyRun.instance
		</Files>

		<Files *.eruby>
			SetHandler ruby-object
			RubyHandler Apache::ERubyRun.instance
		</Files>
	</IfModule>


3. Use this SQL to create the database:

--------------------------------------------------------------

CREATE TABLE forum_forums (  id int(11) NOT NULL auto_increment,  name varchar(255) NOT NULL default '',
  description text NOT NULL,  in_order int(11) NOT NULL default '0',  PRIMARY KEY  (id)) TYPE=MyISAM;

CREATE TABLE forum_posts (  id int(11) NOT NULL auto_increment,  forum_id int(11) NOT NULL default '0',
  topic_id int(11) NOT NULL default '0',  date_create int(11) NOT NULL default '0',  message text NOT NULL,
  PRIMARY KEY  (id)) TYPE=MyISAM;

CREATE TABLE forum_topics (  id int(11) NOT NULL auto_increment,  forum_id int(11) NOT NULL default '0',
  title varchar(255) NOT NULL default '',  date_create int(11) NOT NULL default '0',
  date_modified int(11) NOT NULL default '0',  PRIMARY KEY  (id)) TYPE=MyISAM;

CREATE TABLE forum_users (  id int(11) NOT NULL auto_increment,  username varchar(255) NOT NULL default '',
  password varchar(255) NOT NULL default '',  email varchar(255) NOT NULL default '',
  PRIMARY KEY  (id)) TYPE=MyISAM;

--------------------------------------------------------------


4. Define some forums and users in the db


5. Edit line 8 of init.txt to include your MySQL login details


6. Rock!
