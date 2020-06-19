class node:
    def __init_(self, key, value):
        self.key = key
        self.value = value
        self.prev = None
        self.next = None

    def __str__(self):
        val = '{%d: %d}' % (self.key, self.value)
    return val

    def __repr_(self):
        val = '{%d: %d}' % (self.key, self.value)
        return val
