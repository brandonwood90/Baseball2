



/*ALTER TABLE Master ADD COLUMN picID integer(7) NULL;
*/


CREATE TABLE playerPicture(
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



DELIMITER //
CREATE PROCEDURE getNumOfPlayers()
	BEGIN
		SELECT COUNT(*) FROM Master;
	END //
DELIMITER;


DELIMITER //
CREATE PROCEDURE getNumOfTeams()
	BEGIN
		SELECT COUNT(*) FROM Teams;
	END //
DELIMITER;


DELIMITER //
CREATE PROCEDURE displayTeams()
	BEGIN
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', Master.nameGiven AS 'Player'
		FROM Teams INNER JOIN Salaries ON Salaries.teamID = Teams.teamID
		INNER JOIN Master ON Salaries.playerID = Master.playerID
		ORDER BY Teams.yearID ASC;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE displayTeamsSelectYear(IN displayYear VARCHAR(4))
	BEGIN
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', Master.nameGiven AS 'Player'
		FROM Teams INNER JOIN Salaries ON Salaries.teamID = Teams.teamID
		INNER JOIN Master ON Salaries.playerID = Master.playerID
		WHERE Teams.yearID LIKE CONCAT('%', displayYear)
		ORDER BY Teams.yearID ASC, Teams.name ASC, Master.nameGiven ASC;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE displayTeamsSelectTeam(IN displayTeam VARCHAR(100))
	BEGIN
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', Master.nameGiven AS 'Player'
		FROM Teams INNER JOIN Salaries ON Salaries.teamID = Teams.teamID
		INNER JOIN Master ON Salaries.playerID = Master.playerID
		WHERE Teams.name LIKE CONCAT('%', displayTeam,'%')
		ORDER BY Teams.yearID ASC, Teams.name ASC, Master.nameGiven ASC;		
	END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE displayTeamsSelectPlayer(IN displayPlayer VARCHAR(100))
	BEGIN
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', Master.nameGiven AS 'Player'
		FROM Teams INNER JOIN Salaries ON Salaries.teamID = Teams.teamID
		INNER JOIN Master ON Salaries.playerID = Master.playerID
		WHERE Master.nameGiven LIKE CONCAT('%', displayPlayer,'%')
		ORDER BY Teams.yearID ASC, Teams.name ASC, Master.nameGiven ASC;		
	END //
DELIMITER ;



DELIMITER //
CREATE PROCEDURE displayTeamsSearch(IN Date_JNum VARCHAR(4), IN team_PName VARCHAR(100))
	BEGIN
		SELECT Teams.yearID AS 'YEAR', Teams.name AS 'TEAM', Master.nameGiven AS 'Player'
		FROM Teams INNER JOIN Salaries ON Salaries.teamID = Teams.teamID
		INNER JOIN Master ON Salaries.playerID = Master.playerID
		WHERE Teams.yearID LIKE CONCAT('%', Date_JNum)
		AND (Teams.name LIKE CONCAT('%',team_PName,'%') 
		OR Master.nameGiven LIKE CONCAT('%',team_PName,'%'))
		ORDER BY Teams.yearID ASC, Teams.name ASC, Master.nameGiven ASC;		
	END //
DELIMITER ;





