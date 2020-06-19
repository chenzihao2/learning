#########################################################################
# File Name: open_dev_code.sh
# Author: chenzihao
# Created Time: Tue 30 Apr 2019 12:48:15 PM CST
#########################################################################
#!/usr/bin/bash
expect -c "
spawn ssh chenzihao@192.168.10.32;
expect  {
\"*password*\" {
        send \"chenzihao\r\"; 
    }
}
expect \"*login*from*\" {
send \"sudo su\r\"
}
expect \"*password*\" {
send \"chenzihao\r\"
}
expect \"\#\" {
send \"cd /data/wwwroot/\r\"
}
interact
"
