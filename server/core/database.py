from core.team import Team
from core import Player
from typing import List
import mysql.connector



class Database:

    def __init__(self,host = "localhost",user ="root" ,password ="" ,db ="osfm") -> None:

        self.__conn = mysql.connector.connect(
                        host=host,
                        user=user,
                        password=password,
                        database=db
                    )
        self.cursor = self.__conn.cursor(dictionary=True)

    def get_inactive_teams(self) -> List[Team]:
        self.cursor.execute("SELECT * FROM teams where `active` = 0")
        res = self.cursor.fetchall()
        ret = []
        
        for team in res:
            ret.append(Team(team))

        return ret

    def insert_players(self , players :List[Player]) -> int:
        query = """INSERT INTO `players` ( `team_id`, `name`, `speed`, `defending`, `tackling`, `passing`, `playmaking`, `scoring`, `keeping`, `age`, `form`, `resistance`)
                VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)
                """
        val = []

        for p in players:
            tempdata = (p.team_id,p.name,p.speed,p.defending,p.tackling,p.passing,p.playmaking,p.scoring,p.keeping,p.age,p.form,p.resistance)
            val.append(tempdata)
        self.cursor.executemany(query, val)

        self.__conn.commit()

        return self.cursor.rowcount

    def save_team(self, team : Team) -> bool:
        query = "UPDATE `teams` SET `name` = %s, `updated_at` = %s, `active` = %s, `money` = %s WHERE `teams`.`id` = %s"
        val = (team.name,team.updated_at,team.active,team.money,team.id)

        self.cursor.execute(query,val)
        self.__conn.commit()

        return self.cursor.rowcount == 1
    