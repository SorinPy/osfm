
from time import time
from typing import Any, Dict
from core import Player

class Team:

    def __init__(self, team : Any) -> None:
        
        self.players = []
        self.name = team['name']
        self.id = team['id']
        self.user_id = team['user_id']
        self.active = team['active']
        self.updated_at = team['updated_at']
        self.money = team['money']

    def add_player(self,player:Player) -> None:
        player.team_id = self.id
        self.players.append(player)

        self.updated_at = time()
