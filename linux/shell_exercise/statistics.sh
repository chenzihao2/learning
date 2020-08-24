#########################################################################
# File Name: statistics.sh
# Author: chenzihao
# Created Time: 2020年06月30日 星期二 18时59分08秒
#########################################################################
#!/bin/bash
if [ -z $1 ] || [ ! -e $1 ]
then
    echo 'no file'
    exit
fi
statistics () {
    for char in {a..z}
    do
        echo "$char - `grep -io "$char" $1 | wc -l`" | tr /a-z/ /A-Z/ >> tmp.txt
    done
    #cat tmp.txt | sort -rn -k 2 -t -
    sort -rn -k 2 -t - tmp.txt
    rm tmp.txt
}
statistics $1

