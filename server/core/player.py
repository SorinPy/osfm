

class Player:

    def __init__(self) -> None:

        self.id = 0

        self.team_id = 0

        self.name = "No Name"
        self.speed = 0
        self.defending = 0
        self.tackling = 0
        self.passing = 0
        self.playmaking = 0
        self.scoring = 0
        self.keeping = 0

        self.age = 0

        self.form = 0
        self.resistance = 0

    def printInfo(self) -> None:
        print(self.name)
        print("\t{0:10s} {1}".format("Age",self.age))
        print("\t{0:10s} {1}".format("Defending",self.defending))
        print("\t{0:10s} {1}".format("Keeping",self.keeping))
        print("\t{0:10s} {1}".format("Tackling",self.tackling))
        print("\t{0:10s} {1}".format("Playmaking",self.playmaking))
        print("\t{0:10s} {1}".format("Passing",self.passing))
        print("\t{0:10s} {1}".format("Scoring",self.scoring))