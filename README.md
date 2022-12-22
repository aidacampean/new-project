
## Instructions

1. Clone repo

2. Set up .env file with your preferred ports etc. Set the DB_HOST to db though as configured in the docker-compose file. 

3. Run "docker build . " to build the docker image

4. Run "docker-compose up -d" to build the containers.

5. Execute this command "docker exec -it rad_app composer install" to install the dependencies needed within the docker container.

6. Still inside the container we execute "docker exec -it rad_app php artisan key:generate" to generate the application encryption key.

7. Run the migrations inside the container "docker exec -it rad_app php artisan migrate".

8. Create fake user data with "docker exec -it rad_app php artisan db:seed".

9. Test the endpoints through Postman. 

 - To retrieve the user details endpoint: GET:localhost:portnumber/api/users
 
 - To retrieve all the radio stations endpoint: GET:localhost:portnumber/api/stations
 
 - To retrieve a radio station by id endpoint: GET:localhost:portnumber/api/station/id
 
 
