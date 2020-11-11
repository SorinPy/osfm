
from core import Player
from utils.names_dataset import NameDataset

import random

class PlayerGenerator:
    
    def __init__(self) -> None:
        self.name_generator = NameDataset()
        self.base_attributes = 135
        self.simple_weights = [25,10]
        self.base_start = 10
        self.main_attr_bonus = 10
        self.attrs = {"defending","tackling","passing","scoring","playmaking","keeping"}

    def create_player(self,weigths = []) -> Player:
        player = Player()
        player.name = self.name_generator.random_name()
        player.age = random.randrange(21,31)
        player.form = random.randrange(60,90)
        player.resistance = random.randrange(70,90)

        main_attrs = self.attrs.intersection(weigths)
        sec_attrs = self.attrs.difference(weigths)

        idx = 0
        for attr in main_attrs:
            min_attr = self.base_start + self.main_attr_bonus
            max_attr = min_attr + self.simple_weights[0]
            val = random.randrange(min_attr,max_attr)
            idx += val
            setattr(player,attr,val)
        
        for attr in sec_attrs:
            min_attr = self.base_start
            max_attr = min_attr + self.simple_weights[1]
            val = random.randrange(min_attr,max_attr)
            idx += val
            setattr(player,attr,val)

        extra_attrs = self.base_attributes - idx
        if extra_attrs > 1:
            attr = []
            attr.append(int(60*extra_attrs/100))
            attr.append(extra_attrs - attr[0])
            x = 0
            for wattr in weigths:
                battr = getattr(player,wattr)
                setattr(player,wattr,battr+attr[x])
                x += 1
                if x > 1:
                    break
        if len(weigths) > 1:
            attr1 = getattr(player,weigths[0])
            attr2 = getattr(player,weigths[1])
            if attr1 < attr2:
                setattr(player,weigths[0],attr2)
                setattr(player,weigths[1],attr1)

        
        


        return player

