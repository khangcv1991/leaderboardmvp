# Leaderboard MVP

The purpose of this excercise is for you to create a pull request containing your proposal to solve the below Leaderboard Scenario as an MVP. The only requirement is that you demonstrate your skills using the technology stack commensurate to the position you applied for at Sisu Wellness. You should also include any assumptions you made and the rationale, as well as any scoping questions you feel would be necessary to properly complete the objective.

Please note: This exercise is not designed for you to lose sleep or your weekend

GLHF!

## Key Criteria

1. Does it work?
2. How easy is it for another developer to continue where you left off?
3. Is the implementation, data model and code organisation of a standard that matches the level of the position you are applying for

## Scenario
The overwhelming majority of Sports, Games and gamified concepts have leaderboards. ACME Startup sees an opportunity to make it easy for other organisations to add a leaderboard feature set to their software products. ACME Startup wants to demonstrate to the market what their idea has to offer so invest in building a simple leaderboard application. Leaderboard data will be submitted by authenticated users and Leaderboards can viewed by the public or by private invitation. If this leaderboard product is validated by the market, the business wants to create a SaaS out of it and ideally would like to avoid rework and focus on enhancing the feature set.

## Logical Structures
#### Competitor
A Competitor is a participant in a Contest. By engaging in a Contest, a Competitor may acquire points.

#### Head to Head Contest
A Head to Head (H2H) Contest defines a time when two Competitors compete to see who wins. Based on the final score card, a Competitor will receive the most points for a win, less points for a draw and the least points for a loss.

#### Leaderboard
A Leaderboard contains a complete list of Competitors who will engage in H2H Contents in a Round Robin format. The leaderboard aggregates the total points from all H2H Contests that have completed.

#### Referees
Referees adjudicates a H2H Contest, ensuring that Competitors are playing in accordance with the rules. Referees are also the authority for registering the score. Therefore, Referees are authenticated users of the leaderboard service, find the matching H2H Contest and input the final score.

#### Subscribers
Subscribers are users that want to view Leaderboards they are interested in. They can view any public Leaderboard as well as any private Leaderboard by invitation.

#### How to Run
Subscribers are users that want to view Leaderboards they are interested in. They can view any public Leaderboard as well as any private Leaderboard by invitation.

1. import Database.sql to mysql

2. configure database connection in services/src/setting.php

3. From the services/public directory run the command:
    
   php -S localhost:8080
#### Testing
GET: <a>http://localhost:8080/api/v1/users </a><br/>
GET: <a>http://localhost:8080/api/v1/users/1</a><br/>
PUT: <a>http://localhost:8080/api/v1/users/1</a><br/>
DELETE: <a>http://localhost:8080/api/v1/users/1</a><br/>

#### Architecture 

The app is intended to implement as seperated Backend and Front end
1. Backend: Slim3 with APIs to expose data form database
2. Frontend: AngularJS or React 

Backend has 2 main groups of APIs

  1. Users <br/>
     +) GET: get all user <br/>
     +) GET: get user by id <br/>
     +) POST: add a new user <br/>
     +) POST: subscribe selected contest for user <br/>
     +) POST: add user to a game <br/>
     +) PUT: update user by id <br/>
     +) DELETE: delete user by id <br/>
     +) DELETE: remove subscripton for user <br/>
     +) DELETE: remove user from a game <br/>
  2. Game<br/>
     +) GET: get list of all games<br/>
     +) GET: get list of contests by selected game<br/>
     +) POST: add a new game<br/>
     +) POST: add a contest in a game<br/>
     +) PUT: update game status: pending, started, finished<br/>
     +) PUT: update game scores<br/>
     +) DELETE: delete a game<br/>
     +) DELETE: delete a contest <br/>
     
  There are 4 roles: admin, player, referee, guest <br/>
  
 Admin is able to: list, add, create, update,remove user. <br/>
 Admin is able to: list, add, create, update,remove game. <br/>
 Player is able to sign in a created game with "pending" status <br/>
 Player is able to sign out a game <br/>
 Referee is able to list all games  with "started" status<br/>
 Referee is able to list all contests in a "started game"<br/>
 Referee is able to update score for a game <br/>
 Game has 3 status: Pending, started, finished<br/>
 After Game status is updated to started, it will trigger a function to generate roundrobin contests <br/>
 Guest is able to list all started game<br/>
 Guest is able to list all contests in started game<br/>
 Guest is able to subscibe to a contest<br/>
 

 
 
 
 
 
  
  
  

    
     
     
     