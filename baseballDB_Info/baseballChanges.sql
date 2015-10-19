



/*ALTER TABLE Master ADD COLUMN picID integer(7) NULL;
*/


CREATE TABLE playerPicture(
/*
playerPicture table will hold 
url string to pictures for the players
in the Master table

Columns: 
picID = auto_increment number for the primary key
playerID = foreign key that references the Master table 
inorder to conncet the pictures to the player
picture = url string of the picture
picWidth = string width of the picture
picHeigth = string height of the picture
*/
	picID INT(7) NOT NULL AUTO_INCREMENT,
	playerID VARCHAR(10) NOT NULL,
	picture VARCHAR(40) NOT NULL,
	picWidth VARCHAR(4) NULL,
	picHeigth VARCHAR(4) NULL,
	PRIMARY KEY (picID),
	KEY fk_player (playerID),
	
	CONSTRAINT playerPicture_constraint
	FOREIGN KEY (playerID)
	REFERENCES Master (playerID)
	ON DELETE CASCADE
	ON UPDATE RESTRICT	

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE playerTrivia(
/*
This table is will store trivia for the 
players in the Master table

COLUMNS:
triviaID = auto_increment number for the primary key
playerID = foreign key that references the Master table 
inorder to conncet the trivia to the player
trivia = string that contians trivia about the a player

*/

	triviaID INT(7) NOT NULL AUTO_INCREMENT,
	playerID VARCHAR(10) NOT NULL,
	trivia VARCHAR(40) NOT NULL,
	PRIMARY KEY (triviaID),
	key fk_player_trivia(playerID),
	
	CONSTRAINT playerTrivia_constraint
	FOREIGN KEY (playerID)
	REFERENCES Master(playerID)
	ON DELETE CASCADE
	ON UPDATE RESTRICT
	
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE deletePlayer(
/*
This table holds players that can 
be hidden by a user

COLUMNS:
deletePlayerID = auto_increment number for the primary key
playerID = foreign key that references the Master table 
inorder to conncet the player
deleted = int 0 or 1, 0 = not hidden and 1 = hidden 

*/

	deletePlayerID INT(7) NOT NULL AUTO_INCREMENT,
	playerID VARCHAR(10) NOT NULL,
	deleted INT(1) NOT NULL,
	PRIMARY KEY (deletePlayerID),
	KEY fk_player_deletePlayer(playerID),
	
	CONSTANT deletePlayer_constraint
	FOREIGN KEY (playerID)
	REFERENCES Master(playerID)
	ON DELETE CASCADE
	ON UPDATE RESTRICT
	
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE deleteTeam(
/*
This table holds teams that can 
be hidden by a user

COLUMNS:
deleteID = auto_increment number for the primary key
teamID = foreign key that references the Teams table 
inorder to connect the team 
yearID = foreign key that references the SeriesPost
deleted = int 0 or 1, 0 = not hidden and 1 = hidden 

*/

	deleteTeamID INT(7) NOT NULL AUTO_INCREMENT,
	teamID VARCHAR(10) NOT NULL,
	yearID VARCHAR(4) NOT NULL,
	deleted INT(1) NOT NULL,
	PRIMARY KEY (deleteTeamID),
	KEY fk_team_deleteTeam(teamID),
	KEY fk_year_deleteTeam(yearID),
	
	CONSTANT deleteTeam_team_constraint
	FOREIGN KEY (teamID)
	REFERENCES Teams(teamID)
	ON DELETE CASCADE
	ON UPDATE RESTRICT
	
	CONSTANT deleteTeam_year_constraint
	FOREIGN KEY (yearID)
	REFERENCES SeriesPost(yearID)
	ON DELETE CASCADE
	ON UPDATE RESTRICT
	
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



DELIMITER //
CREATE PROCEDURE getNumOfPlayers()
	BEGIN
	/* this procedure will get a count of every
	    row in the Master table
	*/
		SELECT COUNT(*) FROM Master;
	END //
DELIMITER;


DELIMITER //
CREATE PROCEDURE getNumOfTeams()
	BEGIN
	/* this procedure will give a count of all of the 
		teams in the Teams table
	
	*/
		SELECT COUNT(*) FROM Teams GROUP BY name;
	END //
DELIMITER;

/*Search procedures*/
DELIMITER //
CREATE PROCEDURE searchTeamsByYear(IN displayYear VARCHAR(4))
	BEGIN
	/*
	  this procedure will search for a team by year in the Teams table
	  and will display the results 
	*/
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', CONCAT(Master.nameFirst," ",Master.nameLast)  AS 'Player'
		FROM Teams INNER JOIN Appearanes ON Teams.teamID = Appearanes.teamID
		INNER JOIN Master ON Appearanes.playerID = Master.playerID
		GROUP BY  Teams.name, Teams.yearID ORDER BY Teams.yearID, Teams.name
		WHERE Teams.yearID LIKE CONCAT('%', displayYear)
		ORDER BY Teams.yearID ASC, Teams.name ASC, CONCAT(Master.nameFirst," ",Master.nameLast)  ASC;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE searchTeamsByTeam(IN displayTeam VARCHAR(100))
	BEGIN
	/*
	  this procedure will search for a team by team name in the Teams table
	  and will display the results 
	*/
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', CONCAT(Master.nameFirst," ",Master.nameLast)  AS 'Player'
		FROM Teams INNER JOIN Appearanes ON Teams.teamID = Appearanes.teamID
		INNER JOIN Master ON Appearanes.playerID = Master.playerID
		GROUP BY  Teams.name, Teams.yearID ORDER BY Teams.yearID, Teams.name
		WHERE Teams.name LIKE CONCAT('%', displayTeam,'%')
		ORDER BY Teams.yearID ASC, Teams.name ASC, CONCAT(Master.nameFirst," ",Master.nameLast)  ASC;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE searchTeamsByPlayer(IN displayPlayer VARCHAR(100))
	BEGIN
	/*
	  this procedure will search for a team by player in the Teams table
	  and will display the results 
	*/
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', CONCAT(Master.nameFirst," ",Master.nameLast)  AS 'Player'
		FROM Teams INNER JOIN Appearanes ON Teams.teamID = Appearanes.teamID
		INNER JOIN Master ON Appearanes.playerID = Master.playerID
		GROUP BY  Teams.name, Teams.yearID ORDER BY Teams.yearID, Teams.name
		WHERE CONCAT(Master.nameFirst," ",Master.nameLast) LIKE CONCAT('%', displayPlayer,'%')
		ORDER BY Teams.yearID ASC, Teams.name ASC, CONCAT(Master.nameFirst," ",Master.nameLast)  ASC;		
	END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE searchTeamsAndPlayer(IN year_ID VARCHAR(4), IN team_PName VARCHAR(100))
	BEGIN
	/*
	  this procedure will search for a team and players by year and  
	  team or player name in the Teams table
	  and will display the results 
	*/
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', CONCAT(Master.nameFirst," ",Master.nameLast)  AS 'Player'
		FROM Teams INNER JOIN Appearanes ON Teams.teamID = Appearanes.teamID
		INNER JOIN Master ON Appearanes.playerID = Master.playerID
		GROUP BY  Teams.name, Teams.yearID ORDER BY Teams.yearID, Teams.name
		WHERE Teams.yearID LIKE CONCAT('%', Date_JNum)
		AND (Teams.name LIKE CONCAT('%',team_PName,'%') 
		OR CONCAT(Master.nameFirst," ",Master.nameLast)  LIKE CONCAT('%',team_PName,'%'))
		ORDER BY Teams.yearID ASC, Teams.name ASC, CONCAT(Master.nameFirst," ",Master.nameLast)  ASC;		
	END //
DELIMITER ;


/* read procedure for database baseBall_db_read class  */
DELIMITER //
CREATE PROCEDURE getAllTeams()
	BEGIN
	/*
		this procedure will get and return all
		team names in the Teams table
	*/
		SELECT Teams.name AS 'Team' FROM Teams 
		GROUP BY Teams.name ORDER BY Teams.name;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getAllYearsofTeam(IN searchTeam)
	BEGIN
	/*
	
	*/
		SELECT Teams.yearID AS 'Year', Teams.teamID AS 'ID' FROM Teams
		WHERE Teams.name = searchTeam 
		GROUP BY Teams.yearID ORDER BY Teams.yearID;
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getAllPlayerYearTeam(IN searchTeam, IN searchYear)
	BEGIN
		SELECT CONCAT(Master.nameFirst," ",Master.nameLast)  AS 'Player', Master.playerID AS 'ID' FROM Master 
		INNER JOIN Salaries ON Master.playerID = Salaries.playerID 
		INNER JOIN Teams ON Salaries.teamID = Teams.teamID 
		WHERE Teams.yearID = searchYear AND Teams.name = searchTeam 
		Group BY Teams.yearID ORDER BY CONCAT(Master.nameFirst," ",Master.nameLast) ; 	

		SELECT CONCAT(Master.nameFirst," ",Master.nameLast)  AS 'Player', Master.playerID AS 'ID' FROM Master 
		INNER JOIN Pitching ON Master.playerID = Pitching.playerID
		INNER JOIN Fielding ON Master.playerID = Fielding.playerID
		INNER JOIN Batting ON Master.playerID = Batting.playerID
		INNER JOIN Teams ON Pitching.teamID = Teams.teamID 
		WHERE Teams.yearID = searchYear AND Teams.name = searchTeam 
		Group BY CONCAT(Master.nameFirst," ",Master.nameLast), Teams.yearID 
		ORDER BY CONCAT(Master.nameFirst," ",Master.nameLast) ; 
		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getTeamStats(IN teamID)
	BEGIN
		SELECT * FROM Teams WHERE Teams.teamID = teamID;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getPlayerInfo(IN playerID)
	BEGIN
		SELECT * FROM Master WHERE Master.playerID = playerID;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getPlayerPitchingStats(IN playerID)
	BEGIN
		SELECT * FROM Pitching WHERE Pitching.playerID = playerID;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getPlayerFieldingStats(IN playerID)
	BEGIN
		SELECT * FROM Fielding WHERE Fielding.playerID = playerID;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE getPlayerBattingStats(IN playerID)
	BEGIN
		SELECT * FROM Batting WHERE Batting.playerID = playerID;		
	END //
DELIMITER ;


/* writing procedure for database baseBall_db_write class  */

DELIMITER //
CREATE PROCEDURE addMaster(IN playerID,IN birthyear, 
IN birthmonth, IN birthday, IN birthcountry, 
IN birthstate, IN birthcity, IN birthyear,
 IN deathyear, IN deathmonth, IN deathday, 
IN deathcountry, IN deathstate, IN deathcity, 
IN namefirst, IN namelast, IN namegiven, 
IN weight, IN height, IN bats, IN throws, 
IN debut, IN finalgame, IN retroid, IN bbrefid)
	BEGIN
		INSERT INTO Master(playerID,birthYear,birthMonth,birthDay,birthCountry,
		birthState,birthCity,deathYear,deathMonth,
		deathYear,deathDay,deathCountry,deathState,
		deathCity,nameFirst,nameLast,nameGiven,weight,
		height,bats,throws,debut,finalGame,retroID,bbrefID)
		VALUES(playerID,birthyear, 
		birthmonth, birthday,birthcountry, 
		birthstate, birthcity, birthyear,
		deathyear,  deathmonth, deathday, 
		deathcountry, deathstate, deathcity, 
		namefirst, namelast, namegiven, 
		weight, height, bats, throws, 
		debut, finalgame,retroid,bbrefid);
	END //
DELIMITER ;


/* delete procedure for database baseBall_db_delete class  */
DELIMITER //
CREATE PROCEDURE deletePlayers(IN playerID)
	BEGIN
		DECLARE is_exsist INT;
		
		SELECT is_exsist INTO COUNT(*) FROM deletePlayer
		WHERE  deletePlayer.playerID = playerID;
		
		IF (is_exsist == 0) THEN		
			INSERT INTO deletePlayer(deletePlayerID,playerID,deleted)
			VALUES('',playerID,'1');
		ELSIF(is_exsist == 1) THEN
			UPDATE deletePlayer SET deletePlayer.deleted = '0'
			WHERE deletePlayer.playerID = playerID;
		END IF;
		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE undeletePlayer(IN playerID)
	BEGIN
		UPDATE deletePlayer SET deletePlayer.deleted = '0'
		WHERE deletePlayer.playerID = playerID;
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE deleteTeams(IN teamID, IN yearID)
	BEGIN
		DECLARE is_exsist INT;
		
		SELECT is_exsist INTO COUNT(*) FROM deleteTeam
		WHERE  deleteTeam.TeamID = teamID 
		AND deleteTeam.yearID = yearID;
		
		IF (is_exsist == 0) THEN
			INSERT INTO deleteTeam(deleteTeamID,teamID,yearID,deleted)
			VALUES('',TeamID,yearID,'1');
		ELSIF(is_exsist == 1) THEN
			UPDATE deleteTeam SET deleteTeam.deleted = '1'
			WHERE deleteTeam.teamID = teamID
			AND deleteTeam.yearID = yearID;
		END IF;
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE undeleteTeam(IN teamID,IN yearID)
	BEGIN
		UPDATE deleteTeam SET deleteTeam.deleted = '0'
		WHERE deleteTeam.teamID = teamID
		AND deleteTeam.yearID = yearID;
	END //
DELIMITER ;

/* update procedure for database baseBall_db_update class  */

DELIMITER //
CREATE PROCEDURE updateMaster(IN playerID, IN updateColumn, IN updateValue)
	BEGIN
		UPDATE Master SET updateColumn = updateValue
		WHERE Master.playerID = playerID;
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE updateTeam(IN teamID,IN yearID, IN updateColumn, IN updateValue)
	BEGIN
		UPDATE Teams SET updateColumn = updateValue
		WHERE Teams.teamID = teamID
		AND Teams.yearID = yearID;
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE updateBatting(IN teamID,IN yearID,IN playerID, IN updateColumn, IN updateValue)
	BEGIN
		UPDATE Batting SET updateColumn = updateValue
		WHERE Batting.teamID = teamID
		AND Batting.yearID = yearID
		AND Batting.playerID = playerID;
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE updatePitching(IN teamID,IN yearID,IN playerID, IN updateColumn, IN updateValue)
	BEGIN
		UPDATE Pitching SET updateColumn = updateValue
		WHERE Pitching.teamID = teamID
		AND Pitching.yearID = yearID
		AND Pitching.playerID = playerID;
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE updateFielding(IN teamID,IN yearID,IN playerID, IN updateColumn, IN updateValue)
	BEGIN
		UPDATE Fielding SET updateColumn = updateValue
		WHERE Fielding.teamID = teamID
		AND Fielding.yearID = yearID
		AND Fielding.playerID = playerID;
	END //
DELIMITER ;




