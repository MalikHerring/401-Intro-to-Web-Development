

all: 
	kwrite *.php &

mysql:
	mysql --user="b0c907fbbec6d1" --password="d2566170" heroku_c1e7d16168842d5 --host="us-cdbr-iron-east-05.cleardb.net"

login:
	heroku login 

open:
	heroku open

openFiles:
	kwrite *.php &

push:
	git add .
	git commit -m "This is testing"
	git push heroku master

