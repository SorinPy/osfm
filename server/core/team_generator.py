import random
from core import PlayerGenerator,Player,Team

class TeamGenerator:



    def __init__(self) -> None:
        self.player_generator = PlayerGenerator()
        self.attrs = {"defending","tackling","passing","scoring","playmaking","keeping"}

    def generate_team(self,team : Team) -> None:
        if team.active == '1':
            print("This team is active!")
        else:
            team.active = '1'
            defenders = random.randrange(5,6)
            playmakers = random.randrange(7,8)
            forwards = random.randrange(3,4)

            team.add_player(self.player_generator.create_player(["keeping","defending"]))

            for x in range(0,defenders):
                team.add_player(self.player_generator.create_player(["defending","tackling"]))
            for x in range(0,playmakers):
                team.add_player(self.player_generator.create_player(["playmaking","passing"]))
            for x in range(0,forwards):
                team.add_player(self.player_generator.create_player(["scoring"]))

