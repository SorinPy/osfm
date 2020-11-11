
from os import name
from typing import List



from core import Player,Team , TeamGenerator
from core import PlayerGenerator , Database

team_generator = TeamGenerator()

database = Database()



#mycursor.execute("SELECT id,user_id,name FROM teams where `active` = 0")

#myresult = mycursor.fetchall()

empty_teams = database.get_inactive_teams()



#generate new players for all empty teams
for team in empty_teams:
	team_generator.generate_team(team)

#save new generated players
for team in empty_teams:
	if database.insert_players(team.players) == len(team.players):
		if database.save_team(team):
			print("New team have been generated!")
		else:
			print("There was an error saving team to db!")
	else:
		print("Error on insert new players on DB!")
	

		


