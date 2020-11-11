import os

import random


class NameDataset:
    FIRST_NAME_SEARCH = 0
    LAST_NAME_SEARCH = 1

    def __init__(self):
        first_names_filename = os.path.join(os.path.dirname(__file__), 'first_names.all.txt')
        with open(first_names_filename, 'r', errors='ignore', encoding='utf8') as r:
            self.first_names = r.read().strip().split('\n')
        last_names_filename = os.path.join(os.path.dirname(__file__), 'last_names.all.txt')
        with open(last_names_filename, 'r', errors='ignore', encoding='utf8') as r:
            self.last_names = r.read().strip().split('\n')
        
        self.fn_len = len(self.first_names)
        self.ln_len = len(self.last_names)

    def random_name(self) -> str:
        fn = self.first_names[random.randrange(0,self.fn_len)]
        ln = self.last_names[random.randrange(0,self.ln_len)]
        return "{0} {1}".format(fn.capitalize(),ln.capitalize())
