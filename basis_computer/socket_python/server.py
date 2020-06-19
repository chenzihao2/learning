import socket

def server():
    s = socket.socket()
    host = '127.0.0.1'
    port = 666
    s.bind((host, port))

    s.listen(5)

    while True:
        c, addr = s.accept()
        print('client addr:', addr)
        c.send('abc')
        c.close()

if __name__ == '__main__':
    server()
