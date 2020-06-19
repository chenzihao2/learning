import socket

def client(i):
    s = socket.socket()
    host = '127.0.0.1'
    port = 666
    s.connect((host, port))

    #s.listen(5)
    print('recive msg: %s, client: %d' %(s.recv(1024), i))
    s.close()

if __name__ == '__main__':
    for i in range(10):
        client(i)
